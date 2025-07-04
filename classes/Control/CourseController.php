<?php
require_once __DIR__ . '/../../classes/Db.classes.php';
require_once __DIR__ . '/../Model/Course.php';
class CourseController extends Db
{
    public function getInstructors($AdminID)
    {
        if ($this->openConnection()) {
            $query = "SELECT FacultyID, UserName FROM faculty_member JOIN user ON faculty_member.UserID = user.UserID WHERE faculty_member.AdminID='$AdminID'";
            return $this->select($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }

    public function getCourses($AdminID)
    {

        if ($this->openConnection()) {
            $query = "SELECT c.CourseName, u.UserName, c.Image,c.CourseID,Description FROM course c JOIN faculty_member f ON c.InstructorID = f.FacultyID JOIN user u ON f.UserID = u.UserID WHERE c.AdminID='$AdminID'";
            return $this->select($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function addCourse(Course $course,$AdminID)
    {

        if ($this->openConnection()) {
            $mysqli = $this->getConnection();
            $description = $mysqli->real_escape_string($course->getDescription());
            $query = "INSERT IGNORE INTO course 
                          (CourseName, Description, InstructorID, Start_Date,End_Date, Image,AdminID) 
                          VALUES 
                          ('{$course->getCourseName()}', '$description',
                           '{$course->getTeacherId()}', '{$course->getStartDate()}', '{$course->getEndDate()}',
                           '{$course->getImage()}','$AdminID')";
            return $this->insert($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function deleteCourse(Course $course)
    {
        if ($this->openConnection()) {
            $query1 = "DELETE FROM student_course WHERE student_course.CourseID = '{$course->getCourseId()}'";
            $result1 = $this->delete($query1);
            
            $query2 = "DELETE FROM course WHERE course.CourseName = '{$course->getCourseName()}'";
            $result2 = $this->delete($query2);
            return $result1 && $result2;
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
    
    public function getNumberOfStudents(int $courseId)
    {
        if ($this->openConnection()) {
            $query = "SELECT COUNT(*) as studentCount FROM student_course WHERE CourseID = '$courseId'";
            $result = $this->select($query);

            if (is_array($result) && isset($result[0]['studentCount'])) {
                return $result[0]['studentCount'];
            } else {
                return 0;
            }
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
}
