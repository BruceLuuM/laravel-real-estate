<?php

namespace App\Models;

use App\Models\Wards;
use App\Models\Provinces;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Districts extends Model
{
    protected $table = 'districts';

    use HasFactory;
    //Relationship to provinces
    public function provinces()
    {
        return $this->belongsTo(Provinces::class, 'province_code');
    }

    // Relationship with wards
    public function wards()
    {
        return $this->hasMany(Wards::class, 'district_code');
    }
}
