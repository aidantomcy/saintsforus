# Saints for Us
This website has the same functionality as this: [Saints for Us](https://github.com/aidantomcy/saintsforus)  
but it is written in PHP instead of Python. I have used this for the final version of my website. I had
made the other version as I hadn't used the Flask framework in a long time and I wanted to create  
a simple app with it.

# Saints for Us

This is a website about a few saints. This is a personal project that I began because there are not  
many websites on this topic. This project uses PHP for the backend and I have used PHPMailer to send
tge mail in the feedback form. I have used plain CSS and JavaScript.

## Content and Styling

I have used Bootstrap for some of the styles.  
I will probably dockerize this application later on.  
To visit the site, head to [https://saintsforus.com](https://saintsforus.com)

## Running Locally
1. Create a .env file in the website directory with the following keys:  
   * SENDER_EMAIL: An email id to send a mail in the contact form page.
   * SENDER_EMAIL_PASSWORD: The password for the email sender.
   * SMTP_HOST: The SMTP host.
   * SMTP_PORT: The port to connect to.
   * EMAIL_RECEIVER: A receiver email to get the mail sent by the email sender.
2. Start your PHP Server.
3. Open your browser and head to `http://localhost/saintsforus-php`
(This repository should be saved in the htdocs folder)

## Contact
If you have any feedback, comments or criticism, please mail your contents to info.saintsforus@gmail.com

## Inspiration
Some inspiration to make this website came from [miracolieucaristici.org](http://www.miracolieucaristici.org/)

## Pictures

<p align="center">
    <img src="img1.png">
    <br>
    <br>
    <img src="img2.png">
</p>
