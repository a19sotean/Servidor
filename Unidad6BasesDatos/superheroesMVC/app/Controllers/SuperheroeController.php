<?php
namespace App\Controllers;

use App\Models\Superheroe;
class SuperheroesController extends BaseController {

    public function addSuperHeroeAction() {
        $lprocesaFormulario = false;
        $data = array();
        $data['nombre']=$data['msgErrorVelocidad']="";
        if (!empty($_POST)) {
            $data['nombre']=$_POST['nombre'];
            $data['velocidad']=$_POST['velocidad'];

            $lprocesaFormulario = true;
            if (empty($_POST['nombre'])) {
                $lprocesaFormulario = false;
                $data['msgErrorNombre'] = "El nombre no puede estar vacío";
            }

            $lprocesaFormulario = true;
            if (empty($_POST['velocidad'])) {
                $lprocesaFormulario = false;
                $data['msgErrorNombre'] = "La velocidad no puede estar vacía";
            }

        }
        if ($lprocesaFormulario) {
            $objSuperHeroe = Superheroe::getInstancia();
            $objSuperHeroe->setNombre($_POST['nombre']);
            $objSuperHeroe->setVelocidad($_POST['velocidad']);
            $objSuperHeroe->set();
            header('Location:'.DIRBASEURL.'/');
        } else {
            $this->renderHTML('..\views\index.php',$data);
        }
    }
}

?>