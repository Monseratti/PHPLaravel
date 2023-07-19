<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(): BelongsToMany
    {
       return $this->belongsToMany(Role::class);
    }
    public function CheckRole($roles)
    {
        if(!is_array($roles)){
            $roles = [$roles];
        }
        if(!$this->hasAnyRole($roles)){
            auth()->logout();
            abort(404);
        }
    }
    public function hasAnyRole($roles):bool
    {
        return (bool) $this->roles()->whereIn("role",$roles)->first();
    }
    public function hasRole($role)
    {
        return (bool) $this->roles()->where("role",$role)->first();
    }
}
