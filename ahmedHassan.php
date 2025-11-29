<?php
/**
 * Filename: ahmedHassan.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: Profile page for Ahmed Hassan.
 * Date: 2025
 */
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Ahmed Profile</title>
</head>
<body>

<!-- Navigation bar -->
    <?php include("navigation.php"); ?>

<div class="container">
    <!-- Profile Pic -->
    <div class="profile-pic-container-ahmed">
        <img src="IMAGE/ahmed.jpg" alt="Ahmed's Profile Photo" class="profile-pic">
    </div>

    <!-- Basic Info -->
    <div class="basic-info">
        <h1 class="name-ahmed">Ahmed Hassan</h1>
        <p class="student-id-ahmed">Student ID: 101229385</p>
        <p class="course-ahmed">Bachelor of Engineering (Robotics and Mechatronics)</p>
    </div>

    <!-- Profile table -->
    <table class="profile-table-ahmed">
        <tr>
            <th>Demographic Information</th>
            <td>
                Born in 1997, Male, Sudanese, Undergraduate Student
            </td>
        </tr>
        <tr>
            <th>Description of Hometown</th>
            <td>
                I was born and raised in Omdurman, Sudan — a quiet city filled with culture and simplicity. Life there was closer to the rural side, where people value family, hard work, and helping each other. Growing up in that environment shaped how I see the world — calm, patient, and appreciative of small progress.
            </td>
        </tr>
        <tr>
            <th>Greatest Achievement</th>
            <td>
                My greatest achievements so far come from both learning and sharing what I’ve learned. I’ve worked on several hands-on projects in university, including designing a vertical conveyor system, developing an automated spray bottle assembly system, and creating an inline engraving machine. Each of these projects taught me something different about precision, problem-solving, and teamwork.  
                <br><br>
                Beyond that, I’m proud to have been involved with <strong>Chumbaka</strong>, where I helped guide young students in innovation and technology. Teaching them how to build and think creatively reminded me why I love engineering — it’s not just about machines, but about inspiring others to build something meaningful too.
            </td>
        </tr>
        <tr>
            <th>Favorite Things (books, music, movies, games)</th>
            <td>
                I enjoy things that make me think and strategize — especially card games. They mix logic, planning, and intuition in a way that’s both relaxing and challenging. I also enjoy calm music and stories that carry emotion or purpose — the kind that make you pause and reflect for a moment.
            </td>
        </tr>
    </table>

        <div class="button-group">
        <a href="mailto:101229385@students.swinburne.edu.my?subject=Contact%20from%20Root%20Flower%20Website&body=Hello%20Ahmed,%20I%20would%20like%20to%20get%20in%20touch%20with%20you." class="email-button" title="Click to open your email client">Email me 🔧</a>
            <a href="profile.html" class="back-button">Back to Profiles</a>
        </div>
    </div>

<!-- Footer -->
<?php include("footer.php"); ?>

</body>
</html>
