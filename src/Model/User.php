<?php

namespace App\Model;

class User extends Model
{
    public function getUsers()
    {
        $sql = 'SELECT * FROM user';
        $users = $this->executeQuery($sql);
        return $users;
    }
}
