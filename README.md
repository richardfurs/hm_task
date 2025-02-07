## Setup

```bash
docker-compose up --build -d

docker-compose exec backend composer install

docker-compose exec backend php artisan migrate
```

Start the development server on `http://localhost:3000`
