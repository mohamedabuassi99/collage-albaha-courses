<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['title', 'logo', 'logo32', 'cover', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube',];
}
