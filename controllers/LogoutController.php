<?php

class LogoutController
{
    public function logout()
    {
        session_destroy();
        $template = 'Login';
        include 'layout.phtml';
        exit();
    }
}