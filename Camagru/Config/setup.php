<?php
/**
 * Created by PhpStorm.
 * User: mmoullec
 * Date: 3/1/17
 * Time: 2:38 PM
 *
 * tableaux pour setup la DB
 */

return array (
    'user' => array (
        'id' => 'INT NOT NULL AUTO_INCREMENT',
        'nom' => 'VARCHAR (255)',
        'prenom' => 'VARCHAR (255)',
        'pseudo' => 'VARCHAR (255)',
        'mail' => 'VARCHAR (255)',
        'passwd' => 'VARCHAR (500)',
        'register_token' => 'VARCHAR(100)',
        'locked' => 'INT',
        'registered' => 'INT',
        'admin' => 'INT',
        'PRIMARY KEY' => '(id)'
    ),
    'image' => array (
       'id' => 'INT NOT NULL AUTO_INCREMENT',
       'user_id' => 'INT NOT NULL',
       'contenu' => 'VARCHAR (5000)',
       'date' => 'DATETIME',
       'PRIMARY KEY' => '(id)'
    ),
    'commentaire' => array(
        'id' => 'INT NOT NULL AUTO_INCREMENT',
        'contenu' => 'VARCHAR (500)',
        'photo_id' => 'INT',
        'user_id' => 'INT',
        'date' => 'DATETIME',
        'PRIMARY KEY' => '(id)'
    ),
    'lk' => array(
        'id' => 'INT NOT NULL AUTO_INCREMENT',
        'user_id' => 'VARCHAR (255)',
        'image_id' => 'VARCHAR (5000)',
        'PRIMARY KEY' => '(id)'
    )
//    'user' => array (
//        'id' => 'INT NOT NULL AUTO_INCREMENT',
//        'pseudo' => 'VARCHAR (255)',
//        'passwd' => 'VARCHAR (5000)',
//        'prenom' => 'VARCHAR (255)',
//        'nom' => 'VARCHAR (255)',
//        'PRIMARY KEY' => '(id)'
//    )
);