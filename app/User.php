<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Cog\Ban\Contracts\HasBans as HasBansContract;
// use Cog\Ban\Traits\HasBans;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;


class User extends Authenticatable implements BannableContract
//  implements HasBansContract
{
    use Notifiable;
    use Bannable;
    // use HasBans;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
    ];

    public function role(){

        return $this->belongsTo(Role::class);
    }

}
