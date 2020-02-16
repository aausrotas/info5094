/**
 * Project Information
 * Part 1 of 3
 *
 * Course 5094 LAMP 2
 * Professor Tom Hall
 * 
 * Group 18
 * Group Members / Authors
 * Andi Ausrotas
 * Simone Desjardins
 * Justin Lott
 * Jadrienne Lovegrove
 * Nicholas Glover
 * 
 * File Information
 * File Name: Index.php
 * 
 * Purpose:
 * Main file for project, connects to database, contains php/html and displays upload page.
 */

 <?php
require_once("../db/db_connect.php");
function validateFormData():array {
        $err_msgs = array();
        $allowed_exts = array("csv");
        $allowed_type = array("text/csv");

        if (isset($_FILES['uploads']) && !empty($_FILES['uploads'])){
            $up = $_FILES['uploads'];
            if ($up['error'] == 0){
                $err_msgs[] = "An empty file was uploaded";
            }

            $ext = strtolower(pathinfo($up['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed_exts)){
                $err_msgs[] = "File extensions is not supported";
            }

            if (!in_array($up['type'], $allowed_types)){
                $err_msgs[] = "MIME type not allowed";
            } else {
            $err_msgs[] = "An error occured during file upload";
        }
        } else {
        $err_msgs[] = "No file was uploaded";
 
    }  return $err_msgs;
    }

   


function processsUploads(){
    $status = "OK";
    $db_conn = connectDB();
    if (!$db_conn){
    $status = "DB Connection Failed";
    } else {
        if ($allowed_exts === "csv"){
            $f = fopen($_FILES["uploadFiles"["name"]["tmp_name"]], "r");
            while (($csv = fgetcsv($f, 1000, ",")) !== FALSE){
                $sql =$db_conn->prepare("INSERT into path_info(pi_id, path_name, operating_frequency, pi_description, pi_note) values ('$csv[0]', '$csv[1]', '$csv[2]', '$csv[3]', '$csv[4]')");
            }
        }
        
    }

}


?>