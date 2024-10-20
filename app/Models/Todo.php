<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'description',
    'is_completed',
    'due_date',
    'priority',
  ];

  // Example: if you want to add a scope for incomplete todos
  public function scopeIncomplete($query)
  {
    return $query->where('is_completed', false);
  }
}
