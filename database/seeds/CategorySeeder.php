<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();

        $categories = [
            ['name' => 'Computing', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Networks & Communication', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Software', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Profesional Services', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Consulting', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Finance', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Insurance', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Travel', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Events', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Food', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Marketing', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Reasearch', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Media', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Distribution', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Printing & Prototyping', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Production', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Engineering', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Design', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Utilities', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Logistics', 'description' => '', 'parent_id' => NULL],
            ['name' => 'Waste Management', 'description' => '', 'parent_id' => NULL]

        ];

        DB::table('categories')->insert($categories);
    }
}
