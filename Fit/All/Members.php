<?php


    include "db_conn.php";
     if(isset($_GET['Email'])) {
    $em = $_GET['Email'];
    $del = "DELETE FROM `status` where `Email` = '$em'";
    $res = mysqli_query($conn, $del);    
  }

  if(isset($_GET['Image'])){
  $img = $_FILES['image']['name'];
  $ins = "INSERT INTO `status` (`Image`) VALUES ('$img')";
  $result = mysqli_query($conn, $ins);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sadmin.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        // Attach an input event listener to the search input field
        $('#searchInput').on('input', function() {
            // Get the value from the input field
            var searchValue = $(this).val().toLowerCase();

            // Loop through each row in the table body
            $('tbody tr').each(function() {
                // Get the text content of the Email and First Name columns in lowercase
                var emailText = $(this).find('td:eq(1)').text().toLowerCase();
                var firstNameText = $(this).find('td:eq(2)').text().toLowerCase();

                // Check if the search value is found in either Email or First Name columns
                if (emailText.includes(searchValue) || firstNameText.includes(searchValue)) {
                    // Show the row if the search value is found in either column
                    $(this).show();
                } else {
                    // Hide the row if the search value is not found in either column
                    $(this).hide();
                }
            });
        });
    });
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
            <div class="dashboard-content px-5 pt-4">
                <h2 class="fs-5">MEMBERS</h2>
                <div class="d-flex py-3 flex-row bd-highlight mb-3">
                    <div class="p-1 bd-highlight">
                        <button type="submit" name="pending" class="active btn btn-outline-light btn-md"> 
                            <a class="nav-link" href="Members.php">Pending</a>
                        </button>
                    </div>
                    <div class="p-1 bd-highlight">
                        <button type="submit" name="active" class="btn btn-outline-light btn-md"> 
                            <a class="nav-link px-2" href="Active.php"> Active </a>
                        </button>
                    </div>
                    <div class="p-1 me-auto bd-highlight">
                        <button type="submit" name="inactive" class="btn btn-outline-light btn-md"> 
                            <a class="nav-link px-2"  href="Inactive.php">Inactive</a>
                        </button>
                    </div>
                    <div class="p-1 pt-2 bd-highlight">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search..." name="search">
                        </button>
                    </div>
                 </div>
                 <div class="table-wrapper-scroll-y my-custom-scrollbar">
                 <table class="table table-dark table-hover align-middle table-striped  mb-0">
                    <thead>
                      <tr class = "text-center sticky-top table-dark">
                        <th scope="col">Image</th>
                        <th scope="col">Email</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">ID Issued</th>
                        <th scope="col">Status</th>
                        <th colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     include "db_conn.php";
                     $select = "SELECT * FROM `status` WHERE `Status` = 'Pending'"; 
                     $result = mysqli_query($conn, $select);
                     while($rows = mysqli_fetch_assoc($result)){ 
                    ?>
                        <tr class="text-center ">
                            <td><img src = "upload/<?php echo $rows['Image'] ?>" style = "width:40px; height:40px"></td>
                            <td><?php echo $rows['Email'] ?></td>
                            <td><?php echo $rows['First_Name'] ?></td>
                            <td><?php echo $rows['Last_Name'] ?></td>
                            <td><?php echo $rows['Age'] ?></td>
                            <td><?php echo $rows['Gender'] ?></td>
                            <td><?php echo $rows['Id_Issue'] ?></td>
                            <td><?php echo $rows['Status'] ?></td>   
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <div class="p-0"> 
                                    <a href="Update.php?Email=<?php echo $rows['Email'] ?>" class="nav-link"><i class="fa-solid fa-square-pen fa-xl"></i></a>
                                    </div>                                  
                                    <div class="p-0">
                                    <a href="Members.php?Email=<?php echo $rows['Email'] ?>" class="nav-link"><i class="fa-solid fa-trash fa-lg"></i></a>
                                    </div>
                                </div>    
                            </td>
                        </tr>
                    <?php 
                     }    
                    ?>
                     </tbody>
                  </table>
                </div> 
            </div>
        </div>
    </div> 
    

 
</body>
</html>
