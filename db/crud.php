<?php

use LDAP\Result;

    class crud{
        private $db; //private database object

        function __construct($conn) //contrustor to initialize private variable tot he database connection.
        {
            $this->db = $conn;
        }

        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $avatar_path)
        {
            try{
                $sql = "INSERT INTO attendee (firstname,lastname,dob,emailaddress,contactnum,specialty_id,avatar_path) VALUES (:fname, :lname, :dob, :email, :contact, :specialty, :avatar_path)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                $stmt->bindparam(':avatar_path',$avatar_path);

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
            try{
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * FROM attendee a inner join specialties s on a.specialty_id = s.specialty_id WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id){
           try{
                $sql = "DELETE FROM attendee WHERE attendee_id = :id";    
                $stmt = $this->db->prepare($sql);   
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
           }catch(PDOException $e){
                echo $e->getMessage();
                return false;
           }
        }

        public function getSpecialties(){
            try{
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialtyById($id) {
            try {
              $sql = "SELECT * FROM specialties WHERE specialty_id = :id";
              $stmt = $this->db->prepare($sql);
              $stmt->bindparam(':id', $id);
              $stmt->execute();
              $result = $stmt->fetch();
              return $result;
            } catch (PDOException $e) {
              echo $e->getMessage();
              return false;
            }
          }
        
    }
?>
