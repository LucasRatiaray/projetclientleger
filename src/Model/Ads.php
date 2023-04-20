<?php

namespace App\model;

class Ads extends Model
{
    protected $table = 'ads';

    /**
     * Ads constructor.
     * @param $table
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtenir toutes les annonces
     *
     * @return array
     */
    public function getAds()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}