<?php

namespace App\Model;

class Annonce extends Model
{
    public function getProduct()
    {
        $sql = 'SELECT * FROM ad';
        $users = $this->executeQuery($sql);
        return $users;
    }
}
