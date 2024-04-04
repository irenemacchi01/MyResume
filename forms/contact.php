<?php
  // Questo script PHP serve per gestire un modulo di contatto web. Quando un utente compila e invia il modulo, i dati vengono processati e inviati via email all'indirizzo specificato.

  $receiving_email_address = 'irenemacchi01@gmail.com';

  // Controlla se la libreria "PHP Email Form" esiste
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  // Crea un nuovo oggetto PHP_Email_Form
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  // Imposta i dettagli dell'email
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Aggiunge i messaggi all'email
  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  // Invia l'email e restituisce la risposta
  echo $contact->send();
?>

