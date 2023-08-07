<div  align="center">

<h3  align="center">Products and categories Challenge Made with Laravel and Vuejs</h3>

<p  align="center">

Welcome to the README, you will be shown how to quick start the project.

</p>

<br />

</div>

<!-- TABLE OF CONTENTS -->

<details>

<summary>Table of Contents</summary>

<ol>

<li>

<a  href="#about-the-project">About The Project</a>

<ul>

<li><a  href="#built-with">Built With</a></li>

</ul>

</li>

<li>

<a  href="#getting-started">Getting Started</a>

<ul>

<li><a  href="#prerequisites">Prerequisites</a></li>

<li><a  href="#installations">Installation</a></li>

</ul>

</li>

<li><a  href="#Used-Tools">Used Tools</a></li>

<li><a  href="#Challenge-Description">Challenge Description</a></li>

<li><a  href="#Contact">Contact Me</a></li>

</ol>

</details>

<!-- ABOUT THE PROJECT -->

## About The Project

The goal is to create a simple app to provide the products with in relation with the categories.

<p  align="right">(<a  href="#readme-top">back to top</a>)</p>

### Built With

This simple project was built with the Laravel framework and used RESTApi for the backend.

-   [Laravel][laravel-url]
-   VueJs

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

At first you will need to clone the git repository to your local machine, so you need to run:

```sh

git  clone  https://github.com/BadrChoujai/Productify.git

```

Generate a new application key:

```
php artisan key:generate
```

**Run Migrations and Seeders:**

-   Run database migrations to create the required tables:

```
php artisan migrate
```

**Set Up Storage and Link Public Files:**

-   Link the storage directory to the public directory for file uploads to work:

```
php artisan storage:link
```

And you will need to generate fake data in order to have something to test with, with this command:

```bash

php artisan db:seed

```

Finally run:

```
npm run dev
```

## Authentication

There was no need for an authentication mechanism. therefore not implemented.

## Products Lising

To retrieve the list of products:

-   Request `GET` |`/api/products` params (minPrice | null, maxPrice | null)

-   with Response

```json

{

"data": [

{

"id":  2,

"name":  "consequatur",

"description":  "Ut ab reiciendis et fuga maiores sed. Sed cumque odit eos libero. Id sequi quia sit quod. Veritatis culpa animi voluptatem dolore.",

"price":  45.8,

"image":  "test_image.jpg",

"created_at":  "2023-08-07T10:00:30.000000Z",

"updated_at":  "2023-08-07T10:00:30.000000Z",

"categories":  []

},

...

}



```

## Product Creation

To create a product:

-   Request `GET` |`/api/products/create`

    with payload:

```json
{
    "data": {
        "name": "product name",

        "description": "This is a test product.",

        "price": 4.2,

        "image": "test_image",

        "categories": [1, 2]
    }
}
```

-   with Response

```json
{
    "name": "qdwqdewd",
    "description": "wecewcw",
    "price": "332",
    "image": "wallpaperflare.com_wallpaper.jpg",
    "updated_at": "2023-08-07T17:20:24.000000Z",
    "created_at": "2023-08-07T17:20:24.000000Z",
    "id": 22
}
```

### Categories

To retrieve the leader-board for the robots, the results are ordered in a DESC order showing robots that have most wins:

-   Request `GET` | `/api/categories`

-   Response

```json

{

"data": {
{

"id":  3,

"name":  "doloribus",

"parent_id":  null,

"created_at":  "2023-08-07T09:57:20.000000Z",

"updated_at":  "2023-08-07T09:57:20.000000Z"

},
...

},

}

```

<p  align="right">(<a  href="#readme-top">back to top</a>)</p>

### Used Tools

-   Used **Postman** To Test RESTApi endpoints.

## Challenge Description

### Features

-   Ability to create a product (from web and cli)
-   A listing products with ability to sort by price, or/and filter by a category (from web)

<!-- CONTACT -->

## Contact

Badr CHOUJAI - [linkedin-url] - choujai.badr@gmail.com

<p  align="right">(<a  href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->

[linkedin-url]: https://linkedin.com/in/choujai-badr
[laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[laravel-url]: https://laravel.com
