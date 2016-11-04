<?php

use Illuminate\Database\Seeder;

class WorkflowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Workflow::class, 10)
            ->create();

        $workflows = App\Workflow::get()->each(function ($s) {
                $s->steps()->saveMany(factory(App\Step::class, 5)->make());
            });

        $steps = App\Step::get()->each(function ($t) {
                $t->tasks()->saveMany(factory(App\Task::class, 5)->make());
            });
    }
}
