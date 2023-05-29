<!DOCTYPE html>
<html lang="en">
<?php 
    include 'repository/journalRepository.php';
    session_start(); 

    if (!isset($_SESSION["user"])) {
        $_SESSION["userId"] = 1;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>CoffeeNote - Home</title>
</head> 
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "coffee_note";

        $journalRepo = new JournalRepository($servername, $username, $password, $dbname);
        $thirdNavBar = "Account";
        if (isset($_SESSION["name"])) {
            $thirdNavBar = $_SESSION["name"];
        } else {
            header("Location: ../registerlogin/login-register/logout.php");
            die();
        }
    ?>
    <section class="navbar">
        <a href="#" class="active-page">Home</a>
        <a href="../list">Journal</a>
        <a href="../registerlogin/login-register/login.php"><?php echo $thirdNavBar; ?></a>
    </section>
    <hr style="color: #D1DEFD;">

    <div class="add-journal-btn">
        <a href="../journal/journal.html">Add New Journal</a>
    </div>

    <section class="stats-section">
        <div class="navbar">
            <p class="active-page">Weekly</a>
            <p>Monthly</a>
            <p>All</p>
        </div>
        <hr style="color: #D1DEFD;">
        <div class="stats-content">
            <div class="stat">
                <div>
                    <p>Amount of Coffee tried</p>
                    <strong>
                        <?php echo $journalRepo->getNumberOfCoffeeTried($_SESSION["userId"]); ?>
                    </strong>
                </div>

            </div>
            <div class="stat">
                <div>
                    <p>Average Rating</p>
                    <strong>
                        <?php echo $journalRepo->getAverageRating($_SESSION["userId"]); ?>
                    </strong>
                </div>
            </div>
            <div class="stat">
                <div>
                    <p>New Journal This Month</p>
                    <strong>
                        <?php echo $journalRepo->getJournalCountThisMonth($_SESSION["userId"]); ?>
                    </strong>
                </div>
            </div>
            <div class="stat">
                <div>
                    <p>Roaster Count</p>
                    <strong>
                        <?php
                            echo $journalRepo->getRoasterCount($_SESSION["userId"]);
                        ?>
                    </strong>
                </div>
            </div>
        </div>
        
    </section>

    <section class="recent-journal">
        <h2>Your Most Recent Journal</h2>
        <div class="thumbnails">
            <?php $thumbnails = $journalRepo->getJournalThumbnails($_SESSION["userId"]); ?>
            <?php foreach($thumbnails as $thumbnail): ?>
            <img src=<?= $thumbnail; ?> alt="thumbnail" height="100%" width="180em">
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
