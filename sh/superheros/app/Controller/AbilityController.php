<?php

namespace App\Controller;

use App\Models\AbilityModel;

class AbilityController extends BaseController
{
    function listAction()
    {
        $ab = new AbilityModel();
        $data = $ab->readLastPage();
        $this->renderHTML('../views/ability/list.php', $data);
    }

    function editAction($request)
    {
        $ab = new AbilityModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/ability/edit/");
            $data = $ab->read($id);
            $this->renderHTML('../views/ability/edit.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'update') {
                $ab->setId($_POST['id']);
                $ab->setName($_POST['name']);
                $ab->update();
            }
            header('location: /ability/list');
        }
    }

    function insertAction()
    {
        $ab = new AbilityModel();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/ability/insert.php');
        } else {
            if ($_POST['submit'] == 'insert') {
                $ab->setName($_POST['name']);
                $ab->insert();
            }
            header('location: /ability/list');
        }
    }

    function deleteAction($request)
    {
        $ab = new AbilityModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/ability/del/");
            $data = $ab->read($id);
            $this->renderHTML('../views/ability/delete.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $ab->setId($_POST['id']);
                $ab->delete();
            }
            header('location: /ability/list');
        }
    }
}
