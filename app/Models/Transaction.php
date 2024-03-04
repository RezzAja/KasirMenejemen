<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock_id',
        'category_id',
        'quantity',
        'recipient'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function stock(){
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
