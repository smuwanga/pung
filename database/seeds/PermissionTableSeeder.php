<?php

use Illuminate\Database\Seeder;
use App\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
        	[
        		'name' => 'patient-list',
        		'display_name' => 'Display Item Listing',
        		'description' => 'See only Listing Of Patient'
        	],
        	[
        		'name' => 'patient-create',
        		'display_name' => 'Create Patient',
        		'description' => 'Create New Patient'
        	],
        	[
        		'name' => 'patient-edit',
        		'display_name' => 'edit Patient',
        		'description' => 'edit Patient'
        	],
        	[
        		'name' => 'patient-delete',
        		'display_name' => 'Delete patient',
        		'description' => 'Delete patient'
        	]
        ];


        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
