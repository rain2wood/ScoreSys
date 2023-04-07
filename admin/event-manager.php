<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/assets/styles/common.css">
    <title>ScoreSys - Statistics</title>
</head>

<body>
    <?php
    include("../assets/db.php");
    db_open();
    if ((isset($_POST['bowling-lock'])) || (isset($_POST['shooting-lock'])) || (isset($_POST['typing-lock']))) {
        $bowling_lock = $_POST['bowling-lock'];
        $shooting_lock = $_POST['shooting-lock'];
        $typing_lock = $_POST['typing-lock'];
        if (isset($_POST['bowling-lock'])) {
            if ($bowling_lock == 1) {
                db_query("UPDATE locks SET locked=1 WHERE event='bowling'");
            } else {
                db_query("UPDATE locks SET locked=0 WHERE event='bowling'");
            }
        }
        if (isset($_POST['shooting-lock'])) {
            if ($shooting_lock == 1) {
                db_query("UPDATE locks SET locked=1 WHERE event='shooting'");
            } else {
                db_query("UPDATE locks SET locked=0 WHERE event='shooting'");
            }
        }
        if (isset($_POST['typing-lock'])) {
            if ($typing_lock == 1) {
                db_query("UPDATE locks SET locked=1 WHERE event='typing'");
            } else {
                db_query("UPDATE locks SET locked=0 WHERE event='typing'");
            }
        }
        unset($_POST);
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
    ?>

    <header>
        <div id="heading-back">
            <a href="/index.php">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
                    <path d="M15 6l-6 6 6 6" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
            <h2>ScoreSys</h2>
        </div>
    </header>

    <div id="xlcard-div"></div>
    <div id="xlcard-div"></div>

    <div id="info-card">
        <div style="background: #564AF7;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M16 12h1.4a.6.6 0 01.6.6v6.8a.6.6 0 01-.6.6H6.6a.6.6 0 01-.6-.6v-6.8a.6.6 0 01.6-.6H8m8 0V8c0-1.333-.8-4-4-4S8 6.667 8 8v4m8 0H8" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <a href="/index.php">
            <div id="desc-div">
                <p id="col-text">Event Manager</p>
                <p id="col-desc">17-21 April 2023</p>
            </div>
        </a>
    </div>

    <div id="card-div"></div>

    <!-- Bowling: Player Count -->
    <div id="top-card">
        <div style="background: #46B1E3;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.5 8a.5.5 0 100-1 .5.5 0 000 1zM7.5 11a.5.5 0 100-1 .5.5 0 000 1zM11.5 13a.5.5 0 100-1 .5.5 0 000 1z" fill="#E7E6FE" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Bowling Players</p>
        <?php
        $bowling_count = fetch_query_count("SELECT * FROM bowling");
        echo "<p id='col-option'>$bowling_count</p>";
        ?>
    </div>

    <!-- Bowling: Lock Event -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div id="bottom-card">
            <div style="background: #61CFBE;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M16 12h1.4a.6.6 0 01.6.6v6.8a.6.6 0 01-.6.6H6.6a.6.6 0 01-.6-.6v-6.8a.6.6 0 01.6-.6H8m8 0V8c0-1.333-.8-4-4-4S8 6.667 8 8v4m8 0H8" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Event Status</p>
            <select name="bowling-lock" onchange="this.form.submit();">
                <?php
                $bowling_status = fetch_query("SELECT locked FROM locks WHERE event='bowling'", "locked");
                if ($bowling_status == 1) {
                    echo "<option value='1' selected>Locked</option>";
                    echo "<option value='0'>Unlock</option>";
                } else {
                    echo "<option value='0' selected>Unlocked</option>";
                    echo "<option value='1'>Lock</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <div id="card-div"></div>

    <!-- Shooting: Player Count -->
    <div id="top-card">
        <div style="background: #64BB5C;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.5 8a.5.5 0 100-1 .5.5 0 000 1zM7.5 11a.5.5 0 100-1 .5.5 0 000 1zM11.5 13a.5.5 0 100-1 .5.5 0 000 1z" fill="#E7E6FE" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Shooting Players</p>
        <?php
        $shooting_count = fetch_query_count("SELECT * FROM shooting");
        echo "<p id='col-option'>$shooting_count</p>";
        ?>
    </div>

    <!-- Shooting: Lock Event -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div id="bottom-card">
            <div style="background: #A5D61D;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M16 12h1.4a.6.6 0 01.6.6v6.8a.6.6 0 01-.6.6H6.6a.6.6 0 01-.6-.6v-6.8a.6.6 0 01.6-.6H8m8 0V8c0-1.333-.8-4-4-4S8 6.667 8 8v4m8 0H8" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Event Status</p>
            <select name="shooting-lock" onchange="this.form.submit();">
                <?php
                $shooting_status = fetch_query("SELECT locked FROM locks WHERE event='shooting'", "locked");
                if ($shooting_status == 1) {
                    echo "<option value='1' selected>Locked</option>";
                    echo "<option value='0'>Unlock</option>";
                } else {
                    echo "<option value='0' selected>Unlocked</option>";
                    echo "<option value='1'>Lock</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <div id="card-div"></div>

    <div id="top-card">
        <div style="background: #AC49F5;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M3 19V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="#E7E6FE" stroke-width="1.5"></path>
                <path d="M14 10h3M17 14h-5l-1.667-4H7" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Typing Players</p>
        <?php
        $typing_count = fetch_query_count("SELECT * FROM typing");
        echo "<p id='col-option'>$typing_count</p>";
        ?>
    </div>

    <!-- Typing: Lock Event -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div id="bottom-card">
            <div style="background: #A5D61D;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M16 12h1.4a.6.6 0 01.6.6v6.8a.6.6 0 01-.6.6H6.6a.6.6 0 01-.6-.6v-6.8a.6.6 0 01.6-.6H8m8 0V8c0-1.333-.8-4-4-4S8 6.667 8 8v4m8 0H8" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Event Status</p>
            <select name="typing-lock" onchange="this.form.submit();">
                <?php
                $typing_status = fetch_query("SELECT locked FROM locks WHERE event='typing'", "locked");
                if ($typing_status == 1) {
                    echo "<option value='1' selected>Locked</option>";
                    echo "<option value='0'>Unlock</option>";
                } else {
                    echo "<option value='0' selected>Unlocked</option>";
                    echo "<option value='1'>Lock</option>";
                }
                ?>
            </select>
        </div>
    </form>
</body>