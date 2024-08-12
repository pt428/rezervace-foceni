<?php 
require_once "../database/Database.php";
 
$db=new Database();
$reservations= $db->getAllReservations();


// Zobrazení výsledků
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Date</th><th>Time Range</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>numberOfPhotos</th><th>Number of Dogs</th><th>Number of Adults</th><th>Number of Children</th><th>Approved</th><th>Note</th></tr>";
        
        foreach ($reservations as $reservation) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($reservation['id']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['date_of_reservation']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['time_range']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['first_name']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['second_name']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['email']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['phone_number']) . "</td>";
             echo "<td>" . htmlspecialchars($reservation['number_of_photos']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['number_of_dogs']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['number_of_adult']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['number_of_children']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['approved']) . "</td>";
            echo "<td>" . htmlspecialchars($reservation['note']) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";