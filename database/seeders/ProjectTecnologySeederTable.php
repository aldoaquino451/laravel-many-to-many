<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTecnologySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // project_id | tecnology_id
        for ($i = 0; $i < 60; $i++) {

            // prendo un project random
            $project = Project::inRandomOrder()->first();

            // prendo l'id di una tecnology random
            $tecnology_id = Tecnology::inRandomOrder()->first()->id;

            // associo il project con l'id della tecnology
            $project->tecnologies()->attach($tecnology_id);
        }
    }
}
