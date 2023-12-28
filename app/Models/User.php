<?php

namespace App\Models;

use App\Traits\HasAsset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    const IMAGE = 10;
    use HasApiTokens, HasFactory, Notifiable, HasAsset;

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'phone',
        'type',
        'password',
        'sms_verif_code_expires_at',
        'sms_verif_code',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function assetTypes()
    {
        return [
            static::IMAGE => $this->image()
        ];
    }

    public function image()
    {
        return $this->asset()->where('type', static::IMAGE);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'user_id', 'id');
    }

    public function usershows()
    {
        return $this->hasMany(Usershow::class, 'user_id', 'id');
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'user_variants', 'user_id', 'variant_id', 'id', 'id');
    }

    public function uservariants()
    {
        return $this->hasMany(UserVariant::class, 'user_id', 'id');
    }

    public function tests()
    {
        return $this->hasMany(Usertest::class, 'user_id', 'id');
    }

    public function aims()
    {
        return $this->hasMany(Aim::class, 'user_id', 'id');
    }
}
