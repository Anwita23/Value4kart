<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V2_9_1;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $permissions = DB::table('permission_roles')
            ->where('role_id', 2)
            ->get(['permission_id']);

        $newPermissions = $permissions->map(function ($permission) {
            return [
                'permission_id' => $permission->permission_id,
                'role_id' => 6, 
            ];
        })->toArray();

        DB::table('permission_roles')->insert($newPermissions);

    }
}
