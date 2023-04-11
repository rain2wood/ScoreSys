<!DOCTYPE html>

<head></head>

<body>
    <?php
    include "../assets/db.php";
    db_open();

    db_query("TRUNCATE `bowling`");
    db_query("TRUNCATE `shooting`");
    db_query("TRUNCATE `typing`");
    db_query("UPDATE class_bowling SET score='0'");
    db_query("UPDATE locks SET locked='0'");
    ?>

    <script>
        function resetDone() {
            alert("All data in DB has been reset and all events are unlocked");
        }
        showPopup();
        window.location.href = "/index.php";
    </script>

    < </body>