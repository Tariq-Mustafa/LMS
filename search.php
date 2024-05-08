<?php
	session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Grabbing the data
        $search_query = $_POST['search_query'] ?? '';
        $search_query = trim($search_query); // Trim whitespace
        $search_category = $_POST['search_category'] ?? '';

        // Instantiate user class
        include "classes/Db.classes.php";
        include "classes/Model/user.classes.php";
        include "classes/View/user-view.classes.php";
        $users = new UserView();

        $search_results = $users->fetchsearch($search_query, $search_category);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        /* Example CSS for styling search results */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<?php if (!empty($search_results)): ?>
    <h2>Search Results</h2>
    <table>
        <thead>
            <tr>
                <!-- Adjust table headers based on the search category -->
                <th>Main ID</th>
                <th>User Name</th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($search_results as $result): ?>
                <tr>
                    <!-- Adjust table data based on the search category -->
                    <td><?php echo $result['UserID']; ?></td>
                    <td><?php echo $result['UserName']; ?></td>
                    <!-- Add more data cells as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php elseif (!empty($search_error)): ?>
    <p><?php echo $search_error; ?></p>
<?php else: ?>
    <p>No results found.</p>
<?php endif; ?>

</body>
</html>
