# Laravel Translation Management Service

## Overview
This project is a Translation Management Service built in Laravel as part of a Senior Developer Code Test. The primary objective is to create a clean, scalable, and secure API-driven service to manage translations across multiple locales while ensuring high performance and maintainability.

## Features
- Store translations for multiple locales (e.g., `en`, `fr`, `es`) with support for adding new languages in the future.
- Tag translations for context (e.g., `mobile`, `desktop`, `web`).
- Expose endpoints to:
  - Create translations
  - Update translations
  - View translations
  - Search translations by tags, keys, or content.
- Provide a JSON export endpoint that always returns the latest translations.
- High-performance API with responses under `200ms`.
- Efficient handling of large datasets with JSON responses under `500ms`.

## Installation & Setup

### Prerequisites
- PHP `8.1` or later
- Composer
- MySQL or PostgreSQL database
- Laravel Passport for authentication

### Installation Steps
1. Clone the repository:
   ```sh
   git clone https://github.com/your-repo/translation-management.git
   cd translation-management
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Configure the environment:
   ```sh
   cp .env.example .env
   ```
   Update `.env` with database and authentication configurations.
4. Generate application key:
   ```sh
   php artisan key:generate
   ```
5. Run database migrations and seed translations:
   ```sh
   php artisan migrate --seed
   ```
6. Install and configure Laravel Passport:
   ```sh
   php artisan passport:install
   ```
7. Run the application:
   ```sh
   php artisan serve
   ```

## API Endpoints
| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/api/translations` | Create a new translation |
| `PUT` | `/api/translations/{id}` | Update a translation |
| `GET` | `/api/translations` | View all translations |
| `GET` | `/api/translations/search` | Search translations by tag, key, or content |
| `GET` | `/api/export/json` | Export all translations in JSON format |

## Performance Considerations
- Optimized SQL queries with indexing.
- Efficient query execution using Laravel's query builder.
- Caching mechanisms for frequently accessed translations.
- Pagination and chunking for large dataset handling.

## Scalability Testing
- A factory and command are provided to populate the database with `100K+` records.
  ```sh
  php artisan db:seed --class=TranslationSeeder
  ```
- JSON export is optimized for large datasets to return responses in `<500ms`.

## Security Measures
- Token-based authentication using Laravel Passport.
- Input validation and request throttling.
- Secure API endpoints following best practices.

## Plus Points Implemented
- **Docker Setup**: A Dockerfile and `docker-compose.yml` are included for containerized deployment.
- **OpenAPI Documentation**: Swagger documentation available at `/api/documentation`.
- **Test Coverage**: Unit and feature tests covering `>95%` of critical functionalities.
  ```sh
  php artisan test
  ```

## Contributing
Feel free to fork the repository and submit pull requests. Follow PSR-12 coding standards and ensure tests pass before submission.

## License
This project is licensed under the MIT License.

