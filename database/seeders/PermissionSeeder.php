<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'Crear lecciones',
        ]);
        Permission::create([
            'name'=>'Leer lecciones',
        ]);
        Permission::create([
            'name'=>'Actualizar lecciones',
        ]);
        Permission::create([
            'name'=>'Eliminar lecciones',
        ]);
        Permission::create([
            'name'=>'Ver Dashboard',
        ]);
        Permission::create([
            'name'=>'Editar usuarios',
        ]);
    }
}
