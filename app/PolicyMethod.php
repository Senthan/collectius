<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyMethod extends Model
{

    protected $fillable = ['name', 'description', 'policy_id'];

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
}
