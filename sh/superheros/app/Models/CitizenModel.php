<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class CitizenModel extends DBAbstractModel
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

    private static $createQuery = "INSERT INTO citizen(name, email, idUser) VALUES(:name, :email, :idUser)";
    private static $readByIdQuery = "SELECT * FROM citizen WHERE id = :id";
    private static $readByNameQuery = "SELECT * FROM citizen WHERE name LIKE CONCAT('%', :name, '%')";
    private static $readAllQuery = "SELECT * FROM citizen";
    private static $updateQuery = "UPDATE citizen SET name=:name, email=:email, idUser=:idUser WHERE id=:id";
    private static $deleteQuery = "DELETE FROM citizen WHERE id = :id";
    private static $readLastPageQuery = "SELECT * FROM citizen ORDER BY id DESC LIMIT " . CITIZENSPERPAGE;

    private $id;
    private $name;
    private $email;
    private $idUser;
    private $createdAt;
    private $updatedAt;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getIdUser()
    {
        return $this->idUser;
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
        $this->parameters['name'] = $this->getName();
        $this->parameters['email'] = $this->getEmail();
        $this->parameters['idUser'] = $this->getIdUser();
        $this->get_results_from_query();
        $this->message = 'Citizen agregado correctamente';
    }

    public function readByName($name = '')
    {
        if ($name != '') {
            $this->query = self::$readByNameQuery;
            $this->parameters['name'] = $name;
            $this->get_results_from_query();
        }
        if (count($this->rows) != 0) {
            $this->message = 'Citizen no encontrado.';
        } else {
            $this->message = 'Citizen encontrado.';
        }
        return $this->rows;
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
            $this->message = 'Citizen encontrado.';
        } else {
            $this->message = 'Citizen no encontrado.';
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
        $this->parameters['name'] = $this->getName();
        $this->parameters['email'] = $this->getEmail();
        $this->parameters['idUser'] = $this->getIdUser();

        $this->get_results_from_query();
        $this->message = 'Citizen modificado';
    }

    public function delete()
    {
        $this->query = self::$deleteQuery;
        $this->parameters['id'] = $this->getId();

        $this->get_results_from_query();
        $this->message = 'Citizen eliminado';
    }

    public function readLastPage()
    {
        $this->query = self::$readLastPageQuery;
        $this->get_results_from_query();
        return $this->rows;
    }
};
