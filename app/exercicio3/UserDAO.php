<?php
/**
 * Created by PhpStorm.
 * User: humberto
 * Date: 30/04/17
 * Time: 23:19
 */

namespace app\exercicio3;


class UserDAO
{
    private $databaseConnection;

    public function __construct(DatabaseConnection $databaseConnection)
    {
        $this->databaseConnection = new DatabaseConnection('localhost','user','password');
    }

    public function getList()
    {
        $results = $this->databaseConnection->query('select name from user');

        return $results;
    }
}