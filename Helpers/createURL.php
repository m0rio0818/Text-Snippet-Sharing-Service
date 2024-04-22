<?php

function createURL(): string
{

    $postData = json_decode(file_get_contents("php://input"), true);
    $hashedValue = hash("sha256", json_encode($postData));
    return $hashedValue;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $hashedValue = createURL($_POST);
    header('Content-Type: application/json');
    echo json_encode(['hashedValue' => $hashedValue]);
}
