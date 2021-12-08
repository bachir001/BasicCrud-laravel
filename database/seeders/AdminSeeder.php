<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $admin = Admin::query()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@mootawer.com',
        //     'password' => bcrypt('secret')
        // ]);

        $admin = new Admin([
            'name' => 'admin',
            'email' => 'admin@mootawer.com',
            'password' => bcrypt('secret')
        ]);
        $admin->save();
        
    }
}
