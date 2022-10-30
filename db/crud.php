<?php
    class crud{
        private $db; //private database object

        function __construct($conn) //contrustor to initialize private variable tot he database connection.
        {
            $this->db = $conn;
        }

        public function insert($fname, $lname, $dob, $email, $contact, $specialty)
        {
            try{
                $sql = "INSERT INTO attendee (firstname,lastname,dob,emailaddress,contactnum,specialty_id) VALUES (:fname, :lname, :dob, :email, :contact, :specialty)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);

                $stmt->execute();
                return true;
            } 
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>
