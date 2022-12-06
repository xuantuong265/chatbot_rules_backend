<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','price','total','image','quantity','category_id'
    ];
    /**
     * Get the categories that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

   /**
    * Get the productDetail associated with the Product
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function productDetail()
   {
       return $this->hasOne(ProductDetail::class);
   }

}
