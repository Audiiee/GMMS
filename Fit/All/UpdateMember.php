<?php
    include "db_conn.php";
     if(isset($_GET['Email'])) {
    $em = $_GET['Email'];
    $del = "SELECT * FROM `status` where `Email` = '$em'";
    $res = mysqli_query($conn, $del);    
    $rows = mysqli_fetch_assoc($res);
  }

  $alert = "";
  $alerts = "";

  if(isset($_POST['update'])!= ''){
    $email = $_POST['email'];
    $file = $_FILES['image']['name'];
    $ins = "UPDATE `status` SET `Image` = '$file' WHERE `Email` = '$email'";
    $result = mysqli_query($conn, $ins);
    $sql = "SELECT * FROM `status` WHERE `Email` = '$email'";
  $result = mysqli_query($conn, $sql);
  $alerts = "Success Upload";
  $rows = mysqli_fetch_assoc($result);
   
  }
  
  
  if(isset($_POST['submit'])!= ''){
  $file = $_FILES['image']['name'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $age = $_POST['age'];
  $number = $_POST['contact'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];
  

  
  $update = "UPDATE `status` SET `First_Name`='$firstname',`Last_Name`='$lastname',`Address`='$address',`Age`='$age',`Contact_Number`='$number',`Gender`='$gender',`Password`='$password' WHERE `Email` = '$email'";
  $result = mysqli_query($conn, $update);
  
  $sql = "SELECT * FROM `status` WHERE `Email` = '$email'";
  $result = mysqli_query($conn, $sql);
  $alert = "Successfully Update";
  $rows = mysqli_fetch_assoc($result);
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Member</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="smembers.css">

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
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel"><i class="fa-solid fa-right-from-bracket"></i> Log out</h1>
        <button type="button" id="button-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1 class="fs-5 text-center">Are you sure you want to log-out?
        </h1>
       </div>
 
      <div class="modal-footer justify-content-around">
        <a type="button" id="modal-footer" name="submit" class="btn btn-danger btn-md" href="/Fit/Index.php">Yes</a>
        <button type="button" id="modal-footer" class="btn btn-secondary btn-md" data-bs-dismiss="modal">No</button>
      </div>
     </div> 
  </div>
</div>



<div class="main-container fixed-top d-flex">
  <div class="sidebar" id="side_nav">
      <div class="header-box px-4 pt-3 pb-4 d-flex">
          <h1 class="fs-4">
            <a class="navbar-brand" href="Profile.php?Email=<?php echo $rows['Email'] ?>s">
              <i class="fas fa-dumbbell fa-sm" style="color: #f54324;"></i>
              <span class="text-white">GYM ROAR</span>
              </a>
          </h1>
      </div>

      <ul class="list-unstyled px-2 py-3">
              <li class="active"><a href="Profile.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> Profile </a></li>
              <li class="nav-item"><a href="CheckIn.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-clock"></i> Check-In</a></li>
              <li class="nav-item"><a href="History.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-clock-rotate-left"></i> History </a></li> 
              <li class="nav-item"><a href="Notification.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i> Notification</a></li>
            </ul>
    
      <div class="dropdown  px-4 pt-3 pb-5 d-flex">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i> &nbsp Sign Out</a>
        <ul class="dropdown-menu justify-content-end dropdown-menu-dark text-small shadow">
          <li><a class="dropdown-item" href="Feedback.php?Email=<?php echo $rows['Email'] ?>"> <i class="fa-solid fa-message fa-2xs"></i> Give Feedback</a></li> 
          <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#"><i class="fa-solid fa-right-from-bracket fa-2xs"></i> Sign out</a></li>
        </ul>
    </div>
</div>


     
  <div class="content">
    <div class="dashboard-content px-5 pt-3">
      <div class="d-flex justify-content-center" id="Nmember">
        <form method="POST" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="p-1 py-3 flex-grow-0 bd-highlight">
            <img src ="upload/<?php echo $rows['Image']?>" id = "output" style = "width:150px; height:150px">
            </div>
  
            <div class="p-1 py-5 flex-grow-1 bd-highlight">
            <h6 class = "ps-3 pt-2 text-primary"><?php echo $alert ?></h6>
              <div class="d-flex bd-highlight">
                <div class="p-1 flex-grow-1 bd-highlight">
                  <label for="message-text" class="col-form-label">First Name:</label>
                  <input type="text" class="form-control" value = "<?php echo $rows['First_Name'] ?>" name="firstname">
                </div>
                <div class="p-1 flex-grow-1 bd-highlight">
                  <label for="message-text" class="col-form-label">Last Name:</label>
                  <input type="text" class="form-control" value = "<?php echo $rows['Last_Name'] ?>" name="lastname">
                </div>
              </div>
  
            </div>
          </div>

        <!-- edit image -->
        <div class="d-flex flex-row bd-highlight">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <button type="submit" name="update" class="btn btn-outline-light btn-md"> Update photo</button>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <input type="file" class="form-control" id="file" name="image" onchange="loadFile(event)" aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
            </div>
            <h6 class = "ps-3 pt-2 text-primary"><?php echo $alerts ?></h6>
          </div>
  
  
          <div class="d-flex bd-highlight">
            <div class="p-1 flex-grow-1 bd-highlight">
              <label for="recipient-name" class="col-form-label">Address:</label>
              <div class="input-group">
                <input type="text" class="form-control"value = "<?php echo $rows['Address'] ?>" name="address" required>
              </div>
            </div>
            <div class="flex-grow-2 bd-highlight">
              <div class="p-1 flex-grow-1bd-highlight">
                <label for="message-text" class="col-form-label">Gender:</label>
                <input type="text" class="form-control" value = "<?php echo $rows['Gender'] ?>"  name="gender">
              </div>
            </div>
          </div>
  
  
  
          <div class="d-flex bd-highlight">
            <div class="p-1 flex-grow-1 bd-highlight">
              <label for="message-text" class="col-form-label">Age:</label>
              <input type="text" class="form-control"value = "<?php echo $rows['Age'] ?>" name="age">
            </div>
            <div class="p-1 flex-grow-1 bd-highlight">
              <label for="message-text" class="col-form-label">Contact Number:</label>
              <input type="text" class="form-control" value = "<?php echo $rows['Contact_Number'] ?>" name="contact">
            </div>
            <div class="p-1 pb-5 flex-grow-1 bd-highlight">
              <label for="message-text" class="col-form-label">Password:</label>
              <input type="text" class="form-control" value = "<?php echo $rows['Password'] ?>" name="password">
            </div>
          </div>
  
          <div class="d-flex bd-highlight">
            <div class="p-1 pb-4 flex-grow-1 bd-highlight" hidden>
              <label for="message-text" class="col-form-label">Email:</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" class="form-control" name="email" value = "<?php echo $rows['Email'] ?>" aria-label="Username"
                  aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="p-1 pb-4 flex-grow-0 bd-highlight"hidden>
              <label for="message-text" class="col-form-label">Password:</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control"  value = "<?php echo $rows['Password'] ?>" aria-label="Username"
                  aria-describedby="basic-addon1">
              </div>
            </div>
          </div>
      </div>
      <div class="d-flex" id="nmemberbtn">
        <button class="btn btn-outline-light fw-bold btn-md" name="submit" onclick="insertFunc()" type="submit"> Update</button>
      </div>
      <div class="d-flex" id="cancelbtn">
        <a href="Profile.php?Email=<?php echo $rows['Email'] ?>" class="btn btn-outline-light fw-bold btn-md">Back</a>
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