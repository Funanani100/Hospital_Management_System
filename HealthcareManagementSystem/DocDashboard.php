<?php
session_start();
// If the doctor is not logged in, redirect to the login page.
if (!isset($_SESSION['doctor_id'])) {
    header("Location: doctorLogin.html"); // or use doctorLogin.php if that's your login page
    exit();
}

// Optionally, retrieve more doctor details from the database if needed.
// For now, we simply use the session username.
$doctorName = $_SESSION['doctor_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="DocDashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <button class="home">
                <i class="fa fa-home" aria-hidden="true" style="font-size: 26px; color: #a91af1;"></i>
                <span class="label">Home</span>
            </button>

            <button class="appointments">
                <i class="fa fa-calendar" style="font-size: 26px; color: #a91af1;"></i>
                <span class="label">Appointments</span>
            </button>

            <button class="patients">
                <i class="fa fa-id-badge" style="font-size:26px;color:#a91af1"></i>
                <span class="label">Patients</span>
            </button>

            <button class="messages">
                <i class="fa fa-envelope-o" style="font-size:26px;color:#a91af1"></i>
                <span class="label">Messages</span>
            </button>

            <button class="settings">
                <i class="fa fa-cog" style="font-size:26px;color:#a91af1"></i>
                <span class="label">Settings</span>
            </button>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header>
                <h1>
                    Hello, Dr. <?php echo htmlspecialchars($doctorName); ?> <br>
                    <span>Have a nice day at work</span> 
                </h1>
                <input type="text" placeholder="Search...">
                <button class="notifications">
                    <i class="fa fa-bell-o"></i>
                    <span class="label">Notifications</span>
                </button>
            </header>

            <!-- Summary Cards -->
            <div class="summary-cards">
                <div class="card">
                    <i class="fa fa-heartbeat" style="font-size:36px; color:#31a0ef"></i>
                    <h2>Patients</h2>
                    <p>1,521</p>
                </div>
                <div class="card">
                    <i class="fa fa-calendar-plus-o" style="font-size:36px; color:#31a0ef"></i>
                    <h2>Consultations</h2>
                    <p>307</p>
                </div>
                <div class="card">
                    <i class="fa fa-asl-interpreting" style="font-size:36px; color:#31a0ef"></i>
                    <h2>Staff</h2>
                    <p>771</p>
                </div>
                <div class="card">
                    <i class="fa fa-hospital-o" style="font-size:36px; color:#31a0ef"></i>
                    <h2>Rooms</h2>
                    <p>2,150</p>
                </div>
            </div>

            <!-- Statistics and Recent Patients -->
            <div class="content">
                <div class="chart-container">
                    <h2>Patient Statistics</h2>
                    <canvas id="patientChart"></canvas>
                </div>

                <div class="recent-patients">
                    <h2>Recent Patients</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Condition</th>
                                <th>Room Number</th>
                            </tr>
                        </thead>
                        <tbody id="recentPatients"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="right-sidebar">
            <div class="profile">
                <!-- Example profile picture; replace or generate dynamically as needed -->
                <img src="th.jpg" alt="">
                <h3>Dr. <?php echo htmlspecialchars($doctorName); ?></h3>
                <p>General Practitioner</p>
            </div>
            <div class="doctor-list">
                <h2>
                    Doctor List
                    <i class="fa fa-stethoscope" style="font-size:36px;color:rgb(11, 5, 56)"></i>           
                </h2>
                <ul id="doctorList"></ul>
            </div>
        </div>
    </div>

    <script src="DocDashboard.js"></script>
</body>
</html>
