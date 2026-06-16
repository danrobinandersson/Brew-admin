# BrewAdmin ☕

A Laravel web application for managing a coffee shop's product inventory. BrewAdmin allows administrators to create, read, update, and delete coffee products with advanced filtering capabilities.

## Features

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

- PHP
- Laravel
- MySQL/SQLite
- Node.js & npm (for Tailwind CSS)

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

```bash
php artisan migrate
php artisan db:seed
```

### 5. Build Assets

```bash
npm run dev
```

### 6. Start Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Usage

### View Products

Navigate to `/products` to see all products in a table format.

### Create a Product

1. Click the "Create New Product" button
2. Fill in all required fields
3. Click "Save Product"

### Filter Products

Use the filter form to narrow down products by:

- **Category** - Select from dropdown
- **Type** - Select from dropdown
- **Price Range** - Enter min and/or max price

Combine multiple filters for precise results!

### Edit a Product

1. Click "View" on a product
2. Click "Edit Product"
3. Update fields and save

### Delete a Product

1. Click "Delete" button (on list or detail page)
2. Confirm deletion

## Project Structure 📁

```
brewadmin/
├── app/
│   ├── Http/
│   │   ├── Controllers/ProductController.php
│   │   └── Requests/ProductRequest.php
│   └── Models/
│       ├── Product.php
│       └── Category.php
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   ├── css/app.css
│   └── views/
│       ├── layouts/app.blade.php
│       └── products/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           ├── show.blade.php
│           └── form.blade.php
└── routes/web.php
```

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

## Technologies Used

- Laravel - PHP web framework
- Blade - Template engine
- Tailwind CSS - Utility-first CSS framework
- MySQL - Database
- Vite - Build tool for assets

## Git Workflow 📊

This project uses **GitHub Flow**:

- `main` - Production-ready code
- `develop` - Development branch
- `feature/*` - Feature branches (e.g., `feature/product-crud`)

## Future Enhancements

- [ ] User authentication & authorization
- [ ] Pagination for large product lists
- [ ] Export products to CSV/PDF
- [ ] Product images/gallery
- [ ] Order management system
- [ ] Advanced reporting

## License

This project is created for educational purposes as part of a Laravel course assignment.

## Author

Created by: Robin Andersson
Course: WU25 - Web Development  
School: Yrgo

---

**Last Updated:** June 2026
