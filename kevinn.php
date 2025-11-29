<?php
/**
 * Filename: kevinn.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: Profile page for Kevinn Jose.
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
    <title>Kevinn Profile</title>
</head>
<body>

<!-- Navigation bar -->
    <?php include("navigation.php"); ?>

    <section class="container">
        <!-- Profile Pic -->
        <div class="profile-pic-container-kevinn">
            <img src="IMAGE/kevinn.jpg" alt="Profile Photo" class="profile-pic-kevinn">
        </div>

        <!-- Basic Info -->
        <div class="basic-info-kevinn">
            <h1 class="name-kevinn">Kevinn Jose Novellino Shen</h1>
            <p class="student-id-kevinn">Student ID: 105801952</p>
            <p class="course-kevinn">Bachelor of Computer Science</p>
        </div>

        <!-- Profile table -->
        <table class="profile-table-kevinn">
            <tr>
                <th>Demographic Information</th>
                <td>
                    Born in 2007, Male, Indonesian, Undergraduate Student
                </td>
            </tr>
            <tr>
                <th>Description of Hometown</th>
                <td>
                    I was born in Pontianak, West Kalimantan, Indonesia. Pontianak is a city located on the island of Borneo, which known for its unique geographical location as it lies on the equator. The city is famous for its rich cultural such as ethnic diversity, traditional festivals, and culinary delights. Despite being a relatively small city than other provincial capital, Pontianak still gives a big impression to me and leaving beautiful memories for eightteen years of my life.
            </tr>
            <tr>
                <th>Greatest Achievement</th>
                <td>
                    One of my greatest achievements was when I successfully manage to be the ranking one student in my high school in my final year. It was a result of my dedication and hardwork throughout the year. Even though it is not an easy journey, I was able to overcome the challenges that come to my way and stay focused on my own goals. Although it is not a big achievement, it still gives me a sense of pride and accomplishment that I will always remember.
                </td>
            </tr>
            <tr>
                <th>Favorite Things(books, music, movies, games)</th>
                <td>
                  I really enjoy watching TV series, especially those with mystery, thriller, and horror genres. One of my favorite TV series is "Twin Peaks" which is known for its unique storytelling and surreal atmosphere. I also enjoy watching football matches, particularly those involving my favorite team, Manchester City. The feeling of happiness I get after my favorite team wins is one of the reasons I love football.
                </td>
            </tr>
        </table>
        <div class="button-group">
        <a href="mailto:105801952@students.swinburne.edu.my" class="email-button">Email me</a>
        <a href="profile.html" class="back-button">Back to Profiles</a>
        </div>
    </section>

    <!-- Footer  -->
    <?php include("footer.php"); ?>
        
</body>
</html>