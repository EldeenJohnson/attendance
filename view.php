<?php 
    $title = 'View Record';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $results=$crud->getAttendees();

    //gets detail of a single attendee by id
    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Please chech details and try again</h1>";        
    }else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
?>

<br>
<br>
<div class="card  border-success mb-3" style="width: 25rem;">
    <img src="images/cat.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">
            <?php 
                echo $result['firstname'] . ' ' . $result['lastname'];
            ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php
                echo $result['name'];
            ?>
        </h6>
        <br>
        <p class="card-text text-muted">View details for  
            <?php echo $result['firstname']?> below!
        </p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Date of Birth: <?php echo $result['dob']; ?></li>
        <li class="list-group-item">Phone: <?php echo $result['contactnum']; ?></li>
        <li class="list-group-item">Email: <?php echo $result['emailaddress']; ?></li>
    </ul>
    <div class="card-body text-center">
    <a class="btn btn-outline-info" href="index.php" role="button">Create a new entry</a>
    </div>
</div>
        <?php } ?>

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/Footer.php'; ?>