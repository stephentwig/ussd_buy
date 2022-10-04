<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contact;
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
//        $this->call(TaskSeeder::class);

        User::truncate();
        Contact::truncate();

        // $this->call(UsersTableSeeder::class);
        // User::factory(3)->create();
        User::create([
            'name' => "Stephen Twig",
            'email' => "step@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$LJiwDHKjKpin3ocVhGpfFOmpZdU04aJmvu2vrly/hLRp.tx1Di13.', // password
            'remember_token' => number_format( rand(10,1),10),
        ]);

        Contact::create([
            'contact_number' => '05400113224',
            'is_whitelisted' => 1
        ]);

        Contact::create([
            'contact_number' => '02000113226',
            'is_whitelisted' => 0
        ]);
    }
}
