<?php

namespace App\Services;

class UserRoleService
{
    public function is_admin()
    {
        $role = auth()->user()->role;

        $is_admin = $role == "joueur" ? false : true;
        
        return $is_admin;
    }
}