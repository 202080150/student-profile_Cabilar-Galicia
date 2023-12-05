<?php
include_once("db.php"); // Include the file with the Database class

class Chart
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function report1()
    {
        try {
            $query01 = "SELECT province.name AS 'Province Name', COUNT(student_details.province) AS 'Student Population' FROM student_details
        INNER JOIN province ON student_details.province = province.id
        GROUP BY student_details.province
        ORDER BY COUNT(student_details.province) DESC
        LIMIT 50";

            $stmt = $this->db->getConnection()->prepare($query01);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }


    public function report2()
    {
        try {
            $query01 = "SELECT YEAR(birthday) AS birth_year, COUNT(*) AS student_count
            FROM students
            GROUP BY birth_year
            HAVING COUNT(*) > 1;
            ";

            $stmt = $this->db->getConnection()->prepare($query01);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    public function report3()
    {
        try {
            $query01 = "SELECT
                SUM(CASE WHEN students.gender = 1 THEN 1 ELSE 0 END) AS Male,
                SUM(CASE WHEN students.gender = 0 THEN 1 ELSE 0 END) AS Female
            FROM
                students";

            $stmt = $this->db->getConnection()->prepare($query01);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

}
?>  