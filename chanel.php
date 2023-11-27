<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    h2 {
        text-align: center;
        margin-top: 20px;
    }
</style>

<?php
include_once 'credits.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$txt = $_POST['text'];

$arr = [
    "Ім'я: " => $name,
    "Телефон: " => $phone,
    "Пошта: " => $email,
    "Повідомлення: " => $txt,
];

$msg = "";
foreach ($arr as $key => $value) {
    $msg .= $key . $value . "\n";
}

$data = [
    'chat_id' => $group_chat_id,
    'text' => $msg,
];

$response = file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

if ($response) {
    echo "<h2>Повідомлення надіслано до групи ;)</h2>";
} else {
    echo "<h2>Сталася помилка, повідомлення не надіслано :(</h2>";
}