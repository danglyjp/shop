<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Elasticquent\ElasticquentTrait;
use App\Models\Category;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    use ElasticquentTrait;

    // public $fillable = ['name','description'];

    // protected $table = 'products';
    // public function getPrice($value = '') {
    //     if($this->price != '') {
    //         return format_price($this->price,$value);
    //     }else{
    //         return 'Liên hệ';
    //     }
    // }
    // public function format_price($price) {
    //     if ($price == 0) {
    //         return "Liên hệ";
    //     }else{
    //         return number_format($price, '.', '.').' VND';
    //     }
    // }


    public function category()
    {
       return $this->belongsTo(Category::class);
    }

}
