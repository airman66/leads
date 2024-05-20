<?php
require_once "db.php";
$sql = "SELECT fullname, email, phone, city FROM leads";
if (isset($_GET['city'])) {
    $city = $_GET['city'];
    $sql = "SELECT fullname, email, phone, city FROM leads WHERE city='".$city."'";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    $output = fopen('php://output', 'w');

    $columns = array('Имя', 'Почта', 'Телефон', "Город");
    fputcsv($output, $columns);

    while($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    fclose($output);
} else {
    echo "No records found";
}

$conn->close();
?>