<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','chochouaib@gmail.com')->first();
        if(!$user){
            User::create([
                'name'=> 'Zeghoum Chouaib',
                'email'=>'chochouaib@gmail.com',
                'role'=> 'admin',
                'password'=>hash::make('0552163366')
            ]);
        }
    }
}
