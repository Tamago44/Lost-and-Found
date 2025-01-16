<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_system";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Sign-Up Logic
if (isset($_POST['signUp'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = 'admin';

    // Input validation
    if (empty($name) || empty($email) || empty($password)) {
        die("All fields are required.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    if(strlen($password) < 8 || !preg_match('/\d/', $password)) {
        die("Password must be at least 8 characters long and have at least 1 number!");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if email already exists
    $sql_check = "SELECT id FROM userdetails WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        die("This email is already registered.");
    }
    $stmt_check->close();

    // Insert new user into userdetails table
    $sql = "INSERT INTO userdetails (name, email, hashed_password, roles) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        // Generate token for new user
        $token = bin2hex(random_bytes(16));
        $_SESSION['token'] = $token;
    
        // Get the last inserted user id from the userdetails table
        $user_id = $conn->insert_id;
    
        // Check if the user ID already exists in the users table
        $stmt_check_user = $conn->prepare("SELECT id FROM users WHERE id = ?");
        $stmt_check_user->bind_param("i", $user_id);
        $stmt_check_user->execute();
        $stmt_check_user->store_result();
    
        if ($stmt_check_user->num_rows > 0) {
            // The ID already exists, handle this case accordingly (you can either skip or update)
            die("This user ID already exists in the users table.");
        }
    
        // Insert into the second table (users), using the user ID from userdetails table
        $stmt = $conn->prepare("INSERT INTO users (id, username, role, token) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $name, $role, $token);
    
        if ($stmt->execute()) {
            echo "Sign-up successful! <a href='../Main/main-page.php'>Click to continue...</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt_check_user->close();
    } else {
        echo "Error: " . $stmt->error;
    }
    

    $stmt->close();
}


// Sign-In Logic
if (isset($_POST['signIn'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die("Both email and password are required.");
    }

    $sql = "SELECT * FROM userdetails WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['hashed_password'])) {
            session_start();
            
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['roles']; // Pass user's role (e.g., 'user' or 'admin') from the database
            //$_SESSION['user_id'] = $row['id'];

            $token = bin2hex(random_bytes(16));
            $stmt = $conn->prepare("UPDATE users SET token = ? WHERE id = ?");
            $stmt->bind_param("si", $token, $row['id']); // Ensure id is properly bound as integer
            $stmt->execute();

            $_SESSION['token'] = $token;

            // Remove the INSERT query as you're updating the existing record in users table
            header("Location: ../Main/main-page.php?token=$token");
        } else {
            echo "Incorrect password. <a href='login.html'>Please try again!</a>";
        }
    } else {
        echo "No account found with this email. <a href='login.html'>Please try again!</a>";
    }

    $stmt->close();
}


// Forgot Password Logic
if (isset($_POST["forgotPassword"])) {
  $email = $_POST["email"];
  $token = bin2hex(random_bytes(16));
  $token_hash = hash("sha256", $token);
  
  $expiry = date("Y-m-d H:i:s", time() + 60*30);
  
  $mysqli = $conn;
  
  $sql = "UPDATE userdetails SET reset_token_hash = ?, reset_token_exprire_at = ? WHERE email = ?";
  
  $stmt = $mysqli ->  prepare($sql);
  $stmt -> bind_param("sss", $token_hash, $expiry, $email);
  $stmt -> execute();

  if($mysqli -> affected_rows){

    $mail = require __DIR__."/mailer.php";
    $mail -> setFrom("noreply@gmail.com");
    $mail -> addAddress($email);
    $mail -> Subject = "Password Reset";

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST']; // This will return "localhost" or "127.0.0.1".
    $basePath = "/Lost-and-Found-1/Registration"; // Replace with your project folder's relative path.
    $resetLink = "$protocol://$host$basePath/reset-password.php?token=$token";

    $mail->Body = <<<END
        Click <a href="$resetLink">here</a> to reset your password.
    END;

    try {
     $mail -> send();
    } catch (Exception $e) {
      echo "Message coould not be sent. Mailer error: {$mail->ErrorInfo}";
    }
   
  }

  echo "Email sent. Click <a href='login.html'>here </a> to log-in."; //Redirect page
}

$conn->close();
?>
