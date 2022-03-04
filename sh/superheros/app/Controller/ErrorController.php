<?php

namespace App\Controller;

class ErrorController extends BaseController
{
    function Error404PageAction()
    {
        $this->renderHTML('../views/error/404-page.php');
    }
    function Error404SuperheroAction()
    {
        $this->renderHTML('../views/error/404-superhero.php');
    }
}
