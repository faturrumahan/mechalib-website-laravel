<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['username', 'email', 'is_admin', 'password'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
