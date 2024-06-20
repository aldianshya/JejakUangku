<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Menggunakan Authenticatable
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable // Extends Authenticatable, bukan Model
{
    use HasFactory, Notifiable;

    // Nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'pengguna';

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
        'username',
        'email',
        'password',
        // tambahkan kolom lain yang ingin diisi
    ];

    // Menyembunyikan kolom dari array/json
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts untuk tipe data kolom
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
