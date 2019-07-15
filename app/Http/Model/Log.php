<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table      = 'log';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    protected $fillable   = ['url', 'url_name', 'account', 'account_ip', 'create_time'];

}
