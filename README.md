<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Hr Management Application - Gateway Assignment.

The application is divided into three separate API groups, the warehouses , branches and the devices, the idea is the wearhouse is meant to be a storage of the devices while the devices are devided between the branches of the warehouses. 

The APIs created in this application are based on the requirements that are found in the root directory of the project in the format of PDF, this application strictly follows that guideline and any necessary function that is missing, It's because it did not exist in the guideline.

Installation (without docker):

Make sure you are using the latest version of composer.
Clone the repo at https://github.com/zerakjamil/hr-management-system.git
Install dependencies via composer: composer install
Duplicate and rename env.local to .env and edit as necessary.
Run the following artisan commands, php artisan migrate:fresh --seed, php artisan storage:link.
Installation (with docker)

Laravel sail is installed, edit as necessary and run.
Postman Collection

Can is included in the root of the project.
Or can be found here https://documenter.getpostman.com/view/18062098/2s93Jus2Su (this is recommended to use as it holds the environment variables).
The postman collection comes with an environment file, make sure that one is selected, update the host value as needed if you decide to run it locally and when you generate a token it will automatically save it in the environment for you, then you can either navigate to dashboard folder or user folder to start making requests to the application.
Notes:

The api response format follows the JSend standards, This was more suitable for this project.
The super admin can manage all the warehouses.
The branches and the devices are stored indivisually in the database.
The first user is Zirak@example.com with password of password, it have the permissions of Super Admin.
An example of databaes file is included in the project hr-management-system\storage\app directory for testing the db export.
