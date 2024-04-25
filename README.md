# Medium Clone

Mini-Twitter is a backend application that allow searching using tags

## Features

- publish posts.

- Users can log in - sign up.

- Users can search using the closest results.

## Installation

Before proceeding with the installation, ensure you have all prerequests requires by laravel on your system, you can download and install from the [laravel guide](https://laravel.com/docs/11.x/installation)

Also insure that you have docker installed on your machine [Guidence](https://docs.docker.com/)
### First databases pulling

This install all images required for mongodb databases

```bash
docker pull mongo
docker run --name some-mongo -d mongo:tag
```

### for postgres download using [official guide](https://www.postgresql.org/download/)


## Usage

To use Medium-clone run 

this will migrate(make all your databases needed)
```bash
php artisan migrate
```
this will run your application.
```bash
php artisan serve
```

