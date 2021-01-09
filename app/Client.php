<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'identification', 'name', 'address','phone','email',
    ];

    protected $hidden = ['deleted_at'];


}
