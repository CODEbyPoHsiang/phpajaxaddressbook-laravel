<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name','ename','phone','email','sex','city','township','postcode','address','notes'];
}
