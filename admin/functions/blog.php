<?php

function fetchIndex($connection, $params = array()){
    $sql = "SELECT * FROM `blog`";
    $result = array();
    if(!empty($params)){
        foreach($params as $key => $param){
            $result[] = "`{$key}` LIKE '%{$param}%'";
        }
    }
    if(!empty($result)){
        $sql .= " WHERE " . implode(" AND ", $result);
    }

    $query = mysqli_query($connection, $sql);
    $records = array();

    while($row=mysqli_fetch_object($query)){
        $records[] = $row;
    }

    return $records;
}

function create($models){
    $rules = [
        'title' => ['required'],
        'slug' => ['required'],
        'caption' => ['required'],
        'date' => ['required'],
        'content' => ['required'],
    ];

    $errors = array();
    foreach($models as $key => $value){
        if(!empty($rules[$key])){
            if(in_array("required", $rules[$key]) && empty($value)){
                $errors[$key] = $key . " Tidak boleh kosong";
                continue;
            }
        }
    }
    if(!empty($errors)){
        return (object) ['success' => false, 'errors' => $errors];
    }
}