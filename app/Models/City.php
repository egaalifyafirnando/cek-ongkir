<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // guarded difungsikan untuk mengizinkan mass assigment di tabel cities
    protected $guarded = [];
}
