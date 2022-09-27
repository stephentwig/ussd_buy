<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TaskSeeder::class);

        User::truncate();
        Customer::truncate();

        // $this->call(UsersTableSeeder::class);
        // User::factory(3)->create();
        User::create([
            'name' => "Bobby",
            'email' => "Bobby",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => number_format( rand(10,1),10),
        ]);

        Customer::create([
            'contact_number' => '05400113224',
            'status_code' => 1,
            'is_whitelisted' => 0
        ]);

        Customer::create([
            'contact_number' => '02000113226',
            'status_code' => 1,
            'is_whitelisted' => 0
        ]);
    }
}
