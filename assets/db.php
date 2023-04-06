<?php
$dbhost = 'localhost';
$dbuser = 'scoresys';
$dbpass = 'yourlieinapril';
$dbname = 'scoring';

function db_open()
{
    global $dbhost, $dbuser, $dbpass, $dbname;
    global $conn;
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_set_charset($conn, "utf8mb4");
}

function db_query($query)
{
    global $conn;
    error_log("DatabaseLog: Query is $query");
    $result = $conn->query($query);
    print($conn->error);

    return $result;
}

function db_fetch_array($result)
{
    return $result->fetch_array();
}

function db_fetch_object($result)
{
    $array = $result->fetch_object();
    print($conn->error);

    return $array;
}

function db_num_rows($result)
{
    return $result->num_rows;
}

function db_insert_id()
{
    global $conn;
    return $conn->insert_id;
}

function db_enum_html($type, $table, $field, $default = "")
{
    $array = db_fetch_object(db_query("SHOW COLUMNS FROM `" . $table . "` WHERE `field`='" . $field . "'"));
    eval(ereg_replace('enum', '$array = array', $array->Type) . ';');

    $html = "";
    foreach ($array as $element) {
        if ($type == "radio") {
            $html .= "<input type=\"radio\" class=\"radio\" id=\"" . $field . "_" . $element . "\" name=\"" . $field . "\" value=\"" . $element . "\" " . (($element == $default) ? "checked=\"checked\" " : "") . "/><label class=\"radio\" for=\"" . $field . "_" . $element . "\">" . $element . "</label>";
        } else if ($type == "checkbox") {
            $html .= "<input type=\"checkbox\" class=\"checkbox\" id=\"" . $field . "_" . $element . "\" name=\"" . $field . "\" value=\"" . $element . "\" " . (($element == $default) ? "checked=\"checked\" " : "") . "/><label class=\"checkbox\" for=\"" . $field . "_" . $element . "\">" . $element . "</label>";
        } else if ($type == "select") {
            $html .= "<option value=\"" . $element . "\"" . (($element == $default) ? " selected=\"selected\"" : "") . ">" . $element . "</option>";
        }
    }

    if ($type == "select") {
        $html = "<select id=\"" . $field . "\" name=\"" . $field . "\">" . $html . "</select>";
    }

    return $html;
}

function db_close()
{
    global $conn;
    $conn->close();
}

function fetch_query_count($query)
{
    $q = db_query($query);
    $rows = db_num_rows($q);
    error_log("$rows");
    return $rows;
}

function fetch_query($query, $field)
{
    $q = db_query($query);
    $dbg_nr = db_num_rows($q);
    error_log("dbg: debug num rows $dbg_nr");
    while ($row = $q->fetch_assoc()) {
        $return = $row["$field"];
    }
    return $return;
}
