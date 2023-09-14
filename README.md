### Installation

- `cp .env.example .env` touch .env

- [Sail](https://laravel.com/docs/10.x/sail#installing-composer-dependencies-for-existing-projects)

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

`./vendor/bin/sail up -d && ./vendor/bin/sail artisan migrate --seed`

### API 
base url `http://localhost`

| type   | url                         |  description            |
| ------ | --------------------------- | ---------------------- |
| GET   | /api/products             |  Get list of products     |
| GET   | /api/products/id            | Get product by id    |
| POST   | /api/products           | Create new product    |
| PUT | /api/products/id        | Update product by id |
| Delete | /api/products/id        | Delete product by id    |
| POST | /api/products/id/image        | Upload product image    |

### Tests

`./vendor/bin/sail test`