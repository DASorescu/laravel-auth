<?php
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User;
        $user->name = 'Andrei';
        $user->email = 'andrei9777@hotmail.it';
        $user->password =bcrypt('password');
        $user->save();
        for($i=0;$i<10;$i++){

            $user = new User;
            $user->name = $faker->firstName();
            $user->email = $faker->email();
            $user->password =bcrypt('password');
            $user->save();
        }
    }
}
