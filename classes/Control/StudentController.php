<?php
require_once __DIR__ . '/../../classes/Db.classes.php';
require_once __DIR__ . '/../Model/Student.php';
require_once __DIR__ . '/../Model/Course.php';
class StudentController extends Db
{
    public function getStudents()
    {
        if ($this->openConnection()) {
            $query = "SELECT StudentID, UserName FROM student JOIN user ON student.UserID = user.UserID";
            return $this->select($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function addStudentToCourse(Student $student,Course $course){
        if ($this->openConnection()) {
            $mysqli = $this->getConnection();
            $query = "INSERT INTO student_course 
                      (StudentID, CourseID) 
                      VALUES 
                      ('{$student->getStudentID()}','{$course->getCourseId()}')";
            return $this->insert($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
}
