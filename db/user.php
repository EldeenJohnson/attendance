<?php 

class user {
  private $db;

  function __construct($conn) {
    $this->db = $conn;
  }

  public function insertUser($username, $password) {
    try {
      // check if user already exists
      $result = $this->getUserByUsername($username);
      if($result['num'] > 0) {
        return false;
      } else {
        // hash the password 
        $new_password = md5($password.$username);
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $new_password);
        $stmt->execute();
        return true;
      }
    }  catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function getUser($username, $password) {
    // var_dump($email, $password); exit;
    try {
      $sql = "SELECT * FROM users where username = :username AND password =:password";
      $stmt = $this->db->prepare($sql); 
      $stmt->bindparam(':username', $username);     
      $stmt->bindParam(':password', $password);
      $stmt->execute();
      $result = $stmt->fetch();
      //var_dump($result); exit;
      return $result;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function getUserByUsername($username) {
    try {
      $sql = "SELECT COUNT(*) AS num FROM users WHERE username = :username";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':username', $username);
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