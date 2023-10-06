from flask import Flask, url_for, request, render_template, make_response

app = Flask(__name__)


@app.route('/home')
@app.route('/')
def home():
    return render_template("main.html")


@app.route('/profile')
def profile():
    return render_template("profile.html")


@app.route('/login')
def login():
    return "login"


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