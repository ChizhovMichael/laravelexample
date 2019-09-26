<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Заказ товара</title>
</head>
<body>
    <h2>Вам письмо от {{ $contact['name'] }}</h2>

    <p>Email пацана: {{ $contact['email'] }}</p>
    <p>Телефон: {{ $contact['tel'] }}</p>
    <p>Сообщение: </p>
    <p>{{ $contact['message'] }}</p>
</body>
</html>