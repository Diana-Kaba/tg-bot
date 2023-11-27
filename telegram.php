<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    h2 {
        text-align: center;
        margin-top: 20px;
    }
</style>

<?php

// Подключаем конфиденциальную информацию
include 'credits.php';

//Переменные $name, $phone, $mail получают данные из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$txt = $_POST['text'];

//В массив $arr помещаем полученную информацию
$arr = [
    'Ім\'я: ' => "<u>$name</u>",
    'Телефон : ' => $phone,
    'Пошта: ' => $email,
    'Повідомлення: ' => "<i>$txt</i>",
];
$text = "";
//При помощи цикла foreach формируем строку $text из данных массива $arr
foreach ($arr as $key => $value) {
    $text .= "<b>" . $key . "</b> " . $value . "%0A";
}

//Отправка данных
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$text}", "r");
//Если сообщение отправлено - "OK", если нет - "Error"
if ($sendToTelegram) {
    echo "<h2>Повідомлення надіслано до бота ;)</h2>";
} else {
    echo "<h2>Сталася помилка, повідомлення не надіслано :(</h2>";
}
