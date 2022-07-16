<?php

namespace Database\Seeders;

use App\Actions\CreateManagerAction;
use App\DataTransferObjects\ManagerData;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultManagerSeeder extends Seeder
{
    public function run(CreateManagerAction $action)
    {
        $data = new ManagerData([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('123456'),
            'role' => RoleEnum::manager()->value
        ]);
        $action->execute($data);
    }
}
