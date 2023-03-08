<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Darmowy Ebook o HTML!</title>
    <meta name="description" content="Wysyłanie maili w PHP - funkcja mail(), PHP Mailer, SwiftMailer">
    <meta name="keywords" content="php, kurs, PDO, połączenie, MySQL">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>
    <div class="container">

        <header>
            <h1>Test wysyłania e-maila!</h1>
        </header>

        <main>
            <article>
	
<?php
	
	$to = 'saraszewczykk@wp.pl';
    $from = '=?UTF-8?B?'.base64_encode('Ebooki uczące sztuki').'?=
    <no-reply@domena.pl>';
    $replyTo = '=?UTF-8?B?'.base64_encode('Biuro').'?=
    <biuro@domena.pl>';
    $subject = '=?UTF-8?B?'.base64_encode('Darmowy ebook - HTML na przykładach').'?=';
    $message = base64_encode('<p>Dzień dobry!'."\r\n\r\n".'Oto link do ebooka:
                <a href=https://domena.pl/ebook.pdf">POBIERZ EBOOKA</a></p>');
	$headers = 'Content-Type: text/plain; charset=utf-8'."\r\n";
    $headers .= 'Content-Transfer-Encoding: base64'."\r\n";
    $headers .= 'From: '.$from."\r\n";
    $headers .= 'Reply-To: '.$replyTo."\r\n";
?>
	
            </article>
        </main>

    </div>
</body>
</html>