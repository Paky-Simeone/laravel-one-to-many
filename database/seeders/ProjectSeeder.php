<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
// use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types_id = Type::all()->pluck('id');
        

        for($i=0; $i<150; $i++ ){
            $project = new Project;
            $project->title = $faker->catchPhrase();
            $project->type_id = $faker->randomElement($types_id);
            $project->author = $faker->word();
            $project->description = $faker->catchPhrase();
            $project->project_link = $faker->catchPhrase();
            $project->save();
        }
        

    }
}
