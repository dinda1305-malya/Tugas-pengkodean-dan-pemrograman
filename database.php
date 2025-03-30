<?php
function executeQuery($query) {
    global $conn;
    return $conn->query($query);
}

function fetchAll($query) {
    $result = executeQuery($query);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

function fetchOne($query) {
    $result = executeQuery($query);
    return $result->fetch_assoc();
}
?>