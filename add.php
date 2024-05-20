<?php
require_once "db.php";

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

//привожу ФИО к значению вида Иванов Иван Иванович
$name = trim(ucwords(strtolower($_POST["name"])));
$surname = trim(ucwords(strtolower($_POST["surname"])));
$patronymic = trim(ucwords(strtolower($_POST["patronymic"])));

$fullname = $surname." ".$name." ".$patronymic;
$email = $_POST["email"];
$phone = $_POST["phone"];
$city = $_POST["city"];

$sql = "INSERT INTO leads (fullname, email, phone, city, IP)
VALUES ('".$fullname."', '".$email."', '".$phone."', '".$city."', '".$user_ip."')";

if ($conn->query($sql) === TRUE) {
    echo "Лид отправлен";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}