<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url','created_by','stt'];

    function line(){
        return $this->hasMany('App\Models\line');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
