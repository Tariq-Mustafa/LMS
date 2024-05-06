<?php
session_start();
include "classes/Db.classes.php";
include "classes/Model/user.classes.php";
include "classes/View/user-view.classes.php";
$users = new UserView();

require_once 'classes/Control/CourseController.php';
require_once "classes/Model/Course.php";
require_once 'classes/Control/StudentController.php';
require_once "classes/Model/Student.php";
$courseController = new CourseController;
$courses = $courseController->getCourses();
$Instructors = $courseController->getInstructors();
$studentController = new StudentController;
$students = $studentController->getStudents();
$errMsg = "";
if (isset($_POST['CourseName']) && isset($_POST['Start_Date']) && isset($_POST['End_Date']) && isset($_POST['Description']) && isset($_FILES["Image"])) {
    if (!empty($_POST['CourseName']) && !empty($_POST['Start_Date']) && !empty($_POST['End_Date']) && !empty($_POST['Description'])) {
        $course = new Course;
        $course->setCourseName($_POST['CourseName']);
        $course->setTeacherId($_POST['InstructorID']);
        $course->setStartDate($_POST['Start_Date']);
        $course->setEndDate($_POST['End_Date']);
        $course->setDescription($_POST['Description']);
        $location = "./images/" . date("h-i-s") . basename($_FILES["Image"]["name"]);
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $location)) {
            $course->setImage($location);
            if ($courseController->addCourse($course)) {
                $courseController->closeConnection();
                $errMsg = "Added Successfully";
            } else {
                $errMsg = "some thing went wrong try again";
            }
        } else {
            $errMsg = "Error in Upload";
        }
    } else {
        $errMsg = "Please fill all fields";
    }
}
$delMsg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  if (!empty($_POST["CourseName"])) {
    $courseDel = new Course;
    $courseDel->setCourseName($_POST['CourseName']);
    if ($courseController->deleteCourse($courseDel)) {
      $delMsg = "Deleted Successfully";
      $courseController->closeConnection();
    } else {
      $delMsg = "Error occurred during course deletion.";
    }
  }
}
$errMsg2="";
if (isset($_POST['StudentID']) && isset($_POST['CourseID']))
{
    $student=new Student;
    $course2 = new Course;
    $student->setStudentID($_POST['StudentID']);
    $course2->setCourseId($_POST['CourseID']);
    if ($studeController->addStudentToCourse($student,$course)) {
        $studeController->closeConnection();
        $errMsg2 = "Added Successfully";
    } else {
        $errMsg2 = "some thing went wrong try again";
    }
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Dashboard.css">


    <title>Manage Users</title>
    <style>
        .user-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .role-label {
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
        }

        .alert_ok {
            padding: 20px;
            background-color: #00e600;
            color: white;
            border-radius: 5px;
        }
        .alert_del {
  padding: 20px;
  background-color: #00e600;
  color: white;
  border-radius: 5px;
}
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>

<body>
    <?php
    include_once "sidebar.php";
    ?>
    </div>
    <?php
    include_once "cards.php"
    ?>
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">




            <div class="cardHeader">
                <h2>View Courses</h2>
                <div class="search" style="margin: 0px 0%;">
                    <label>
                        <input type="text" placeholder="Search for a student">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>

                </div>
            </div>
            <br>
            <?php
      if ($delMsg === "Deleted Successfully") { ?>
        <div class="alert_ok">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>OK!</strong> <?php echo $delMsg ?>
        </div>
      <?php } else if ($delMsg != "") { ?>
        <div class="alert_del">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>Try Again!</strong> <?php echo $delMsg ?>
        </div><?php
            }
              ?>

            <table>
                <?php
                if (count($courses) == 0) {
                ?>
                    <div class="alert">
                        <strong>No Avilable Courses!</strong>
                    </div><?php
                        } else { ?>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Instructor Name</td>
                            <td>Students number</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <?php
                            foreach ($courses as $course) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $course["CourseName"] ?></td>
                                <td><?php echo $course["UserName"] ?></td>
                                <td>Students number</td>
                                <td>
                                    <form method="post" action="manageCourse.php">
                                        <input type="hidden" name="CourseName" value="<?php echo $course["CourseName"]; ?>">
                                        <button class="btn btn-delete" name="delete">
                                            <span class="mdi mdi-delete mdi-24px"></span>
                                            <span class="mdi mdi-delete-empty mdi-24px"></span>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                <?php }
                        }
                ?>
            </table>
        </div>
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Add Course</h2>
            </div>
            <?php
            if ($errMsg === "Added Successfully") { ?>
                <div class="alert_ok">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>OK!</strong> <?php echo $errMsg ?>
                </div>
            <?php } else if ($errMsg != "") { ?>
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Try Again!</strong> <?php echo $errMsg ?>
                </div>
            <?php
            }
            ?>
            <form action="manageCourse.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" id="CourseName" name="CourseName" style="margin-top: 10px;" placeholder="Course Name">
                </div>
                <div class="form-group">
                    <label for="teacher">Instructor:</label>
                    <select class="form-control" name="InstructorID" id="InstructorID" onchange="toggleDepartmentField()">
                        <?php
                        foreach ($Instructors as $Instructor) { ?>
                            <option value="<?php echo $Instructor["FacultyID"] ?>"><?php echo $Instructor["UserName"] ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="Role" class="form-label">Start Date:</label>
                    <input type="date" class="form-control" id="Start_Date" name="Start_Date">
                </div>
                <div class="form-group">
                    <label for="Role" class="form-label">End Date:</label>
                    <input type="date" class="form-control" id="End_Date" name="End_Date">
                </div>
                <div class="form-group">
                    <label for="Description" class="role-label">Course Description:</label>
                    <textarea class="form-control" id="Description" rows="3" name="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="Image" class="file-label">choose course image</label>
                    <input class="file-control" type="file" id="Image" name="Image">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Add Student to Course</h2>
            </div>
            <?php
            if ($errMsg === "Added Successfully") { ?>
                <div class="alert_ok">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>OK!</strong> <?php echo $errMsg ?>
                </div>
            <?php } else if ($errMsg != "") { ?>
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Try Again!</strong> <?php echo $errMsg ?>
                </div>
            <?php
            }
            ?>
            <form action="manageCourse.php" method="post">
            <div class="form-group">
                <?php echo $errMsg2 ?>
                    <label for="teacher">Student:</label>
                    <select class="form-control" name="InstructorID" id="InstructorID" onchange="toggleDepartmentField()">
                        <?php
                        foreach ($students as $student) { ?>
                            <option value="<?php echo $student["StudentID"] ?>"><?php echo $student["UserName"] ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="teacher">Course:</label>
                    <select class="form-control" name="InstructorID" id="InstructorID" onchange="toggleDepartmentField()">
                        <?php
                        foreach ($courses as $course) { ?>
                            <option value="<?php echo $course["CourseID"] ?>"><?php echo $course["CourseName"] ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    </div>
    </div>
    <script>
        function toggleDepartmentField() {
            var role = document.getElementById('Role').value;
            var departmentField = document.getElementById('department-field');

            if (role === 'Teacher') {
                departmentField.style.display = 'block';
            } else {
                departmentField.style.display = 'none';
            }
        }
    </script>
    <script src="./js/Dashboard.js"></script>
    <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>