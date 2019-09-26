<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Заказ товара</title>
</head>
<body>
    <h2>Заказ товара</h2>
    <div>
        <h3>ФИО: {{ $contact['order_lname'] }} {{ $contact['order_fname'] }} {{ $contact['order_mname'] }}</h3>
        <p>Способ доставки: @if($contact['order_delivery'] == 1) Почта России @elseif($contact['order_delivery'] == 2) Курьерская служба доставки СДЭК @elseif($contact['order_delivery'] == 3) Доставка курьером (только Санкт-Петербург) @else не выбран @endif</p>
        <p>Адрес: {{ $contact['order_index'] }} @if($contact['order_country'] == 1) Россия @elseif($contact['order_country'] == 2) Булоруссия @elseif($contact['order_country'] == 3) Украина @elseif($contact['order_country'] == 5) Казахстан @else Неизвестная страна @endif {{ $contact['order_autonomous'] }} {{ $contact['order_region'] }} {{ $contact['order_city'] }} {{ $contact['order_district'] }} {{ $contact['order_address'] }}</p>
        <p>Email: {{ $contact['order_email'] }}</p>
        <p>Телефон: {{ $contact['order_phone'] }}</p>
        <p>Комментарий к доставке: {{ $contact['order_comment'] }}</p>
        <p>Способ оплаты: {{ $contact['paymethod'] }}</p>

    </div>
</body>

</html>
