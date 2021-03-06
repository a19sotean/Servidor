<?php
namespace App\Controllers;

use App\Models\User;
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController {
    public function getLogin() {
        if (isset($_SESSION['user'])) {
            header('Location: /admin');
        }
        return $this->renderHTML('login.twig');
    }

    public function postLogin($request) {
        $post = $request->getParsedBody();
        $responseMessage = null;
        $error = false;

        $user = User::where('email', $post['email'])->first();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                $_SESSION['user'] = $user->email;
                $responseMessage = 'Sesión iniciada';
                header('Location: /admin');
            } else {
                $responseMessage = 'Datos incorrectos';
                $error = true;
            }
        } else {
            $responseMessage = 'Datos incorrectos';
            $error = true;
        }

        return $this->renderHTML('login.twig', ['msg' => $responseMessage, 'error' => $error]);
    }

    public function getLogout() {
        unset($_SESSION['user']);
        header('Location: /');
    }
}
?>