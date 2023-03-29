<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = ['Kode_Buku', 'Nama_Buku', 'Kategori', 'Deskripsi', 'Penerbit', 'Tanggal_Terbit'];
}
