<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
    <a href="https://vuejs.org" target="_blank" rel="noopener noreferrer"><img width="100" src="https://vuejs.org/images/logo.png" alt="Vue logo">
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center">
  <a href="https://circleci.com/gh/vuejs/vue/tree/dev"><img src="https://img.shields.io/circleci/project/github/vuejs/vue/dev.svg?sanitize=true" alt="Build Status"></a>
  <a href="https://codecov.io/github/vuejs/vue?branch=dev"><img src="https://img.shields.io/codecov/c/github/vuejs/vue/dev.svg?sanitize=true" alt="Coverage Status"></a>
  <a href="https://npmcharts.com/compare/vue?minimal=true"><img src="https://img.shields.io/npm/dm/vue.svg?sanitize=true" alt="Downloads"></a>
  <a href="https://www.npmjs.com/package/vue"><img src="https://img.shields.io/npm/v/vue.svg?sanitize=true" alt="Version"></a>
  <a href="https://www.npmjs.com/package/vue"><img src="https://img.shields.io/npm/l/vue.svg?sanitize=true" alt="License"></a>
  <a href="https://chat.vuejs.org/"><img src="https://img.shields.io/badge/chat-on%20discord-7289da.svg?sanitize=true" alt="Chat"></a>
</p>

## Prerequisites

<ul>
    <li>Apache server</li>
    <li>MySQL server</li>
    <li>Node.js</li>
    <li>PHP</li>
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

3. Start the Development Server
After the installation is complete, start the development server using the following command:
```
npm run dev
```

4. Migrate the Database
Next, migrate the database tables. Make sure your database connection settings are correctly configured in your .env file. Run the following command:
```
php artisan migrate
```

5. Seed the Database
Seed the database with initial data by running the following command:
```
php artisan db:seed --class=RolesTableSeeder
```

6. Start the PHP Server
Finally, start the PHP server using the following command:
```
php artisan serve
```
