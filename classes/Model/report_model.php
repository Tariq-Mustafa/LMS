<?php

require_once '../Db.classes.php';
class ReportModel extends Db {

    public function fetchReportData() {
        try {
            $stmt = $this->connect()->prepare('SELECT user.UserName AS StudentName, course.CourseName 
                                              FROM student
                                              JOIN user ON student.UserID = user.UserID
                                              JOIN enrollment ON student.StudentID = enrollment.StudentID
                                              JOIN course ON enrollment.CourseID = course.CourseID');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle connection errors
            return false;
        }
    }
}

?>
