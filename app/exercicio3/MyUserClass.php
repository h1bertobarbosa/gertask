<?php
/**
 * Created by PhpStorm.
 * User: humberto
 * Date: 30/04/17
 * Time: 23:12
 */

namespace app;

use app\exercicio3\UserDAO;

class MyUserClass
{
    private $userDAO;

    public function __construct(UserDAO $userDAO)
    {
        $this->userDAO = new UserDAO();
    }

    public function getUserList()
    {

        $results = $this->userDAO->getList();

        sort($results);

        return $results;
    }
}