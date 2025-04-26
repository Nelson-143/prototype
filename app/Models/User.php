<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use CrudTrait;
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phoneNumber',
        'password',
        'store_name',
        'store_address',
        'store_phone',
        'store_email',
        'photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

 
    public function isAdmin()
{
    return $this->is_admin;
}
public function banUser()
{
    $this->is_banned = !$this->is_banned;
    $this->save();
}


}
