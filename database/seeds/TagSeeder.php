<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Faker\Generator as Faker;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $labels =['FrontEnd','BackEnd','FullStack','DevOps','UI/UX'];
        foreach($labels as $label){
            $tag = new Tag();
            $tag->label = $label;
            $tag->color = $faker->hexColor();
            $tag->save();
        }
    }
}
