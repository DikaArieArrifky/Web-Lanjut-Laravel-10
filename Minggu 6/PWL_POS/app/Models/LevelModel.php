<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    public $timestamps = true;

    protected $fillable = [
        'level_kode',  // Tambahkan ini untuk mass assignment
        'level_nama'
    ];
}