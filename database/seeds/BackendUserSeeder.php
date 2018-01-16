<?php

namespace Moduvel\Core\Database\Seeds;

use Illuminate\Database\Seeder;
use Moduvel\Core\Entities\BackendUser;

class BackendUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BackendUser::class)->create([
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
