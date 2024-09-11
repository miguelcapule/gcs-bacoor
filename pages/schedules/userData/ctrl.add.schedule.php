<?php
include '../../../includes/session.php'; // Include session handling
require '../../../includes/conn.php'; // Include your database connection

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the student ID from the session
    $student_id = $_SESSION['id']; // Assuming 'id' contains the student ID
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);

    // Check for existing schedule for the student on the selected date
    $existingCheck = mysqli_query($conn, "SELECT * FROM tbl_schedules WHERE student_id = '$student_id' AND appointment_date = '$date'");

    // If an existing schedule is found for that day
    if (mysqli_num_rows($existingCheck) > 0) {
        // Set session error and return JSON response with error message
        $_SESSION['error'] = "You can only add one schedule per day.";
        echo json_encode(['status' => 'error', 'message' => 'You can only add one schedule per day.']);
    } else {
        // Check for scheduling conflicts (time slot already booked)
        $conflictCheck = mysqli_query($conn, "SELECT * FROM tbl_schedules WHERE appointment_date = '$date' AND appointment_time = '$time'");

        // If a conflict is detected (time slot already booked)
        if (mysqli_num_rows($conflictCheck) > 0) {
            // Set session error and return JSON response with error message
            $_SESSION['error'] = "Conflict: The selected time slot is already booked.";
            echo json_encode(['status' => 'error', 'message' => 'Time slot already booked']);
        } else {
            // If no conflict, insert the schedule into the database
            $insertSchedule = mysqli_query($conn, "INSERT INTO tbl_schedules (student_id, appointment_date, appointment_time, purpose, status) VALUES ('$student_id', '$date', '$time', '$purpose', 'pending')");

            // If the query was successful
            if ($insertSchedule) {
                // Set session success message and return JSON response with success message
                $_SESSION['success'] = "Schedule added successfully!";
                echo json_encode(['status' => 'success', 'message' => 'Schedule added successfully!']);
            } else {
                // If there's an error during insertion, set session error and return JSON response
                $_SESSION['error'] = "Error adding schedule.";
                echo json_encode(['status' => 'error', 'message' => 'Error adding schedule.']);
            }
        }

        // Close the conflict check result set
        mysqli_free_result($conflictCheck);
    }

    // Close the existing schedule check result set
    mysqli_free_result($existingCheck);
}

// Close the database connection
$conn->close();
?>
