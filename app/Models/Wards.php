<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    protected $table = 'wards';

    use HasFactory;

    //Relationship to provinces
    public function districts()
    {
        return $this->belongsTo(districts::class, 'district_code');
    }
}
