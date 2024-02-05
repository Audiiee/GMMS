<?php
session_start();

// Initialize error variable
$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are provided
    if (empty($_POST["email"]) and empty($_POST["password"])) {
        $error = "Please enter both email and password";
    } else if (empty($_POST["email"])) {
        $error = "Please enter your email";
    } else if (empty($_POST["password"])) {
        $error = "Please enter your password";
    } else {
        // Your database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gym";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get user input
        $userEmail = $_POST["email"];
        $userPassword = $_POST["password"];


        // Prepare and execute the query
        $sql = "SELECT * FROM status WHERE Email = '$userEmail' AND Password = '$userPassword' AND Status = 'Active'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Admin found, set session and redirect to Member page
            $_SESSION["Username"] = $userEmail;
            $_SESSION["pass"] =   $userPassword;
            header("Location: All/Profile.php");
            exit();
        } else {
            // No admin found, check if it's a regular member
            // Add your logic for regular members here

            // For simplicity, let's assume all other users are regular members
            $_SESSION["user"] = "member";
            // Set an error message
            $error = "Invalid email or password";
        }

        // Close the connection
        $conn->close();
    }
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="Index.php">
                    <i class="fa-solid fa-dumbbell fa-sm" style="color: #f54324;"></i>         
                    <span class="text-white">GYM ROAR</span></a>
            </div>
          </nav>
      <div class="login-section section-padding">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-3">
                      <div class="login-header">
                          <div class="section-header text-center">
                              <i class="fa-solid fa-user"></i>
                              <h2>MEMBER</h2>
                          </div>
                          <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                        <p class="error text-center "><?php echo $error; ?></p>
                        <label for="Email">Email:</label>
                        <input type="email" class="form-control form-control-color"  name="email">
                        <label for="Password">Password:</label>
                        <input type="password" class="form-control form-control-color" name="password">
                        <button type="submit" class="btn" id="btn"> Login</button>
                    </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    
    </body>
    </html>
  