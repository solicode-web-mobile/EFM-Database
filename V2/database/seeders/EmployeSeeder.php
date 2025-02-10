<?php

namespace Database\Seeders;

use App\Models\Employe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employes = [
            [
                'name' => 'bakali',
            ],
            [
                'name' => 'douae',
            ],
            [
                'name' => 'tribak',
            ],
            [
                'name' => 'basri',
            ]
        ];

        foreach($employes as $employe) {
            Employe::create($employe);
        }
    }
}
