<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Rol;
use App\Models\Repository;
use App\Models\Rol_Repository;
use App\Models\Type_User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Rol::create([
            'id' => 1,
            'name' => "Administrador"
        ]);

        Repository::create([
            'id' => 1,
            'name' => "Example",
            'icon' => "example.png",
            'path' => "example"
        ]);

        Rol_Repository::create([
            'id' => 1,
            'rol' => 1,
            'repository' => 1
        ]);

        Type_User::create([
            'id' => 1,
            'name' => 'Administrador'
        ]);

        Type_User::create([
            'id' => 2,
            'name' => 'Usuario'
        ]);

        User::create([
            'id' => 1,
            'name' => "Administrador",
            'photo' => "admin.png",
            'email' => "admin@advanzer.com",
            'password' => bcrypt("admin"),
            'employed' => 0,
            'type_user' => 1,
            'rol' => 1,
            ]);
    }
}
