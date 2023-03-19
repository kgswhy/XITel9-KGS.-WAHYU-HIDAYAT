<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nis',
        'nama',
        'Kelas',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
    ];
}
