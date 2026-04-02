<?php

namespace Database\Seeders;

use App\Models\post;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
        $newPost = new Project();
        $newPost -> title = fake()->sentence();
        $newPost ->author= fake()->name();
        $newPost -> description = fake()->paragraph();
        $newPost -> save();
    }
}
}