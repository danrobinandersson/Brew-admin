# BrewAdmin ☕

A Laravel web application for managing a coffee shop's product inventory. BrewAdmin allows administrators to create, read, update, and delete coffee products with advanced filtering capabilities.

## Features

- **Login Required** - The system is protected by a simple authentication gate (see test credentials below)
- **Full CRUD Operations** - Create, read, update, and delete products
- **Advanced Filtering** - Filter products by:
    - Category (Coffee, Tea, etc.)
    - Type (Espresso, French Press, etc.)
    - Price Range (Min/Max SEK)

- **Product Management** - View detailed product information including:
    - Name, description, price
    - Origin, type, weight
    - Stock levels
    - Category classification
- **Responsive Design** - Clean, professional UI built with Tailwind CSS
- **Data Seeding** - Pre-populated database with realistic coffee/tea data

## Requirements

- PHP 8.2+
- Composer
- MySQL (running locally)
- Node.js & npm (for Tailwind CSS / Vite)

## Installation

### 1. Clone the Repository

```bash
git clone <your-repo-url>
cd brewadmin
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup

Create a MySQL database first:

```bash
mysql -u root -p
```

```sql
CREATE DATABASE brewadmin;
exit;
```

Then open `.env` and set your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=brewadmin
DB_USERNAME=root
DB_PASSWORD=your_password
```

> **Note:** If you get a "Connection refused" error, try changing `DB_HOST` to `localhost` instead of `127.0.0.1` — this is a common issue on Mac with Homebrew MySQL, which sometimes runs on a socket rather than TCP port 3306.

Run migrations and seed the database:

```bash
php artisan migrate --seed
```

### 5. Create a Login User

The app requires login. Create a test user via Tinker:

```bash
php artisan tinker
```

```php
App\Models\User::create(['name' => 'Admin', 'email' => 'admin@test.com', 'password' => bcrypt('password')]);
exit
```

**Test login credentials:**

- Email: `admin@test.com`
- Password: `password`

### 6. Build Assets

```bash
npm run dev
```

Keep this running in a separate terminal tab while using the app — it compiles Tailwind CSS on the fly.

### 7. Start Development Server

In another terminal tab:

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser. You'll be redirected to the login page.

## Database Schema

### Products Table

- `id` - Primary key
- `category_id` - Foreign key to categories
- `name` - Product name
- `description` - Product description
- `price` - Price in SEK
- `type` - Product type (Espresso, French Press, etc.)
- `origin` - Country/region of origin
- `weight_grams` - Package weight
- `stock` - Number of units in stock

### Categories Table

- `id` - Primary key
- `name` - Category name (Coffee, Tea, etc.)

## Git Workflow

This project uses **Gitflow**:

- `main` - Production-ready code
- `develop` - Development branch
- `feature/*` - Feature branches (e.g., `feature/product-crud`, `feature/simple-auth`)

## Future Enhancements

- [ ] User registration (currently single test user only)
- [ ] Export products to CSV/PDF
- [ ] Product images/gallery
- [ ] Sorting by price, ascending or decending

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Author

Created by: Robin Andersson
Course: WU25 - Web Development
School: Yrgo

---

**Last Updated:** June 2026
