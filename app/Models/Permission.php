<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    use HasFactory;

    protected $fillable = [
        'permission_name',
        'permission_actions',
    ];
}
