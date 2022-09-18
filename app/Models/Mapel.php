<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mapel extends Model
{
    use HasFactory;
    public $table = 'mapel';
    protected $fillable = ['user_id', 'nama', 'guru', 'hari', 'jam', 'ruangan', 'mapel'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'mapel_id')->where('user_id', Auth::user()->id);
    }
}