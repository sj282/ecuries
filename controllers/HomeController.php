<?php

class HomeController
{
    public function showHomePage()
    {
        $template = 'Home';
        include 'layout.phtml';
    }

    public function showServicesPage()
    {
        $template = 'Services';
        include 'layout.phtml';
    }

    public function bookingBox(array $formField)
    {
        if (empty($formField)) {
            //Formulaire non rempli
            showServicesPage();

        } else {
            $model = new BookingModel;
            $register = $model->bookingBox($formField);
            $_SESSION['message'] = "Votre demande a bien été enregistrée. Un membre de notre équipe vous contactera au plus vite";
            $messageToSend = "Nouvelle réservation \n
                            Nom : " . $formField['lastName'] . "\n
                            Prénom : " . $formField['firstName'] . "\n
                            Téléphone : " . $formField['phone'] . "\n
                            E-mail : " . $formField['email'] . "\n
                            Date d'arrivée : " . $formField['come'] . "\n
                            Préférence de contact : " . $formField['contactChoice'];
            $template = 'services';
            include 'layout.phtml';
        }
    }

    public function showTeamPage()
    {
        $template = 'Team';
        include 'layout.phtml';
    }

    public function showInstalPage()
    {
        $template = 'Installation';
        include 'layout.phtml';
    }

    public function showGaleryPage()
    {
        $template = 'Galery';
        include 'layout.phtml';
    }

    public function showContactPage()
    {
        $template = 'Contact';
        include 'layout.phtml';
    }
}