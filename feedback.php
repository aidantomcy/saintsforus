<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Symfony\Component\Dotenv\Dotenv;

require "vendor/autoload.php";

function isValidEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function sendFeedback()
{
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        if (isValidEmail($email)) {
            $mail = new PHPMailer(true);
            $dotenv = new Dotenv();
            $dotenv->load(__DIR__ . "/.env");

            try {
                $mail->isSMTP();
                $mail->Host = $_SERVER["SMTP_HOST"];
                $mail->SMTPAuth = true;
                $mail->Username = $_SERVER["SENDER_EMAIL"];
                $mail->Password = $_SERVER["SENDER_EMAIL_PASSWORD"];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $mail->setFrom($_SERVER["SENDER_EMAIL"], "Saints for Us");
                $mail->addAddress($_SERVER["EMAIL_RECEIVER"], "Aidan Tomcy");

                $mail->isHTML(true);
                $mail->Subject = "New Form Submission in Website";

                $mail->Body = "<h1>New Form Submission in Website</h1>";
                $mail->Body .= "There is new form submission in the website.";
                $mail->Body .= "<br>";
                $mail->Body .= "Here are the details:";
                $mail->Body .= "<ul>";
                $mail->Body .= "<li>Name: $name</li>";
                $mail->Body .= "<li>Email: $email</li>";
                $mail->Body .= "<li>Message: $message</li>";
                $mail->Body .= "</ul>";

                $mail->AltBody = "New Form Submission in Website\n\n";
                $mail->AltBody .=
                    "There is new form submission in the website.";
                $mail->AltBody .= "\n";
                $mail->AltBody .= "Here are the details:\n";
                $mail->AltBody .= "Name: $name";
                $mail->AltBody .= "\nEmail: $email";
                $mail->AltBody .= "\nMessage: $message";

                $mail->send();
                echo "<script>location.replace('feedback.php?error=none')</script>";
            } catch (Exception $e) {
                header("location: feedback.php?error=smtperror");
            }
        } else {
            header("location: feedback.php?error=invalidemail");
        }
    }
}

sendFeedback();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="css/bootstrap.min.css"
    />
    <link
      rel="apple-touch-icon"
      sizes="57x57"
      href="icon/apple-icon-57x57.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="60x60"
      href="icon/apple-icon-60x60.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="72x72"
      href="icon/apple-icon-72x72.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="icon/apple-icon-76x76.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="114x114"
      href="icon/apple-icon-114x114.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="120x120"
      href="icon/apple-icon-120x120.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="144x144"
      href="icon/apple-icon-144x144.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="152x152"
      href="icon/apple-icon-152x152.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="icon/apple-icon-180x180.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href="icon/android-icon-192x192.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="icon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="96x96"
      href="icon/favicon-96x96.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="icon/favicon-16x16.png"
    />
    <link
      rel="manifest"
      href="icon/manifest.json"
    />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta
      name="msapplication-TileImage"
      content="icon/ms-icon-144x144.png"
    />
    <style>
      body {
        background-color: powderblue;
        user-select: none;
      }

      textarea {
        resize: none;
      }

      label {
        font-size: 18px;
      }
    </style>
    <title>Saints for Us - Feedback</title>
  </head>
  <body>
    <?php include "inc/navbar.php"; ?>

    <?php if (isset($_GET["error"])): ?>
        <?php if ($_GET["error"] == "invalidemail"): ?>
            <div class="alert alert-danger alter-dismissible fade show" role="alert">
                Invalid Email
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if ($_GET["error"] == "smtperror"): ?>
            <div class="alert alert-danger alter-dismissible fade show" role="alert">
                Your message could not be sent. Please try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if ($_GET["error"] == "none"): ?>
            <div class="alert alert-success alter-dismissible fade show" role="alert">
                Thank you for your feedback!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <h1 class="d-flex justify-content-center align-items-center mt-4">
      Feedback
    </h1>

    <div class="container">
      <form method="POST">
        <label for="name" class="mt-2">Name</label>
        <input
          type="text"
          id="name"
          name="name"
          class="form-control form-control-lg mt-2"
          placeholder="Your name"
          autocomplete="off"
          required
        />
        <label for="email" class="mt-2">Email</label>
        <input
          type="text"
          id="email"
          name="email"
          class="form-control form-control-lg mt-2"
          placeholder="Your email address"
          autocomplete="off"
          required
        />
        <label for="message" class="mt-2">Message</label>
        <textarea
          name="message"
          id="message"
          cols="30"
          rows="8"
          class="form-control form-control-lg mt-2"
          placeholder="Message"
          required
        ></textarea>
        <button class="btn btn-primary mt-4" type="submit" name="submit">
          Submit
        </button>
      </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener("contextmenu", (e) => {
        e.preventDefault();
      });
    </script>
  </body>
</html>
