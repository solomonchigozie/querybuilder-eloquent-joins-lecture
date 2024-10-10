<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'sun',
            'email' => 'sun@example.com',
            'password'=>'1234'
        ]);

        // Orders::create([
        //     'user_id'=>2,
        //     'product_name'=>'Samsung Tablet',
        //     'total_amount'=>1320
        // ]);
        
    }
}
