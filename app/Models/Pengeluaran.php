<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';

    // Primary key jika tidak menggunakan 'id'
    // protected $primaryKey = 'your_primary_key';

    // Guarded properties untuk mencegah mass assignment pada field 'id'
    protected $guarded = ['id'];

    // Menentukan apakah tabel memiliki timestamp (created_at, updated_at)
    public $timestamps = true;

    // Jika tabel tidak memiliki kolom created_at dan updated_at
    // public $timestamps = false;

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'email',
        'tanggal',
        'jenis',
        'jumlah'
        // tambahkan kolom lain yang ingin diisi
    ];

    // Menyembunyikan kolom dari array/json
    protected $hidden = [
        'password',
        'remember_token',
    ];


}
