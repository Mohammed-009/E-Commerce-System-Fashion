<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children_Shoe extends Model
{
    use HasFactory;
    protected $table= 'children__shoes';
    protected $primaryKey= 'id';
    protected $fillable= ['id', 'user_id', 'categoryName', 'productName', 'productImage', 'productPrice', 'productSize', 'productDescription'];
}
