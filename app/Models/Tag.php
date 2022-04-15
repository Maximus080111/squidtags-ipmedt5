<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tag extends Model
{
    use HasFactory;

    protected $table="tags";

    protected $fillable = [
        'TagName',
        'TagData',
        'user_id'
    ];

    public function myOwner(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
