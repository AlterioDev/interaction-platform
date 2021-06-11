<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{

    private $roles;
    private $permissions;

    public function run()
    {
        $this->add_roles();
        $this->add_permissions();
        $this->assign_permissions_to_roles();
    }

    public function add_roles()
    {
        $this->roles['administrator'] = Role::create(['name' => 'Administrator']);
        $this->roles['manager'] = Role::create(['name' => 'Manager']);
        $this->roles['employee'] = Role::create(['name' => 'Employee']);
    }

    public function add_permissions()
    {
        // Locations
        $this->permissions['view_location'] = Permission::create(['name' => 'view location']);
        $this->permissions['add_location'] = Permission::create(['name' => 'add location']);
        $this->permissions['delete_location'] = Permission::create(['name' => 'delete location']);
        
        // Devices
        $this->permissions['view_device'] = Permission::create(['name' => 'view device']);
        $this->permissions['add_device'] = Permission::create(['name' => 'add device']);
        $this->permissions['delete_device'] = Permission::create(['name' => 'delete device']);
    }

    public function assign_permissions_to_roles()
    {
        // Administrator
        $this->roles['administrator']->givePermissionTo($this->permissions['view_location']);
        $this->roles['administrator']->givePermissionTo($this->permissions['add_location']);
        $this->roles['administrator']->givePermissionTo($this->permissions['delete_location']);
        $this->roles['administrator']->givePermissionTo($this->permissions['view_device']);
        $this->roles['administrator']->givePermissionTo($this->permissions['add_device']);
        $this->roles['administrator']->givePermissionTo($this->permissions['delete_device']);

        // Manager
        $this->roles['manager']->givePermissionTo($this->permissions['view_location']);
        $this->roles['manager']->givePermissionTo($this->permissions['view_device']);
        $this->roles['manager']->givePermissionTo($this->permissions['add_device']); 
        $this->roles['manager']->givePermissionTo($this->permissions['delete_device']);

        // Employee
        $this->roles['employee']->givePermissionTo($this->permissions['view_location']);
        $this->roles['employee']->givePermissionTo($this->permissions['view_device']);
    }

}
