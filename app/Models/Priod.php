<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priod extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'contacto',
        'whatsapp',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'missao',
        'visao',
    ];
}
