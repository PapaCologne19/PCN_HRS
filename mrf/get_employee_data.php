<?php 
    include '../connect.php';

    if (isset($_POST['division'])) {
        $selectedDivision = $_POST['division'];
    
        // Prepare a SQL query to retrieve employee data for the selected division
        $query = "SELECT fullname, position FROM pcn_emp WHERE division = ? AND employment_status = 'REGULAR'";
    
        // Create a prepared statement
        $stmt = $link->prepare($query);
    
        if ($stmt) {
            // Bind the parameter
            $stmt->bind_param("s", $selectedDivision);
    
            // Execute the statement
            $stmt->execute();
    
            // Get the result
            $result = $stmt->get_result();
    
            // Fetch the data and store it in an array
            $employeeData = array();
            while ($row = $result->fetch_assoc()) {
                $employeeData[] = $row;
            }
    
            // Close the statement
            $stmt->close();
    
            // Close the database connection
            $link->close();
    
            // Return the employee data as JSON
            header('Content-Type: application/json');
            echo json_encode($employeeData);
        } else {
            echo "Error in preparing the SQL statement.";
        }
    } else {
        echo "Invalid POST request.";
    }
?>