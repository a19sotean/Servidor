<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class RequestModel extends DBAbstractModel
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

    private static $createQuery = "INSERT INTO request(title, description, done, id_superhero, id_citizen) VALUES(:title, :description, :done, :id_superhero, :id_citizen)";
    private static $readByIdQuery = "SELECT * FROM request WHERE id = :id";
    private static $readByNameQuery = "SELECT * FROM request WHERE nombre LIKE CONCAT('%', :name, '%')";
    private static $readAllQuery = "SELECT * FROM request";
    private static $updateQuery = "UPDATE request SET title=:title, description=:description, done=:done, id_superhero=:id_superhero, id_citizen=:id_citizen WHERE id = :id";
    private static $deleteQuery = "DELETE FROM request WHERE id = :id";
    private static $readLastPageQuery = "SELECT * FROM request ORDER BY id DESC LIMIT " . REQUESTSPERPAGE;
    private static $readFromSuperheroIdQuery = "SELECT * FROM request WHERE id_superhero = :id_superhero ORDER BY id DESC LIMIT " . REQUESTSPERPAGE;
    private static $checkDoneQuery = "UPDATE request set done=1 WHERE id = :id;";

    private $id;
    private $title;
    private $description;
    private $done;
    private $idSuperhero;
    private $idCitizen;
    private $createdAt;
    private $updatedAt;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDone($done)
    {
        $this->done = $done;
    }

    public function setIdSuperhero($idSuperhero)
    {
        $this->idSuperhero = $idSuperhero;
    }

    public function setIdCitizen($idCitizen)
    {
        $this->idCitizen = $idCitizen;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescrition()
    {
        return $this->description;
    }

    public function getDone()
    {
        return $this->done;
    }

    public function getIdSuperhero()
    {
        return $this->idSuperhero;
    }

    public function getIdCitizen()
    {
        return $this->idCitizen;
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
        $this->parameters['title'] = $this->getTitle();
        $this->parameters['description'] = $this->getDescrition();
        $this->parameters['done'] = $this->getDone();
        $this->parameters['id_superhero'] = $this->getIdSuperhero();
        $this->parameters['id_citizen'] = $this->getIdCitizen();
        $this->get_results_from_query();
        $this->message = 'Request agregado correctamente';
    }

    public function readByName($name = '')
    {
        if ($name != '') {
            $this->query = self::$readByNameQuery;
            $this->parameters['name'] = $name;
            $this->get_results_from_query();
        }
        if (count($this->rows) != 0) {
            $this->message = 'Request no encontrado.';
        } else {
            $this->message = 'Request encontrado.';
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
            $this->message = 'Request encontrado.';
        } else {
            $this->message = 'Request no encontrado.';
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
        $this->parameters['title'] = $this->getTitle();
        $this->parameters['description'] = $this->getDescrition();
        $this->parameters['done'] = $this->getDone();
        $this->parameters['id_superhero'] = $this->getIdSuperhero();
        $this->parameters['id_citizen'] = $this->getIdCitizen();

        $this->get_results_from_query();
        $this->message = 'Request modificado';
    }

    public function delete()
    {
        $this->query = self::$deleteQuery;
        $this->parameters['id'] = $this->id;

        $this->get_results_from_query();
        $this->message = 'Request eliminado';
    }

    public function readLastPage()
    {
        $this->query = self::$readLastPageQuery;
        //$this->parameters['Requestpage'] = RequestPORPAGINA;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function readFromSuperheroId()
    {
        $this->query = self::$readFromSuperheroIdQuery;
        $this->parameters['id_superhero'] = $this->getIdSuperhero();
        $this->get_results_from_query();
        return $this->rows;
    }

    public function checkDone()
    {
        $this->query = self::$checkDoneQuery;
        $this->parameters['id'] = $this->getId();
        $this->get_results_from_query();
        return $this->rows;
    }
};
