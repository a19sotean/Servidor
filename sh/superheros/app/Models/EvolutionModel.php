<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class EvolutionModel extends DBAbstractModel
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

    private static $createQuery = "INSERT INTO evolution(name) VALUES(:name)";
    private static $readByIdQuery = "SELECT * FROM evolution WHERE name=:name";
    private static $readAllQuery = "SELECT * FROM evolution";
    private static $updateQuery = "UPDATE evolution SET name=:new_name, psw=:psw WHERE name=:name";
    private static $deleteQuery = "DELETE FROM evolution WHERE name = :name";
    private static $readLastPageQuery = "SELECT * FROM evolution ORDER BY name DESC LIMIT " . USERSPERPAGE;

    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getName()
    {
        return $this->name;
    }
    public function insert()
    {
        $this->query = self::$createQuery;
        $this->parameters['name'] = $this->getname();
        $this->get_results_from_query();
        $this->message = 'Evolution agregado correctamente';
    }

    public function read($name = '')
    {
        if ($name != '') {
            $this->query = self::$readByIdQuery;
            $this->parameters['name'] = $name;
            $this->get_results_from_query();
        }
        if (count($this->rows[0]) == 1) {
            foreach ($this->rows[0] as $property => $value) {
                $this->property = $value;
            }
            $this->message = 'Evolution encontrado.';
        } else {
            $this->message = 'Evolution no encontrado.';
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
        $this->parameters['name'] = $this->getName();
        $this->parameters['new_name'] = $this->getName();

        $this->get_results_from_query();
        $this->message = 'Evolution modificado';
    }

    public function delete()
    {
        $this->query = self::$deleteQuery;
        $this->parameters['name'] = $this->getName();

        $this->get_results_from_query();
        $this->message = 'Evolution eliminado';
    }

    public function readLastPage()
    {
        $this->query = self::$readLastPageQuery;
        $this->get_results_from_query();
        return $this->rows;
    }
};
