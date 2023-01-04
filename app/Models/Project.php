<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    protected $table = 'projects';

    use HasFactory;

    protected $fillable = ['invester_id', 'category_id', 'province_id', 'district_id', 'ward_id', 'name', 'slug', 'area', 'area_unit', 'description', 'images'];


    public function invester()
    {
        return $this->belongsTo(Invester::class, 'invester_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function province()
    {
        return $this->hasOne(Provinces::class, 'code', 'province_id');
    }
    public function district()
    {
        return $this->hasOne(Districts::class, 'code', 'district_id');
    }
    public function ward()
    {
        return $this->hasOne(Wards::class, 'code', 'ward_id');
    }
}
