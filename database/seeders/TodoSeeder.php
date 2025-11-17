<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TodoModel;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TodoModel::create([
			'title' => 'Mijn eerste todo!',
			'description' => 'Deze todo is automatisch aangemaakt',
			'isCompleted' => false
		]);
    }
}
