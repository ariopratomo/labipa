<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@labipa.test',
            'password' => bcrypt('12345678'),
            'nip' => 199402232020021005,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
