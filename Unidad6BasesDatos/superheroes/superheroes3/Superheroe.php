<?php
    require_once('DBAbstractModel.php');

    class Superheroe extends DBAbstractModel {
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia()
    {
    if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        }
        public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad ;
        }

        public function getNombre() {
            return $this->nombre;
            }
        public function getVelocidad() {
            return $this->velocidad;
            }
        
        public function set($user_data=array()) 
        {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO superheroes(nombre, velocidad)
                            VALUES(:nombre, :velocidad)";
            $this->parametros['nombre']= $nombre;
            $this->parametros['velocidad']= $velocidad;
            $this->get_results_from_query();
            $this->mensaje = 'SH agregado correctamente';
    
        }

        public function setEntity() {
            $this->query = "INSERT INTO superheroes(nombre, velocidad)
                            VALUES(:nombre, :velocidad)";
            // $this->parametros['id']=$id;
            $this->parametros['nombre']= $this->nombre;
            $this->parametros['velocidad']= $this->velocidad;
            $this->get_results_from_query();
            // $this->execute_single_query();
            $this->mensaje = 'Superhéroes añadido.';

            $this->id = $this->lastInsert();
        }

        public function get($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM superheroes
                WHERE id = :id";
                //Cargamos los parámetros.
                $this->parametros['id']= $id;
                //Ejecutamos consulta que devuelve registros.
                $this->get_results_from_query();
                }
                if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
                }
                $this->mensaje = 'sh encontrado';
                }
                else {
                $this->mensaje = 'sh no encontrado';
                }
                return $this->rows;
                
        }

        public function edit($user_data=array()) {
            $fecha = new DateTime();

            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
                }

                $this->query = "
                UPDATE superheroes
                SET nombre=:nombre,
                    velocidad=:velocidad,
                    updated_at=:fecha
                WHERE id = :id
                ";

                $this->parametros['id']=$id;
                $this->parametros['nombre']=$nombre;
                $this->parametros['velocidad']=$velocidad;

                $this->parametros['fecha']= date('Y-m-d H:i:s',$fecha->getTimestamp());
                $this->get_results_from_query();
                $this->mensaje = 'sh modificado';
        }

        public function editEntity() {
            $fecha = new DateTime();

                $this->query = "
                UPDATE superheroes
                SET nombre=:nombre,
                    velocidad=:velocidad,
                    updated_at=:fecha
                WHERE id = :id
                ";

                $this->parametros['id']=$this->id;
                $this->parametros['nombre']=$this->nombre;
                $this->parametros['velocidad']=$this->velocidad;

                $this->parametros['fecha']= date('Y-m-d H:i:s',$fecha->getTimestamp());
                $this->get_results_from_query();
                $this->mensaje = 'sh modificado';
        }

        public function delete($id='')
        {
            $this->query = "DELETE FROM superheroes
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'SH eliminado';
        }

        /* Método que obtiene todos los superhéroes */
        public function getAll() {
            $this->query = "SELECT * FROM superheroes";
            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'SH encontrados';
            } else {
                $this->mensaje = 'SH no encontrados';
            }
            return $this->rows;
        }

    // Función para buscar superhéroes por nombre
    public function getByNombre($nombre='') {
        if($nombre != '') {
            $this->query = "SELECT * FROM superheroes WHERE nombre = :nombre";
            // Cargamos los parámetros
            $this->parametros['nombre']=$nombre;

            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'SH encontrados';
        } else {
            $this->mensaje = 'SH no encontrados';
        }
        return $this->rows;
    }

    }
?>