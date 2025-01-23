<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'] ?? '';

    if (empty($phone)) {
        echo "<p class='error'>Введите номер телефона.</p>";
        exit;
    }

    if (!preg_match('/^\+(\d{2,3})(\d{7,12})$/', $phone, $matches)) {
        echo "<p class='error'>Неверный формат номера. Пример правильного номера +1234567890.</p>";
        exit;
    }

    $full_code = $matches[1];
    // $remaining_number = $matches[2];

    $countries = [
        '44' => 'Англия',
        '49' => 'Германия',
        '33' => 'Франция',
        '72' => 'Россия',
        '73' => 'Россия',
        '91' => 'Индия',
        '81' => 'Япония',
        '775' => 'ПМР',
        '777' => 'ПМР',
        '778' => 'ПМР',
        '779' => 'ПМР',
        '373' => 'Молдова',
    ];

    $country = null;
    foreach ($countries as $code => $name) {
        if (strpos($full_code, $code) === 0) {
            $country = $name;
            break;
        }
    }

    if ($country) {
        echo "<p class='success'>Код страны: <strong>$full_code</strong>; Страна: <strong>$country</strong>.</p>";
    } else {
        echo "<p class='error'>Код страны неизвестен: $full_code.</p>";
    }
} else {
    echo "<p class='error'>Доступ запрещен.</p>";
}
?>