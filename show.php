<?php

require_once('config.php');


$sql = "SELECT * FROM `post`";
$query = $dbcon->prepare($sql);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

$provincesJson = file_get_contents('data/thai_provinces.json');
$districtsJson = file_get_contents('data/thai_amphures.json');
$subdistrictsJson = file_get_contents('data/thai_tambons.json');
if ($provincesJson === false || $districtsJson === false || $subdistrictsJson === false) {
    die("ไม่สามารถโหลดข้อมูลจากไฟล์ JSON ได้");
}

$provinces = json_decode($provincesJson, true);
$districts = json_decode($districtsJson, true);
$subdistricts = json_decode($subdistrictsJson, true);

if ($provinces === null || $districts === null || $subdistricts === null) {
    die("เกิดข้อผิดพลาดในการแปลง JSON");
}

function getProvinceName($provinceId, $provinces) {
    foreach ($provinces as $province) {
        if (isset($province['id']) && $province['id'] == $provinceId) {
            return isset($province['name_th']) ? $province['name_th'] : 'ไม่พบข้อมูลจังหวัด';
        }
    }
    return 'ไม่พบข้อมูลจังหวัด';
}

function getDistrictName($districtId, $districts) {
    foreach ($districts as $district) {
        if (isset($district['id']) && $district['id'] == $districtId) {
            return isset($district['name_th']) ? $district['name_th'] : 'ไม่พบข้อมูลอำเภอ';
        }
    }
    return 'ไม่พบข้อมูลอำเภอ';
}

function getSubdistrictName($subdistrictId, $subdistricts) {
    foreach ($subdistricts as $subdistrict) {
        if (isset($subdistrict['id']) && $subdistrict['id'] == $subdistrictId) {
            return isset($subdistrict['name_th']) ? $subdistrict['name_th'] : 'ไม่พบข้อมูลตำบล';
        }
    }
    return 'ไม่พบข้อมูลตำบล';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>แสดงข้อมูล</h2>
<a href = "index.html">ไปยังหน้ากรอกข้อมูล</a>
<table>
    <thead>
        <tr>
            <th>Sender First Name</th>
            <th>Sender Last Name</th>
            <th>Sender Phone</th>
            <th>Sender Address</th>
            <th>Sender Province</th>
            <th>Sender Amphoe</th>
            <th>Sender Subdistrict</th>
            <th>Sender Postcode</th>
            <th>Sender Date</th>
            <th>Receiver First Name</th>
            <th>Receiver Last Name</th>
            <th>Receiver Phone</th>
            <th>Receiver Address</th>
            <th>Receiver Province</th>
            <th>Receiver Amphoe</th>
            <th>Receiver Subdistrict</th>
            <th>Receiver Postcode</th>
        </tr>
    </thead>
    <tbody>
        <?php

        if ($posts) {

            foreach ($posts as $post) {

                $provinceName1 = getProvinceName($post['sender_province'], $provinces);
                $districtName1 = getDistrictName($post['sender_amphoe'], $districts);
                $subdistrictName1 = getSubdistrictName($post['sender_subdistrict'], $subdistricts);

                $provinceName2 = getProvinceName($post['receiver_province'], $provinces);
                $districtName2 = getDistrictName($post['receiver_amphoe'], $districts);
                $subdistrictName2 = getSubdistrictName($post['receiver_subdistrict'], $subdistricts);

                echo "<tr>";
                echo "<td>" . htmlspecialchars($post['sender_firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($post['sender_lastname']) . "</td>";
                echo "<td>" . htmlspecialchars($post['sender_phone']) . "</td>";
                echo "<td>" . htmlspecialchars($post['sender_address']) . "</td>";
                echo "<td>" . htmlspecialchars($provinceName1) . "</td>";
                echo "<td>" . htmlspecialchars($districtName1) . "</td>";
                echo "<td>" . htmlspecialchars($subdistrictName1) . "</td>";
                echo "<td>" . htmlspecialchars($post['sender_postcode']) . "</td>";
                echo "<td>" . htmlspecialchars($post['sender_date']) . "</td>";
                echo "<td>" . htmlspecialchars($post['reciever_firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($post['receiver_lastname']) . "</td>";
                echo "<td>" . htmlspecialchars($post['receiver_phone']) . "</td>";
                echo "<td>" . htmlspecialchars($post['receiver_address']) . "</td>";
                echo "<td>" . htmlspecialchars($provinceName2) . "</td>";
                echo "<td>" . htmlspecialchars($districtName2) . "</td>";
                echo "<td>" . htmlspecialchars($subdistrictName2) . "</td>";
                echo "<td>" . htmlspecialchars($post['receiver_postcode']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='16'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
