from flask import Flask, render_template, request, redirect, url_for, flash
from flask_sqlalchemy import SQLAlchemy
from flask_bcrypt import Bcrypt

app = Flask(__name__)
app.config['SECRET_KEY'] = 'your_secret_key'  # Replace with a secure key
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///users.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
bcrypt = Bcrypt(app)

class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    full_name = db.Column(db.String(100), nullable=False)
    email = db.Column(db.String(100), unique=True, nullable=False)
    password = db.Column(db.String(255), nullable=False)

# Route for Signup
@app.route('/signup', methods=['GET', 'POST'])
def signup():
    if request.method == 'POST':
        full_name = request.form.get('full_name')
        email = request.form.get('email')
        password = request.form.get('password')
        confirm_password = request.form.get('confirm_password')

        if password != confirm_password:
            flash('Passwords do not match!', 'danger')
            return redirect(url_for('signup'))

        hashed_password = bcrypt.generate_password_hash(password).decode('utf-8')
        new_user = User(full_name=full_name, email=email, password=hashed_password)

        try:
            db.session.add(new_user)
            db.session.commit()
            flash(f'Welcome {full_name}! Please log in.', 'success')
            return redirect(url_for('login'))
        except:
            flash('This email is already registered!', 'danger')
            return redirect(url_for('signup'))

    return render_template('signup.html')

# Route for Login
@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        email = request.form.get('email')
        password = request.form.get('password')
        user = User.query.filter_by(email=email).first()

        if user and bcrypt.check_password_hash(user.password, password):
            flash('Login successful!', 'success')
            return redirect(url_for('index'))
        else:
            flash('Invalid credentials, please try again.', 'danger')
            return redirect(url_for('login'))

    return render_template('login.html')

# Route for Index Page
@app.route('/index')
def index():
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)
