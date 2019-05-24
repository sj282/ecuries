<?php

class AdminController
{
    public function showAdminPage()
    {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if(isset($_GET['filter'])) {
                $filter = $_GET['filter'];
            } else {
                $filter = 'come';
            }

            $this->showBookingData($filter);
        } else {
            $template = 'Admin';
            include 'layout.phtml';
        }
    }

    public function showBookingData($filter)
    {
        $model = new BookingModel;
        $bookings = $model->showBookings($filter);
        include 'views/BookingDataView.phtml';
    }

    public function showOneBooking($id)
    {
        $model = new BookingModel;
        $booking = $model->showBooking($id);
        switch($booking['contactChoice'])
        {
            case 'phone':
                $contact = 'par téléphone';
            break;
            case 'email':
                $contact = 'par e-mail';
            break;
            case 'both':
                $contact = 'peu importe';
            break;
        };

        $template = 'ShowBooking';
        include 'layout.phtml';
    }

    public function deleteBooking($contactsId)
    {
        $id = json_decode($contactsId);
        for( $i = 0; $i < count($id); $i++)
        {
            $model = new BookingModel;
            $delete = $model->deleteBooking($id[$i]);
        }
    }
}