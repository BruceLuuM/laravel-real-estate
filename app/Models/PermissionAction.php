<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionAction extends Model
{
    protected $table = 'permission_actions';

    use HasFactory;

    protected $fillable = [
        'action_name',
        'description',
    ];
}
