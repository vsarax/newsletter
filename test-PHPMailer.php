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
    $from = 'Ebooki uczące sztuki <no-reply@domena.pl>';
    $replyTo = 'Biuro <biuro@domena.pl>';
    $subject = 'Darmowy ebook - HTML na przykładach';
    $message = '
    <html>
    <head>
      <title>Twój darmowy ebook!</title>
    </head>
    <body>
      <h1>Dzień dobry!</h1>
      <p>Oto link do naszego świetnego ebooka: <a href="https://domena.pl/ebook.pdf">POBIERZ EBOOKA</a>
      </p>
      <hr>
      <p>Administratorem Twoich danych osobowych jest:</p>
      <p>Ebooki uczące sztuki Sp. z.o.o, ul. Wiejska 46/8, 00-902 Warszawa</p>
      <p>Wypisz się z newslettera: <a href="https://domena.pl/unsubscribe">UNSUB</a>
      </p>
    </body>
    </html>
    ';
  
	$headers = 'MIME-Version: 1.0'."\r\n";
    $headers .= 'Content-Type: text/html; charset=utf-8'."\r\n";
    $headers .= 'From: '.$from."\r\n";
    $headers .= 'Reply-To: '.$replyTo."\r\n";
?>
	
            </article>
        </main>

    </div>
</body>
</html>