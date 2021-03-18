<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        'name',
    'image',
        'desc',
        'purchasing_price',
        'selling_price',
        'amount',
        'category_id',
        'Total','Rate_VAT','tag_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tages()
    {
        return $this->belongsToMany('App\Models\Tag' ,'App\Models\TagProduct' ,'product_id' ,'tag_id')->withpivot('tag_id');
    }
}
