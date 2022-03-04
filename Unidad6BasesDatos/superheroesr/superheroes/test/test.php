   <?php
   /**
    * @author Ruben Ramirez Rivera
    */

   require_once("../app/Config/constantes.php");
   require_once("../vendor/autoload.php");

 use App\Models\Superheroe;

 $sh = new Superheroe();
 $heroes = $sh->getAll();

 foreach ($heroes as $hero) {
    echo "<div>".$hero['id']. " " . $hero['nombre']." <a href='edit.php?id=" . $hero['id']."'>Editar</a> <a href='delete.php?id=" . $hero['id']."'>Borrar</a></div>";
 }
?>