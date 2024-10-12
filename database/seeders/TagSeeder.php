<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    protected $tags = ['Проекты', 'Задачи', 'Покупки', 'Здоровье', 'Животные', 'Уборка', 'Документы', 'Книги'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->tags as $tag) {
            Tag::insert([
                'title' => $tag,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
