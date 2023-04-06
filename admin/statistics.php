<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/assets/styles/common.css">
    <title>ScoreSys - Statistics</title>
</head>

<body>
    <?php
    include("../assets/db.php");
    db_open();
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
                <path d="M16 20v-8m0 0l3 3m-3-3l-3 3M4 14l8-8 3 3 5-5" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <a href="/index.php">
            <div id="desc-div">
                <p id="col-text">Event Statistics</p>
                <p id="col-desc">17-21 April 2023</p>
            </div>
        </a>
    </div>

    <div id="card-div"></div>

    <!-- BOWLING: Player Count -->
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

    <!-- BOWLING: Highest Score -->
    <div id="mid-card">
        <div style="background: #64BB5C;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M9 5h12M5 7V3L3.5 4.5M5.5 14h-2l1.905-2.963a.428.428 0 00.072-.323C5.42 10.456 5.216 10 4.5 10c-1 0-1 .889-1 .889s0 0 0 0v.222M4 19h.5a1 1 0 011 1v0a1 1 0 01-1 1h-1M3.5 17h2L4 19M9 12h12M9 19h12" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>

        </div>
        <p id="item-title">Bowling Top Score</p>
        <?php
        $bowling_score = fetch_query("SELECT MAX(score) AS bowling_score FROM bowling", "bowling_score");
        echo "<p id='col-option'>$bowling_score</p>";
        ?>
    </div>

    <!-- BOWLING: Top Class -->
    <div id="bottom-card">
        <div style="background: #A5D61D;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M6.745 4h10.568s-.88 13.257-5.284 13.257c-2.15 0-3.461-3.164-4.239-6.4C6.976 7.468 6.745 4 6.745 4z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M17.313 4s.921-.983 1.687-1c1.5-.034 1.777 1 1.777 1 .294.61.529 2.194-.88 3.657-1.41 1.463-2.987 2.743-3.629 3.2M6.745 4S5.785 3.006 5 3c-1.5-.012-1.777 1-1.777 1-.294.61-.529 2.194.88 3.657a29.896 29.896 0 003.687 3.2M8.507 20c0-1.829 3.522-2.743 3.522-2.743s3.523.914 3.523 2.743H8.507z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>

        </div>
        <p id="item-title">Bowling Top Class</p>
        <?php
        $bowling_class = fetch_query("SELECT class FROM class_bowling WHERE score=(SELECT MAX(score) FROM class_bowling)", "class");
        echo "<p id='col-option'>$bowling_class</p>";
        ?>
    </div>

    <div id="card-div"></div>

    <!-- Shooting: Player Count -->
    <div id="top-card">
        <div style="background: #46B1E3;" id="icon-div">
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

    <!-- Shooting: Highest Score -->
    <div id="mid-card">
        <div style="background: #AC49F5;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M9 5h12M5 7V3L3.5 4.5M5.5 14h-2l1.905-2.963a.428.428 0 00.072-.323C5.42 10.456 5.216 10 4.5 10c-1 0-1 .889-1 .889s0 0 0 0v.222M4 19h.5a1 1 0 011 1v0a1 1 0 01-1 1h-1M3.5 17h2L4 19M9 12h12M9 19h12" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>

        </div>
        <p id="item-title">Shooting Top Score</p>
        <?php
        $shooting_score = fetch_query("SELECT MAX(score) AS shooting_score FROM shooting", "shooting_score");
        echo "<p id='col-option'>$shooting_score</p>";
        ?>
    </div>

    <!-- Shooting: Mean Score -->
    <div id="bottom-card">
        <div style="background: #E64566;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M4 19V5a2 2 0 012-2h13.4a.6.6 0 01.6.6v13.114M6 17h14M6 21h14" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M6 21a2 2 0 110-4" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M10 10h4" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M12 13.01l.01-.011M12 7.01l.01-.011" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Shooting Mean Score</p>
        <?php
        $shooting_avg = fetch_query("SELECT AVG(score) as shooting_avg FROM shooting", "shooting_avg");
        echo "<p id='col-option'>$shooting_avg</p>";
        ?>
    </div>

    <div id="card-div"></div>

    <!-- Typing: Players -->
    <div id="top-card">
        <div style="background: #46B1E3;" id="icon-div">
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

    <!-- Typing: Top CPM -->
    <div id="mid-card">
        <div style="background: #AC49F5;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M9 5h12M5 7V3L3.5 4.5M5.5 14h-2l1.905-2.963a.428.428 0 00.072-.323C5.42 10.456 5.216 10 4.5 10c-1 0-1 .889-1 .889s0 0 0 0v.222M4 19h.5a1 1 0 011 1v0a1 1 0 01-1 1h-1M3.5 17h2L4 19M9 12h12M9 19h12" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>

        </div>
        <p id="item-title">Typing Top Score</p>
        <?php
        $typing_score = fetch_query("SELECT MAX(cpm) AS typing_score FROM typing", "typing_score");
        echo "<p id='col-option'>$typing_score</p>";
        ?>
    </div>

    <!-- Typing: Mean CPM -->
    <div id="bottom-card">
        <div style="background: #A5D61D;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M4 19V5a2 2 0 012-2h13.4a.6.6 0 01.6.6v13.114M6 17h14M6 21h14" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M6 21a2 2 0 110-4" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M10 10h4" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M12 13.01l.01-.011M12 7.01l.01-.011" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Typing Mean CPM</p>
        <?php
        $typing_avg = fetch_query("SELECT AVG(cpm) as typing_avg FROM typing", "typing_avg");
        echo "<p id='col-option'>$typing_avg</p>";
        ?>
    </div>

</body>