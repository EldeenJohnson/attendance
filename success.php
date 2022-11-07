<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';
    

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        //call function to insert and track if success / not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);
        $specialtyName = $crud->getSpecialtyById($specialty);

        if($isSuccess){
            //echo '<h1 class="text-center text-success"> You Have Been Registered!</h1>';
            SendEmail::SendMail($email, 'Welcome to IT Conference', 'You have successfully registered for the IT Conference');
            include 'includes/successmessage.php';
        }
        else{
           // echo '<h1 class="text-center text-danger"> There was an error in processing!</h1>';
           include 'includes/errormessage.php';
            }
    }

    ?>

   <!-- <h1 class="text-center text-success">You have been Registered</h1> -->

    <div class="card  border-success mb-3" style="width: 25rem;">
    <img src="images/celebrate-success.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">
            <?php 
                echo $_POST['firstname'] . ' ' . $_POST['lastname'];
            ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php
                echo $specialtyName['name'];
            ?>
        </h6>
        <p class="card-text">We have saved the following information you submitted.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Date of Birth: <?php echo $_POST['dob']; ?></li>
        <li class="list-group-item">Phone: <?php echo $_POST['phone']; ?></li>
        <li class="list-group-item">Email: <?php echo $_POST['email']; ?></li>
    </ul>
    <div class="card-body text-center">
    <a class="btn btn-outline-info" href="index.php" role="button">Create a new entry</a>
    </div>
</div>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>