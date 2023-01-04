<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invester extends Model
{
    protected $table = 'investers';

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'brief',
        'description',
        'nums_project',
        'invester_logo',

    ];

    public function project()
    {
        return $this->hasMany(Project::class, 'invester_id');
    }
}
