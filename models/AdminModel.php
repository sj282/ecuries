<?php

class AdminModel
{
    public function login($user)
    {
        $db = getConnection(); 
        
        $model = $db->prepare('SELECT *
                                FROM admin
                                WHERE email = ?');
        $model->execute([
            $user['email'],
        ]);
        
        return $model->fetch();
    }

    public function adminLogin($id)
    {
        $db = getConnection();

        $query = $db->prepare('SELECT *
                                FROM admin
                                WHERE id = ?');
        $query->execute([
            $id, 
        ]);
        $admin = $query->fetch();

        return $admin;
    }

    public function editLogin($formField, $id)
    {
        $db = getConnection();

        $query = $db->prepare('UPDATE admin
                                SET email = ?, password = ?
                                WHERE id = ?');
        $query->execute([
            $formField['newEmail'],
            password_hash($formField['newPassword'], PASSWORD_BCRYPT),
            $id,
        ]);
    }
}