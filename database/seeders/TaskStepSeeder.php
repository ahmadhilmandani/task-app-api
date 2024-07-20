<?php

namespace Database\Seeders;

use App\Models\TaskStep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskStep::factory()->count(10)->create();
    }
}
