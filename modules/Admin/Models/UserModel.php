<?php 

namespace Folio\Admin\Models;

use BlitzPHP\Schild\Models\UserModel as SchildUserModel;
use Folio\Admin\Entities\User;

class UserModel extends SchildUserModel
{
    protected string $returnType     = User::class;
}