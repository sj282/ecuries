<?php

class BookingModel
{
    public function bookingBox(array $formField)
    {
        $db = getConnection();

        $query = $db->prepare('INSERT INTO booking(lastName, firstName, address, city, zipCode, phone, email, come, contactChoice, creationDate) VALUES (?,?,?,?,?,?,?,?,?,NOW())');
        $query->execute([
            $formField['lastName'],
            $formField['firstName'],
            $formField['address'],
            $formField['city'],
            $formField['zipCode'],
            $formField['phone'],
            $formField['email'],
            $formField['come'],
            $formField['contactChoice']
        ]);
    }

    public function showBookings($filter)
    {
        
        $db = getConnection();

        $query = $db->prepare('SELECT *
                                FROM booking
                                ORDER BY ' . $filter);
        
        $query->execute();
        $bookings = $query->fetchAll();

        return $bookings;
    }

    public function showBooking($id)
    {
        $db = getConnection();

        $query = $db->prepare('SELECT *
                                FROM booking
                                WHERE id = ?');
        $query->execute([
            $id,
        ]);
        $booking = $query->fetch();

        return $booking;
    }

    public function deleteBooking($id)
    {
        $db = getConnection();

        $query = $db->prepare('DELETE FROM booking
                                WHERE id = ?');
        $query->execute([
            $id,
        ]);
    }
}