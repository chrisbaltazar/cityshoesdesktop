

# CityShoesDesktop

Small application for a shoes shop using Laravel + Inertia + NativePHP 🚀

_Work in progress_ 😉

## Tech Stack

**Frontend:** Inertia, Vue3, BootstrapCSS, TailwindCSS

**Backend:** PHP8.1, Laravel 10


## Screenshots

![Inventory](screenshots/Screenshot-inventory.png)

![Sales](screenshots/Screenshot-sales.png)

![Report](screenshots/Screenshot-report.png)


## Run Locally

Clone the project

```bash
  git clone git@github.com:chrisbaltazar/cityshoesdesktop.git
```

Go to the project directory

```bash
  cd cityshoesdesktop
```

Install dependencies

```bash
  composer install
```

```bash
  npm install
```

Copy the `.env.example` file to `.env` and set your database credentials

```bash
  cp .env.example .env
```

Setup the database

```bash
  php artisan migrate --seed
```

Start the server

```bash
  npm run dev   
```

```bash
  php artisan serve
```

Visit the given local url and login using the default user created from: 
```
Database\Factories\UserFactory::default()
```

## Running Tests

To run tests, run the following command

```bash
  php artisan test
```


## License

[MIT](https://choosealicense.com/licenses/mit/)

