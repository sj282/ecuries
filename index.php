<?php

session_start();
require 'connection.php';
include 'Autoload.php';

$autoload = new Autoload();
$autoload->run();

if (empty($_POST))
{
    if (array_key_exists('id', $_GET)) {
        $id = $_GET['id'];
        if($_SESSION == null) {
            $controller = new LoginController;
            $controller->showLoginPage();
        } else {
            $controller = new AdminController;
            $controller->showOneBooking($id);
            exit;
        }
    
    } else if (array_key_exists('del', $_GET)) {
        $id = $_GET['del'];
        if($_SESSION == null) {
            $controller = new LoginController;
            $controller->showLoginPage();
        } else {
            $controller = new AdminController;
            $controller->deleteBooking($id);
            exit;
        }
       
    } else {
        if (array_key_exists('page', $_GET)) {
            $page = $_GET['page'];
        } else {
            $page = 'home';
        }
    
        switch($page)
        {
            case 'home':
                $controller = new HomeController;
                $controller->showHomePage();
            break;
            case 'team':
                $controller = new HomeController;
                $controller->showTeamPage();
            break;
            case 'services':
                $controller = new HomeController;
                $controller->showServicesPage();
            break;
            case 'installations':
                $controller = new HomeController;
                $controller->showInstalPage();
            break;
            case 'galery':
                $controller = new HomeController;
                $controller->showGaleryPage();
            break;
            case 'contact':
                $controller = new HomeController;
                $controller->showContactPage();
            break;
            case 'admin':
                if($_SESSION == null) {
                    $controller = new LoginController;
                    $controller->showLoginPage();

                } else {
                    $controller = new AdminController;
                    $controller->showAdminPage();
                }
            break;
            case 'editAdmin':
                if($_SESSION == null) {
                    $controller = new LoginController;
                    $controller->showLoginPage();
                } else {
                    $controller = new LoginController;
                    $controller->showEditLogin();
                }
            break;
            case 'login':
                $controller = new LoginController;
                $controller->checkLogin();
            break;
            case 'logout':
                $controller = new LogoutController;
                $controller->logout();
            break;
            default :
                $controller = new HomeController;
                $controller->showHomePage();
        }
    }

} else {
    $id = $_POST['action'];
    switch ($id)
    {
        case 'loginAdmin';
            $controller = new LoginController;
            $controller->checkLogin($_POST);
        break;
        case 'bookingBox';
            $controller = new HomeController;
            $controller->bookingBox($_POST);
        break;
        case 'editLogin';
            $controller = new LoginController;
            $controller->editLogin($_POST);
        break;
        case 'deleteContacts';
            $controller = new AdminController;
            $controller->deleteBooking($_POST['contactsId']);
        break;
    }
}
