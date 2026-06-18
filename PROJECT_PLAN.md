# ☕ BrewAdmin — Laravel Beverage Shop Project Plan

A web-based admin tool for managing a beverage product catalogue (coffee & tea).
Built with Laravel as part of a school assignment, due **June 19, 2025**.

---

## 📦 Project Overview

| Field        | Details                         |
| ------------ | ------------------------------- |
| Project Name | BrewAdmin                       |
| Product Type | Beverages (Coffee & Tea)        |
| Framework    | Laravel                         |
| Deadline     | June 19, 2025                   |
| Repo         | `github.com/your-org/brewadmin` |

---

## 🗂️ Features

### G Requirements

- [x] CRUD for products (name, description, price, category, origin, weight, stock)
- [x] Filter by category (coffee/tea), type (e.g. espresso, green tea), and price range
- [x] Factory & seeder with realistic beverage data
- [x] Semantic HTML (`<main>`, `<nav>`, `<header>`, `<section>`)
- [x] Properly labeled forms with accessible error messages
- [x] Sufficient color contrast between text and backgrounds
- [x] Errors conveyed with text/icons, not color alone
- [x] Legible fonts, layout survives 200% zoom

### VG Requirements

- [x] Pagination (12 products per page)
- [x] At least two simultaneous filter options
- [x] Good naming conventions throughout (variables, files, routes, models)

---

## 🗓️ Timeline

### Week 1 — June 3–8: Setup & Database

| Day       | Task                                                        | Issue |
| --------- | ----------------------------------------------------------- | ----- |
| Tue Jun 3 | Create GitHub repo, set up project board, define issues     | #1    |
| Tue Jun 3 | Scaffold Laravel app, configure `.env`, first commit        | #2    |
| Wed Jun 4 | Design & run migrations (products, categories tables)       | #3    |
| Thu Jun 5 | Write `ProductFactory` and `DatabaseSeeder` with Faker data | #4    |
| Fri Jun 6 | Test seeding, verify realistic data, peer review            | #5    |

### Week 2 — June 9–13: CRUD & Filtering

| Day        | Task                                                       | Issue |
| ---------- | ---------------------------------------------------------- | ----- |
| Mon Jun 9  | Build `ProductController` with index, create, store        | #6    |
| Tue Jun 10 | Build edit, update, destroy — full CRUD done               | #7    |
| Tue Jun 10 | Create `ProductRequest` form request with validation rules | #8    |
| Wed Jun 11 | Add filter logic (category + price range) to index query   | #9    |
| Thu Jun 12 | Add pagination (`->paginate(12)` + `withQueryString()`)    | #10   |
| Fri Jun 13 | Manual test of all CRUD + filters + pagination together    | #11   |

### Week 3 — June 16–18: Polish, A11y & README

| Day        | Task                                                              | Issue |
| ---------- | ----------------------------------------------------------------- | ----- |
| Mon Jun 16 | Implement semantic HTML across all views                          | #12   |
| Mon Jun 16 | Label all form inputs, add visible error messages with icons      | #13   |
| Tue Jun 17 | Color contrast audit (WebAIM), fix any issues                     | #14   |
| Tue Jun 17 | Zoom test at 150% and 200%, fix any layout breaks                 | #15   |
| Wed Jun 18 | Write `README.md` with install guide and feature notes            | #16   |
| Wed Jun 18 | Full fresh install test: `migrate:fresh --seed`, run through demo | #17   |

### June 19 — Demo Day 🎉

| Time         | Task                                             |
| ------------ | ------------------------------------------------ |
| Before 09:00 | Repo is public, link posted on Discord/similar   |
| 09:00        | Receiving group clones and installs your project |
| 09:15        | Demo begins                                      |

---

## 🧱 Data Model

### `products` table

| Column       | Type      | Notes                                |
| ------------ | --------- | ------------------------------------ |
| id           | bigint    | Primary key                          |
| name         | string    | e.g. "Ethiopian Yirgacheffe"         |
| description  | text      | Short product description            |
| price        | decimal   | e.g. 129.00                          |
| category_id  | foreignId | FK to categories                     |
| type         | string    | e.g. "espresso", "green tea", "chai" |
| origin       | string    | e.g. "Ethiopia", "Japan"             |
| weight_grams | integer   | e.g. 250                             |
| stock        | integer   | Units in stock                       |
| created_at   | timestamp |                                      |
| updated_at   | timestamp |                                      |

