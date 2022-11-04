<?php

use LDAP\Result;

    class crud{
        private $db; //private database object

        function __construct($conn) //contrustor to initialize private variable tot he database connection.
        {
            $this->db = $conn;
        }

        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty)
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

        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty)
            {
                try{
                $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dob`=:dob,`emailaddress`=:email,`contactnum`=:contact,`specialty_id`=:specialty WHERE attendee_id=:id";   
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':id',$id);    
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


        public function getAttendees(){
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        }

        public function getAttendeeDetails($id){
            $sql = "SELECT * FROM attendee a inner join specialties s on a.specialty_id = s.specialty_id WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        public function getSpecialties(){
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        }
        
    }
?>
