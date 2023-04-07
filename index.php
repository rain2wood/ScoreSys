<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/assets/styles/common.css">
    <title>ScoreSys - Homepage</title>
</head>

<body>
    <header>
        <h1>ScoreSys</h1>
    </header>

    <div id="xlcard-div"></div>
    <div id="xlcard-div"></div>

    <!-- Info tab -->
    <div id="info-card">
        <div style="background: #564AF7;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M12 11.5v5M12 7.51l.01-.011M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <div id="desc-div">
            <p id="col-text">ScoreSys 0.1 | 20230403</p>
            <p id="col-desc">CSS really sucks</p>
        </div>
    </div>

    <div id="card-div"></div>

    <!-- Bowling scoring -->
    <a href="/scoring/bowling.php">
        <div id="top-card">
            <div style="background: #46B1E3;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M11.5 8a.5.5 0 100-1 .5.5 0 000 1zM7.5 11a.5.5 0 100-1 .5.5 0 000 1zM11.5 13a.5.5 0 100-1 .5.5 0 000 1z" fill="#E7E6FE" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Bowling Scoring</p>
        </div>
    </a>

    <!-- Shooting scoring -->
    <div id="mid-card">
        <div style="background: #61CFBE;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M8 12h9m-9 0l-2-2H2l2 2-2 2h4l2-2zm9 0l-2-2m2 2l-2 2M16 22.5c2.761 0 5-4.701 5-10.5S18.761 1.5 16 1.5 11 6.201 11 12s2.239 10.5 5 10.5z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Shooting Scoring</p>
    </div>

    <!-- Typing scoring -->
    <div id="bottom-card">
        <div style="background: #64BB5C;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M3 19V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="#E7E6FE" stroke-width="1.5"></path>
                <path d="M14 10h3M17 14h-5l-1.667-4H7" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Typing Scoring</p>

    </div>

    <div id="card-div"></div>

    <!-- Leaderboards -->
    <div id="top-card">
        <div style="background: #A5D61D;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M9 5h12M5 7V3L3.5 4.5M5.5 14h-2l1.905-2.963a.428.428 0 00.072-.323C5.42 10.456 5.216 10 4.5 10c-1 0-1 .889-1 .889s0 0 0 0v.222M4 19h.5a1 1 0 011 1v0a1 1 0 01-1 1h-1M3.5 17h2L4 19M9 12h12M9 19h12" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Leaderboards</p>
    </div>

    <!-- Individual Record Editor -->
    <div id="mid-card">
        <div style="background: #AC49F5;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M14.363 5.652l1.48-1.48a2 2 0 012.829 0l1.414 1.414a2 2 0 010 2.828l-1.48 1.48m-4.243-4.242l-9.616 9.615a2 2 0 00-.578 1.238l-.242 2.74a1 1 0 001.084 1.085l2.74-.242a2 2 0 001.24-.578l9.615-9.616m-4.243-4.242l4.243 4.242" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Edit Individual Records</p>
    </div>

    <!-- Participation Check -->
    <div id="mid-card">
        <div style="background: #E64566;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M17 17l4 4M3 11a8 8 0 1016 0 8 8 0 00-16 0z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">Participation Query</p>
    </div>

    <!-- Event Stat -->
    <a href="/admin/statistics.php">
        <div id="bottom-card">
            <div style="background: #E84026;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M16 20v-8m0 0l3 3m-3-3l-3 3M4 14l8-8 3 3 5-5" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Event Statistics</p>
        </div>
    </a>

    <div id="card-div"></div>

    <!-- Lock event -->
    <a href="/admin/event-manager.php">
        <div id="top-card">
            <div style="background: #E84026;" id="icon-div">
                <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                    <path d="M16 12h1.4a.6.6 0 01.6.6v6.8a.6.6 0 01-.6.6H6.6a.6.6 0 01-.6-.6v-6.8a.6.6 0 01.6-.6H8m8 0V8c0-1.333-.8-4-4-4S8 6.667 8 8v4m8 0H8" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <p id="item-title">Event Manager</p>
        </div>
    </a>

    <!-- phpmyadmin panel -->
    <div id="mid-card">
        <div style="background: #F9A01E;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M4 6v6s0 3 7 3 7-3 7-3V6" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11 3c7 0 7 3 7 3s0 3-7 3-7-3-7-3 0-3 7-3zM11 21c-7 0-7-3-7-3v-6M19 21a2 2 0 100-4 2 2 0 000 4z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M19 22a3 3 0 100-6 3 3 0 000 6z" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="0.3 2"></path>
            </svg>
        </div>
        <p id="item-title">phpMyAdmin</p>
    </div>

    <!-- source -->
    <div id="bottom-card">
        <div style="background: #F7CE00;" id="icon-div">
            <svg width="3.8vh" height="3.8vh" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#E7E6FE">
                <path d="M13.5 6L10 18.5M6.5 8.5L3 12l3.5 3.5M17.5 8.5L21 12l-3.5 3.5" stroke="#E7E6FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <p id="item-title">View Source Code</p>
    </div>

    <!-- UX: Allow more scrolling for user -->
    <div id="card-div"></div>

</body>