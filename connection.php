<?php

function getConnection()
{
    try { 
        $db = new PDO('mysql:host=localhost;dbname=ecurie_vieux_moulin;charset=UTF8', 'root', '3wamysql', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]); 
        return $db;

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage()) or die(print_r($db->errorInfo()));
    }
}