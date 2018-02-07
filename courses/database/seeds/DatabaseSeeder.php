<?php

use Illuminate\Database\Seeder;
use App\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $add = new Admin;
       $add->name = 'admin';
       $add->password = bcrypt(123456);
       $add->email = 'cr@cr.com';
       $add->save(); 
    }
}
