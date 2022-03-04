<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class SuperheroModel extends DBAbstractModel
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

    private static $createQuery = "INSERT INTO superhero(name, image, evolution, id_user) VALUES(:name, :image, :evolution, :id_user)";
    private static $readByIdQuery = "SELECT * FROM superhero WHERE id = :id";
    private static $readByNameQuery = "SELECT * FROM superhero WHERE name LIKE CONCAT('%', :name, '%')";
    private static $readAllQuery = "SELECT * FROM superhero";
    private static $updateQuery = "UPDATE superhero SET name=:name, image=:image, evolution=:evolution, id_user=:id_user WHERE id = :id";
    private static $deleteQuery = "DELETE FROM superhero WHERE id = :id";
    // private static $readPageQuery = "SELECT * FROM superhero ORDER BY id LIMIT :min, :max";
    // private static $readPageQuery = "SELECT * FROM superhero ORDER BY id LIMIT ";
    // private static $readLastPageQuery = "SELECT * FROM superhero ORDER BY id DESC LIMIT :shpage";
    private static $readLastPageQuery = "SELECT * FROM superhero ORDER BY id DESC LIMIT " . SHPERPAGE;

    private $id;
    private $name;
    private $image;
    private $evolution;
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

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setEvolution($evolution)
    {
        $this->evolution = $evolution;
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

    public function getImage()
    {
        return $this->image;
    }

    public function getEvolution()
    {
        return $this->evolution;
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
        $this->parameters['image'] = $this->getImage();
        $this->parameters['evolution'] = $this->getEvolution();
        $this->parameters['id_user'] = $this->getIdUser();
        $this->get_results_from_query();
        $this->message = 'SH agregado correctamente';
    }

    public function readByName($name = '')
    {
        if ($name != '') {
            $this->query = self::$readByNameQuery;
            $this->parameters['name'] = $name;
            $this->get_results_from_query();
        }
        if (count($this->rows) != 0) {
            $this->message = 'SH no encontrado.';
        } else {
            $this->message = 'SH encontrado.';
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
            $this->message = 'SH encontrado.';
        } else {
            $this->message = 'SH no encontrado.';
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
        $this->parameters['image'] = $this->getImage();
        $this->parameters['evolution'] = $this->getEvolution();
        $this->parameters['id_user'] = $this->getIdUser();

        $this->get_results_from_query();
        $this->message = 'SH modificado';
    }

    public function delete()
    {
        $this->query = self::$deleteQuery;
        $this->parameters['id'] = $this->getId();

        $this->get_results_from_query();
        $this->message = 'SH eliminado';
    }

    public function readLastPage()
    {
        $this->query = self::$readLastPageQuery;
        $this->get_results_from_query();
        return $this->rows;
    }
};
