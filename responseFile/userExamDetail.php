<?php
/**
 * Page give user result
 * 
 * PHP version 7.4.3
 * 
 * @category  PHP
 * @package   Response_File
 * @author    vignesh <vignesh@ziffity.com>
 * @copyright 2014 Ziffity
 * @license   git@github.com:Mohitdj794/Z-Test.git git
 * @link      git@github.com:Mohitdj794/Z-Test.git
 */

    session_start();
    require_once '../Class/Query.php';
    $UserExamDetail = new Query();
    $result = $UserExamDetail->fetchUserDetailFromExamDetail($_SESSION['name']);
    print_r($result);
    print_r(json_encode($result));
    