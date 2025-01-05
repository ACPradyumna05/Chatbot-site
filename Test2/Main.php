
<?php
require_once("../includes/dbconnection.php");
session_start();

if (!isset($_SESSION["UserID"])) {
    header("location:LoginPG.php");
    exit();
}

$qry = "SELECT Name, Eid FROM userinfo WHERE UserID = {$_SESSION['UserID']}";
$rs = mysqli_query($con, $qry);
$row = mysqli_fetch_row($rs);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="MainStyles.css">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- HTML starts here -->
    <title>Document</title>
    <script src="chatmsg.js?v=1.0" defer></script>
    <script src="typeWriter.js"></script>
</head>
<body>
    <div class="site">
        <div class="SidebarContainer">
            <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8FGD2_H-AD1RqGQnIqngM6Mcv0CA4UjH1fg&s" alt="">
                </span>

                <div class="text header-text">
                    <span class="name">
                        thaparGPT
                    </span>
                    <span class="name">
                    </span>
                </div>
            </div>

            <i class="bx bx-chevron-right toggle"></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bx-home-alt icon">
                                <span class="text nav-text">
                                    Dashboard
                                </span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bx-conversation icon">
                                <span class="text nav-text">
                                    Chat
                                </span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bx-book-bookmark icon">
                                <span class="text nav-text">
                                    Projects
                                </span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bx-shape-square icon">
                                <span class="text nav-text">
                                    Templates
                                </span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-links">
                    <span class="CatTitle">
                        Settings and Help
                    </span>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bx-cog icon">
                                <span class="text nav-text">
                                    Settings
                                </span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class="bx bx-help-circle icon">
                                <span class="text nav-text">
                                    Help
                                </span>
                            </i>
                        </a>
                    </li>
                </li>
                <li class="mode">
                            <span class="mode-text Dark text">
                                Dark Mode
                            </span>
                    
                    <div class="toggle-switch">
                        <span class="switch">
                            
                        </span>
                    </div>
                </li>
                </ul>
                <hr class="profSep">
                <ul class="menu-links">
                    <li class="nav-links">
                        <div class="loggedin" style="border-top: var(--cattitle-color)">
                            <br>
                            <p class="text n-text">
                            <?php if(isset($row)){echo $row[0];}?>
                            <br>
                            <br>
                            <?php if(isset($row)){echo $row[1];}?>
                            </p>
                            </div>
                    </li>

                </ul>
            </div>
        </div>
            </nav>
        </div>
        <div class="mainContainer">
            <nav class="HeadNavbar">
                <div class="HeadNavbar-content">
                    <div class="Spacing"></div>
                    <div class="devCred">
                        
                        <a class="Headnav-item">Developed by GDSC Thapar</a>
                    </div>
                    <div class="logout">
                        <i class="bx bx-log-out">
                            <span class="Headnav-item"><a href="./logout.php" class="logout-btn" name="logout">Logout</a></span>
                        </i>
                    </div>
                </div>
            </nav>
    
            <div class="mainContent" id="mainContentDiv">
                <div class="chatbot-container">
                    <!-- Chatbot Header -->
                    <header class="chatbot-header">
                        <h1>Welcome</h1>
                        <p>How may I help you?</p>
                    </header>
                
                    <!-- Info Cards Section -->
                    <div class="info-cards">
                        <div class="card card1">
                            <div class="icon green">
                                <i class="bx bx-food-tag actIcon">

                                </i>
                            </div>
                            <div class="card-content">
                                <h3>Campus Info</h3>
                                <p>Where can I find some good Pizza?</p>
                            </div>
                        </div>
                
                        <div class="card card2">
                            <div class="icon yellow">
                                <i class="bx bx-pencil actIcon">

                                </i>
                            </div>
                            <div class="card-content">
                                <h3>Curriculum Info</h3>
                                <p>What is the Syllabus of Mathematics-II?</p>
                            </div>
                        </div>
                
                        <div class="card card3">
                            <div class="icon red">
                                <i class="bx bx-building actIcon">

                                </i>
                            </div>
                            <div class="card-content">
                                <h3>Societies Info</h3>
                                <p>Name a few Tech societies at TIET</p>
                            </div>
                        </div>
                
                        <div class="card card4">
                            <div class="icon blue">
                                <i class="bx bxs-city actIcon">

                                </i>
                            </div>
                            <div class="card-content">
                                <h3>Patiala Info</h3>
                                <p>Best Places to hangout</p>
                            </div>
                        </div>
                    </div>
                    <!-- MsgBody -->
                    <div class="chat-container">

                        <ul class="chatbox">
                        </ul>
                        <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        

                    </div>

                </div>
                
                    <!-- Footer Section -->
                    <div class="SendFooter">
                    <footer class="chatbot-footer">
                        <div class="prompt-form">
                                <textarea name="" id="" placeholder="Write your prompt..." required></textarea>
                                <button class="custom-submit" id="send">
                                    <i id="send-btn" class="bx bx-send"></i>
                                </button>
                        </div>
                        <div class="browse">
                        <button>Browse Prompts</button>
                        </div>
                        
                    </footer>
                    
                    <p class="footer-note">Chatbot can make mistakes. Check important info.</p>
                    
                </div>
            </div>    
        </div>
    </div>
    <script src="ModeSwitch.js"></script>
    
</body>
</html>