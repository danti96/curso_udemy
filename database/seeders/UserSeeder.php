<?php

namespace Database\Seeders;

use App\Models\User;
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
                    'name' => 'Edhisson Daniel Alvarado Tintin',
                    'email'=> 'devcatpro@devcatpro.com',
                    'password'=> bcrypt('devcatpro'),
                ]);
        $user->assignRole('Admin');
        /** Llenar con registros de pruebas usando factories de user */
        User::factory(99)->create();
    }
}
