<?php

namespace Database\Seeders;

use App\Models\Note;
use Database\Factories\NoteFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notes = new NoteFactory();
        $notes->count(10000)->create();
    }
}
