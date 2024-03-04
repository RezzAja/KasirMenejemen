<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'category_id',
        'item_name',
        'description',
        'price',
        'quantity',
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
