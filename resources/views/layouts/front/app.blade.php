<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJSA-TOGO - Association des Jeunes aux Services de l'Afrique</title>
    <meta name="description" content="La jeunesse africaine, cœur du développement">
    @include('partials.front.styles')
</head>
<body>
<!-- Navigation -->

@include('layouts.front.header')
<!-- Hero Section -->

@yield('content')


@include('layouts.front.footer')

</body>
</html>
