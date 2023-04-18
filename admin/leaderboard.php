<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/styles/scoreboard.css">
    <title>ScoreSys - Bowling Scoring</title>
    <meta http-equiv="refresh" content="20">
</head>


<body>
    <?php
    include "../assets/db.php";
    db_open();
    include "../scoring/common.php";

    function find_top($db, $identifier)
    {
        if ($identifier == "typing") {
            $query = db_query("SELECT * FROM $db WHERE last='1' ORDER BY cpm DESC LIMIT 6");
        } else {
            $query = db_query("SELECT * FROM $db WHERE last='1' ORDER BY score DESC LIMIT 6");
        }
        $scores = array();
        $classes = array();
        if ($identifier != "class") {
            $classnos = array();
        }
        $result = new stdClass();
        $increment = 1;
        while ($row = $query->fetch_assoc()) {
            if ($identifier == "typing") {
                $scores[$increment] = $row["cpm"];
            } else {
                $scores[$increment] = $row["score"];
            }
            $classes[$increment] = $row["class"];
            if ($identifier != "class") {
                $classnos[$increment] = $row["number"];
            }
            $increment++;
        }

        while ($increment <= 6) {
            $scores[$increment] = "0";
            $classes[$increment] = "No Players";
            $increment++;
        }

        $result->classes = $classes;
        $result->scores = $scores;
        if ($identifier != "class") {
            $result->numbers = $classnos;
        }
        return $result;
    }
    ?>

    <header>
        <h1>Leaderboard</h1>
    </header>


    <div id="shooting-container">
        <p id="event-name">Shooting Competition</p>

        <?php
        $shooting_ranks = find_top("shooting", "not class");
        $shooting_cur = 1;
        $shooting_rank = 1;
        ?>
        <div id="top-card">

            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $shooting_ranks->classes[$shooting_cur] . ' ' . $shooting_ranks->numbers[$shooting_cur] . '</p>';
                echo '<p id="result-points">' . $shooting_ranks->scores[$shooting_cur] . ' marks scored</p>';
                $shooting_cur++;
                ?>
            </div>

            <div id="rank-circle">
                <p id="rank-number">1</p>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $shooting_ranks->classes[$shooting_cur] . ' ' . $shooting_ranks->numbers[$shooting_cur] . '</p>';
                echo '<p id="result-points">' . $shooting_ranks->scores[$shooting_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($shooting_ranks->scores[$shooting_cur] != $shooting_ranks->scores[$shooting_rank]) {
                    $shooting_rank++;
                }
                $shooting_cur++;
                echo "<p id='rank-number'>$shooting_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $shooting_ranks->classes[$shooting_cur] . ' ' . $shooting_ranks->numbers[$shooting_cur] . '</p>';
                echo '<p id="result-points">' . $shooting_ranks->scores[$shooting_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($shooting_ranks->scores[$shooting_cur] != $shooting_ranks->scores[$shooting_rank]) {
                    $shooting_rank++;
                }
                $shooting_cur++;
                echo "<p id='rank-number'>$shooting_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $shooting_ranks->classes[$shooting_cur] . ' ' . $shooting_ranks->numbers[$shooting_cur] . '</p>';
                echo '<p id="result-points">' . $shooting_ranks->scores[$shooting_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($shooting_ranks->scores[$shooting_cur] != $shooting_ranks->scores[$shooting_rank]) {
                    $shooting_rank++;
                }
                $shooting_cur++;
                echo "<p id='rank-number'>$shooting_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $shooting_ranks->classes[$shooting_cur] . ' ' . $shooting_ranks->numbers[$shooting_cur] . '</p>';
                echo '<p id="result-points">' . $shooting_ranks->scores[$shooting_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($shooting_ranks->scores[$shooting_cur] != $shooting_ranks->scores[$shooting_rank]) {
                    $shooting_rank++;
                }
                $shooting_cur++;
                echo "<p id='rank-number'>$shooting_rank</p>";
                ?>
            </div>
        </div>

        <div id="bottom-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $shooting_ranks->classes[$shooting_cur] . ' ' . $shooting_ranks->numbers[$shooting_cur] . '</p>';
                echo '<p id="result-points">' . $shooting_ranks->scores[$shooting_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($shooting_ranks->scores[$shooting_cur] != $shooting_ranks->scores[$shooting_rank]) {
                    $shooting_rank++;
                }
                $shooting_cur++;
                echo "<p id='rank-number'>$shooting_rank</p>";
                ?>
            </div>
        </div>
    </div>

    <div id="bowling-container">
        <p id="event-name">Bowling Competition</p>

        <?php
        $bowling_ranks = find_top("class_bowling", "class");
        $bowling_cur = 1;
        $bowling_rank = 1;
        ?>
        <div id="top-card">

            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $bowling_ranks->classes[$bowling_cur] . '</p>';
                echo '<p id="result-points">' . $bowling_ranks->scores[$bowling_cur] . ' marks scored</p>';
                $bowling_cur++;
                ?>
            </div>

            <div id="rank-circle">
                <p id="rank-number">1</p>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $bowling_ranks->classes[$bowling_cur] . '</p>';
                echo '<p id="result-points">' . $bowling_ranks->scores[$bowling_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($bowling_ranks->scores[$bowling_cur] != $bowling_ranks->scores[$bowling_rank]) {
                    $bowling_rank++;
                }
                $bowling_cur++;
                echo "<p id='rank-number'>$bowling_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $bowling_ranks->classes[$bowling_cur] . '</p>';
                echo '<p id="result-points">' . $bowling_ranks->scores[$bowling_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($bowling_ranks->scores[$bowling_cur] != $bowling_ranks->scores[$bowling_rank]) {
                    $bowling_rank++;
                }
                $bowling_cur++;
                echo "<p id='rank-number'>$bowling_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $bowling_ranks->classes[$bowling_cur] . '</p>';
                echo '<p id="result-points">' . $bowling_ranks->scores[$bowling_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($bowling_ranks->scores[$bowling_cur] != $bowling_ranks->scores[$bowling_rank]) {
                    $bowling_rank++;
                }
                $bowling_cur++;
                echo "<p id='rank-number'>$bowling_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $bowling_ranks->classes[$bowling_cur] . '</p>';
                echo '<p id="result-points">' . $bowling_ranks->scores[$bowling_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($bowling_ranks->scores[$bowling_cur] != $bowling_ranks->scores[$bowling_rank]) {
                    $bowling_rank++;
                }
                $bowling_cur++;
                echo "<p id='rank-number'>$bowling_rank</p>";
                ?>
            </div>
        </div>

        <div id="bottom-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $bowling_ranks->classes[$bowling_cur] . '</p>';
                echo '<p id="result-points">' . $bowling_ranks->scores[$bowling_cur] . ' marks scored</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($bowling_ranks->scores[$bowling_cur] != $bowling_ranks->scores[$bowling_rank]) {
                    $bowling_rank++;
                }
                $bowling_cur++;
                echo "<p id='rank-number'>$bowling_rank</p>";
                ?>
            </div>
        </div>
    </div>

    <div id="typing-container">
        <p id="event-name">Typing Competition</p>

        <?php
        $typing_ranks = find_top("typing", "typing");
        $typing_cur = 1;
        $typing_rank = 1;
        ?>
        <div id="top-card">

            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $typing_ranks->classes[$typing_cur] . ' ' . $typing_ranks->numbers[$typing_cur] . '</p>';
                echo '<p id="result-points">' . $typing_ranks->scores[$typing_cur] . ' Characters Per Minute</p>';
                $typing_cur++;
                ?>
            </div>

            <div id="rank-circle">
                <p id="rank-number">1</p>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $typing_ranks->classes[$typing_cur] . ' ' . $typing_ranks->numbers[$typing_cur] . '</p>';
                echo '<p id="result-points">' . $typing_ranks->scores[$typing_cur] . ' Characters Per Minute</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($typing_ranks->scores[$typing_cur] != $typing_ranks->scores[$typing_rank]) {
                    $typing_rank++;
                }
                $typing_cur++;
                echo "<p id='rank-number'>$typing_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $typing_ranks->classes[$typing_cur] . ' ' . $typing_ranks->numbers[$typing_cur] . '</p>';
                echo '<p id="result-points">' . $typing_ranks->scores[$typing_cur] . ' Characters Per Minute</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($typing_ranks->scores[$typing_cur] != $typing_ranks->scores[$typing_rank]) {
                    $typing_rank++;
                }
                $typing_cur++;
                echo "<p id='rank-number'>$typing_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $typing_ranks->classes[$typing_cur] . ' ' . $typing_ranks->numbers[$typing_cur] . '</p>';
                echo '<p id="result-points">' . $typing_ranks->scores[$typing_cur] . ' Characters Per Minute</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($typing_ranks->scores[$typing_cur] != $typing_ranks->scores[$typing_rank]) {
                    $typing_rank++;
                }
                $typing_cur++;
                echo "<p id='rank-number'>$typing_rank</p>";
                ?>
            </div>
        </div>

        <div id="mid-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $typing_ranks->classes[$typing_cur] . ' ' . $typing_ranks->numbers[$typing_cur] . '</p>';
                echo '<p id="result-points">' . $typing_ranks->scores[$typing_cur] . ' Characters Per Minute</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($typing_ranks->scores[$typing_cur] != $typing_ranks->scores[$typing_rank]) {
                    $typing_rank++;
                }
                $typing_cur++;
                echo "<p id='rank-number'>$typing_rank</p>";
                ?>
            </div>
        </div>

        <div id="bottom-card">
            <div id="result-div">
                <?php
                echo '<p id="result-class">' . $typing_ranks->classes[$typing_cur] . ' ' . $typing_ranks->numbers[$typing_cur] . '</p>';
                echo '<p id="result-points">' . $typing_ranks->scores[$typing_cur] . ' Characters Per Minute</p>';
                ?>
            </div>

            <div id="rank-circle">
                <?php
                if ($typing_ranks->scores[$typing_cur] != $typing_ranks->scores[$typing_rank]) {
                    $typing_rank++;
                }
                $typing_cur++;
                echo "<p id='rank-number'>$typing_rank</p>";
                ?>
            </div>
        </div>
    </div>

</body>