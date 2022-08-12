<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    //tạo mối quan hệ Cha con cho Danh mục 
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

}
