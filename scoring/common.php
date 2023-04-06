<?php

// define target class
if (isset($_POST['target-class'])) {
    $tc = strtoupper($_POST['target-class']);
    $_SESSION['target-class'] = $tc;
} else if (!isset($_SESSION['target-class'])) {
    $tc = "1A";
    $class_nocache = 1;
} else {
    $tc = $_SESSION['target-class'];
}
error_log("CommonLog: Class is $tc");

// define target class number
if (isset($_POST['target-number'])) {
    $tn = $_POST['target-number'];
    $_SESSION['target-number'] = $tn;
} else if (!isset($_SESSION['target-number'])) {
    $tn = "1";
    $number_nocache = 1;
} else {
    $tn = $_SESSION['target-number'];
}
error_log ("CommonLog: Class Number is $tn");


// define target first hit
if (isset($_POST['first-hit'])) {
    $fh = strtoupper($_POST['first-hit']);
    $_SESSION['first-hit'] = $fh;
} else if (!isset($_SESSION['first-hit'])) {
    $fh = "0";
    $fhit_nocache == 1;
} else {
    $fh = strtoupper($_SESSION['first-hit']);
}
error_log("Commonlog: Second Hit is $fh");

// define target second hit
if (isset($_POST['second-hit'])) {
    $sh = $_POST['second-hit'];
    $_SESSION['second-hit'] = $sh;
} else if (!isset($_SESSION['first-hit'])) {
    $sh = "0";
    $shit_nocache == 1;
} else {
    $sh = $_SESSION['second-hit'];
}
error_log("Commonlog: Second Hit is $sh");

?>
