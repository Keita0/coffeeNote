<!DOCTYPE html>
<html lang="en">
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
        $dbname = "aol";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $thirdNavBar = "Account";
        if (isset($_SESSION["user"])) {
            $thirdNavBar = $_SESSION["name"];
         }
    ?>
    <section class="navbar">
        <a href="#" class="active-page">Home</a>
        <a href="../list">Journal</a>
        <a href="../registerlogin/login-register"><?php echo $thirdNavBar; ?></a>
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
                        <?php
                            $sql = "SELECT COUNT(*) AS coffeeNum FROM journal WHERE user_id = " . $_SESSION["userId"];
                            $result = $conn->query($sql);

                            $row = 0;

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                            }

                            echo $row["coffeeNum"];
                        ?>
                    </strong>
                </div>

            </div>
            <div class="stat">
                <div>
                    <p>Average Rating</p>
                    <strong>
                        <?php
                            $sql = "SELECT AVG(rating) AS ratingAvg FROM journal WHERE user_id = " . $_SESSION["userId"];
                            $result = $conn->query($sql);

                            $ratingRow = 0;

                            if ($result->num_rows > 0) {
                                $ratingRow = $result->fetch_assoc();
                            }

                            echo $ratingRow["ratingAvg"];
                        ?>
                    </strong>
                </div>
            </div>
            <div class="stat">
                <div>
                    <p>New Journal This Month</p>
                    <strong>
                        <?php
                            $sql = "SELECT COUNT(*) AS journalCount FROM journal WHERE MONTH(created_at) = MONTH(CURRENT_TIMESTAMP) AND WHERE user_id = " . $_SESSION["userId"];
                            $result = $conn->query($sql);

                            $jrow = 0;

                            if ($result->num_rows > 0) {
                                $jrow = $result->fetch_assoc();
                            }

                            echo $jrow["journalCount"];
                        ?>
                    </strong>
                </div>
            </div>
            <div class="stat">
                <div>
                    <p>Roaster Count</p>
                    <strong>
                        <?php
                            $sql = "SELECT COUNT(roaster) AS journalCount FROM journal WHERE user_id = " . $_SESSION["userId"];
                            $result = $conn->query($sql);

                            $rrow = 0;

                            if ($result->num_rows > 0) {
                                $rrow = $result->fetch_assoc();
                            }

                            echo $rrow["journalCount"];
                        ?>
                    </strong>
                </div>
            </div>
        </div>
        
    </section>

    <section class="recent-journal">
        <h2>Your Most Recent Journal</h2>
        <div class="thumbnails">
            <img src="s" alt="thumbnail">
            <img src="a" alt="thumbnail">
            <img src="s" alt="thumbnail">
        </div>
    </section>
</body>
</html>