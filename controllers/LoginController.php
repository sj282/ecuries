<?php

class LoginController
{
    public function showLoginPage()
    {
        $template = 'login';
        include 'layout.phtml';
    }

    public function checkLogin(array $formField)
    {
        $model = new AdminModel;
        $checkLogin = $model->login($formField);

        if (empty($formField)) {
            //Formulaire non rempli
            showLoginPage();
            
        } else {
            if(password_verify($formField['password'], $checkLogin['password'])) {
                //Tout est bon: renvoi vers la page admin
                $_SESSION['user'] = [
                    'id' => $checkLogin['id'],
                    'email' => $checkLogin['email'],
                ];
                $controller = new AdminController;
                $controller->showAdminPage();

            } else {
                //Mauvais identifiants
                $_SESSION['error'] = 'Identifiants incorrects';

                $template = 'login';
                include 'layout.phtml';
            }
        }
    }

    public function showEditLogin()
    {
        $adminId = $_SESSION['user']['id'];
        $model = new AdminModel;
        $adminLogin = $model->adminLogin($adminId);

        $template = 'editLogin';
        include 'layout.phtml';
    }

    public function editLogin(array $formField)
    {
        if (empty($formField)) {
            //Formulaire non rempli
            showEditLogin();
        } else {
            if ($formField['newPassword'] == $formField['checkNewPassword']) {

                $model = new AdminModel;
                $adminLogin = $model->editLogin($formField, $_SESSION['user']['id']);
    
                $template = 'editLogin';
                include 'layout.phtml';
            } else {
                $adminId = $_SESSION['user']['id'];
                $model = new AdminModel;
                $adminLogin = $model->adminLogin($adminId);
                //Les 2 champs mdp ne sont pas identiques
                $_SESSION['error'] = 'Vous n\'avez pas indiqué le même mot de passe dans les deux champs';

                $template = 'editLogin';
                include 'layout.phtml';
            }
        }
    }
}