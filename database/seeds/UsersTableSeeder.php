<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new \App\User();
        $user->name ='Nestor Delgado';
        $user->email='nestoradp@nauta.cu';
        $user->password= bcrypt('nestor2020');
        $user->save();


        for($i =0; $i<50;$i++){
            $user->movimiento()->save(factory(\App\Movimiento::class)->make());

        }

        factory(\App\User::class,10)->create()->each(function ($u) {
            for ($i = 0; $i < 100; $i++) {
                $u->movimiento()->save(factory(\App\Movimiento::class)->make());

            }


        } );



    }



}