# Project Description

A Laravel Application , following the repository pattern. The system facilitate user registration and automate the process of sending confirmation emails to registered users. The system includes the following key features: A

MVC Architecture:

Implement the project following the Model-View-Controller (MVC) architecture to ensure scalability and maintainability.
Helper File Functionality:

Develop a helper file that harmonizes email functionality, making it easily accessible from any part of the system.
Uploadable File Feature:

Include a feature that allows users to upload a file, such as a profile picture, during the registration process.
Database Integration:

Utilize a MySQL/Postgres database to securely store the collected user data.
CSRF Protection Note:

Please note that CSRF protection has been disabled in the form.

## Main Enpoints

```curl
localhost:8000/signup  or click on the green text 'Click to Register' on the laravel landing page

```

### You can install these packages using your preferred package manager

```bash
composer install
```

inside the applications root directory, locate the .env file and fill in your detalis in the varriable below

```bash
DB_CONNECTION=mysql  , mysql is the driver used
DB_HOST=your host, mostly its always 127.0.0.1 or localhost
DB_PORT= your port here, mostly for sql it is 3306
DB_DATABASE=your database here
DB_USERNAME=your username here
DB_PASSWORD=your password here

MAIL_MAILER=your mailer, mostly smtp
MAIL_HOST=your mail client host
MAIL_PORT=your mailclient port
MAIL_USERNAME=your mail client username
MAIL_PASSWORD=your mail client password
MAIL_ENCRYPTION=ssl or tls
MAIL_FROM_ADDRESS=" your from address"
MAIL_FROM_NAME="${APP_NAME}"

```

l
run the migration then serve the project.

```bash
php artisan migrate

```

and then serve the project

```bash
php artisan serve
```
