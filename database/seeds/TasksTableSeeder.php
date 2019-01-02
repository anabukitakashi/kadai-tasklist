<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++) {
            DB::table('tasks')->insert([
                'status' => '進捗' . $i,
                'user_id' => '4',
                'content' => 'job' . $i
            ]);
        }
    }
}
