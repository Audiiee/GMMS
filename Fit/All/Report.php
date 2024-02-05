<?php
    include "db_conn.php";
      // Query to count rows with status 'Active'
$countQuery = "SELECT COUNT(*) as total FROM `status` WHERE `Status` = 'Active' OR `Status` = 'Inactive'";
$countResult = mysqli_query($conn, $countQuery);

// Fetch the result
if ($countResult) {
    $rowCount = mysqli_fetch_assoc($countResult)['total'];
} else {
    $rowCount = 0; // Set to 0 in case of an error
}

$countQuery = "SELECT COUNT(*) as total FROM `status` WHERE `Status` = 'Active'";
$countResult2 = mysqli_query($conn, $countQuery);

// Fetch the result
if ($countResult2) {
    $rowCount2 = mysqli_fetch_assoc($countResult2)['total'];
} else {
    $rowCount2 = 0; // Set to 0 in case of an error
}

$countQuery = "SELECT COUNT(*) as total FROM `status` WHERE `Status` = 'Inactive'";
$countResult3 = mysqli_query($conn, $countQuery);

// Fetch the result
if ($countResult3) {
    $rowCount3 = mysqli_fetch_assoc($countResult3)['total'];
} else {
    $rowCount3 = 0; // Set to 0 in case of an error
}
   
   
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
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
                // Get the text content of the Date, Email, and First Name columns in lowercase
                var dateText = $(this).find('td:eq(0)').text().toLowerCase();
                var emailText = $(this).find('td:eq(1)').text().toLowerCase();
                var firstNameText = $(this).find('td:eq(2)').text().toLowerCase();

                // Check if the search value is found in any of the columns
                if (dateText.includes(searchValue) || emailText.includes(searchValue) || firstNameText.includes(searchValue)) {
                    // Show the row if the search value is found in any column
                    $(this).show();
                } else {
                    // Hide the row if the search value is not found in any column
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
                <li class="nav-item"><a href="Members.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-users"></i> Members</a></li>
                <li class="nav-item"><a href="NotificationAdmin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i> Notification</a></li> 
                <li class="active"><a href="Report.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-magnifying-glass-chart"></i>  Reports </a></li>
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
                <h2 class="fs-5">REPORTS</h2>
                <div class="services section-padding" id="services">
                    <div class="container">
                      <div class="row pt-2">
                        <div class="col-sm-6 col-md-3 col-sm-12">
                          <div class="single-services text-center">
                            <h2>Total Members</h2>
                            <h1><?php echo $rowCount; ?></h1>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-sm-12">
                          <div class="single-services text-center">
                            <h2>Active</h2>
                            <h1><?php echo $rowCount2; ?></h1>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-sm-12">
                          <div class="single-services text-center">
                             <h2>Inactive</h2>
                             <h1><?php echo $rowCount3; ?></h1>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-sm-12 pt-4 mt-5">
                          <div class="text-center">
                             <input type="text" id="searchInput" class="form-control" placeholder="Search..." name="search">
                          </div>
                        </div>
                      </div> 
                    </div>
                  </div>

                    <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3 mb-5" >
                     <table class="table table-dark table-hover align-middle table-striped mb-0">
                       <thead>
                         <tr class = "text-center sticky-top table-dark">
                         <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Date</th>
                           <th scope="col">Time In</th>
                           <th scope="col">Time Out</th>
                         </tr>
                       </thead>
                       <tbody>
                       <?php
                        include "db_conn.php";
                        $select = "SELECT * FROM `checkin` ORDER BY `Date` DESC"; 
                        $result = mysqli_query($conn, $select);
                        while($rows = mysqli_fetch_assoc($result)){ 
                       ?>
                           <tr class="text-center ">
                               <td><?php echo $rows['First_Name'] ?> <?php echo $rows['Last_Name'] ?> </td>
                               <td><?php echo $rows['Email'] ?></td>
                               <td><?php echo $rows['Date'] ?></td>
                               <td><?php echo $rows['Time_In'] ?></td>
                               <td><?php echo $rows['Time_Out'] ?></td>
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
