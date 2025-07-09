<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "cfees";

$con = new mysqli($server, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// FOR PROFILE INPUTS
$sql_profile = $con->prepare("SELECT first_name, middle_name, last_name, id FROM id_emp WHERE role = ?");
$role = "Software Admin";
$sql_profile->bind_param("s", $role);
$sql_profile->execute();
$result_profile = $sql_profile->get_result();

if ($result_profile && $result_profile->num_rows > 0) {
    $row = $result_profile->fetch_assoc();
    $first_name = htmlspecialchars($row["first_name"]);
    $middle_name = htmlspecialchars($row["middle_name"]);
    $last_name = htmlspecialchars($row["last_name"]);
    $id = htmlspecialchars($row["id"]);
}
$sql_profile->close();

// FOR COMPLAINTS TABLE
$sql_complaint = "SELECT comp_id, emp_name, eng_assig, intercom, issue, eng_assig, status, dept FROM complaints WHERE status='Resolved' and dept='Software'";
$result_complaint = $con->query($sql_complaint);

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Software Complaints Record</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/index.css" />
  <link rel="stylesheet" href="../css/softwarerecords.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Hindi:ital@0;1&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Header -->
  <header class="main-header">
    <div class="header-inner">
      <div class="logo-box left">
        <img src="../images/logo-left.png" alt="Left Logo" />
      </div>
      <div class="header-center">
        <h1 class="title-main">अग्नि, विस्फोटक एवं पर्यावरण सुरक्षा केंद्र</h1>
        <p class="sub-title">Centre for Fire, Explosive and Environment Safety (CFEES)</p>
      </div>
      <div class="logo-box right">
        <img src="../images/logo-right.png" alt="Right Logo" />
      </div>
    </div>
  </header>

  <!-- Page Layout -->
  <div class="page-layout">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="profile-box">
        <div class="avatar-box">
          <img src="../images/default_user.jpg" alt="Profile Picture" />
        </div>
        <h3><?php echo $first_name.' '.$middle_name.' '.$last_name;?></h3>
        <p>ID: <?php echo $id;?></p>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li><a href="../php/SoftwareHead.php"><i class="fa-solid fa-screwdriver-wrench"></i> Go to Dashboard</a>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <h2 class="welcome">Welcome, <?php echo $first_name.' '.$middle_name.' '.$last_name;?></h2>
      <h3 class="section-title">Complaints History</h3>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Complaint ID</th>
              <th>Employee Name</th>
              <th>Intercom</th>
              <th>Issue</th>
              <th>Status</th>
              <th>Engineer Assigned</th>
              <th>Review</th>
            </tr>
          </thead>
          <tbody>
            <?php
    if ($result_complaint && $result_complaint->num_rows > 0) {
        while($row = $result_complaint->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".htmlspecialchars($row['comp_id'])."</td>";
            echo "<td>".htmlspecialchars($row['emp_name'])."</td>";
            echo "<td>".htmlspecialchars($row['intercom'])."</td>";
            echo "<td>".htmlspecialchars($row['issue'])."</td>";
            echo "<td>".htmlspecialchars($row['status'])."</td>";
            echo "<td>".htmlspecialchars($row['eng_assig'])."</td>";
            echo "<td><button class='review-btn' onclick=\"openReviewModal('".$row['comp_id']."', '30-06-2025', 'Software', '".addslashes($row['issue']) . "')\">Review</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No complaints found</td></tr>";
    }
    ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>

</html>