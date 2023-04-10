<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/assets/styles/common.css">
    <title>ScoreSys - Shooting Scoring</title>
</head>

<body>

    <?php
    include "../assets/db.php";
    db_open();
    session_start();
    $class_nocache = 0;
    $number_nocache = 0;
    $fhit_nocache = 0;
    $shit_nocache = 0;
    include "common.php"; // include common library

    $lock_status = get_lock_status("shooting");
    if ($lock_status == 1) {
        header("Location: /index.php");
    }

    if (isset($_POST['save'])) {
        error_log("Shooting: SAVE is set. GOODBYE!");
        header("Location: /scoring/handler.php?event=shooting&class=$tc&classno=$tn&score=$fh");
        exit();
    }

    if (isset($_POST['discard'])) {
        session_unset();
        session_destroy();
        unset($_POST);
        header("Location: " . $_SERVER['REQUEST_URI']);
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

    <!-- Event Notifier -->
    <div id="info-card">
        <div style="background: #564AF7;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M8 12h9m-9 0l-2-2H2l2 2-2 2h4l2-2zm9 0l-2-2m2 2l-2 2M16 22.5c2.761 0 5-4.701 5-10.5S18.761 1.5 16 1.5 11 6.201 11 12s2.239 10.5 5 10.5z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <a href="/index.php">
            <div id="desc-div">
                <p id="col-text">Shooting Mode</p>
                <p id="col-desc">Tap to Change Event</p>
            </div>
        </a>
    </div>

    <div id="card-div"></div>

    <!-- Form to query other data based on class and class number -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- Class -->
        <div id="top-card">
            <div style="background: #46B1E3;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M1 20v-1a7 7 0 017-7v0a7 7 0 017 7v1" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M13 14v0a5 5 0 015-5v0a5 5 0 015 5v.5" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M8 12a4 4 0 100-8 4 4 0 000 8zM18 9a3 3 0 100-6 3 3 0 000 6z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Class</p>
            <!-- Dropdown menu -->
            <select name="target-class" onchange="this.form.submit();">
                <?php
                $classes = array("1A", "1B", "1C", "1D", "1E", "2A", "2B", "2C", "2D", "3A", "3B", "3C", "3D", "3E", "4A", "4B", "4C", "4D", "4E", "5A", "5B", "5C", "5D", "5E");
                foreach ($classes as $class) {
                    if ($class_nocache == 0 && $tc == $class) {
                        echo "<option value='" . strtolower($class) . "' selected>" . $class . "</option>";
                    } else {
                        echo "<option value='" . strtolower($class) . "'>" . $class . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </form>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- Class Number -->
        <div id="mid-card">
            <div style="background: #61CFBE;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M9 5h12M5 7V3L3.5 4.5M5.5 14h-2l1.905-2.963a.428.428 0 00.072-.323C5.42 10.456 5.216 10 4.5 10c-1 0-1 .889-1 .889s0 0 0 0v.222M4 19h.5a1 1 0 011 1v0a1 1 0 01-1 1h-1M3.5 17h2L4 19M9 12h12M9 19h12" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Class Number</p>
            <select name="target-number" onchange="this.form.submit();">
                <?php
                $cns = array(); // HACK: Generate Class number 1 to 40
                for ($i = 1; $i <= 40; $i++) {
                    $cns[] = $i;
                }
                foreach ($cns as $cn) {
                    if ($number_nocache == 0 && $tn == $cn) {
                        echo "<option value='" . strtolower($cn) . "' selected>" . $cn . "</option>";
                    } else {
                        echo "<option value='" . strtolower($cn) . "'>" . $cn . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </form>
    <div id="bottom-card">
        <div style="background: #64BB5C;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M11 8.5L9.8 9l-7.448 3.386a.6.6 0 00-.352.546v.136a.6.6 0 00.352.546l8.82 4.01a2 2 0 001.656 0l8.82-4.01a.6.6 0 00.352-.546v-.136a.6.6 0 00-.352-.546L14.2 9 13 8.5" stroke="#E7E6FE" stroke-width="1.5"></path>
                <path d="M22 13v4.112a.6.6 0 01-.354.547l-8.825 3.972a2 2 0 01-1.642 0l-8.825-3.972A.6.6 0 012 17.112V13" stroke="#E7E6FE" stroke-width="1.5"></path>
                <path d="M12 8a3 3 0 110-6 3 3 0 010 6z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11 8v5a1 1 0 001 1v0a1 1 0 001-1V8" stroke="#E7E6FE" stroke-width="1.5"></path>
                <path d="M16 13h1" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Times Played</p>
        <?php
        $target_count = fetch_query_count("SELECT * FROM shooting WHERE class='$tc' AND number='$tn'");
        echo "<p id='col-option'>$target_count</p>";
        ?>
    </div>

    <div id='card-div'></div>

    <!-- Form to get user score. Assists should calculate score manually. -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="user-score">
        <!-- First Hit -->
        <div id="top-card" onclick="getScore()">
            <div style="background: #A5D61D;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M5 15l.95-10.454A.6.6 0 016.548 4h13.795a.6.6 0 01.598.654l-.891 9.8a.6.6 0 01-.598.546H5zm0 0l-.6 6" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Player Score</p>
            <!-- Hidden input for JScript to hook -->
            <input type="hidden" id="first-hit" name="first-hit"> <!-- Hook back onto common func -->
            <script>
                function getScore() {
                    var score = prompt("Enter user score:");
                    document.getElementById("first-hit").value = score;
                    document.getElementById("user-score").submit();
                }
            </script>
            <?php
            if (isset($_POST['first-hit']) || isset($_SESSION['first-hit'])) {
                echo "<p id='col-option'>$fh</p>";
            } else {
                echo "<p id='col-option'>0</p>";
            }
            ?>
        </div>
    </form>

    <!-- Second Hit -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div id="bottom-card">
            <div style="background: #64BB5C;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M9 5h12M5 7V3L3.5 4.5M5.5 14h-2l1.905-2.963a.428.428 0 00.072-.323C5.42 10.456 5.216 10 4.5 10c-1 0-1 .889-1 .889s0 0 0 0v.222M4 19h.5a1 1 0 011 1v0a1 1 0 01-1 1h-1M3.5 17h2L4 19M9 12h12M9 19h12" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Expected Player Rank</p>
            <?php
            if (isset($_POST['first-hit']) || isset($_SESSION['first-hit'])) {
                $player_rank = fetch_query("SELECT COUNT(*) + 1 AS 'rank' FROM shooting WHERE score > $fh", "rank");
            } else {
                $player_rank = "/";
            }
            echo "<p id='col-option'>$player_rank</p>";
            ?>
        </div>
    </form>

    <form method="post">
        <input id="discard" name="discard" type="submit" value="DISCARD">
        <input id="save" name="save" type="submit" value="SAVE">
    </form>

</body>