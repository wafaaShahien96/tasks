<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Category extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = "categories";

    protected $fillable = ['parent_id'];

    protected $with = ['translations'];

    public $translatedAttributes = ['name'];

    public function _parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeParent($q)
    {
        return $q->whereNull('parent_id');
    }

    public function scopeChild($q)
    {
        return $q->whereNotNull('parent_id');
    }
  
    
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    public function product(){
        return $this->hasMany(Product::class);
    }

}
