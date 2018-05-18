<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $fillable = [
        'judul_buku', 'pengarang_buku', 'penerbit_buku', 'tahun_buku' , 'lokasi', 'cover',
    ];
}
