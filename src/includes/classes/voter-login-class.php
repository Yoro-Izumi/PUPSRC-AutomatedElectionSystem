<?php 
require_once 'db-connector.php';

class Login {
    protected function getUser($email, $password) {

        if ($connection = DatabaseConnection::connect()) {
            $stmt = $connection->prepare("SELECT voter_id, email, password, role FROM voter WHERE email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if a user of this email exists
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verify if password matches the email
                if($row['password'] == $password) {

                    // Store voter ID and role in session
                    $_SESSION['voter_id'] = $row['voter_id'];
                    $_SESSION['role'] = $row['role'];

                    // Check the role of the user
                    if($row['role'] == 'Committee Member') {
                        header("Location: ../../admindashboard.php");
                        exit();
                    }
                    elseif($row['role'] == 'Student Voter') {
                        header("Location: ../../ballot-forms.php");
                        exit();
                    }
                    else {
                        echo 'Something went wrong.';
                    }
                }
                // If email and password mismatched
                else {
                    echo 'email and password mismatched.';
                }
            }
            // If username does not find a match
            else {
                echo 'User with this email does not exist.';
            }
            $stmt->close();
        }
    }
}
?>