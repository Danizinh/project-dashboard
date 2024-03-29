<?php

include dirname(__DIR__, 1) . "/include/conn.php";
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_SESSION['email'];
    $profession = $_POST['profession'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $addres = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $neighborhood = $_POST['neighborhood'];
    $bio = $_POST['bio'];

    $sql = $pdo->prepare("UPDATE profile SET name = :name, last_name = :last_name,
    profession =:profession, phone =:phone,birthday =:birthday, address =:address,
    city =:city,state =:state,country =:country,neighborhood =:neighborhood,
    bio =:bio WHERE email = :email");

    $sql->bindValue(":name", $name);
    $sql->bindValue(":last_name", $last_name);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":profession", $profession);
    $sql->bindValue(":phone", $phone);
    $sql->bindValue(":birthday", $birthday);
    $sql->bindValue(":address", $addres);
    $sql->bindValue(":city", $city);
    $sql->bindValue(":state", $state);
    $sql->bindValue(":country", $country);
    $sql->bindValue(":neighborhood", $neighborhood);
    $sql->bindValue(":bio", $bio);
    if ($sql->execute()) {
        $_SESSION['name'] = $name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email'] = $email;
        $_SESSION['profession'] = $profession;
        $_SESSION['phone'] = $phone;
        $_SESSION['birthday'] = $birthday;
        $_SESSION['address'] = $addres;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
        $_SESSION['country'] = $country;
        $_SESSION['neighborhood'] = $neighborhood;
        $_SESSION['bio'] = $bio;
    }

    header("Location:../php/profile.php");
}
exit();
