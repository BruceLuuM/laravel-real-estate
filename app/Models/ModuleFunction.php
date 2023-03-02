<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleFunction extends Model
{
    protected $table = 'module_functions';

    use HasFactory;

    protected $fillable = [
        'function_name',
        'function_folder',
        'function_file',
        'function_css',
        'function_position',
        'function_route',
        'description',
        'used',
        'active',
    ];

    // public function module()
    // {
    //     return $this->belongsTo(Module::class, 'module_funtion_id');
    // }
}
