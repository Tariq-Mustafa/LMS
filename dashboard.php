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
$delMsg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  if (!empty($_POST["CourseName"])) {
    $courseDel = new Course;
    $courseDel->setCourseName($_POST['CourseName']);
    if ($courseController->deleteCourse($courseDel)) {
      $delMsg = "Deleted Successfully";
      $courseController->closeConnection();
      //header("Location: dashboard.php");
    } else {
      $delMsg = "Error occurred during course deletion.";
    }
  }
} else {
  $delMsg = "some thing went wrong try again";
}
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
    .alert {
      background-color: #f44336;
      /* Red background color */
      color: white;
      /* White text color */
      padding: 15px;
      /* Padding around the content */
      margin-bottom: 15px;
      /* Margin at the bottom */
      border-radius: 5px;
      /* Rounded corners */
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

    .alert strong {
      font-weight: bold;
      /* Bold text */
    }
    /****** */
    $delete-red: while;

    body {
      margin: 32px;
    }

    .btn {

      align-items: center;
      background: white;
      color: #000;
      border: 1px solid lighten(gray, 24%);
      height: 40px;
      padding: 0 15px 0 10px;
      letter-spacing: .25px;
      border-radius: 24px;
      cursor: pointer;

      &:focus {
        outline: none;
      }

      .mdi {
        margin-right: 8px;
      }
    }

    .btn-delete {
      font-size: 16px;
      color: red;

      >.mdi-delete-empty {
        display: none;
      }

      &:hover {
        background-color: lighten(red, 48%);

        >.mdi-delete-empty {
          display: block;
        }

        >.mdi-delete {
          display: none;
        }
      }



      &:focus {
        box-shadow: 0 0 0 4px lighten(red, 40%);
      }
    }
  </style>
</head>

<body>
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
              <td>Edit</td>
              <td>Delete</td>
            </tr>
          </thead>
          <?php
                foreach ($courses as $course) { ?>
            <tbody>
              <tr>
                <td><?php echo $course["CourseName"] ?></td>
                <td><?php echo $course["UserName"] ?></td>
                <td>Edit</td>
                <td>
                  <form method="post" action="dashboard.php">
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
  </div>
  </div>
  </div>

  <script src="./js/Dashboard.js"></script>
  <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>