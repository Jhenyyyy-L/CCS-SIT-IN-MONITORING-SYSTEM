<?php
include 'db_config.php';

// Fetch remaining sessions from the database
$sql = "SELECT * FROM remaining_sessions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo '<div class="card--wrapper">';
    echo '<h3>View Remaining Session</h3>';
    echo '<ul>';
    while($row = $result->fetch_assoc()) {
        echo '<li>';
        echo 'Room: ' . $row["room"] . ' - Slots: ' . $row["slots"];
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
} else {
    echo '<div class="card--wrapper">';
    echo '<h3>View Remaining Session</h3>';
    echo 'No remaining sessions available.';
    echo '</div>';
}
