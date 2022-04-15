<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Wachtrij extends Model
{
    use HasFactory;

    protected $table="wachtrij";

    protected $fillable = [
        'shopID',
        'user_id',
        'physical'
    ];

    public function myOwner(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
