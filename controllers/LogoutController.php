<?php

class LogoutController
{
    public function logout()
    {
        session_destroy();
        $template = 'login';
        include 'layout.phtml';
        exit();
    }
}