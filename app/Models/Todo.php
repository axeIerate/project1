<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @use HasFactory<\Database\Factories\TodoFactory>
 */
class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'completed', 'deadline'];
}