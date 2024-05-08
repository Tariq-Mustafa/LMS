
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" type="text/css" href="css/Dashboard.css">
</head>
<body>
    <div class="sidebar">
        <?php include_once "sidebar.php"; ?>
    </div>
    <div class="container">
        <div class="wrapper">
            <h1>Reports</h1>
        </div>
        <div class="data">
            <form action="report-download.php" method="POST"> <!-- Changed action to report-download.php -->
                <input type="hidden" name="course" value="<?php echo isset($_POST['course']) ? $_POST['course'] : ''; ?>"> <!-- Added hidden input field to pass selected course ID -->
                <select name="course">
                    <option value="">Select</option>
                    <?php
                    // Display all courses
                    foreach ($result as $row) {
                        echo "<option value='" . $row['CourseID'] . "'>" . $row['CourseName'] . "</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="download_report" class="btn">Download Report</button> <!-- Added download report button -->
            </form>
        </div>
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h2>Students in Selected Course</h2>
                </div>
                <div class="card-body">
                    <?php if (!empty($reportData)) : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Student Name</th> 
                                    <th>Course Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reportData as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['UserName']; ?></td> 
                                        <td><?php echo $row['CourseName']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p class="no-data">No students available in the selected course.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/Dashboard.js"></script>
    <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
