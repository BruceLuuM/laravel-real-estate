<?php

namespace App\Models;

use App\Models\Districts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinces extends Model
{
    protected $table = 'provinces';

    use HasFactory;
    // Relationship with news
    public function districts()
    {
        return $this->hasMany(Districts::class, 'province_code');
    }
}
