<?php
session_start();

function login($connection, $username, $password){
    $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = MD5('{$password}')";
    $query = mysqli_query($connection, $sql);
    $model = mysqli_fetch_assoc($query);
    
    if(!empty($model)){
        $_SESSION['username'] = $model['username'];
        $_SESSION['name'] = $model['name'];

        return (object) [
            'status' => true,
            'message' => $model
        ];
    }

    return (object) [
        'status' => false,
        'message' => 'Username atau password salah'
    ];
}