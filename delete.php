<?php 
    $title = 'delete';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
    if(!$_GET['id']){
       // echo 'error';
       include 'includes/errormessage.php';
       header("Location: viewrecords.php");
    }
    else{
        // Get ID values
        $id = $_GET['id']; 

        //call Delete Function
        $result = $crud->deleteAttendee($id);

        //redirect to list
        if($result)
        {
            header("Location: viewrecords.php");
        }
        else{
            echo '';
        }
    }
    ?>