<?php 
    $title = 'View Records';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $results=$crud->getAttendees();

    //gets all attendees
    ?>
    <br>
    <br>

    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
        </thead>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['attendee_id']?></td>
                <td><?php echo $r['firstname']?></td>
                <td><?php echo $r['lastname']?></td>                
                <td><?php echo $r['name']?></td> <!--Specialty name-->
                <td>
                    <a href = "view.php?id=<?php echo $r['attendee_id'] ?>" class = "btn btn-primary"> view </a>
                    <a href = "edit.php?id=<?php echo $r['attendee_id'] ?>" class = "btn btn-warning"> edit </a>
                    <a onclick="return confirm('Please Confirm Deletion, A deleted record cannot be recovered! ');"
                    href = "delete.php?id=<?php echo $r['attendee_id'] ?>" class = "btn btn-danger"> delete </a>
                </td>
            </tr>
        <?php } ?>
    </table>

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/Footer.php'; ?>