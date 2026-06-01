<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Men_official extends Model
{
    use HasFactory;
    protected $table= 'men_officials';
    protected $primaryKey= 'id';
    protected $fillable= ['id', 'user_id', 'categoryName', 'productName', 'productImage', 'productPrice', 'productSize', 'productDescription'];

}
