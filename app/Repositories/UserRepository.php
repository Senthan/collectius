<?php

namespace App\Repositories;


use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Support\Facades\Cache;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;

class UserRepository
{
    public function serialize() {
        $users = User::orderBy('name')->get();
        return $this->transform($users);
    }

    public function transform($users)
    {
        $resource = new Collection($users, new UserTransformer());
        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());
        return $manager->createData($resource)->toArray();
    }
}