<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $users = factory(\App\User::class, 15)->create();

        $users->each(function (App\User $user) use($users) {
            $trip = factory(\App\Trip::class)
                ->times(10)
                ->create([
                    'user_id' => $user->id,
                ]);

            $trip->each(function (\App\Trip $trip) use ($users){
               factory(\App\Comment::class, random_int(1, 10))->create([
                   'user_id' => random_int(1, 15),
                   'trip_id' => $trip->id,
               ]);
            });

            $user->follows()->sync(
                $users->random(10)
            );
        });

    }
}
