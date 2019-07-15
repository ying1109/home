<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $table      = 'admin_group';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    protected $fillable   = ['name', 'type', 'description', 'rules', 'create_time', 'update_time'];

}
