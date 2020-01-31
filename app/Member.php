<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $fillable = ['name','ename','phone','email','sex','city','township','postcode','address','notes'];
}
