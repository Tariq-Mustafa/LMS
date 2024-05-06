<?php
session_start();
include "classes/Db.classes.php";
include "classes/Model/user.classes.php";
include "classes/View/user-view.classes.php";
$users = new UserView();

require_once 'classes/Control/CourseController.php';
require_once "classes/Model/Course.php";
$courseController = new CourseController;
$courses = $courseController->getCourses();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Dashboard.css">
    <title>Dashboard</title>
    <style>
img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 200px;
}
img:hover {
  border: 1px solid #777;
}

    </style>

</head>
<?php
include_once "sidebar.php";
?>

<div class="search">
    <label>
        <input type="text" placeholder="Search here">
        <ion-icon name="search-outline"></ion-icon>
    </label>
</div>
</div>
<?php
include_once "cards.php"
?>

<!-- ================ Order Details List ================= -->
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Courses</h2>
        </div>

        <table>
            <?php
            if (count($courses) == 0) {
            ?>
                <br>
                <div class="alert">
                    <strong>No Avilable Courses!</strong>
                </div><?php
                    } else { ?>
                <thead>
                    <tr>
                        <td></td>
                        <td>Name</td>
                        <td>Instructor Name</td>
                        <td>Number of students</td>
                    </tr>
                </thead>
                <?php
                        $totalCourses = count($courses);
                        $endIndex = max($totalCourses - 5, 0);
                        for ($i = $totalCourses-1; $i >= $endIndex; $i--) {
                            $course = $courses[$i]; ?>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo $course["Image"] ?>" alt="Course Image"></td>
                            <td><?php echo $course["CourseName"] ?></td>
                            <td><?php echo $course["UserName"] ?></td>
                            <td>Number of students</td>
                        </tr>
                    </tbody>
            <?php }
                    }
            ?>
        </table>
    </div>
</div>
</div>
</div>

<script src="./js/Dashboard.js"></script>
<script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>