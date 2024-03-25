<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM users WHERE student_id LIKE '%$searchTerm%' OR full_name LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "Student ID: " . $row["student_id"] . "<br>";
            echo "Full Name: " . $row["full_name"] . "<br>";
            echo "Gender: " . $row["gender"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Username: " . $row["username"] . "<br><br>";
        }
    } else {
        echo "No results found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin/Staff Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");
*{
    margin: 0;
    padding: 0;
    border: none;
    outline: none;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: white;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.sidebar {
    background-color: black;
    color: white;
    width: 250px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: auto;
    z-index: 999;
}

.fa-white {
    color: white;
}

.main--content {
    margin-left: 250px;
    padding: 20px;
}

.menu {
    padding: 0;
    margin: 0;
    list-style: none;
}

.menu li {
    padding: 15px 20px;
    border-bottom: 1px solid #333;
}

.menu li.active {
    background-color: #333;
}

.menu li a {
    color: white;
    text-decoration: none;
}

.menu li a:hover {
    color: #ddd;
}

.logout {
    position: absolute;
    bottom: 0;
}

.card--container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.card--wrapper {
    flex-basis: calc(33.33% - 20px);
    background-color: #f9f9f9;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 5px;
}

.header--title {
    display: inline-block;
    cursor: default; /* Disable pointer events */
}

.header--title span {
    display: block;
}

.user--info {
    display: flex;
    align-items: center;
    cursor: pointer; /* Enable pointer events */
}

.search--box {
    position: relative;
}

.search--box input[type="text"] {
    padding: 8px 30px 8px 10px;
    border-radius: 20px;
    border: 1px solid #ccc;
    background-color: #f2f2f2;
    width: 200px;
}

.fa-search {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #333; /* Icon color */
}

.card--container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center the elements horizontally */
}

.card--wrapper {
    flex-basis: calc(33.33% - 20px);
    background-color: #f9f9f9;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 5px;
}

.main--content {
    margin-left: 250px; /* Change this value to adjust the space from the sidebar */
    padding: 20px;
    margin-top: 20px; /* Add margin-top to create space between the top and the card */
}
</style>
<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active"><a href="#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></li>
            <li><a href="search.php"><i class="fas fa-search"></i><span>Search</span></li>
            <li><a href="delete.php"><i class="fas fa-trash"></i><span>Delete</span></li>
            <li><a href="sit_in_records.php"><i class="fas fa-file"></i><span>View Sitin Records</span></li>
            <li><a href="reports.php"><i class="fas fa-book"></i><span>Generate Reports</span></li>
            <li class="logout"><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></li>
        </ul>
    </div>
</body>
</html>
