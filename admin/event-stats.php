<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/assets/styles/common.css">
    <title>ScoreSys - Event Stats</title>
</head>

<body>
    <?php
    include('../assets/db.php');
    db_open();
    session_start();
    include('../scoring/common.php');

    if (isset($_POST['check'])) {
        header("Location: " . $_SERVER['REQUEST_URI']);
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

    <div id="info-card">
        <div style="background: #564AF7;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.5 8a.5.5 0 100-1 .5.5 0 000 1zM7.5 11a.5.5 0 100-1 .5.5 0 000 1zM11.5 13a.5.5 0 100-1 .5.5 0 000 1z" fill="#E7E6FE" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <div id="desc-div">
            <p id="col-text">Participation Query</p>
            <p id="col-desc">17-21 April 2023</p>
        </div>
    </div>

    <div id="card-div"></div>

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
        <div id="bottom-card">
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

    <div id="card-div"></div>

    <!-- Bowling Count -->
    <div id="top-card">
        <div style="background: #64BB5C;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.5 8a.5.5 0 100-1 .5.5 0 000 1zM7.5 11a.5.5 0 100-1 .5.5 0 000 1zM11.5 13a.5.5 0 100-1 .5.5 0 000 1z" fill="#E7E6FE" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Bowling Times Played</p>
        <?php
        $bowling_count = fetch_query("SELECT COUNT(*) AS bowling_count FROM bowling WHERE class='$tc' AND number='$tn'", "bowling_count");
        echo "<p id='col-option'>$bowling_count</p>";
        ?>
    </div>

    <div id="mid-card">
        <div style="background: #A5D61D;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M8 12h9m-9 0l-2-2H2l2 2-2 2h4l2-2zm9 0l-2-2m2 2l-2 2M16 22.5c2.761 0 5-4.701 5-10.5S18.761 1.5 16 1.5 11 6.201 11 12s2.239 10.5 5 10.5z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Shooting Times Played</p>
        <?php
        $shooting_count = fetch_query("SELECT COUNT(*) AS shooting_count FROM shooting WHERE class='$tc' AND number='$tn'", "shooting_count");
        echo "<p id='col-option'>$shooting_count</p>";
        ?>
    </div>

    <div id="bottom-card">
        <div style="background: #AC49F5;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M3 19V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="#E7E6FE" stroke-width="1.5"></path>
                <path d="M14 10h3M17 14h-5l-1.667-4H7" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Typing Times Played</p>
        <?php
        $typing_count = fetch_query("SELECT COUNT(*) AS typing_count FROM typing WHERE class='$tc' AND number='$tn'", "typing_count");
        echo "<p id='col-option'>$typing_count</p>";
        ?>
    </div>

    <div id="card-div"></div>

    <div id="top-card">
        <div style="background: #E64566;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.5 8a.5.5 0 100-1 .5.5 0 000 1zM7.5 11a.5.5 0 100-1 .5.5 0 000 1zM11.5 13a.5.5 0 100-1 .5.5 0 000 1z" fill="#E7E6FE" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Bowling Rank</p>
        <?php
        $bowling_rank = fetch_query("SELECT COUNT(*) + 1 AS bowling_rank FROM bowling WHERE score > (SELECT MAX(score) FROM bowling WHERE class='$tc' AND number='$tn');", "bowling_rank");
        $bowling_rows = fetch_query_count("SELECT * FROM bowling WHERE class='$tc' AND number='$tn'");
        if ($bowling_rows == 0) {
            $bowling_rank = "/";
        }
        echo "<p id='col-option'>$bowling_rank</p>";
        ?>
    </div>

    <div id="mid-card">
        <div style="background: #E84026;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M8 12h9m-9 0l-2-2H2l2 2-2 2h4l2-2zm9 0l-2-2m2 2l-2 2M16 22.5c2.761 0 5-4.701 5-10.5S18.761 1.5 16 1.5 11 6.201 11 12s2.239 10.5 5 10.5z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Shooting Rank</p>
        <?php
        $shooting_rank = fetch_query("SELECT COUNT(*) + 1 AS shooting_rank FROM shooting WHERE score > (SELECT MAX(score) FROM shooting WHERE class='$tc' AND number='$tn');", "shooting_rank");
        $shooting_rows = fetch_query_count("SELECT * FROM shooting WHERE class='$tc' AND number='$tn'");
        if ($shooting_rows == 0) {
            $shooting_rank = "/";
        }
        echo "<p id='col-option'>$shooting_rank</p>";
        ?>
    </div>

    <div id="bottom-card">
        <div style="background: #ED6F21;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M3 19V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="#E7E6FE" stroke-width="1.5"></path>
                <path d="M14 10h3M17 14h-5l-1.667-4H7" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Typing Rank</p>
        <?php
        $typing_rank = fetch_query("SELECT COUNT(*) AS typing_rank FROM typing WHERE cpm > (SELECT MAX(cpm) FROM typing WHERE class='$tc' AND number='$tn');", "typing_rank");
        $typing_rows = fetch_query_count("SELECT * FROM typing WHERE class='$tc' AND number='$tn'");
        if ($typing_rows == 0) {
            $typing_rank = "/";
        }
        echo "<p id='col-option'>$typing_rank</p>";
        ?>
    </div>

    <form method="post">
        <input id="discard" name="discard" type="submit" value="DISCARD">
        <input id="save" name="check" type="submit" value="CHECK">
    </form>

</body>