<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    //tạo mối quan hệ bài viết và Danh mục
    public function Article_Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
