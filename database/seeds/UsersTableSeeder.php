<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = [
            'name' => 'Richard Arnold',
            'email' => 'richiearnold75@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ];

        factory(App\User::class, 1)->create($user1);

        $user2 = [
            'name' => 'Louise Arnold',
            'email' => 'louisearnold14@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ];

        factory(App\User::class, 1)->create($user2);

        factory(App\User::class, 8)->create();
    }
}
