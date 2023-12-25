<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Line extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'created_by',];

    function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
   
}
