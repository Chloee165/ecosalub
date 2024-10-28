<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Ecosalub' }}</title>
    <link rel="icon" type="image/png" href="/img/favicon-48x48.png" sizes="48x48" />
    <link rel="icon" type="image/svg+xml" href="/img/favicon.svg" />
    <link rel="shortcut icon" href="/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="/img/site.webmanifest" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/mtb3kfx.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div id="nav-admin-style" class="header-flex">
        <a id="logo-nav" href="{{ route('home') }}">
            <img class="logo" src="{{ asset('img/logo-charcoal.png') }}" alt="">
        </a>
        <button id="return-btn" onclick="goBack()">Retour</button>
    </div>
    
    {{ $slot }}
    
</body>

</html>

<script type="module" src="{{ asset('js/main.js') }}"></script>

<script>
    function goBack() {
        window.history.back();
    }
</script>
