#### Application used
    Mysql workbench
    Laravel 10
    Composer
    Postman

### Installation

1. **Clone the repository:**

    git clone [repository URL]
    cd [repository folder]

2. **Install dependencies:**

    composer install

3. **Configure the database settings:**

    Open the .env file and update the following lines with your database details:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3000
    DB_DATABASE=Employee_Positions
    DB_USERNAME=root
    DB_PASSWORD=Exam3000

4. **Run migrations to set up the database tables:**

    php artisan migrate

### Starting the Application

1. **Run the Laravel development server:**

    php artisan serve

    This will start the server at http://127.0.0.1:8000 by default.

2. **Access the application:**

    Open your web browser and go to http://127.0.0.1:8000.


### Postman JSON 
    Postman json is in public/postman

    -open postman

    -click on the import 

    -then select the postman json file