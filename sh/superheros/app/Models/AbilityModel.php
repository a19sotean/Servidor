<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class AbilityModel extends DBAbstractModel
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

    private static $createQuery = "INSERT INTO ability(name) VALUES(:name)";
    private static $readByIdQuery = "SELECT * FROM ability WHERE id = :id";
    private static $readByNameQuery = "SELECT * FROM ability WHERE name LIKE CONCAT('%', :name, '%')";
    private static $readAllQuery = "SELECT * FROM ability";
    private static $updateQuery = "UPDATE ability SET name=:name WHERE id = :id";
    private static $deleteQuery = "DELETE FROM ability WHERE id = :id";
    private static $readLastPageQuery = "SELECT * FROM ability ORDER BY id DESC LIMIT " . ABILITIESPERPAGE;

    var $id;
    var $name;
    var $createdAt;
    var $updatedAt;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
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
        $this->get_results_from_query();
        $this->message = 'Ability agregado correctamente';
    }

    public function readByName($name = '')
    {
        if ($name != '') {
            $this->query = self::$readByNameQuery;
            $this->parameters['name'] = $name;
            $this->get_results_from_query();
        }
        if (count($this->rows) != 0) {
            $this->message = 'Ability no encontrado.';
        } else {
            $this->message = 'Ability encontrado.';
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
            $this->message = 'Ability encontrado.';
        } else {
            $this->message = 'Ability no encontrado.';
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

        $this->get_results_from_query();
        $this->message = 'Ability modificado';
    }

    public function delete()
    {
        $this->query = self::$deleteQuery;
        $this->parameters['id'] = $this->getId();

        $this->get_results_from_query();
        $this->message = 'Ability eliminado';
    }

    public function readLastPage()
    {
        $this->query = self::$readLastPageQuery;
        //$this->parameters['Abilitypage'] = AbilityPORPAGINA;
        $this->get_results_from_query();
        return $this->rows;
    }
};
