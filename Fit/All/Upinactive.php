<?php 
include "db_conn.php";
if(isset($_GET['Email']) ) {
$em = $_GET['Email'];
$sql = "SELECT * FROM `status` WHERE `Email` = '$em'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
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
$status = $_POST['status'];
$age = $_POST['age'];
$number = $_POST['contact'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$s_date = $_POST['s_date'];
$e_date = $_POST['e_date'];
$id = $_POST['id'];


$update = "UPDATE `status` SET `First_Name`='$firstname',`Last_Name`='$lastname',`Address`='$address',`Age`='$age',`Contact_Number`='$number',`Gender`='$gender',`Status`='$status',`Password`='$password', `Start_Date` = '$s_date', `End_Date` = '$e_date', `Id_Issue` = '$id' WHERE `Email` = '$email'";
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
    <title>Update Inactive</title>
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
    </form> 
  </div> 
    </div>
  </div>

    <div class="main-container fixed-top d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-4 pt-3 pb-4 d-flex">
                <h1 class="fs-4">
                    <a class="navbar-brand" href="Nmember.php">
                   <i class="fas fa-dumbbell fa-sm" style="color: #f54324;"></i>
                    <span class="text-white">GYM ROAR</span>
                    </a>
                </h1>
            </div>

            <ul class="list-unstyled px-2">
                <li class="nav-item"><a href="Nmember.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-plus fa-sm"></i> New Member</a></li>
                <li class="active"><a href="Members.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-users"></i> Members</a></li>
                <li class="nav-item"><a href="NotificationAdmin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i> Notification</a></li> 
                <li class="nav-item"><a href="Report.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-magnifying-glass-chart"></i>  Reports </a></li>
                <li class="nav-item"><a href="Announcement.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bullhorn"></i> Announcements</a></li>
            </ul>
          
            <div class="dropdown  px-4 pt-6 pb-5 d-flex">
              <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"></i> &nbsp Sign Out</a>
              <ul class="dropdown-menu justify-content-end dropdown-menu-dark text-small shadow">
                  <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#"><i class="fa-solid fa-right-from-bracket fa-2xs"></i> Sign out</a></li>
              </ul>
          </div>
      </div>

        <div class="content">
            <div class="dashboard-content px-5 pt-2">
                <h2 class="fs-5">NEW MEMBERS</h2>
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
                          <input type="text" class="form-control"  value = "<?php echo $rows['Address'] ?>" name="address" required>
                        </div>
                      </div>
                      <div class="p-1 flex-grow-1bd-highlight">
                      <label for="message-text" class="col-form-label">Gender:</label>
                      <input type="text" class="form-control" value = "<?php echo $rows['Gender'] ?>"name="gender">
                    </div>
                     </div>
                  
                    
          
                     <div class="d-flex bd-highlight">
                      <div class="p-1 flex-grow-1 bd-highlight">
                        <label for="message-text" class="col-form-label">Age:</label>
                        <input type="text" class="form-control" value = "<?php echo $rows['Age'] ?>"name="age">
                      </div>
                      <div class="p-1 flex-grow-1 bd-highlight">
                        <label for="message-text" class="col-form-label">Contact Number:</label>
                        <input type="tel" class="form-control"  value = "<?php echo $rows['Contact_Number'] ?>" name="contact">
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
                      <div class="p-1 flex-grow-1 bd-highlight">
                        <label for="message-text" class="col-form-label">Start Date:</label>
                        <input type="date" class="form-control" name="s_date">
                      </div>
                      <div class="p-1 flex-grow-1 bd-highlight">
                        <label for="message-text" class="col-form-label">End Date:</label>
                        <input type="date" class="form-control"  name="e_date">
                      </div>
                      <div class="p-1 flex-grow-0 bd-highlight">
                      <label for="message-text" class="col-form-label">Status: Active / Inactive</label>
                        <select name="status" class="form-control">
                          <option value="Status" selected hidden>Status</option>
                          <option value="Active" selected>Active</option>
                          <option value="Inactive"selected>Inactive</option>
                        </select>
                      </div>
                    </div>



                    <div class="d-flex bd-highlight">
                      <div class="p-1 pb-3 flex-grow-1 bd-highlight">
                         <label for="message-text" class="col-form-label">Email:</label>
                         <div class="input-group">
                           <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                           <input type="email" class="form-control" name="email" value="<?php echo $rows['Email'] ?>"  aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                      </div>
                      <div class="p-1 pb-3 flex-grow-1 bd-highlight">
                          <label for="message-text" class="col-form-label">Password:</label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" value="<?php echo $rows['Password'] ?>" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                      </div>
                    </div>
                 </div>
                 <div class="row px-2 mb-3 mt-2">
                  <div class="d-flex justify-content-evenly" >
                  <button type="submit" name="pending" class="btn btn-outline-light btn-md me-2"><a class="nav-link" href="Inactive.php"> Back </a></button>  
                  <button type="submit" name="submit" class=" btn btn-outline-light btn-md ">Update</button>
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
