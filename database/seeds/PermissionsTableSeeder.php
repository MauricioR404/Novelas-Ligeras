<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Novelas
        Permission::create(['name' => 'novela.index', 'description' => 'Ver las novelas']);
        Permission::create(['name' => 'novela.crear', 'description' => 'Crear Novelas']);
        Permission::create(['name' => 'novela.editar', 'description' => 'Editar Novelas']);
        Permission::create(['name' => 'novela.eliminar', 'description' => 'Eliminar una novela']);

        //Roles
        Permission::create(['name' => 'capitulo.index', 'description' => 'Ver los capitulos']);
        Permission::create(['name' => 'capitulo.crear', 'description' => 'Crear capitulo']);
        Permission::create(['name' => 'capitulo.editar', 'description' => 'Editar capitulo']);
        Permission::create(['name' => 'capitulo.eliminar', 'description' => 'Eliminar un capitulo']);

        //Permisos
        Permission::create(['name' => 'admin.todo', 'description' => 'Podra crear permisos, roles, usuarios']);


        $admin = Role::create(['name' => 'Admin']);
        $traductor = Role::create(['name' => 'traductor']);

    	$admin->givePermissionTo(Permission::all());

    	$traductor->givePermissionTo([
    		'novela.index',
            'novela.eliminar',
    		'novela.crear',
    		'novela.editar',
            'capitulo.index',
    	]);

    	$user = User::find(1);
        $user->assignRole('Admin');
    }
}
