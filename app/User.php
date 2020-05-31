<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create(array $array)
 * @property int id
 *
 *@property string first_name
 *@property string last_name
 *@property string user_name
 *@property string email
 *
 * @property Resume[] resumes
 * @property Comment[] comments
 */
class User extends Authenticatable
{
    //------------------------------------defining enums---------------------------------//
    const USER = "user";
    const ADMIN = "admin";
    const ROLES = [
        self::USER,
        self::ADMIN
    ];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'user_name', 'email', 'birth_date', 'role', 'password'
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
    ];
    //------------------------------------Relations---------------------------------//

    public function resumes()
    {
        return $this->hasMany(Resume::class, 'uploader_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
}
