<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Creating sample to-dos
    Todo::create([
      'title' => 'Buy groceries',
      'description' => 'Milk, Bread, Cheese',
      'due_date' => now()->addDays(3),
      'priority' => 'high',
      'is_completed' => false,
    ]);
    
    Todo::create([
      'title' => 'Finish project',
      'description' => 'Complete Laravel ToDo app',
      'due_date' => now()->addWeek(),
      'priority' => 'medium',
      'is_completed' => false,
    ]);
  }
}

