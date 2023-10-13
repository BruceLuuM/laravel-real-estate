<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news_blog extends Model
{
    protected $table = 'news_blogs';

    use HasFactory;

    protected $fillable = ['text', 'type', 'date', 'title', 'slug'];
}
