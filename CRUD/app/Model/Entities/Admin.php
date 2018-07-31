<?php

namespace App\Model\Entities;

    use App\Model\Base\AuthLaravel;

class Admin extends AuthLaravel
{
    protected $table = 'admin';
    protected $alias = 'admin';
    protected $_primaryKey = 'id';
    protected $fillable = [
      'username', 'email', 'password', 'avatar', 'role_type','ins_id', 'upd_id', 'ins_datetime', 'upd_datetime', 'del_flag'
    ];
}
