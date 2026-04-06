<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable; //Wajib untuk login
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use Notifiable;
protected $table = 'admin'; // Arahkan ke tabel admin
protected $guarded = []; // Izinkan semua kolom diisi
}
