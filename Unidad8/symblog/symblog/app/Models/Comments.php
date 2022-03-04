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
    private $blog_id;
    private $user;
    private $comment;
    private $approved;
    private $created_at;
    private $updated_at;

    public function setUser($user) {
        $this->user = $user;
    }
    public function setComment($comment) {
        $this->comment = $comment;
    }
    public function setApproved($approved) {
        $this->approved = $approved;
    }

    public function getUser() {
        return $this->user;
    }
    public function getComment() {
        return $this->comment;
    }
    public function getApproved() {
        return $this->approved;
    }
}
?>