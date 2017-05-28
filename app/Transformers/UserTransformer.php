<?php

namespace App\Transformers;

use App\Role;
use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    protected $roles;
    protected $role;

    public function __construct()
    {
        $this->roles = Role::pluck('name', 'id')->toArray();
    }

    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->roles->first() ? $this->roles[$user->roles->first()->id] : null,
        ];
    }
}