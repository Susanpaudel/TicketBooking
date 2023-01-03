<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GoingCity;
use App\Models\LeavingCity;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $travle_name=['Prithivi Travels','BP Travels','Sajha Yatayat','Kantipur Travels','Hetauda Travels'];
        $bus_type=['Double-decker bus','Single-decker bus','Low-floor bus','AC bus','Step-entrance bus','Trolleybus'];
        foreach($bus_type as $type){
        \App\Models\BusType::create([
            'bus_type_name'=>$type,
            'slug'=>Str::random(20),
        ]);
        }
        foreach($travle_name as $t){
            \App\Models\TravelName::create([
                'travel_name'=>$t,
                'slug'=>Str::random(20),
            ]);
        }
       
        $cityname=['Kathmandu','Pokhara','Bharatpur','Lalitpur','Birgunj','Biratnagar','Dhangadhi','Ghorahi','Itahari','Hetauda','Janakpur','Butwal','Tulsipur','Budhanilkantha','Dharan','Nepalgunj','Birendranagar','Tarakeshwar','Gokarneshwar','Tilottama','Kalaiya','Suryabinayak','Chandragiri','Tokha','Kageshwari-Manohara','Mechinagar','Bhimdatta','Sundar Haraincha','Thimi','Jitpursimara','Mahalaxmi','Birtamod','Nagarjun','Damak','Triyuga','Lahan','Godawari','Kohalpur'];
        foreach($cityname as $city){
            GoingCity::create([
                'city'=>$city
            ]
            );
        }
        foreach($cityname as $city){
            LeavingCity::create([
                'city'=>$city
            ]
            );
        }
        \App\Models\User::create([
            'name' => 'Susan Paudel',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'slug' => Str::random(20),
            'role'=>'0',
            'mobilenumber'=>'9814228660'
        ]);
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role'=>'1',
            'mobilenumber'=>'9814228660',
            'slug' => Str::random(20)
        ]);

        \App\Models\Travel::factory(10)->create();
    }
}
