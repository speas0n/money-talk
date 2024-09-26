<?php
if (isset($_POST["method"]) && $_POST["method"] == "insert") {
    insert();
}
go_home();

function insert()
{
    // Lolipop! database connection details
    $host = 'mysql310.phy.lolipop.lan'; // Lolipop! server address
    $username = 'LAA1622400'; // Your database username
    $password = 'speason'; // Your database password
    $dbname = 'LAA1622400-moneytalk'; // Your database name

    // Create MySQL connection
    $db = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$db) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $stmt = $db->prepare('INSERT INTO basic_info (date, type, amount, comment, delete_flg, u_id) VALUES (?, ?, ?, ?, 0, ?)');
    
    // Format the date
    $date = new DateTime($_POST['date']);
    $formatted_date = $date->format('Y-m-d');
    $uid = 1;

    // Bind parameters
    $stmt->bind_param('ssisi', $formatted_date, $_POST['type'], $_POST['amount'], $_POST['comment'], $uid);
    
    $stmt->execute();

    $stmt->close();
    mysqli_close($db);
}

function go_home()
{
    header("Location: index.php");
    exit;
}