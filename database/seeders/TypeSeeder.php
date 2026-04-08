<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types=["miao","cammello","creare","cianfrusaglie",'canaglia',"miao-eletric-boogaloo",'colonnello','djdjjdjjd','petrolio','lol'];
        foreach($types as $type){
            $newType= new Type();
            $newType->name= $type;
            $newType->description= fake()->sentence();
            $newType->save();
         
        }
    }
}
