<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'imeSajta',
        'adresa',
        'mesto',
        'email',
        'telefon',
        'logo',
    ];
}
