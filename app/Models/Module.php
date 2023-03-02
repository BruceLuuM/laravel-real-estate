<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    use HasFactory;

    protected $fillable = [
        'module_name',
        'module_folder',
        'module_file',
        'module_css',
        'module_position',
        'module_route',
        'module_function_id',
        'active'
    ];
}
