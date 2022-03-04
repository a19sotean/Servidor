<?php

namespace App\Controller;

use App\Models\RequestModel;
use App\Models\SuperheroModel;
use App\Models\CitizenModel;

class RequestController extends BaseController
{
    function listAction()
    {
        $rm = new RequestModel();
        $data = $rm->readLastPage();
        $this->renderHTML('../views/request/list.php', $data);
    }

    function listFromSuperheroIdAction()
    {
        $rm = new RequestModel();
        $rm->setIdSuperhero($_SESSION['superhero']['id']);
        $data = $rm->readFromSuperheroId();
        $this->renderHTML('../views/request/list.php', $data);
    }

    function editAction($request)
    {
        $rm = new RequestModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/request/edit/");
            $data = array();
            // data[0] es el request
            array_push($data, $rm->read($id)[0]);
            // $data[1] es el array de superheroes
            $shm = new SuperheroModel();
            array_push($data, $shm->readAll());
            // $data[2] será el array de citizens
            $cm = new CitizenModel();
            array_push($data, $cm->readAll());
            $this->renderHTML('../views/request/edit.php', $data);
        } else {
            if ($_POST['submit'] == 'update') {
                $rm->setId($_POST['id']);
                $rm->setTitle($_POST['title']);
                $rm->setDescription($_POST['description']);
                $rm->setDone($_POST['done']);
                $rm->setIdSuperhero($_POST['id_superhero']);
                $rm->setIdCitizen($_POST['id_citizen']);
                $rm->update();
            }
            header('location: /request/list');
        }
    }

    function insertAction()
    {
        $rm = new RequestModel();
        if (!isset($_POST['submit'])) {
            $data = array();
            // $data[0] es el array de superheroes
            $shm = new SuperheroModel();
            array_push($data, $shm->readAll());
            // $data[1] será el array de citizens
            $cm = new CitizenModel();
            array_push($data, $cm->readAll());
            $this->renderHTML('../views/request/insert.php', $data);
        } else {
            if ($_POST['submit'] == 'insert') {
                $rm->setTitle($_POST['title']);
                $rm->setDescription($_POST['description']);
                $rm->setDone($_POST['done']);
                $rm->setIdSuperhero($_POST['id_superhero']);
                $rm->setIdCitizen($_POST['id_citizen']);
                $rm->insert();
            }
            header('location: /request/list');
        }
    }

    function deleteAction($request)
    {
        $rm = new RequestModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/request/del/");
            $data = $rm->read($id);
            $this->renderHTML('../views/request/delete.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $rm->setId($_POST['id']);
                $rm->delete();
            }
            header('location: /request/list');
        }
    }

    function checkDoneAction()
    {
        $rm = new RequestModel();
        $id = $_POST['id'];
        if (!isset($_POST['submit'])) {
        } else {
            if ($_POST['submit'] == 'checkDone') {
                $rm->setId($id);
                $rm->checkDone();
            }
            header('location: /request/list');
        }
    }
}
