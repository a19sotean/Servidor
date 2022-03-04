<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class SuperheroAbilityModel extends DBAbstractModel
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

    private static $createQuery = "INSERT INTO superhero_ability (id_superhero, id_ability, value) VALUES(:id_superhero, :id_ability, :value)";
    private static $readByIdQuery = "SELECT * FROM superhero_ability WHERE id=:id";
    private static $readAllQuery = "SELECT * FROM superhero_ability";
    private static $updateQuery = "UPDATE superhero_ability SET id_superhero=:id_superhero, id_ability=:id_ability, value=:value WHERE id = :id";
    private static $deleteQuery = "DELETE FROM superhero_ability WHERE id = :id";
    private static $readLastPageQuery = "SELECT * FROM superhero_ability ORDER BY id DESC LIMIT " . ABILITIESPERPAGE;

    var $id;
    var $idSuperhero;
    var $idAbility;
    var $value;
    var $createdAt;
    var $updatedAt;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdSuperhero($idSuperhero)
    {
        $this->idSuperhero = $idSuperhero;
    }

    public function setIdAbility($idAbility)
    {
        $this->idAbility = $idAbility;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdSuperhero()
    {
        return $this->idSuperhero;
    }

    public function getIdAbility()
    {
        return $this->idAbility;
    }

    public function getValue()
    {
        return $this->value;
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
        $this->parameters['id_superhero'] = $this->getIdSuperhero();
        $this->parameters['id_ability'] = $this->getIdAbility();
        $this->parameters['value'] = $this->getValue();
        $this->get_results_from_query();
        $this->message = 'Ability agregado correctamente';
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
        $this->parameters['id'] = $this->id;
        $this->parameters['id_superhero'] = $this->getIdSuperhero();
        $this->parameters['id_ability'] = $this->getIdAbility();
        $this->parameters['value'] = $this->getValue();

        $this->get_results_from_query();
        $this->message = 'Ability modificado';
    }

    public function delete()
    {
        $this->query = self::$deleteQuery;
        $this->parameters['id'] = $this->id;

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
