<?php

namespace App\Controller;

use App\Models\EvolutionModel;

class EvolutionController extends BaseController
{
    function listAction()
    {
        $em = new EvolutionModel();
        $data = $em->readLastPage();
        $this->renderHTML('../views/evolution/list.php', $data);
    }

    function editAction($request)
    {
        $em = new EvolutionModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/evolution/edit/");
            $data = $em->read($id);
            $this->renderHTML('../views/evolution/edit.php', $data);
        } else {
            if ($_POST['submit'] == 'update') {
                $em->setName($_POST['name']);
                $em->update();
            }
            header('location: /evolution/list');
        }
    }

    function insertAction()
    {
        $em = new EvolutionModel();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/evolution/insert.php');
        } else {
            if ($_POST['submit'] == 'insert') {
                $em->setName($_POST['name']);
                $em->insert();
            }
            header('location: /evolution/list');
        }
    }

    function deleteAction($request)
    {
        $em = new EvolutionModel();
        if (!isset($_POST['submit'])) {
            $name =  basename($request, "/evolution/del/");
            $data = $em->read($name);
            $this->renderHTML('../views/evolution/delete.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $em->setName($_POST['name']);
                $em->delete();
            }
            header('location: /evolution/list');
        }
    }
}
