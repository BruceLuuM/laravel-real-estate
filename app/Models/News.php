<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'ward_id', 'district_id', 'province_id', 'area', 'area_unit', 'price', 'price_unit', 'news_header', 'slug', 'description', 'attribute', 'num_bed_rooms', 'num_wc_rooms', 'law_related_info', 'images'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('news_header', 'like', '%' . request('search') . '%')
                ->orwhere('description', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
