<?php
class Crud
{
    // private database object
    private $db;

    //Constructor to initialize private variaboe to * the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertAttendee($fname, $lname, $dob, $email, $contact, $speciality, $avatar_path)
    {
        try {
            $sql = "INSERT INTO attendee (firstName, lastName, dateOfBirth, email, contactNum, speciality_id, avatar_path) VALUES (:fname, :lname, :dob, :email, :contact, :speciality, :avatar_path)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':speciality', $speciality);
            $stmt->bindparam(':avatar_path', $avatar_path);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $speciality) {
        try {
            $sql = "UPDATE `attendee` SET `firstName`=:fname,`lastName`=:lname,`dateOfBirth`=:dob,`email`=:email,`contactNum`=:contact,`speciality_id`=:speciality WHERE attendee_id = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':speciality', $speciality);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function getAttendees() 
    {
        try { 
            $sql = "SELECT * FROM `attendee` a inner join specialities s on a.speciality_id = s.speciality_id;";
            $result = $this->db->query($sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;   
        }
    }

    public function getAttendeeDetails($id)
    {
        try {
            $sql = "SELECT * FROM `attendee` a inner join specialities s on a.speciality_id = s.speciality_id where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;   
        }

    }

    public function deleteAttendee($id)
    {
        try { $sql = "DELETE FROM `attendee` where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialties()
    {
        try {
            $sql = "SELECT * FROM `specialities`;";
            $result = $this->db->query($sql);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialtyById($id)
    {
        try {
            $sql = "SELECT * FROM `specialities` where speciality_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }
}
?>