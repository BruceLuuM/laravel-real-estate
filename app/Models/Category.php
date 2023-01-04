<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    use HasFactory;

    protected $fillable = ['purpose', 'type', 'type_name', 'slug', 'description'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('purpose', 'like', '%' . request('search') . '%')
                ->orwhere('type', 'like', '%' . request('search') . '%')
                ->orwhere('type_name', 'like', '%' . request('search') . '%');
        }
    }
}
