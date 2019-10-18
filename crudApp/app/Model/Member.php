<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table='members';
    protected $fillable=['name','email','phone_no','password','password_confirmation'];
}
