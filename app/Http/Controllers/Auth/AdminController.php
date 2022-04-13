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

class AdminController extends Controller
{
    function admin(){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $array = array(
                    "users" => User::all(),
                    "shops" => Shop::all(),
                    "tags" => Tag::all(),
                    "wachtrij" => Wachtrij::all(),
                );
                return view("admin.main", ["data" => $array]);
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function user(){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $array = array(
                    "users" => User::all(),
                    "shops" => Shop::all(),
                    "tags" => Tag::all(),
                    "wachtrij" => Wachtrij::all(),
                );
                return view("admin.user.user", ["data" => $array]);
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function shop(){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $array = array(
                    "users" => User::all(),
                    "shops" => Shop::all(),
                    "tags" => Tag::all(),
                    "wachtrij" => Wachtrij::all(),
                );
                return view("admin.shop.shop", ["data" => $array]);
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function distributions($shopName){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($isAdmin || $storeOwner == $shopName){
                $array = array(
                    "users" => User::all(),
                    "shops" => Shop::all(),
                    "tags" => Tag::all(),
                    "wachtrij" => Wachtrij::all(),
                    "shopName" => $shopName,
                );
                return view("admin.shop.distributions.distributions", ["data" => $array]);
            } else{
                return redirect("/admin")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function store($shopName, $shopID){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($isAdmin || $storeOwner == $shopName){
                $shops = Shop::find($shopID);
                if($shopName == $shops->StoreName){
                    $array = array(
                        "users" => User::all(),
                        "shops" => $shops,
                        "tags" => Tag::all(),
                        "wachtrij" => Wachtrij::all(),
                        "shopName" => $shopName,
                        "shopID" => $shopID,
                    );
                    return view("admin.shop.distributions.store.store", ["data" => $array]);
                } else{
                    return redirect("/admin/shop/".$shopName)->withSuccess("Deze store is geen onderdeel van uw branche");
                }
            } else{
                return redirect("/admin")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function updateShop($data){
        DB::update('update registerd_shops set Adress = ?,MaxVisit = ?,AverageTime = ?,ImgLink = ? where id = ?',[$data['Adress'],$data['MaxVisit'],$data['AverageTime'],$data['ImgLink'],$data['id']]);
        // return User::create([
        //     'Adress' => $data['Adress'],
        //     'MaxVisit' => $data['MaxVisit'],
        //     'AverageTime' => $data['AverageTime'],
        //     'ImgLink' => $data['ImgLink'],
        // ]);
    }

    function postShopUpdate(Request $request){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($isAdmin || $storeOwner == $storeOwner){
                $request->validate([
                    'Adress' => 'required',
                    'MaxVisit' => 'required',
                    'AverageTime' => 'required',
                    'ImgLink' => 'required',
                    'id' => 'required',
                ]);
                   
                $data = $request->all();
                $check = $this->updateShop($data);
                 
                return redirect("dashboard");
            } else{
                return redirect("/admin")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function tag(){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $array = array(
                    "users" => User::all(),
                    "shops" => Shop::all(),
                    "tags" => Tag::all(),
                    "wachtrij" => Wachtrij::all(),
                );
                return view("admin.tag.tag", ["data" => $array]);
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function tagInfo($tagID){
        if(Auth::check()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $tagData = Tag::where("id","=",$tagID)->first();
                $userID = Auth::user()->id;
                if($tagData == null){
                    return redirect('/taglist')->withSuccess("Deze tag bestaat niet!");
                }
                return view('tags.tag',["tagData" => $tagData,"isAdmin" => true]);
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }

        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    public function changeTag($tagID){
        if(Auth::check()){
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if(Auth::user()->isAdmin){
                $userID = Auth::user()->id;
                $tagData = Tag::where("id","=",$tagID)->first();
                if($tagData == null){
                    return redirect('/taglist')->withSuccess("Deze tag bestaat niet!");
                }else {
                    return view("tags.changeTag",["tagData" => $tagData]);
                }
            } else {
                return redirect("/dashboard")->withSuccess("U heeft geen toegang tot deze tag!");
            }
        } else {
            return redirect('/login')->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function addShopView(){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $array = array(
                    "users" => User::all(),
                    "shops" => Shop::all(),
                    "tags" => Tag::all(),
                    "wachtrij" => Wachtrij::all(),
                );
                return view("admin.shop.add", ["data" => $array]);
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function postShopAdd(Request $request){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $request->validate([
                    'StoreName' => 'required|unique:registerd_shops',
                ]);
                   
                $data = $request->all();
                $check = $this->addShop($data);
                 
                return redirect("/admin/shop");
            } else{
                return redirect("/admin")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function addShop($data){
        DB::update('INSERT INTO registerd_shops (StoreName) VALUES (?)',[$data["StoreName"]]);
    }

    function removeShopView($shopID) {
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $array = array(
                    "users" => User::all(),
                    "shops" => Shop::all(),
                    "tags" => Tag::all(),
                    "wachtrij" => Wachtrij::all(),
                    "shopData" => Shop::find($shopID),
                );
                return view("admin.shop.remove", ["data" => $array]);
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function removeShop($shopID) {
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($storeOwner != NULL){
                return redirect("/admin/shop/".$storeOwner);
            }
            if($isAdmin){
                $shopName = Shop::find($shopID)->StoreName;
                $shops = Shop::where("StoreName",$shopName)->get();
                for ($x = 0; $x < count($shops); $x++) {
                    $id = $shops[$x]["id"];
                    DB::update('update users set lastStoreID = 0 where lastStoreID = ?', [$id]);
                    DB::delete('delete from wachtrij where shopID = ?',[$id]);
                }                
                DB::delete('delete from registerd_shops where StoreName = ?',[$shopName]);
                return redirect("/admin/shop");
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function addDistributionView($shopName){
        if(Auth::user()){
            $storeOwner = Auth::user()->storeOwner;
            $isAdmin = Auth::user()->isAdmin;
            if($isAdmin || $storeOwner == $shopName){
                $array = array(
                    "users" => User::all(),
                    "shops" => Shop::all(),
                    "shopName" => $shopName,
                    "tags" => Tag::all(),
                    "wachtrij" => Wachtrij::all(),
                );
                return view("admin.shop.distributions.add", ["data" => $array]);
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function postDistributionAdd(Request $request){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            $storeOwner = Auth::user()->storeOwner;
            if($isAdmin || $storeOwner == $request->StoreName){
                $request->validate([
                    'Adress' => 'required',
                    'MaxVisit' => 'required',
                    'AverageTime' => 'required',
                    'StoreName' => 'required',
                ]);
                $data = $request->all();

                $check = $this->addDistribution($data);
                if($storeOwner != NULL){
                    return redirect("/admin/shop/".$storeOwner);
                }
                return redirect("/admin/shop");
            } else{
                return redirect("/admin")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }

    function addDistribution($data){
        DB::update('INSERT INTO registerd_shops (StoreName, Adress, MaxVisit, AverageTime) VALUES (?,?,?,?)',[$data["StoreName"],$data["Adress"],$data["MaxVisit"],$data["AverageTime"]]);
    }

    function EditDistribution($shopName){
        if(Auth::user()){
            $isAdmin = Auth::user()->isAdmin;
            if($isAdmin){
                
                return view("admin.shop.edit");
            } else{
                return redirect("/dashboard")->withSuccess("U heeft geen rechten om deze content te bekijken!");
            }
        } else {
            return redirect("/login")->withSuccess('U bent nog niet ingelogd!');
        }
    }
}