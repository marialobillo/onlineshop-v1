<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Image;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin_since' => 'datetime',
    ];

    protected $dates = [
        'admin_since ',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Order::class, 'customer_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function isAdmin()
    {
        return $this->admin_since != null
            && $this->admin_since->lessThanOrEqualTo(now());
    }

    public function setPasswordAttribute($password){

        $this->attributes['password'] = bcrypt($password);
    }
}
