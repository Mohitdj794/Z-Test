<?php
/**
 * Page get the response from user submit exam
 * That data is validate on this page and insert into database
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
$objExamTitle = new Query();
$result = $objExamTitle->singleRowDataFromResult(
    "Test_Title", //table name
    "Test_id",    //table coloum id
    $_POST["id"]  //that paticular id
);
print_r(json_encode($result));

