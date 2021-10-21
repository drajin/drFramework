![Imgur](https://i.imgur.com/G89UN6P.jpg)

## Table of contents
* [General info](#general-info)
* [Features](#Featurs)
* [Screenshots](#Screenshots)
* [Technologies](#technologies)
* [Sources](#sources)
* [Setup](#setup)

## General info
Minimalistic custom framework created for the learning purposes. Made with the help of two separate tutorials. Visitors are able to register and login, and add posts to the blog page. After login, Dashboard menu will be available which enables users to view all the posts, and do the CRUD operations on their own posts as well to remove the comments.

## Features
* Custom Routing
* Controllers
* Views/Layouts
* Models
* Processing of request data
* Validations
* Registration/Login
* Simple Active Record
* Session Flash messages
* Framework reusable/installable core

### Updates
Future updates will bring signing in using google twitter or facebook APIs, Migrations, Middleware, Application events etc.


### Screenshots
![Imgur](https://i.imgur.com/Gts3WeC.jpg) | ![Imgur](https://i.imgur.com/HZsoxER.jpg) | ![Imgur](https://i.imgur.com/nTq7b4i.jpg) | ![Imgur](https://i.imgur.com/RNZxkHE.jpg) |
|-|-|-|-|

## Technologies
Project is created with:
* PHP Version 8.0.2
* Bootstrap v5.1.3.
* Composer

## Sources
The Codeholic [Build PHP MVC Framework](https://www.youtube.com/watch?v=WKy-N0q3WRo&list=PLLQuc_7jk__Uk_QnJMPndbdKECcTEwTA1&ab_channel=TheCodeholic
)

Code With Dary [Complete Login & Register System Using MVC & PDO](https://www.youtube.com/watch?v=e1oMBaWjye8&ab_channel=CodeWithDary)

## Setup

### Installation

1. Download the archive or clone the project using git `git clone https://github.com/drajin/drFramework.git`
2. Create database localhost and give it a name of `blogmvc`
3. Import database to phpMyAdmin (SQL file located in the `root/application/blogmvc.sql`
4. Run `cd drFramework`
5. Run `composer install`
6. Run `cd public`
7. Start xampp or wamp server
8. Start php server by running command `php -S 127.0.0.1:8080` 
9. Open in browser `http://127.0.0.1:8080`




    
