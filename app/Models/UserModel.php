<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'object';

    protected $allowedFields    = ['name', 'phone', 'email', 'address', 'amount', 'trnxId'];

    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

}