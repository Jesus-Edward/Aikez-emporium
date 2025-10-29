<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Newsletter</title>

    <style>
        .unsub_btn {
            width: 200px;
            padding-top: 2px;
            padding-bottom: 2px;
            padding-left: 8px;
            padding-right: 8px;
            border-radius: 8px;
            background: rgb(5, 5, 166);
            color: #ffff;
        }

        .unsub_btn:hover {
            background: rgb(8, 8, 231);
        }
    </style>
</head>

<body>

    <h3>{{ $mailTitle }}</h3>

    <p>{!! $mailMessage !!}</p>
    <p>Click below to unsubscribe to our newsletter</p>
    <a class="unsub_btn" href="{{ route('newsletter.unsubscribe', $unsubscribe_token) }}">Unsubscribe</a>
</body>

</html>
