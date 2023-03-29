<?php

namespace Database\Seeders;

use App\Models\Entries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entries::factory()->times(10)->create();
    }
}
