<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; use SoftDeletes;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function line()
    {
        return $this->belongsTo(Line::class);
    }
    public function product_image()
    {
        return $this->hasMany(Product_image::class);
    }

    protected $fillable =['transport','product_code','name','qty','price','image_main','describe','category_id','line_id'];
}
