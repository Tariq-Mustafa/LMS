<?php
class Course
{
    private $courseId;
    private $courseName;
    private $description;
    private $teacherId;
    private $startDate;
    private $endDate;
    private $image;

    public function getCourseId() { return $this->courseId; }
    public function getCourseName() { return $this->courseName; }
    public function getDescription() { return $this->description; }
    public function getTeacherId() { return $this->teacherId; }
    public function getStartDate() { return $this->startDate; }
    public function getEndDate() { return $this->endDate; }
    public function getImage() { return $this->image; }

    public function setCourseId($courseId) { $this->courseId = $courseId; }
    public function setCourseName($courseName) { $this->courseName = $courseName; }
    public function setDescription($description) { $this->description = $description; }
    public function setTeacherId($teacherId) { $this->teacherId = $teacherId; }
    public function setStartDate($startDate) { $this->startDate = $startDate; }
    public function setEndDate($endDate) { $this->endDate = $endDate; }
    public function setImage($image) { $this->image = $image; }
}
?>
