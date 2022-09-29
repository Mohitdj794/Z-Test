<?php
    session_start();
    require_once '../Class/Query.php';
    $UserExamDetail = new Query();
    $result = $UserExamDetail->fetchUserDetailFromExamDetail($_SESSION['name']);
    print_r($result);
    print_r(json_encode($result));
    