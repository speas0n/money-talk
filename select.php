<?php
function get_date()
{
    // Lolipop! database connection details
    $host = 'mysql310.phy.lolipop.lan'; // Lolipop! server address
    $username = 'LAA1622400'; // Your database username
    $password = 'speason'; // Your database password
    $dbname = 'LAA1622400-moneytalk'; // Your database name

    // Create connection
    $db = mysqli_connect($host, $username, $password, $dbname);
    // Check connection
    if (!$db) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $stmt = $db->prepare('SELECT * FROM basic_info WHERE deleted_at = 0 AND u_id = 1 ORDER BY amount DESC');

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    $rows = [];
    $total = 0;
    while ($row = $result->fetch_assoc()) {
        $date = new DateTime($row['date']);
        $formattedDate = $date->format('n/j');
        $weekday = $date->format('l');
        $total += (int)$row['amount'];
        echo '<tr>
            <td>' . htmlspecialchars($formattedDate) . '<br>' . $weekday . '</td>
            <td>' . htmlspecialchars($row['type']) . '</td>
            <td>¥' . htmlspecialchars(number_format($row['amount'])) . '</td>
        </tr>';
    }
    echo '<script>setThisMonthAmount(' . $total . ');</script>';

    // Close the connection
    $stmt->close();
    $db->close();

    get_max_amount();
}

function get_max_amount()
{
    // Connect to MySQL
    $db = new mysqli('mysql310.phy.lolipop.lan', 'LAA1622400', 'speason', 'LAA1622400-moneytalk');

    // Check connection
    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }

    $stmt = $db->prepare('SELECT max_amount AS amount FROM user_info WHERE deleted_at = 0 AND id = 1 LIMIT 1');

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    $amount = 0;
    while ($row = $result->fetch_assoc()) {
        $amount = (int)$row['amount'];
    }
    echo '<script>setMaxAmount(' . $amount . ');</script>';

    // Close the connection
    $stmt->close();
    $db->close();
}
