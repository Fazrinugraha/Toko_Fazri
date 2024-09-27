<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_distibutor','lokasi','kontak','email'
    ];
}
