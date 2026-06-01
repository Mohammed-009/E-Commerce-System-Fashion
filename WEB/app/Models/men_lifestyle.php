<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class men_lifestyle extends Model
{
    use HasFactory;
    protected $table= 'men_lifestyles';
    protected $primaryKey= 'id';
    protected $fillable= ['id', 'user_id', 'categoryName', 'productName', 'productImage', 'productPrice', 'productSize', 'productDescription'];
}
