<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ImageProductModel;
class Product extends Model
{
    protected $fillable = [
    	'category_id', 'brand_id', 'product_name','product_desc','product_content','product_price','product_color','product_size','number_product','product_status'
    ];
    protected $table ="tbl_product";
    protected $primaryKey = 'product_id';
    public function img()
    {
        return $this->hasMany(ImageProductModel::class, 'product_id', 'product_id');
    }
   
}
