<?php

namespace Database\Seeders;

use App\Models\DeliveryAgent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DeliveryAgent::create([
            'name' => 'DeliveryAgent',
            'email' => 'delivery@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>'0987654321',
            'status'=>'1',
            'age'=>'23',
            'gender'=>'1',
        ]);
    }
}
