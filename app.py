from flask import Flask, url_for, request, render_template, make_response

app = Flask(__name__)


@app.route('/home')
@app.route('/')
def home():
    return render_template("index.html")


@app.route('/settings')
def tbd():
    return render_template("settings.html")

@app.route('/TaylorSwift')
def TaylorSwift():
    return render_template("TaylorSwift.html")

@app.route('/TS_BS')
def TS_BS():
    return render_template("TS_BS.html")

@app.route('/TS_BS2')
def TS_BS2():
    return render_template("TS_BS2.html")

@app.route('/EdSheeran')
def EdSheeran():
    return render_template("EdSheeran.html")

@app.route('/ED_SOY')
def ED_SOY():
    return render_template("ED_SOY.html")

@app.route('/ED_SOY2')
def ED_SOY2():
    return render_template("ED_SOY2.html")

@app.route('/LadyGaga')
def LadyGaga():
    return render_template("LadyGaga.html")

@app.route('/LG_PF')
def LG_PF():
    return render_template("LG_PF.html")

@app.route('/LG_PF2')
def LG_PF2():
    return render_template("LG_PF2.html")

@app.route('/JustinBieber')
def JustinBieber():
    return render_template("JustinBieber.html")

@app.route('/JB_G')
def JB_G():
    return render_template("JB_G.html")

@app.route('/JB_G2')
def JB_G2():
    return render_template("JB_G2.html")

@app.route('/profile')
def profile():
    return render_template("profile.html")


@app.route('/login')
def login():
    return render_template("login.html")


@app.route('/sign-up')
def sign_up():
    return render_template("signup.html")


@app.route('/public/functions.js')
def js():
    return render_template("functions.js")


@app.after_request
def apply_caching(response):
    response.headers['X-Content-Type-Options'] = 'nosniff'
    return response


if __name__ == "__main__":
    app.run(debug= True, host='0.0.0.0', port=8080)