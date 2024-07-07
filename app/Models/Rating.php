<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['registration_id','value','description',];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
