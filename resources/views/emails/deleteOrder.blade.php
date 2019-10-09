<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Заказ товара</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato:700&display=swap');

        html {
            font-size: 75%;
        }
        h1 {
            font: normal 3em/1.3 'Lato', sans-serif;
        }

        h2,
        pre {
            font: normal 3.5em/1.3 'Lato', sans-serif;
        }

        h3 {
            font: normal 3.5em/1.3 'Lato', sans-serif;
        }

        h4 {
            font: normal 3em/1.3 'Lato', sans-serif;
        }

        h5 {
            font: normal 1.7em/1.3 'Lato', sans-serif;
        }

        h6 {
            font: bold 1.3em/1.3 'Lato', sans-serif;
        }

        p {
            font: 300 1.25em/1.3 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
        }

        a,
        span,
        button,
        input,
        label,
        textarea {
            font: 300 1.25em/1.3 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
        }

        .modal__wrapp {
            width: 100%;
        }

        .b8 {
            border-radius: 8px;
        }

        .back-body {
            background: $color-body;
        }

        .hide {
            overflow: hidden;
        }

        .rel {
            position: relative;
            top: 0;
            left: 0;
        }

        .modal__background {
            height: 20em;
            width: 100%;
        }

        .modal__background img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .shadow-xs {
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        }
        .pl-em-3 {
            padding-left: 3em;
        }
        .pr-em-3 {
            padding-right: 3em;
        }
        .pb-em-3 {
            padding-bottom: 3em;
        }
        .cc {
            color: #a5a5a5;
        }
        .mt-em-3 {
            margin-top: 3em;
        }
        p span {
            font-size: 1em;
        }
        .cm {
            color: #2684fe;
        }
        .ct {
            color: #151f24;
        }
        .bold {
            font-weight: 700;
        }
    </style>

</head>

<body>
    <div class="modal__wrapp col-6 sd-12 shadow-xs back-body b8 hide">
        <div class="modal__background rel top-left col-12 sd-12 hide">
            <img src="{{ asset('/img/favicon/twitter.png') }}" alt="congratulations" class="abs">
        </div>
        <h5 class="text-center">Отмена заказа :(</h5>
        <div class="pl-em-3 pr-em-3 pb-em-3">
            <p class="cc">Уважаемый, {{ $contact['order_lname'] }} {{ $contact['order_fname'] }} {{ $contact['order_mname'] }}.</p>
            <p class="cc">Уведомляем вас об отмене вашего заказа <span class="bold ct">#{{ $contact['id'] }}</span></p>
            <p class="cm">Если заказ отменен не по вашему жеданию, то, пожалуйста, уведоомите нас об этом!</p>
            <p class="cc">Спасибо за ваш интерес к нам.</p>
            <p class="mt-em-3 cc"><i>С уважением, Telezapchasti</i></p>
        </div>

    </div>
</body>

</html>