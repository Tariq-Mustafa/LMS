<?php
require_once __DIR__ . '/../../classes/Db.classes.php';
require_once __DIR__ . '/../Model/Course.php';
class CourseController extends Db 
{
    public function getInstructors()
        {
            if($this->openConnection())
            {
                $query = "SELECT FacultyID, UserName FROM faculty_member JOIN user ON faculty_member.UserID = user.UserID";
                return $this->select($query);
            }
            else
            {
                echo "Error in Database Connection";
                return false;
            }
        }

        public function getCourses()
        {

            if($this->openConnection())
            {
                $query = "SELECT c.CourseName, u.UserName, c.Image,c.CourseID FROM course c JOIN faculty_member f ON c.InstructorID = f.FacultyID JOIN user u ON f.UserID = u.UserID";
                return $this->select($query);
            }
            else
            {
                echo "Error in Database Connection";
                return false;
            }
        }
        public function addCourse(Course $course)
        {

            if ($this->openConnection()) {
                $mysqli = $this->getConnection();
                $description = $mysqli->real_escape_string($course->getDescription());
                $query = "INSERT IGNORE INTO course 
                          (CourseName, Description, InstructorID, Start_Date,End_Date, Image) 
                          VALUES 
                          ('{$course->getCourseName()}', '$description',
                           '{$course->getTeacherId()}', '{$course->getStartDate()}', '{$course->getEndDate()}',
                           '{$course->getImage()}')";
                return $this->insert($query);
            } else {
                echo "Error in Database Connection";
                return false;
            }
        }
        public function deleteCourse(Course $course)
        {

            if($this->openConnection())
            {
                $query = "DELETE FROM course WHERE course.CourseName = '{$course->getCourseName()}'";
                return $this->delete($query);
            }
            else
            {
                echo "Error in Database Connection";
                return false;
            }
        }
}

?>