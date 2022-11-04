<?php 
$title = 'edit-post';
require_once 'db/conn.php';


if(isset($_POST['submit']))
{
    //extract values from the $_POST array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];

    //call function to update and track if success / not
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);

    if($result){
        header("location: viewrecords.php");
    }
    else{
        echo 'error';
    }
}

?>
