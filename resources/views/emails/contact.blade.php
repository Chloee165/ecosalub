<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau message de contact</title>
</head>
<body>
    <h2>Nouveau message de contact</h2>
    <p><strong>Prénom:</strong> {{ $prenom }}</p>
    <p><strong>Nom:</strong> {{ $nom }}</p>
    <p><strong>Courriel:</strong> {{ $courriel }}</p>
    <p><strong>Entreprise:</strong> {{ $entreprise }}</p>
    <p><strong>Code Postal / ZIP:</strong> {{ $zip }}</p>
    <p><strong>Téléphone:</strong> {{ $telephone }}</p>
    <p><strong>Sujet:</strong> {{ $sujet }}</p>
    <p><strong>Message:</strong><br> {{ $formMessage }}</p> <!-- Changed from $message to $formMessage -->
    <p><strong>Inscription à la newsletter:</strong> {{ $newsletter }}</p>
</body>
</html>
