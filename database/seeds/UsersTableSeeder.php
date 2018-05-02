<?php
use BePro\User\User;
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
        User::create([
            'name' => 'BePro',
            'email' => 'proman@bepro.com',
            'password' => bcrypt('a1225'),
            'email_verified' => true
        ]);
    }
}
