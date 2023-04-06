<?php
/* File Description: Handler to INSERT INTO databse for scoring */
include("../assets/db.php");
db_open();

// define variables from $_GET

$event = $_GET['event'];
$class = $_GET['class'];
$classno = $_GET['classno'];

$fh = $_GET['fhit'];
$sh = $_GET['shit'];

if ($event == "bowling") {
    $player_score = $fh * 2 + $sh;
    $cur_score = fetch_query("SELECT score FROM class_bowling WHERE class='$class'", "score");
    error_log("HANDLER: cur_score is $cur_score");
    $new_score = $cur_score + $player_score;
    db_query("UPDATE class_bowling SET score='$new_score' WHERE class='$class'");
    $cols = '(`class`, `number`, `first`, `second`, `score`)';
    $vals = "('$class', '$classno', '$fh', '$sh', '$player_score')";
} elseif ($event == "shooting") {
    $operand = $_GET['operand'];
} else {
    $wpm = $_GET['wpm'];
    $cpm = $_GET['cpm'];
    $mistakes = $_GET['mistakes'];
    $cols = '(`class`, `number`, `cpm`, `wpm`, `mistake`)';
    $vals = "('$class', '$classno', '$cpm', '$wpm', '$mistakes')";
}

db_query("INSERT INTO `$event` $cols VALUES $vals");

if (!($event == "typing")) {
    header("Location: /scoring/$event.php");
} else {
    header("Location: https://typing-af2bb.firebaseapp.com/board.html");
}
?>