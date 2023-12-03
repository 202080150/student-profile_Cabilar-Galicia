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
            $query01 = "SELECT student_details.street, student_details.town_city, student_details.province
            FROM students
            JOIN student_details ON students.id = student_details.student_id
            WHERE students.birthday BETWEEN '2000-01-01' AND '2001-12-31' LIMIT 100 ;";

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
                students
            JOIN
                student_details ON student_details.id = student_details.student_id
            JOIN
                town_city ON student_details.town_city = town_city.id
            WHERE
                town_city.name = 'West';";

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

    // public function chart4()
    // {
    //     try {
    //         $query01 = "SELECT
    //         MONTH(birthday) AS birth_month,
    //         COUNT(*) AS student_count
    //         FROM students GROUP BY birth_month
    //         ORDER BY birth_month;";

    //         $stmt = $this->db->getConnection()->prepare($query01);
    //         $stmt->execute();
    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //         return $result;

    //     } catch (PDOException $e) {
    //         // Handle any potential errors here
    //         echo "Error: " . $e->getMessage();
    //         throw $e; // Re-throw the exception for higher-level handling
    //     }
    // }

    // public function chart5()
    // {
    //     try {
    //         $query01 = "SELECT
    //         MONTH(birthday) AS birth_month,
    //         COUNT(*) AS student_count
    //     FROM
    //         students
    //     WHERE students.birthday >= '2010-01-01'
        
    //     GROUP BY
    //         birth_month
    //     ORDER BY
    //         birth_month;
    //         ";

    //         $stmt = $this->db->getConnection()->prepare($query01);
    //         $stmt->execute();
    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //         return $result;

    //     } catch (PDOException $e) {
    //         // Handle any potential errors here
    //         echo "Error: " . $e->getMessage();
    //         throw $e; // Re-throw the exception for higher-level handling
    //     }
    // }
}
?>  