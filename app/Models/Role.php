<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;
    protected $fillable =   [
        'name',
        'is_active',
    ];


//    public function permissions(): HasMany
//    {
//        return $this->hasMany(Permission::class,'role_id','id');
//    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
