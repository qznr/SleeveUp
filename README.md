## Prerequisites

<ul>
    <li>Node.js</li>
    <li>Composer</li>
</ul>

## Steps to Run the Project

1. Start Apache and MySQL Modules
Before proceeding, ensure your Apache and MySQL servers are running. This can typically be done via a control panel like XAMPP or MAMP, or by starting the services manually.

2. Install Node.js Dependencies
Open your terminal and navigate to the project directory. Run the following command to install the required Node.js packages:
```
npm install
```

3. Migrate the Database
Next, migrate the database tables. Make sure your database connection settings are correctly configured in your .env file. Run the following command:
```
php artisan migrate
```

4. Start the Development Server
Start the development server using the following command:
```
npm run dev
```

5. Start the PHP Server
Finally, start the PHP server using the following command:
```
php artisan serve
```
