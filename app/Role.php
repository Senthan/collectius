<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name', 'description'];

    public function policyMethods()
    {
        return $this->belongsToMany(PolicyMethod::class)->withPivot(['authorized']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
