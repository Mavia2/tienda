<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class User extends Authenticatable
{
    use Notifiable;
    use SyncableGraphNodeTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected static $graph_node_field_aliases = [
        'id' => 'facebook_user_id',
        'name' => 'name',
        'graph_node_field_name' => 'database_column_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','access_token'
    ];



    
}




    
