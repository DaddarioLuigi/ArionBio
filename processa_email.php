<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $guardianName = $_POST["gname"];
    $guardianSurname = $_POST["gsurname"];
    $guardianEmail = $_POST["gmail"];
    $Service = $_POST["cage"];
    $message = $_POST["message"];

    // Indirizzo email a cui inviare la mail
    $to = "info.arionsrl@gmail.com";

    // Oggetto della mail
    $subject = "Nuovo messaggio da ArionSRL";

    // Intestazioni della mail
    $headers = "From: $guardianEmail\r\n";
    $headers .= "Reply-To: $guardianEmail\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Corpo del messaggio
    $emailMessage = "Nome: $guardianName $guardianSurname\n";
    $emailMessage .= "Email: $guardianEmail\n";
    $emailMessage .= "Service: $service\n";
    $emailMessage .= "Messaggio:\n$message";

    // Invia l'email
    $mailSent = mail($to, $subject, $emailMessage, $headers);

    // Controlla se l'invio è avvenuto con successo
    if ($mailSent) {
        header("Location: https://www.perfarelalbero.it/landing_arion/index.php?mail=success");
        exit;
    } else {
        header("Location: https://www.perfarelalbero.it/landing_arion/index.php?mail=failure");
        exit;
    }
}
?>
