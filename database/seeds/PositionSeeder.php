<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Positsion::insert([
            ['name' => 'Backend разработчик'],
            ['name' => 'Frontend разработчик'],
            ['name' => 'FullStack разработчик'],
            ['name' => 'Desktop разработчик'],
            ['name' => 'Мобильный разработчик'],
            ['name' => 'Графический программист'],
            ['name' => 'Администратор базы данных'],
            ['name' => 'Data Scientist'],
            ['name' => 'DevOps инженер'],
            ['name' => 'QA'],
            ['name' => 'CRM разработчик'],
            ['name' => 'Embedded разработчик'],
            ['name' => 'SEO-специалисты'],
            ['name' => 'Бизнес — аналитики'],
            ['name' => 'Product/Project Менеджеры'],
        ]);
    }
}
