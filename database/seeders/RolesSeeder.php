<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'abogado']);
        $role3 = Role::create(['name' => 'procurador']);

        Permission::create(['name'=>'agregar'])->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'login'])->syncRoles([$role1]);
        Permission::create(['name'=>'registrar'])->syncRoles([$role1]);

        
        Permission::create(['name'=>'admin.users.index'])   ->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.create'])  ->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit'])    ->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.destroy']) ->syncRoles([$role1]);

        Permission::create(['name'=>'abogados.index'])  ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'abogados.show']) ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'abogados.create']) ->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'abogados.edit'])   ->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'abogados.destroy'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name'=>'procuradores.index'])  ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'procuradores.show']) ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'procuradores.create']) ->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'procuradores.edit'])   ->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'procuradores.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'expedientes.index'])  ->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'expedientes.show']) ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'expedientes.create']) ->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'expedientes.edit'])   ->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'expedientes.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'clientes.index'])  ->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'clientes.show']) ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'clientes.create']) ->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'clientes.edit'])   ->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'clientes.destroy'])->syncRoles([$role1, $role2]);
    }
}
