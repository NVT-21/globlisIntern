<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', 'password', 'is_active',
    ];

    public function person()
    {
        return $this->hasOne(Person::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
