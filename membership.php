<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop based in Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Membership Form - Root Flower</title>
</head>

    <!-- Navigation bar -->
    <?php include("navigation.php"); ?>

    <main class="membership-reg-container">
        <section class="membership-text">
        <h1>Membership Registration</h1>
        <p>Fill out the form below to reserve your spot.</p>
        </section>

    <div class="membership-reg">
    <form id="membership-form" method="post" action="/submit-membership">

        <fieldset>
        <legend>Membership Details</legend>

        <!-- First Name -->
        <label for="fname">First Name *</label>
        <input id="fname" name="fname" type="text" 
                maxlength="25" required
                pattern="^[A-Za-zÀ-ÖØ-öø-ÿ' -]+$"
                title="Letters, spaces, apostrophes and hyphens only">

        <!-- Last Name -->
        <label for="lname">Last Name *</label>
        <input id="lname" name="lname" type="text" 
                maxlength="25" required
                pattern="^[A-Za-zÀ-ÖØ-öø-ÿ' -]+$"
                title="Letters, spaces, apostrophes and hyphens only">

        <!-- Email Address -->
        <label for="email">Email Address:</label>
        <input id="email" name="email" type="email" 
                placeholder="you@example.com" required>

        <!-- Login ID -->
        <label for="loginID">Login ID:</label>
        <input id="loginID" name="loginID" type="text" 
                maxlength="10" required
                pattern="^[A-Za-z]+$"
                title="Alphabetical characters only">

        <!-- Password -->
        <label for="password">Password:</label>
        <input id="password" name="password" type="password" 
                maxlength="25" required
                pattern="^[A-Za-z]+$"
                title="Alphabetical characters only">

        </fieldset>

        <div class="button-group-enquiry">        
            <button type="submit">SEND ENQUIRY</button>
            <button type="reset" class="clear-btn">Reset Form</button>
        </div>

    </form>
    </div>
    </main>

    <!-- Footer  -->
    <?php include("footer.php"); ?>
    
    <a href="profile.html" class="profile-icon" title="Go to our profile page">
        <img src="IMAGE/profile.svg" alt="Profile">
    </a>

</body>
</html>
