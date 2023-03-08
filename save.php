<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['email'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if(empty($email)) {
        $_SESSION['given_email'] = $_POST['email'];
        header('Location: index.php');
    }
    else {
        require_once 'database.php';
        $query = $db->prepare('INSERT INTO users VALUES (NULL, :email)');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();

        try {
            $mail = new PHPMailer();
            $mail->isSMTP();
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = 'saraszewczyk31@gmail.com';
            $mail->Password = 'qlvliycpmthynejl';
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('no-reply@domena.pl', 'Ebooki uczące sztuki');
            $mail->addAddress($email);
            $mail->addReplyTo('biuro@domena.pl', 'Biuro');
            $mail->isHTML(true);
            $mail->Subject = 'Darmowy ebook - HTML na przykładach';
            $mail->Body = '
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
            $mail->addAttachment('img/html-ebook.jpg');
            $mail->send();

        } catch(Exception $e) {
            echo "Błąd wysyłania maila: {$mail->ErrorInfo}";
        }
    }
}
else {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <title>Zapisanie się do newslettera</title>
    <meta name="description" content="Używanie PDO - zapis do bazy MySQL">
    <meta name="keywords" content="php, kurs, PDO, połączenie, MySQL">

    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

</head>

<body>

    <div class="container">

        <header>
            <h1>Newsletter</h1>
        </header>

        <main>
            <article>
                <p>Dziękujemy za zapisanie się na listę mailową naszego newslettera!</p>
            </article>
        </main>

    </div>

</body>
</html>