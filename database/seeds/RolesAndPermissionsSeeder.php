<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'posts.create']); // shows create form
        Permission::create(['name' => 'posts.store']); // insert post
        Permission::create(['name' => 'posts.edit']); // shows edit form
        Permission::create(['name' => 'posts.update']); // update post
        Permission::create(['name' => 'posts.delete']); // delete post
        Permission::create(['name' => 'posts.unpublished']); // publish unpublish action

        // create roles and assign created permissions

        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo(['posts.create', 'posts.store', 'posts.edit', 'posts.update']);

        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo(['posts.edit', 'posts.update', 'posts.unpublished']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
