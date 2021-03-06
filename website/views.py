from flask import Blueprint, flash, render_template, send_from_directory, request
from dotenv import load_dotenv
from os import getenv
import smtplib
import re


load_dotenv()
views = Blueprint(
    "views", __name__, template_folder="templates", static_folder="static"
)


def check_email(email):
    regex = r"\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b"
    if re.fullmatch(regex, email):
        return True

    return False


@views.route("/")
@views.route("/home")
def index():
    return render_template("index.html")


@views.route("/robots.txt")
def robots_txt():
    return send_from_directory(views.static_folder, request.path[1:])


@views.route("/feedback", methods=["GET", "POST"])
def feedback():
    if request.method == "POST":
        name = request.form.get("name")
        user_email = request.form.get("email")
        message = request.form.get("message")

        password = getenv("EMAIL_PASSWORD")
        sender = getenv("EMAIL_SENDER")
        receiver = getenv("EMAIL_RECEIVER")
        body = f"""
    There is a new form submission in the website, here are the details:

    Name: {name}
    Email: {user_email}
    Message: {message}
    """

        if check_email(user_email):
            server = smtplib.SMTP("smtp.gmail.com", 587)
            server.starttls()
            server.login(sender, password)

            try:
                server.sendmail(sender, receiver, body)
            except smtplib.SMTPDataError:
                flash(
                    "Your message could not be sent. Please try again later.",
                    category="error",
                )
            finally:
                server.quit()
            flash("Thank you for your feedback!")
        else:
            flash("Invalid email", category="error")

    return render_template("feedback.html")
