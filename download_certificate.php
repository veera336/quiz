

<div class="toolbar no-print">
  <button class="btn btn-info" onclick="window.print()">
    Print Certificate
  </button>
  <button class="btn btn-info" id="downloadPDF">Download PDF</button>
</div>
<div class="cert-container print-m-0">
  <div id="content2" class="cert">
    <!-- <img
      src="https://edgarsrepo.github.io/certificate.png"
      class="cert-bg"
      alt=""
    /> -->
    <div class="cert-content">
      <h1 class="other-font">Certificate of Completion</h1>
      <span id="username" class="cert-name"><?php echo $username?></span>
      
      <span class="complete-status"><i><b>has completed </b></i></span>
        <div class="cert-detail">
            <span id="certificationContent" style="font-size: 20px; line-height: 35px;"></span>

            <div class="bottom-txt">
                <div>
                    <div style="font-style: italic; font-size: 24px;">Signature</div>
                    <div style="font-size: 18px;">Veera</div>
                </div>
                <div id="completionDate" style="margin-right: 50px;"></div>

            </div>
           
        </div>
    </div>
  </div>
</div>

<?php
include('session.php');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javaboi";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Query to fetch username based on user ID
    $sql = "SELECT username FROM user_info WHERE user_id=$user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];

        // Now you have the username, you can proceed with generating the certificate
        // Include your certificate generation logic here
    } else {
        echo "User not found";
    }
}

$conn->close();
?>



<script>
  // Function to format the date in the desired format
  function formatDate(date) {
    var monthNames = [
      "January", "February", "March",
      "April", "May", "June", "July",
      "August", "September", "October",
      "November", "December"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return monthNames[monthIndex] + ' ' + day + ', ' + year;
  }

  // Immediately Invoked Function Expression (IIFE) to set the current date and user name
  (function setContent() {
    var currentDate = new Date();
    var formattedDate = formatDate(currentDate);

    document.getElementById('completionDate').innerText = "Completed on: " + formattedDate;

    // Certification content
    var certificationContent = "This is to certify that Mr/Mrs <?php echo $username; ?> has successfully completed Logical Quiz in Problem Solving Quiz.";
    document.getElementById('certificationContent').innerText = certificationContent;

    // Set the completion date at the bottom of the certificate
    document.getElementById('completionDateBottom').innerText = "Completed on: " + formattedDate;
  })();
</script>
<style>
    .cert-content{
        background: url("https://edgarsrepo.github.io/certificate.png");
        background-repeat: no-repeat;
        height: 620px;
        margin: 0 auto;
        width: 824px;
        padding: 20px;
    }
    .other-font{
        text-align: center;
        margin-top: 70px;
        width: 100%;
        display: block;
    }
    .complete-status{
        text-align: center;
        margin-top: 30px;
        width: 100%;
        display: block;
    }
    .cert-name{
        font-size: 30px;
        text-align: center;
        width: 100%;
        display: block;
        text-transform: uppercase;
        font-weight: bold;
    }
    .cert-detail{
        margin-left: 70px;
        margin-right: 70px;
        margin-top: 40px;
    }
    .bottom-txt{
        display: flex;
        justify-content: space-between;
        margin-top: 120px;
    }
    .toolbar{
      background:black;
      padding:15px;
      text-align:center;
    }
    body{
      margin:0;
    }
    button{
      padding: 10px;
    border-radius: 20px;
    background-color: #769cc3;
    color: #fff;
    }
</style>
