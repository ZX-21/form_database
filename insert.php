<?php

require_once('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name1 = ($_POST['fname1']);
    $lname1 = ($_POST['lname1']);
    $phone1 = ($_POST['phone1']);
    $address1 = ($_POST['address1']);
    $province1 = ($_POST['province1']);
    $tambon1 = ($_POST['tambon1']);
    $sub1 = ($_POST['sub1']);
    $post1 = ($_POST['post1']);
    $date1 = ($_POST['date1']);

    $name2 = ($_POST['fname2']);
    $lname2 = ($_POST['lname2']);
    $phone2 = ($_POST['phone2']);
    $address2 = ($_POST['address2']);
    $province2 = ($_POST['province2']);
    $tambon2 = ($_POST['tambon2']);
    $sub2 = ($_POST['sub2']);
    $post2 = ($_POST['post2']);


$sql = "INSERT INTO `post`(`sender_firstname`, `sender_lastname`, `sender_phone`, `sender_address`, `sender_province`, `sender_amphoe`, 
`sender_subdistrict`, `sender_postcode`, `sender_date`, `reciever_firstname`, `receiver_lastname`, `receiver_phone`, 
`receiver_address`, `receiver_province`, `receiver_amphoe`, `receiver_subdistrict`, `receiver_postcode`) 
VALUES (:sender_firstname, :sender_lastname, :sender_phone, :sender_address, :sender_province, :sender_amphoe, 
:sender_subdistrict, :sender_postcode, :sender_date, :reciever_firstname, :receiver_lastname, :receiver_phone, 
:receiver_address, :receiver_province, :receiver_amphoe, :receiver_subdistrict, :receiver_postcode)";

$query = $dbcon->prepare($sql);


$query->bindParam(':sender_firstname', $sender_firstname);
$query->bindParam(':sender_lastname', $sender_lastname);
$query->bindParam(':sender_phone', $sender_phone);
$query->bindParam(':sender_address', $sender_address);
$query->bindParam(':sender_province', $sender_province);
$query->bindParam(':sender_amphoe', $sender_amphoe);
$query->bindParam(':sender_subdistrict', $sender_subdistrict);
$query->bindParam(':sender_postcode', $sender_postcode);
$query->bindParam(':sender_date', $sender_date);
$query->bindParam(':reciever_firstname', $reciever_firstname);
$query->bindParam(':receiver_lastname', $receiver_lastname);
$query->bindParam(':receiver_phone', $receiver_phone);
$query->bindParam(':receiver_address', $receiver_address);
$query->bindParam(':receiver_province', $receiver_province);
$query->bindParam(':receiver_amphoe', $receiver_amphoe);
$query->bindParam(':receiver_subdistrict', $receiver_subdistrict);
$query->bindParam(':receiver_postcode', $receiver_postcode);

$sender_firstname = $name1; 
$sender_lastname = $lname1;
$sender_phone = $phone1;
$sender_address = $address1;
$sender_province = $province1;
$sender_amphoe = $tambon1;
$sender_subdistrict = $sub1;
$sender_postcode = $post1;
$sender_date = $date1;
$reciever_firstname = $name2;
$receiver_lastname = $lname2;
$receiver_phone = $phone2;
$receiver_address = $address2;
$receiver_province = $province2;
$receiver_amphoe = $tambon2;
$receiver_subdistrict = $sub2;
$receiver_postcode = $post2;

$result = $query->execute();

if ($result) {
echo "<script>alert('เพิ่มข้อมูลเรียบร้อยแล้ว'); window.location='show.php';</script>";
} else {
echo "<script>alert('มีบางอย่างผิดพลาด'); window.location='show.php';</script>";
}
}
?>