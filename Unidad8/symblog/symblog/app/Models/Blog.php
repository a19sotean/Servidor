<?php
namespace App\Models;

    class Contacto extends DBAbstractModel {
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
    private $title;
    private $author;
    private $blog;
    private $comments = array();
    private $image;
    private $tags;
    private $created_at;
    private $updated_at;
    // array propiedad comments = array()

    public function setId($id) {
        $this->id = $id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setAuthor($author) {
        $this->author = $author;
    }
    public function setBlog($blog) {
        $this->blog = $blog;
    }
    public function setImage($image) {
        $this->image = $image;
    }
    public function setTags($tags) {
        $this->tags = $tags;
    }
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }
    public function setUpdatedAt($updatedAt) {
        $this->createdAt = $updatedAt;
    }

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getAuthor() {
        return $this->author;
    }
    public function getBlog() {
        return $this->blog;
    }
    public function getImage() {
        return $this->image;
    }
    public function getTags() {
        return $this->tags;
    }
    public function getCreatedAt() {
        return $this->createdAt;
    }
    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function set($user_data=array()) 
        {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO blog(title, blog, image, author, tags, created_at, updated_at)
                            VALUES(:title, :blog, :image, :author, :tags, :created_at, :updated_at)";
            $this->parametros['title']= $this->getTitle();
            $this->parametros['blog']= $this->getBlog();
            $this->parametros['image']= $this->getImage();
            $this->parametros['author']= $this->getAuthor();
            $this->parametros['tags']= $this->getTags();
            $this->parametros['created_at']= $this->getCreatedAt();
            $this->parametros['updated_at']= $this->getUpdatedAt();

            $this->get_results_from_query();
            $this->setId($this->lastInsert());
            $this->mensaje = 'Blog agregado correctamente';
    
        }

        public function get($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM blog
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
                $this->mensaje = 'Blog encontrado';
                }
                else {
                $this->mensaje = 'Blog no encontrado';
                }
                return $this->rows;
                
        }

        public function edit($user_data=array()) {
            $fecha = new \DateTime();

            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
                }

                $this->query = "
                UPDATE blog
                SET title=:title,
                    blog=:blog,
                    image=:image,
                    author=:author,
                    tags=:tags,
                    updated_at=:fecha
                WHERE id = :id
                ";

                $this->parametros['title']= $this->getTitle();
                $this->parametros['blog']= $this->getBlog();
                $this->parametros['image']= $this->getImage();
                $this->parametros['author']= $this->getAuthor();
                $this->parametros['tags']= $this->getTags();
                $this->parametros['fecha']= date('Y-m-d H:i:s',$fecha->getTimestamp());
                $this->parametros['id']= $this->getId();

                $this->get_results_from_query();
                $this->mensaje = 'Blog modificado';
        }

        public function delete($id='')
        {
            $this->query = "DELETE FROM blog
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'Blog eliminado';
        }

}
?>