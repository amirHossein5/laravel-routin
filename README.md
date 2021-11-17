This package provides searching between laravel application routes. 
For example when user's going to create a menu item, have to link that to a page, but instead of writing manually you can put a select box with routes that taken in this way:

```php
Routin::routes()
  ->withoutParameter()
  ->method('get')
  ->getUri();
```
Output will be those routes **uri**, that haven't **any parameter** and verb of **GET**:

```php
array:3 [▼
  0 => "/"
  1 => "user"
  2 => "user/create"
]
```

<br/>

- **[Installation](#installation)**
- **[Filters](#filters)**
- **[Getters](#getters)**


## Prerequisites

- Laravel 8
- PHP 8 


## Installation

```bash
composer require amir-hossein5/laravel-routin
```

## Usage

## Filters



| filter                                      | description                     
| ----------------------------------------|---------------------------------------------------------------------------------------|
| uriStartsWith( string  )                | where uri (/users/create) starts with something (here starts with **u** or **users**) |
| uriEndsWith( string  )                  | where uri (/users/create) ends with something (here ends with **e** or **create**)    |
| nameStartsWith( string  )               | where name (users.create) starts with something (here starts with **u** or **user**)  |
| nameEndsWith( string  )                 | where name (users.create) ends with something (here ends with **e** or **create**)    |
| withoutParameter()                      | where route doesn't have any parameter                                                | 
| method( string  )                       | where route's verb is $mehod                                                          | 

> Notice: There is no order for methods and but you have to use ::routes() at the begining.

## Getters

- [get()](#get)
- [getUri()](#getUri)
- [getParameters()](#getParameters)
- [getName()](#getName)

After filtering routes you need to get them by these methods:


### get()

```php
use AmirHossein5\Routin\Facades\Routin;


Routin::routes()
  ->withoutParameter()
  ->method('post')
  ->get()
  
// output

array:2 [▼
  "user.store" => Illuminate\Routing\Route {#1109 ▶}
  "book.store" => Illuminate\Routing\Route {#1108 ▶}
]
```
Returns **array** with **key of name** of routes which have filtered and **value of laravel's Illuminate\Routing\Route object** 


### getUri()

```php
Routin::routes()
  ->withoutParameter()
  ->method('get')
  ->getUri()

// output

array:3 [▼
  0 => "/"
  1 => "user"
  2 => "user/create"
]
```
Returns **array** with **value of routes uri** 


### getParameters()

```php
Routin::routes()
  ->method('put')
  ->getParameters()

// output

array:2 [▼
  "user.update" => array:1 [▼
    0 => "user"
  ]
  "book.update" => array:1 [▼
    0 => "book"
  ]
]
```
Returns **array** with **key of name** of routes which have filtered and value, **array of parameters** 


### getName()

```php
Routin::routes()
  ->getName()

// output

array:7 [▼
  0 => "user.index"
  1 => "user.create"
  2 => "user.store"
  3 => "user.show"
  4 => "user.edit"
  5 => "user.update"
  6 => "user.destroy"
]
```
Returns **array** with **value of route's name** 

<br/>

## License

[License](LICENSE)


