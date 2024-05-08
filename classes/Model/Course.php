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

    public function getCourseId()
    {
        return $this->courseId;
    }
    public function getCourseName()
    {
        return $this->courseName;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getTeacherId()
    {
        return $this->teacherId;
    }
    public function getStartDate()
    {
        return $this->startDate;
    }
    public function getEndDate()
    {
        return $this->endDate;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;
    }
    public function setCourseName($courseName)
    {
        $this->courseName = strtolower($courseName);
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setTeacherId($teacherId)
    {
        $this->teacherId = $teacherId;
    }
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function generatePhpPage($outputDirectory, Course $course)
    {
        $fileName = $outputDirectory . strtolower(str_replace(' ', '-', $course->getCourseName())) . '.php';
        $phpCode = '<?php
$courseName = "' . $course->getCourseName() . '";
$description = "' . $course->getDescription() . '";
$teacherId = ' . $course->getTeacherId() . ';
$startDate = "' . $course->getStartDate() . '";
$endDate = "' . $course->getEndDate() . '";
$imagePath = "../../"."' . $course->getImage() . '";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $courseName; ?></title>
</head>
<body>
    <h1><?php echo $courseName; ?></h1>
    <p><strong>Description:</strong> <?php echo $description; ?></p>
    <p><strong>Teacher ID:</strong> <?php echo $teacherId; ?></p>
    <p><strong>Start Date:</strong> <?php echo $startDate; ?></p>
    <p><strong>End Date:</strong> <?php echo $endDate; ?></p>
    <img src="<?php echo $imagePath; ?>" alt="Course Image">
</body>
</html>
';
        file_put_contents($fileName, $phpCode);
    }
}
