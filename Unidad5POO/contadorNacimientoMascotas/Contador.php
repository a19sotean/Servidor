<?php
    /**
     * Ejemplo 3.
     * Actividad propuesta. Crea una clase contador que además 
     * de contar permita llevar el control de número de instancias. 
     * Podría utilizarse en el modelo de mascotas para conocer el 
     * número de nacimientos.
     * 
     * @author Andrea Solís Tejada
     */
    class Contador {
        private $contador;
        private static $instancia;

        public function __construct($count = 0) {
            $this->contador = $count;
            self::$instancia++;
        }

        public function count() {
            $this->contador++;
            return $this;
        }

        public function __toString() {
            return (string) $this->contador;
        }

        public static function countInstance() {
            return self::$instancia;
        }
    }
?>