<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login extends Authenticatable
{
    use Notifiable;
    protected $table = 'login';
    protected $fillable = [
        'username' ,'password','create_date','create_by'
    ];

    protected $hidden = [
        'password',
    ];
    public function adminlte_image()
    {
        return 'https://static.toiimg.com/thumb/resizemode-4,msid-76729750,imgsize-249247,width-720/76729750.jpg';
    }

}
