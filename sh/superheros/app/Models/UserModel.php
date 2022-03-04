<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class UserModel extends DBAbstractModel
{
    private static $instance;
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    private static $createQuery = "INSERT INTO user(user,psw) VALUES(:user, :psw)";
    private static $readByIdQuery = "SELECT * FROM user WHERE id=:id";
    private static $readAllQuery = "SELECT * FROM user";
    private static $updateQuery = "UPDATE user SET user=:user, psw=:psw WHERE id=:id";
    private static $deleteQuery = "DELETE FROM user WHERE id = :id";
    private static $readByNameQuery = "SELECT * FROM user WHERE user=:user";
    private static $readLastPageQuery = "SELECT * FROM user ORDER BY id DESC LIMIT " . USERSPERPAGE;

    private $id;
    private $user;
    private $psw;
    private $createdAt;
    private $updatedAt;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPsw($psw)
    {
        $this->psw = $psw;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPsw()
    {
        return $this->psw;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function insert()
    {
        $this->query = self::$createQuery;
        $this->parameters['user'] = $this->getUser();
        $this->parameters['psw'] = $this->getPsw();
        $this->get_results_from_query();
        $this->message = 'User agregado correctamente';
    }

    public function read($id = '')
    {
        if ($id != '') {
            $this->query = self::$readByIdQuery;
            $this->parameters['id'] = $id;
            $this->get_results_from_query();
        }
        if (count($this->rows[0]) == 1) {
            foreach ($this->rows[0] as $property => $value) {
                $this->property = $value;
            }
            $this->message = 'User encontrado.';
        } else {
            $this->message = 'User no encontrado.';
        }
        return $this->rows;
    }

    public function readAll()
    {
        $this->query = self::$readAllQuery;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function update()
    {
        $this->query = self::$updateQuery;
        $this->parameters['id'] = $this->getId();
        $this->parameters['user'] = $this->getUser();
        $this->parameters['psw'] = $this->getPsw();

        $this->get_results_from_query();
        $this->message = 'User modificado';
    }

    public function delete()
    {
        $this->query = self::$deleteQuery;
        $this->parameters['id'] = $this->getId();

        $this->get_results_from_query();
        $this->message = 'User eliminado';
    }

    public function readLastPage()
    {
        $this->query = self::$readLastPageQuery;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function readByName($user = '')
    {
        if ($user != '') {
            $this->query = self::$readByNameQuery;
            $this->parameters['user'] = $user;
            $this->get_results_from_query();
        }
        if (count($this->rows[0]) == 1) {
            foreach ($this->rows[0] as $property => $value) {
                $this->property = $value;
            }
            $this->message = 'User encontrado.';
        } else {
            $this->message = 'User no encontrado.';
        }
        return $this->rows;
    }
    //TODO: retorna si loguea o no
    public function login($user, $password)
    {
        if ($this->readByName($user)) {
            if ($this->rows[0]['psw'] == $password) {
                return true;
            }
        }
        return false;
    }
};
