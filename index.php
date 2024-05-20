<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Лиды: форма</title>
    <script src="https://unpkg.com/imask"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="overflow-x: hidden">
<div class="row">
    <div class="col-6 d-flex offset-3">
        <a href="/" class="link-primary d-block p-3">Создать лид</a>
        <a href="/csv.php" class="link-secondary d-block p-3">Список лидов</a>
    </div>
</div>
<div class="row">
    <div class="col-6 offset-3">
        <h1>Форма</h1>
        <form method="post" action="add.php">
            <div class="mb-3">
                <label for="surname" class="form-label">Фамилия</label>
                <input name="surname" style="text-transform: capitalize;" type="text" class="form-control" id="surname" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input name="name" style="text-transform: capitalize;" type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="patronymic" class="form-label">Отчество</label>
                <input name="patronymic" style="text-transform: capitalize;" type="text" class="form-control" id="patronymic" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control has-validation" id="email" required>
            </div>
            <div class="mb-3">
                <label for="phone"  class="form-label">Телефон</label>
                <div class="input-group">
                    <input name="phone" type="text" minlength="16" maxlength="16" class="form-control" id="phone" placeholder="+7 (xxx) xxx-xxxx" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Город</label>
                <select name="city" class="form-select" id="city" required>
                    <option value="Москва">Москва</option>
                    <option value="Санкт-Петербург">Санкт-Петербург</option>
                    <option value="Тула">Тула</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>
<script>
    const element1 = document.getElementById('phone');
    const mask1Options = {
        mask: '+{7}(000)000-00-00'
    };
    const mask1 = IMask(element1, mask1Options);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>