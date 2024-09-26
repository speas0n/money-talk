<?php
require_once('select.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon for browsers -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <!-- PWA Manifest -->
    <link rel="manifest" href="js/manifest.json">
    <meta name="theme-color" content="#181C14">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Apple PWA Settings -->
    <meta name="apple-mobile-web-app-title" content="Money Talk">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Microsoft Pinned Tab Color (for Windows 8/10 tiles) -->
    <meta name="msapplication-navbutton-color" content="#181C14">

    <!-- Apple Touch Icons for various devices -->
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180x180.png">

    <!-- Preconnect for faster Google Fonts loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    <!-- Stylesheets and scripts -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/70754e60d0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">

    <!-- Main JS -->
    <script src="js/main.js"></script>

    <title>Money Talk</title>
</head>

<body>
    <header>
        <h1>Money Talk</h1>
        <nav>
            <i class="fa-solid fa-plus" id="openForm"></i>
            <i class="fa-solid fa-bars"></i>
        </nav>
    </header>
    <form id="myForm" action="insert.php" method="POST">
        <input type="hidden" id="hiddenDate" name="date">
        <input type="hidden" id="hiddenType" name="type">
        <input type="hidden" id="hiddenAmount" name="amount">
        <input type="hidden" id="hiddenComment" name="comment">
        <input type="hidden" id="hiddenMethod" name="method">
    </form>
    <main>
        <div class="title">
            <p>Spending stats</p>
            <p>
                <select name="year" id="select-year"></select>
            </p>
            <p>
                <select name="month" id="select-month">
                    <option value="1">Jan</option>
                    <option value="2">Feb</option>
                    <option value="3">Mar</option>
                    <option value="4">Apr</option>
                    <option value="5">May</option>
                    <option value="6">Jun</option>
                    <option value="7">Jul</option>
                    <option value="8">Aug</option>
                    <option value="9">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select>
            </p>
        </div>
        <div id="boxes">
            <div class="container">
                <i class="fa-solid fa-arrow-trend-up"></i>
                <p class="title">Max Expenses</p>
                <p class="amount">¥1,234</p>
            </div>
            <div class="container">
                <i class="fa-solid fa-arrow-trend-up"></i>
                <p class="title">Max Expenses</p>
                <p class="amount max-amount">¥0</p>
            </div>
            <div class="container">
                <i class="fa-solid fa-arrow-trend-down"></i>
                <p class="title">This Months Expenses</p>
                <p class="amount this-month">¥0</p>
            </div>
        </div>
        <table>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Amount</th>
            </tr>
            <?php
            get_date();
            ?>
        </table>
    </main>

</body>

</html>