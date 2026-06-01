<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // protected $table= 'profiles';
    protected $primaryKey= 'id';
    protected $fillable= ['user_id', 'firstname', 'lastname', 'username', 'phone', 'email', 'role', 'date_of_birth', 'gender', 'religion', 'nationality', 'county'];


    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
