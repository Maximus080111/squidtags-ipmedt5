<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Tag;
use App\Models\Shop;
use App\Models\Wachtrij;

use DB;
use Hash;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    
    public function login()
    {
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            return redirect('/dashboard');
        }
        return view('auth.login',['string' => Auth::check()]);
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
  
        return redirect("/login")->withSuccess('Onjuiste email of gebruikersnaam!');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phoneNumber' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'fname' => $data['fname'],
        'lname' => $data['lname'],
        'email' => $data['email'],
        'phoneNumber' => $data['phoneNumber'],
        'password' => Hash::make($data['password']),
        'visitCount' => 0,
        'lastVisit' => 'Walmart',
        'profilePicture' => 'default'
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('/');
    }

    public function dashboard()
    {
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            $user = Auth::user();
            $lastStoreID = $user->lastStoreID;
            $amountOfWachtrijen = count(Wachtrij::all()->where("user_id","=",$user->id));
            $lastStore = Shop::All()->where("id","=",$lastStoreID)->first()->StoreName;
            $array = array(
                "lastVisit" => $lastStore,
                "amount" => $amountOfWachtrijen,
            );
            return view('homepage', ['user' => $user],['data' => $array]);
            // 
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');

        }
    }

    public function account(){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            return view('account');
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function profile(){
        $user = Auth::user();
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            return view('profile', ['user' => $user]);
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function profileUpdate(Request $request){
        $user = Auth::user();
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            $data = $request->all();
            if($data["PhoneNumber"] == Auth::user()->phoneNumber && $data["Email"] == Auth::user()->email){
                $request->validate([
                    'profilePicture' => 'required',
                    'Email' => 'required',
                    'PhoneNumber' => 'required',
                    'Name' => 'required'
                ]);
            }elseif($data["Email"] == Auth::user()->email){
                $request->validate([
                    'profilePicture' => 'required',
                    'Email' => 'required',
                    'PhoneNumber' => 'required|unique:users',
                    'Name' => 'required'
                ]);
            }elseif($data["PhoneNumber"] == Auth::user()->phoneNumber){
                $request->validate([
                    'profilePicture' => 'required',
                    'Email' => 'required|unique:users',
                    'PhoneNumber' => 'required',
                    'Name' => 'required'
                ]);
            }else{
                $request->validate([
                    'profilePicture' => 'required',
                    'Email' => 'required|unique:users',
                    'PhoneNumber' => 'required|unique:users',
                    'Name' => 'required'
                ]);
            }
            $this->updateProfile($data);
            return redirect('/dashboard');
            
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function updateProfile($data){
        $splitName = explode(" ", $data["Name"], 2);
        DB::update('update users set profilePicture = ?, email = ?, phoneNumber = ?, fname = ?, lname = ? where id = ?',[$data['profilePicture'],$data['Email'],$data['PhoneNumber'],$splitName[0],$splitName[1],Auth::User()->id]);

    }

    public function tag($tagID){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            $tagData = Tag::where("id","=",$tagID)->first();
            $userID = Auth::user()->id;
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            if($tagData == null){
                return redirect('/taglist')->withSuccess("Deze tag bestaat niet!");
            }
            if($tagData->user_id == $userID){
                return view('tags.tag',["tagData" => $tagData,"isAdmin" => false]);
            } else{
                return redirect('/taglist')->withSuccess("U heeft geen toegang tot deze tag!");
            }
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function taglist(){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            $userID = Auth::user()->id;
            $taglist = User::where("id","=",$userID)->first()->myTags;
            return view('tags.taglist',['taglist' => $taglist],["tagAmount" => count($taglist)]);
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function OntkoppelTag($tagID){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            $userID = Auth::user()->id;
            $tagData = Tag::where("id","=",$tagID)->first();
            if($tagData == null){
                return redirect('/taglist')->withSuccess("Deze tag bestaat niet!");
            }
            if($tagData->user_id == $userID){
                return view('tags.tagConfirm',["tagData" => $tagData]);
            } else{
                return redirect('/taglist')->withSuccess("U heeft geen toegang tot deze tag!");
            }
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function removeTag($tagID){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            $userID = Auth::user()->id;
            $tagData = Tag::where("id","=",$tagID)->first();
            if($tagData == null){
                return redirect('/taglist')->withSuccess("Deze tag bestaat niet!");
            }
            if($tagData->user_id == $userID){
                $tagData->delete();
                return redirect('/taglist');
            } else{
                return redirect('/taglist')->withSuccess("U heeft geen toegang tot deze tag!");
            }
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function newTag(){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            $userID = Auth::user()->id;
            return view("tags.newTag");
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function postNewTag(Request $request){
        $request->validate([
            'TagName' => 'required',
            'TagData' => 'required|unique:tags',
        ]);
           
        $data = $request->all();
        $check = $this->createTag($data);
         
        return redirect("/taglist");
    }

    public function createTag(array $data)
    {
      return Tag::create([
        'TagName' => $data['TagName'],
        'TagData' => $data['TagData'],
        'user_id' => Auth::user()->id
      ]);
    }

    public function changeTag($tagID){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin/tag/'.$tagID.'/changeTag');
            }
            $userID = Auth::user()->id;
            $tagData = Tag::where("id","=",$tagID)->first();
            if($tagData == null){
                return redirect('/taglist')->withSuccess("Deze tag bestaat niet!");
            }
            if($tagData->user_id == $userID){
                return view("tags.changeTag",["tagData" => $tagData]);
            } else{
                return redirect('/taglist')->withSuccess("U heeft geen toegang tot deze tag!");
            }
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function postChangeTag(Request $request){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            $request->validate([
                'NewTagName' => 'required',
                'NewTagData' => 'required',
                'TagID' => 'required',
            ]);

            $data = $request->all();
            if(Auth::user()->isAdmin || Auth::user()->id == Tag::find($data["TagID"])->user_id){
                $check = $this->editTag($data);
                
                return redirect("/taglist");
            }
        }
    }

    public function editTag($data){
        DB::update('update tags set TagName = ?,TagData = ? where id = ?',[$data['NewTagName'],$data['NewTagData'],$data['TagID'],]);
    }

    public function shops(){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            // $webShops = Shop::all();
            $array = array(
                "jsUrl" => '/js/shops.js',
            ); 
            $data = DB::select("SELECT * FROM registerd_shops where Adress is null" );
            return view('shops.shops', ['ShopList' =>$data],['data' => $array]);
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function shopList($shopName){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            $shopInfo = Shop::where('StoreName',$shopName)->get();
            $UserWachtrijen = Auth::user()->myWachtrijen;
            $array = array(
                "Wachtrijen" => $UserWachtrijen,
                "jsUrl" => '/js/shopList.js',
            ); 
            return view('shops.shops', ['ShopList' =>$shopInfo],["data" => $array]);
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function shopInfo($shopName, $shopID){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            $shopInfo = Shop::find($shopID);
            $UserWachtrijen = Auth::user()->myWachtrijen;
            return view('shops.shopInfo', ['ShopInfo' =>$shopInfo],["Wachtrijen" => $UserWachtrijen]);
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function shopWachtrij($shopName, $shopID){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            Wachtrij::create([
                'shopID' => $shopID,
                'user_id' => Auth::user()->id,
                'physical' => false,
            ]);
            DB::update('update users set lastStoreID = ? where id = ?',[$shopID,Auth::user()->id]);
            return redirect("/shops")->withSuccess("U bent toegevoegd in de wachtrij");
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function leaveWachtrij($shopName, $shopID){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                return redirect('/admin');
            }
            // DB::delete("DELETE from wachtrij where user_id = "+Auth::user()->id+"and shopID = "+$shopID+";");
            DB::delete('delete from wachtrij where user_id = ? and shopID = ?',[Auth::user()->id, $shopID]);
            return redirect("/shops")->withSuccess("U bent verwijdert uit de wachtrij");
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }
}