<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class TechnologyTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies=["formaggio",'php','laravel','gattese','limone','astuzia','cristianesimo'];
        foreach($technologies as $technology){
            $newTechnology= new Technology();
            $newTechnology->name=$technology;
            $newTechnology->color=$faker->hexcolor();
            $newTechnology->save();
        
 ;       }
    }
}
