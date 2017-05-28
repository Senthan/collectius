<?php

namespace App\Repositories;


use App\Role;
use App\Transformers\RoleTransformer;
use Illuminate\Support\Facades\Cache;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;

class RoleRepository
{

    private $role;

    public function retrieve() {

        $this->role = Role::orderBy('authorization_level', 'DESC')->get();
    }

    public function get()
    {
        if(!$this->role) {
            $this->retrieve();
        }
        return $this->role;
    }

    public function forDropDown()
    {
        if(!$this->role) {
            $this->retrieve();
        }
        return $this->role->pluck('name', 'id');
    }

    public function serialize() {
        return $this->transform();
    }
    public function transform()
    {
        return Cache::rememberForever('roles', function() {
            $roles = Role::orderBy('authorization_level', 'DESC')->get();
            $resource = new Collection($roles, new RoleTransformer());
            $manager = new Manager();
            $manager->setSerializer(new DataArraySerializer());
            return $manager->createData($resource)->toArray();
        });
    }
}