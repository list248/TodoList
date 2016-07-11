// /database/migrations/seeds/TasksTableSeeder.php
<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('tasks')->delete();

        $tasks = array(
            ['id' => 1, 'name' => 'Task 1',  'description' => 'My first task', 'created_at' => new DateTime, 'updated_at' => new DateTime , 'status' => 0],
            ['id' => 2, 'name' => 'Task 2',  'description' => 'My first task', 'created_at' => new DateTime, 'updated_at' => new DateTime , 'status' => 1],
            ['id' => 3, 'name' => 'Task 3',  'description' => 'My first task', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'status' => 0],
            ['id' => 4, 'name' => 'Task 4',  'description' => 'My second task', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'status' => 0],
            ['id' => 5, 'name' => 'Task 5',  'description' => 'My third task', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'status' => 1],
            ['id' => 6, 'name' => 'Task 6',  'description' => 'My fourth task', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'status' => 1],
            ['id' => 7, 'name' => 'Task 7', 'description' => 'My fifth task', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'status' => 0],
        );

        //// Uncomment the below to run the seeder
        DB::table('tasks')->insert($tasks);
    }

}