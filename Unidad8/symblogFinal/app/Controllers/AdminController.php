<?php
namespace App\Controllers;

class AdminController extends BaseController {
    public function getCPAdmin() {
        return $this->renderHTML('admin.twig');
    }
}
?>