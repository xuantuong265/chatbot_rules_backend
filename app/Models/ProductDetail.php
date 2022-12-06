<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'description','attribute','value',
    ];
    /**
     * Get the product associated with the ProductDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

  /**
   * Get the product associated with the ProductDetail
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function product()
  {
      return $this->hasOne(User::class, 'id_product');
  }
}
