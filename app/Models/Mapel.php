<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    public $table = 'mapel';
    protected $fillable = ['nama', 'guru', 'hari', 'jam', 'ruangan', 'mapel'];
}