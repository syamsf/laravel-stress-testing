# Laravel Stress Testing

## What's Included?

- `docker-compose.yml` configuration file
- `Dockerfile` featuring the latest PHP 8.4
- Laravel 11 framework
- Database seeder generating 1,000,000 user records
- `about-me/{id}`  testing

## Endpoints

| Endpoints              | Description                                                        |
|------------------------|--------------------------------------------------------------------|
| `/about-me/{id}`       | API endpoint for randomized user ID                                |
| `/cache/about-me/{id}` | API endpoint for randomized user ID with cache mechanism           |
| `/direct`              | API endpoint for return response directly (no external connection) |

## How to Set Up?

1. Start Docker containers: `docker-compose up -d`
2. Run database migrations: `php artisan migrate`
3. Seed the database: `php artisan db:seed`

## Important Notes

- The seeding process will **truncate** the `users` table before inserting data. Ensure the database is properly configured beforehand.

## Running the Load Test

- A K6 script is available in the k6 directory for stress testing.
- Execute tests using the following commands:
  - Gradually ramp up to 50 virtual users: `k6 run load-test-v1.js`
  - Run with 100 virtual users for 30 seconds: `k6 run --vus 100 --duration 30s load-test-v2.js`
