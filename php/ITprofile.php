<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "cfees";

$con = new mysqli($server, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = $con->prepare("SELECT id, first_name, middle_name, intercom, last_name, dob, gen, email_id, cadre_id, desig_id, internal_desig_id, group_id, user_type, role, telephone_no, user_name FROM id_emp WHERE role = ?");
$role = "IT Admin";
$sql->bind_param("s", $role);
$sql->execute();

$result = $sql->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = htmlspecialchars($row["id"]);
    $first_name = htmlspecialchars($row["first_name"]);
    $middle_name = htmlspecialchars($row["middle_name"]);
    $last_name = htmlspecialchars($row["last_name"]);
    $gender = htmlspecialchars($row["gen"]);
    $email_id = htmlspecialchars($row["email_id"]);
    $cadre_id = htmlspecialchars($row["cadre_id"]);
    $desig_id = htmlspecialchars($row["desig_id"]);
    $internal_desig_id = htmlspecialchars($row["internal_desig_id"]);
    $group_id = htmlspecialchars($row["group_id"]);
    $telephone_no = htmlspecialchars($row["telephone_no"]);
    $username = htmlspecialchars($row["user_name"]);
    $user_type = htmlspecialchars($row["user_type"]);
    $intercom = htmlspecialchars($row["intercom"]);
    $dob = htmlspecialchars($row["dob"]);
    $role = htmlspecialchars($row["role"]);
}

$sql->close();
$con->close();
?>


<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IT Incharge Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/index.css" />
  <link rel="stylesheet" href="../css/ITprofile.css" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Hindi:ital@0;1&display=swap" rel="stylesheet">
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

  <!-- Admin Profile -->
  <main class="main-content" style="background-color: transparent">
    <div class="whitebg">
      <h2>IT Incharge Profile</h2>
      <form action="signup.php" method="POST">
        <div class="row">
          <div class="profile-image-container">
            <div class="profile-image-wrapper">
              <img src="../images/default_user.jpg" alt="Profile Image" id="profile-image" class="profile-image" />

              <div class="image-upload-container">
                <label for="profile-image-upload" class="btn change-image-btn">
                  Change Image
                </label>
                <input type="file" id="profile-image-upload" accept="image/*" style="display: none" />
              </div>
            </div>
          </div>

          <div class="group">
            <label for="id"><i class="fas fa-id-card"></i>ID:</label>
            <div class="display-field" id="id"><?php echo $id;?></div>
          </div>
          <div class="group">
            <label for="fname"><i class="fas fa-user"></i>First Name:</label>
            <div class="display-field" id="fname"><?php echo $first_name;?></div>
          </div>
          <div class="group">
            <label for="mname"><i class="fas fa-user"></i>Middle Name:</label>
            <div class="display-field" id="mname"><?php echo $middle_name;?></div>
          </div>
          <div class="group">
            <label for="lname"><i class="fas fa-user"></i>Last Name:</label>
            <div class="display-field" id="lname"><?php echo $last_name;?></div>
          </div>
          <div class="group">
            <label for="gender"><i class="fas fa-venus-mars"></i>Gender:</label>
            <div class="display-field" id="gender"><?php echo $gender;?></div>
          </div>
          <div class="group">
            <label for="email"><i class="fa-solid fa-envelope"></i>Email ID:</label>
            <div class="display-field" id="email"><?php echo $email_id;?></div>
          </div>
          <div class="group">
            <label for="phone"><i class="fa-solid fa-phone"></i>Intercom:</label>
            <div class="display-field" id="phone"><?php echo $intercom;?></div>
          </div>
          <div class="group">
            <label for="telno"><i class="fa-solid fa-tty"></i>Telephone Number:</label>
            <div class="display-field" id="telno"><?php echo $telephone_no;?></div>
          </div>
          <div class="group">
            <label for="dob"><i class="fa-solid fa-cake-candles"></i>Date Of Birth:</label>
            <div class="display-field" id="dob"><?php echo $dob;?></div>
          </div>
          <div class="group">
            <label for="cadreid"><i class="fas fa-id-card"></i>Cadre ID:</label>
            <div class="display-field" id="cadreid"><?php echo $cadre_id;?></div>
          </div>
          <div class="group">
            <label for="desigid"><i class="fa-solid fa-address-card"></i>Designation ID:</label>
            <div class="display-field" id="desigid"><?php echo $desig_id;?></div>
          </div>
          <div class="group">
            <label for="idesigid"><i class="fa-solid fa-id-badge"></i>Internal Designation
              ID:</label>
            <div class="display-field" id="idesigid"><?php echo $internal_desig_id;?></div>
          </div>
          <div class="group">
            <label for="gid"><i class="fa-solid fa-id-card-clip"></i>Group ID:</label>
            <div class="display-field" id="gid"><?php echo $group_id;?></div>
          </div>
          <div class="group">
            <label for="user"><i class="fa-solid fa-user-tie"></i>User Type:</label>
            <div class="display-field" id="user"><?php echo $user_type;?></div>
          </div>
          <div class="group">
            <label for="role"><i class="fa-solid fa-user-gear"></i>Role:</label>
            <div class="display-field" id="role"><?php echo $role;?></div>
          </div>
          <div class="group">
            <label for="uname"><i class="fa-solid fa-address-book"></i>Username:</label>
            <div class="display-field" id="uname"><?php echo $username;?></div>
          </div>

          <div class="password-wrapper">
            <button class="btn small change-password-btn" type="button">
              Change Password
            </button>
            <a href="../php/ITHead.php" class="btn small dashboard-button">
              Go to Dashboard
            </a>
          </div>

          <div class="form-actions">
            <button class="btn small save-btn" type="submit" style="display: none">
              Save Changes
            </button>
          </div>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
 <footer class="main-footer">
    <p>Copyright © 2025, DRDO, Ministry of Defence, Government of India</p>
  </footer>
</body>

</html>