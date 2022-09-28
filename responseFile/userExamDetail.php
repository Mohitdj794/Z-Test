<?php

    require_once '../Class/Query.php';
    // $useName = $_POST["user"];
    $UserExamDetail = new Query();
    $result = $UserExamDetail->fetchUserDetailFromExamDetail();
    print_r(json_encode($result));
        