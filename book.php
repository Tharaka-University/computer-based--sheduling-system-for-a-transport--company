<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transport_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $schedule_id = $_POST['schedule_id'];
    $goods_description = trim($_POST['goods_description']);
    $weight = trim($_POST['weight']);
    $pickup_location = trim($_POST['pickup_location']);
    $dropoff_location = trim($_POST['dropoff_location']);
    $preferred_date = trim($_POST['preferred_date']);
    $user_id = $_SESSION['user_id'];  // Assuming the user is logged in and has a session

    // Check if the schedule is available
    $stmt = $conn->prepare("SELECT available_slots FROM schedules WHERE id = ?");
    $stmt->bind_param("i", $schedule_id);
    $stmt->execute();
    $stmt->bind_result($available_slots);
    $stmt->fetch();
    $stmt->close();

    if ($available_slots > 0) {
        // Insert the booking details into the bookings table
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, schedule_id, goods_description, weight, pickup_location, dropoff_location, preferred_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssss", $user_id, $schedule_id, $goods_description, $weight, $pickup_location, $dropoff_location, $preferred_date);

        if ($stmt->execute()) {
            // Update the available slots for the schedule
            $new_available_slots = $available_slots - 1;  // Decrease one slot
            $stmt = $conn->prepare("UPDATE schedules SET available_slots = ? WHERE id = ?");
            $stmt->bind_param("ii", $new_available_slots, $schedule_id);
            $stmt->execute();
            $stmt->close();

            // Success message
            echo "Booking successful! Your goods will be delivered as per your preferred date.";
        } else {
            // Error during booking insertion
            echo "Error occurred while processing your booking. Please try again later.";
        }
    } else {
        // No available slots
        echo "Sorry, no available slots for this schedule. Please select another schedule.";
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
