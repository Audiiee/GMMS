



<?php 
include "db_conn.php";

$alert = "";

if (isset($_POST['image'])) {
  $file = $_FILES['image']['name'];
  $pic = "INSERT INTO `status` (`Image`) VALUES ('$file')";
  $result = mysqli_query($conn, $pic); 
}

if(isset($_POST['submit'])) {
  $file = $_FILES['image']['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email) && empty($password)) {
    $alert = "<div class='alert alert-danger' role='alert'> Please enter your information especially the email and password.
    </div>";
} else if (empty($email)) {
    $alert = "<div class='alert alert-danger' role='alert'> Please enter the email!
    </div>";
  } else if (empty($password)) {
    $alert = "<div class='alert alert-danger' role='alert'> Please enter the password!
    </div>";
  }  else {
    // Check if the email already exists
    $check_email_query = "SELECT * FROM `status` WHERE `Email`='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
      $alert = "<div class='alert alert-danger' role='alert'> Email already exists. Please choose a different email.
      </div>";
    } else {
      $ins = "INSERT INTO `status` (`Image`, `First_Name`, `Last_Name`, `Age`, `Gender`, `Contact_Number`, `Id_Issue`, `Address`, `Email`, `Password`)
      VALUES ('$file','$_POST[firstname]', '$_POST[lastname]', '$_POST[age]', '$_POST[gender]', '$_POST[contact]', '$_POST[id]', '$_POST[address]', '$email', '$password')";
      $alert = "<div class='alert alert-primary' role='alert'> Submit Successfully!</div>";
     $result = mysqli_query($conn, $ins);

      
    }
  }
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Member</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sadmin.css">

    <script>
        var loadFile = function(event) {
          var reader = new FileReader();
          reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
          }; 
      
        $('#output').show();
          reader.readAsDataURL(event.target.files[0]);
        };
      </script>
</head>
<body>

        <div class="content">
            <div class="dashboard-content px-5 pt-4">
                <h2 class="fs-5 fw-bold">  REGISTRATION </h2>
                <div class="d-flex justify-content-center" id="Nmember">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="d-flex">
                      <div class="p-1 py-3 flex-grow-0 bd-highlight">
                        <img id="output" upload>
                      </div>
                      <div class="p-1 py-5 flex-grow-1 bd-highlight">
                        <?php echo $alert ?>
                        <div class="d-flex bd-highlight">
                          <div class="p-1 flex-grow-1 bd-highlight">
                            <label for="message-text" class="col-form-label">First Name:</label>
                            <input type="text" class="form-control" placeholder="First Name" name="firstname">
                          </div>
                          <div class="p-1 flex-grow-1 bd-highlight">
                            <label for="message-text" class="col-form-label">Last Name:</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                          </div>
                        </div>
                    </div>
                     </div>

                     <div class="d-flex flex-row bd-highlight">
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <input type="file" class="form-control" id="file" name="image" onchange="loadFile(event)" aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
                      </div>
                    </div>
          
                    <div class="d-flex bd-highlight">
                      <div class="p-1 flex-grow-1 bd-highlight">
                        <label for="recipient-name" class="col-form-label">Address:</label>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Address" name="address">
                        </div>
                      </div>
                      <div class="p-1 flex-grow-1bd-highlight">
                      <label for="message-text" class="col-form-label">Gender:</label>
                      <input type="text" class="form-control" placeholder="Female / Male" name="gender">
                    </div>
                     </div>
                  
                    
          
                     <div class="d-flex bd-highlight">
                      <div class="p-1 flex-grow-1 bd-highlight">
                        <label for="message-text" class="col-form-label">Age:</label>
                        <input type="text" class="form-control" placeholder="Age" name="age">
                      </div>
                      <div class="p-1 flex-grow-1 bd-highlight">
                        <label for="message-text" class="col-form-label">Contact Number:</label>
                        <input type="tel" class="form-control" placeholder="Contact Number" name="contact">
                      </div>
                      <div class="p-1 flex-grow-1 bd-highlight">
                        <label for="message-text" class="col-form-label">ID Issued:</label>
                        <select name="id" class="form-control">
                          <option value="GOVERNMENT / NON-GOVERNMENT" selected hidden>GOVERNMENT / NON-GOVERNMENT</option>
                          <option value="Government">Government</option>
                          <option value="Non-Government">Non-Government</option>
                        </select>
                      </div>
                    </div>
          
                    <div class="d-flex bd-highlight">
                      <div class="p-1 pb-4 flex-grow-1 bd-highlight">
                         <label for="message-text" class="col-form-label">Email:</label>
                         <div class="input-group">
                           <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                           <input type="email" class="form-control" name="email" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                      </div>
                      <div class="p-1 pb-4 flex-grow-1 bd-highlight">
                          <label for="message-text" class="col-form-label">Password:</label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                      </div>
                    </div>
                 </div>
                 <div class="row px-2 mb-3 mt-2">
                  <div class="d-flex justify-content-evenly" >
                  <button type="submit" name="pending" class="btn btn-outline-light btn-md me-2"><a class="nav-link" href="/Fit/Index.php"> Back </a></button>  
                  <button type="submit" name="submit" class=" btn btn-outline-light btn-md ">Submit</button>
                  </div>
              </div>
              </form>
            </div>
        </div>
  </div>
</div>   
        
    

    
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
