<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Sito Web'
            ],
            [
                'name' => 'Applicazione mobile'
            ],
            [
                'name' => 'Applicazione desktop'
            ],
            [
                'name' => 'Software'
            ],
            [
                'name' => 'Frontend'
            ],
            [
                'name' => 'Backend'
            ]
        ];

        Type::insert($types);
    }
}