### `categories` table

| Column | Type   | Notes                |
| ------ | ------ | -------------------- |
| id     | bigint | Primary key          |
| name   | string | e.g. "Coffee", "Tea" |

---

## 🔍 Filters

| Filter      | Type          | Example Values                        |
| ----------- | ------------- | ------------------------------------- |
| Category    | Dropdown      | Coffee, Tea                           |
| Type        | Dropdown      | Espresso, Pour Over, Green Tea, Chai… |
| Price range | Min/Max input | 0–500 SEK                             |

---

## 🌱 Seeder Plan

Use `Faker` to generate realistic beverage data:

- **Categories:** Coffee, Tea (seeded first)
- **Types:** Espresso, Pour Over, Cold Brew, Green Tea, Black Tea, Herbal, Chai, Oolong
- **Origins:** Ethiopia, Colombia, Japan, India, Sri Lanka, China, Brazil
- **Names:** Combine origin + type + roast level (e.g. "Colombian Medium Roast Espresso")
- **Seed count:** 50 products

---

## ♿ Accessibility Checklist (a11y)

- [ ] Semantic HTML (`<main>`, `<nav>`, `<header>`, `<article>`, `<section>`)
- [ ] Every `<input>` has a `<label for="...">` — no placeholder-only labels
- [ ] Error messages include text like "Error: field is required", not just red borders
- [ ] All text passes WCAG AA contrast ratio (4.5:1) — check with [WebAIM](https://webaim.org/resources/contrastchecker/)
- [ ] Error states use icons or text in addition to color
- [ ] System font stack or clearly legible font (min 16px base)
- [ ] Layout intact at 200% zoom (test in browser, not device emulator)

---

## 🌿 Gitflow Branch Strategy

```
main          ← stable, demo-ready
└── develop   ← integration branch
    ├── feature/setup-and-migrations
    ├── feature/factory-and-seeder
    ├── feature/product-crud
    ├── feature/filtering
    ├── feature/pagination
    ├── feature/accessibility
    └── feature/readme-and-cleanup
```

- All work happens on `feature/` branches
- Merge to `develop` via Pull Request
- Merge `develop` → `main` only when stable

---

## 📋 GitHub Issues to Create

| #   | Title                               | Label   |
| --- | ----------------------------------- | ------- |
| 1   | Project setup & GitHub board        | setup   |
| 2   | Laravel scaffold & env config       | setup   |
| 3   | Create migrations                   | backend |
| 4   | Factory & seeder                    | backend |
| 5   | Product CRUD (index, create, store) | backend |
| 6   | Product CRUD (edit, update, delete) | backend |
| 7   | Form validation with ProductRequest | backend |
| 8   | Filter logic                        | feature |
| 9   | Pagination                          | feature |
| 10  | Semantic HTML                       | a11y    |
| 11  | Form labels & error messages        | a11y    |
| 12  | Color contrast audit                | a11y    |
| 13  | Zoom & font test                    | a11y    |
| 14  | README.md                           | docs    |
| 15  | Fresh install & demo dry run        | qa      |

---

## 📁 Suggested File/Naming Conventions

```
app/
  Models/
    Product.php
    Category.php
  Http/
    Controllers/
      ProductController.php
    Requests/
      ProductRequest.php
database/
  migrations/
    create_categories_table.php
    create_products_table.php
  factories/
    ProductFactory.php
  seeders/
    CategorySeeder.php
    ProductSeeder.php
    DatabaseSeeder.php
resources/views/
  products/
    index.blade.php
    create.blade.php
    edit.blade.php
    show.blade.php
  layouts/
    app.blade.php
```

---

## 🚀 Install Instructions (for README.md)

```bash
git clone https://github.com/your-org/brewadmin.git
cd brewadmin
composer install
cp .env.example .env
php artisan key:generate
# Configure DB in .env, then:
php artisan migrate --seed
npm install && npm run dev
php artisan serve
```

Visit `http://localhost:8000`

---

_Last updated: June 3, 2025_
