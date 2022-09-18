<?php

namespace App\Models;


use App\Models\ToDo;
use App\Models\Mapel;
use App\Models\Tugas;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'user_id')->where('user_id', Auth::user()->id);
    }

    public function todo()
    {
        return $this->hasMany(ToDo::class, 'user_id')->where('user_id', Auth::user()->id);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'user_id')->where('user_id', Auth::user()->id);
    }

}
