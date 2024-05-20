<?php
require_once "db.php";
$rows = $conn->query("SELECT * FROM leads")->fetch_all();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Лиды: форма</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="overflow-x: hidden">
<div class="row">
    <div class="col-6 d-flex offset-3">
        <a href="/" class="link-secondary d-block p-3">Создать лид</a>
        <a href="/csv.php" class="link-primary d-block p-3">Список лидов</a>
    </div>
</div>
<div class="row">
    <div class="col-6 offset-3">
        <a href="export_csv.php" class="btn btn-primary mb-3" id="exportCSV">Экспорт csv</a>
    </div>
</div>
<div class="row">
    <div class="col-6 offset-3">
        <div class="mb-3">
            <label for="city" class="form-label">Город</label>
            <select name="city" class="form-select" id="city" required>
                <option value="Все">Все</option>
                <option value="Москва">Москва</option>
                <option value="Санкт-Петербург">Санкт-Петербург</option>
                <option value="Тула">Тула</option>
            </select>
        </div>
        <button class="btn btn-primary mb-3" id="filterTable">Фильтровать</button>
    </div>
</div>
<div class="row">
    <div class="col-6 offset-3">
        <h1>Лиды по городу: <span>Все</span></h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ФИО</th>
                <th scope="col">Почта</th>
                <th scope="col">Телефон</th>
                <th scope="col">Город</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($rows as $row): ?>
                <tr class="tablerow">
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const btn = document.querySelector("#filterTable");
    let cityFilter = "Все";
    btn.addEventListener("click", () => {
        cityFilter = document.querySelector("#city").value;
        if(cityFilter !== "Все") {
            document.querySelector("#exportCSV").href = `/export_csv.php?city=${cityFilter}`;
        } else {
            document.querySelector("#exportCSV").href = "/export_csv.php";
        }
        document.querySelector("h1 > span").innerHTML = cityFilter;
        const rows = document.querySelectorAll(".tablerow");
        rows.forEach(row => {
           row.style.display = "none";
            if (row.querySelector("td:nth-child(4)").innerHTML == cityFilter || cityFilter == "Все") {
                row.style.display="table-row";
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>