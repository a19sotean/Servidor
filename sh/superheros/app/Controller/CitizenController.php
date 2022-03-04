<?php

namespace App\Controller;

use App\Models\CitizenModel;
use App\Models\UserModel;

class CitizenController extends BaseController
{
    function listAction()
    {
        $cm = new CitizenModel();
        $data = $cm->readLastPage();
        $this->renderHTML('../views/citizen/list.php', $data);
    }

    function editAction($request)
    {
        $cm = new CitizenModel();
        $um = new UserModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/citizen/edit/");
            $data = array();
            array_push($data, $cm->read($id)[0]);
            // $data[1] es el array de ids de usuarios
            array_push($data, $um->readAll());
            $this->renderHTML('../views/citizen/edit.php', $data);
        } else {
            if ($_POST['submit'] == 'update') {
                $cm->setId($_POST['id']);
                $cm->setName($_POST['name']);
                $cm->setEmail($_POST['email']);
                $cm->setIdUser($_POST['idUser']);
                $cm->update();
            }
            header('location: /citizen/list');
        }
    }

    function insertAction()
    {
        $cm = new CitizenModel();
        if (!isset($_POST['submit'])) {
            $um = new UserModel();
            $data = $um->readAll();
            $this->renderHTML('../views/citizen/insert.php', $data);
        } else {
            if ($_POST['submit'] == 'insert') {
                $cm->setName($_POST['name']);
                $cm->setEmail($_POST['email']);
                $cm->setIdUser($_POST['idUser']);
                $cm->insert();
            }
            header('location: /citizen/list');
        }
    }
    function registerAction()
    {
        $cm = new CitizenModel();
        if (!isset($_POST['submit'])) {

            $this->renderHTML('../views/citizen/register.php');
        } else {
            if ($_POST['submit'] == 'register') {
                $um = new UserModel();
                $um->setUser($_POST['user']);
                $um->setPsw($_POST['psw']);
                $um->insert();

                $cm->setName($_POST['name']);
                $cm->setEmail($_POST['email']);
                $cm->setIdUser($um->lastInsert());
                $cm->insert();
            }
            header('location: /');
        }
    }
    function deleteAction($request)
    {
        $cm = new CitizenModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/citizen/del/");
            $data = $cm->read($id);
            $this->renderHTML('../views/citizen/delete.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $cm->setId($_POST['id']);
                $cm->delete();
            }
            header('location: /citizen/list');
        }
    }
}
