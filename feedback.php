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
                $mail->Body .= "There is a new form submission in the website.";
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
    <link rel="stylesheet" href="dist/css/feedback.css">
    <meta name="theme-color" content="#b0e0e6" />
    <link rel="manifest" href="manifest.json">
    <link rel="shortcut icon" href="icon/favicon.ico" type="image/x-icon">
    <title>Saints for Us - Feedback</title>
  </head>
  <body>
    <?php include "inc/navbar.php"; ?>

    <?php if (isset($_GET["error"])): ?>
        <?php if ($_GET["error"] == "invalidemail"): ?>
            <div class="alert-container">
                <div class="alert error-alert">
                  Invalid Email
                  <button class="cancel-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"
                        />
                      </svg>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($_GET["error"] == "smtperror"): ?>
            <div class="alert-container">
                <div class="alert error-alert">
                    Your message could not be sent. Please try again later.
                    <button class="cancel-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"
                        />
                      </svg>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($_GET["error"] == "none"): ?>
            <div class="alert-container">
                <div class="alert success-alert">
                    Thank you for your feedback!
                    <button class="cancel-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"
                        />
                      </svg>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <h1 class="title">
      Feedback
    </h1>

    <div class="feedback-form">
      <form method="POST">
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Your name"
          autocomplete="off"
          required
        />
        <input
          type="text"
          id="email"
          name="email"
          placeholder="Your email address"
          autocomplete="off"
          required
        />
        <textarea
          name="message"
          id="message"
          cols="30"
          rows="8"
          placeholder="Message"
          required
        ></textarea>
        <button class="btn" type="submit" name="submit">
          Submit
        </button>
      </form>
    </div>

    <script src="dist/js/index.js"></script>
    <script>
        const errorAlertCancelBtn = document.querySelector(".error-alert button");
        const successAlertCancelBtn = document.querySelector(".success-alert button");

        if (errorAlertCancelBtn) {
            errorAlertCancelBtn.addEventListener("click", () => {
                document.querySelector(".error-alert").style.cssText = "display: none;"
            })
        }
        if (successAlertCancelBtn) {
        successAlertCancelBtn.addEventListener("click", () => {
            document.querySelector(".success-alert").style.cssText = "display: none;"
        })
    }
    </script>
  </body>
</html>
