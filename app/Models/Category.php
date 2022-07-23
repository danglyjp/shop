<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //tạo mối quan hệ Cha con cho Danh mục 
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

}
