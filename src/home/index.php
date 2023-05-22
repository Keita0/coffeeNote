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
    <section class="navbar">
        <a href="#" class="active-page">Home</a>
        <a href="#">Journal</a>
        <?php
            if (isset($_SESSION["user"])) {
                <a href="#">$_SESSION["name"]</a>
             } else {
                 <a href="#">Account</a>
             }
        ?>
    </section>
    <hr style="color: #D1DEFD;">

    <div class="add-journal-btn">
        <a href="#">Add New Journal</a>
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
                    <strong>100</strong>
                </div>

            </div>
            <div class="stat">
                <div>
                    <p>Average Rating</p>
                    <strong>100</strong>
                </div>
            </div>
            <div class="stat">
                <div>
                    <p>New Journal This Month</p>
                    <strong>100</strong>
                </div>
            </div>
            <div class="stat">
                <div>
                    <p>Roaster Count</p>
                    <strong>100</strong>
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