<?php
class ReportView {
    public function showReport($reports) {
        ?>
        <!DOCTYPE html>
<html>
<head>
    <title>Report</title>
</head>
<body>
    <h1>Report</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Course Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reports as $data): ?>
                <tr>
                    <td><?php echo $data['StudentName']; ?></td>
                    <td><?php echo $data['CourseName']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="download_report.php">Download Report</a>
</body>
</html>

        <?php
    }
}
?>
