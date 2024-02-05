
<?php 
include "db_conn.php";
if (isset($_POST['image'])) {
  $file = $_FILES['image']['name'];
  $pic = "INSERT INTO `status` (`Image`) VALUES ('$file')";
  $result = mysqli_query($conn, $pic); 
}
$alert = "";
if(isset($_POST['submit']) != '') {
  $file = $_FILES['image']['name'];

  if (empty($_POST["email"]) && empty($_POST["password"])) {
    $alert = "<div class='alert alert-danger' role='alert'> Please enter all the information.
    </div>";
} else if (empty($_POST["email"])) {
  $alert = "<div class='alert alert-danger' role='alert'> Please enter the email!
  </div>";
} else if (empty($_POST["password"])) {
  $alert = "<div class='alert alert-danger' role='alert'> Please enter the password!
  </div>";
} else {
  $ins = "INSERT INTO `status` (`Image`, `First_Name`, `Last_Name`, `Age`, `Gender`, `Contact_Number`, `Id_Issue`, `Address`, `Email`, `Password`)
  VALUES ('$file','$_POST[firstname]', '$_POST[lastname]', '$_POST[age]', '$_POST[gender]', '$_POST[contact]', '$_POST[id]', '$_POST[address]', '$_POST[email]', '$_POST[password]')";
 $result = mysqli_query($conn, $ins);

  if ($result && mysqli_affected_rows($conn) > 0) {
    $alert = "<div class='alert alert-primary' role='alert'> Submit Successfully!
    </div>";
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
                <li class="active"><a href="Nmember.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-plus fa-sm"></i> New Member</a></li>
                <li class="nav-item"><a href="Members.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-users"></i> Members</a></li>
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
            <div class="dashboard-content px-5 pt-4">
                <h2 class="fs-5">NEW MEMBERS</h2>
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
                 <div class="row pt-2 px-1">
                  <div class="d-flex" id="nmemberbtn">
                    <br><button class="btn btn-outline-light fw-bold btn-md" name="submit" onclick = "insertFunc()" type="submit"> Submit </button>   
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
