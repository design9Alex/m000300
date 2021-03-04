<?php

use Illuminate\Database\Seeder;
use Minmax\Base\Models\Permission;
use Minmax\Base\Models\Role;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 新增權限角色-物件對應 (admin)
        if ($roleModel = Role::where(['guard' => 'admin', 'name' => 'systemAdmin'])->first()) {
            $roleModel->attachPermissions(Permission::where('guard', 'admin')->get());
        }
    }
}
