<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Shoe extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table= 'm__shoes';
    protected $primaryKey= 'id';
    protected $fillable= ['id', 'user_id', 'categoryName', 'productName', 'productImage', 'productPrice', 'productSize', 'productDescription'];
}
