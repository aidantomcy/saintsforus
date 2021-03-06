from flask import Blueprint, render_template

pages = Blueprint("pages", __name__, template_folder="templates")


@pages.route("/stanthony")
def stanthony():
    return render_template("stanthony.html")


@pages.route("/stfrancisassisi")
def stfrancisassisi():
    return render_template("stfrancisassisi.html")


@pages.route("/staidanlindisfarne")
def staidanlindisfarne():
    return render_template("staidanlindisfarne.html")


@pages.route("/stfrancisxavier")
def stfrancisxavier():
    return render_template("stfrancisxavier.html")


@pages.route("/blessedcarloacutis")
def blessedcarloacutis():
    return render_template("blessedcarloacutis.html")


@pages.route("/stagnes")
def stagnes():
    return render_template("stagnes.html")


@pages.route("/stkuriakose")
def stkuriakose():
    return render_template("stkuriakose.html")


@pages.route("/stjoan")
def stjoan():
    return render_template("stjoan.html")


@pages.route("/stpeter")
def stpeter():
    return render_template("stpeter.html")


@pages.route("/stbernadette")
def stbernadette():
    return render_template("stbernadette.html")


@pages.route("/stjohnbaptist")
def stjohnbaptist():
    return render_template("stjohnbaptist.html")


@pages.route("/mothermary")
def mothermary():
    return render_template("mothermary.html")


@pages.route("/stjoseph")
def stjoseph():
    return render_template("stjoseph.html")


@pages.route("/motherteresa")
def motherteresa():
    return render_template("motherteresa.html")


@pages.route("/stthomas")
def stthomas():
    return render_template("stthomas.html")


@pages.route("/stsebastian")
def stsebastian():
    return render_template("stsebastian.html")


@pages.route("/stjohnpaulii")
def stjohnpaulii():
    return render_template("stjohnpaulii.html")


@pages.route("/stclareassisi")
def stclareassisi():
    return render_template("stclareassisi.html")


@pages.route("/stgeorge")
def stgeorge():
    return render_template("stgeorge.html")


@pages.route("/stpaul")
def stpaul():
    return render_template("stpaul.html")


@pages.route("/stvianney")
def stvianney():
    return render_template("stvianney.html")


@pages.route("/stphilipneri")
def stphilipneri():
    return render_template("stphilipneri.html")


@pages.route("/stphilip")
def stphilip():
    return render_template("stphilip.html")


@pages.route("/stjohnxxiii")
def stjohnxxiii():
    return render_template("stjohnxxiii.html")


@pages.route("/sttherese")
def sttherese():
    return render_template("sttherese.html")


@pages.route("/stnicholas")
def stnicholas():
    return render_template("stnicholas.html")


@pages.route("/stfrancisdesales")
def stfrancisdesales():
    return render_template("stfrancisdesales.html")
