<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\User::insert([
            ['name' => 'Admin',
            'email' => 'admin@collectius.com',
            'password' => bcrypt('123@collectius')]
        ]);

    	$userId = \App\User::where('email', 'admin@collectius.com')->first()->id;
        DB::table('role_user')->truncate();

        $data = [
            0 =>[
                'user_id' => $userId,
                'role_id' => '1'
            ]
        ];

	DB::table('role_user')->insert($data);

    }
}
