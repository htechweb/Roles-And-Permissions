<?php

namespace Htech\RolesAndPermissions\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public function scopeNotSuperAdmin($query)
    {
        return $query->whereNotIn('name',['htech']);
    }

}
