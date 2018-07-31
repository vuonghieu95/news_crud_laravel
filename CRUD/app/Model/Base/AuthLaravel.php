<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 30/07/2018
 * Time: 16:15
 */
namespace App\Model\Base;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable;

class AuthLaravel extends BaseModel implements AuthenticatableContract, AuthorizableContract,CanResetPasswordContract
{
    use Authenticatable,Authorizable,CanResetPassword;
}