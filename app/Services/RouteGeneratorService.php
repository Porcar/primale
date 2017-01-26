<?php

namespace App\Services;

use App\User;

class RouteGeneratorService
{
    public function __construct()
    {
      //nada
    }

    public function make($route, $user)
    {
        $type = $this->getUserType($user);
        if($route == ''){
          return "$type";
        }
        else{
          return "$type.$route";
        }
    }

    public function getUserType($user)
    {
        switch ($user->role->name) {
            case 'Admin':
                return 'admin';
            case 'Provider':
                return 'provider';
            case 'Worker':
                return 'worker';
            case 'Client':
                return 'client';
        }
    }
}
