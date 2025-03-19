# How to Run the Program

This guide provides step-by-step instructions to set up and run the Laravel backend for the property management system with PostgreSQL.

---

## Requirements

Before starting, make sure you have the following installed on your machine:
- **PHP** (7.4 or above): Check by running `php -v`.
- **Composer**: Check by running `composer -V`.
- **PostgreSQL**: Ensure the database server is up and running.
- **DBeaver** (optional): For managing your PostgreSQL database easily.

---

## 1. Installation Steps

### 1.1 Clone the Repository
Clone the project repository to your local machine:
```bash
git clone <repository-url>
cd <project-directory>
```

### 1.2 Install Dependencies
Install Laravel's required dependencies using Composer:
```bash
composer install
```

### 1.3 Configure Environment Variables
Create a `.env` file by copying the example file:
```bash
cp .env.example .env
```
Update the `.env` file with your PostgreSQL database credentials:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=your_postgres_user
DB_PASSWORD=your_postgres_password
```

---

## 2. Database Setup

### 2.1 Create the Database
Use DBeaver or PostgreSQL CLI to create the database:
```sql
CREATE DATABASE properties_db;
```

### 2.2 Run Migrations
Run the following command to create the database tables:
```bash
php artisan migrate
```

### 2.3 Seed the Database
Run the seeder to populate the database with sample data:
```bash
php artisan db:seed --class=PropertySeeder
```

---

## 3. Run the Application

### 3.1 Start the Laravel Development Server
Run the Laravel development server using:
```bash
php artisan serve
```
The application will be available at `http://127.0.0.1:8000`.

---

## 4. API Usage

### 4.1 Get All Properties
- **Endpoint:** `GET /properties`
- **Query Parameters:**
  - `title` *(optional)*: Filter properties by title. Example: `/properties?title=condo`
  - `sort_by` *(optional)*: Sort results by a field (e.g., `price`). Example: `/properties?sort_by=price&order=desc`
  - `order` *(optional)*: Sort direction (`asc` or `desc`). Default is `asc`.
  - `page` *(optional)*: Paginate results. Example: `/properties?page=2`

### 4.2 Get Properties by Province
- **Endpoint:** `GET /properties/{province}`
- **Path Parameters:**
  - `province`: The name of the province to filter properties. Example: `/properties/bangkok`
- **Query Parameters:**
  - `title` *(optional)*: Filter by title within the province. Example: `/properties/bangkok?title=condo`
  - `sort_by` *(optional)*: Sort results by a field (e.g., `price`). Example: `/properties/bangkok?sort_by=price&order=asc`
  - `order` *(optional)*: Sort direction (`asc` or `desc`). Default is `asc`.
  - `page` *(optional)*: Paginate results. Example: `/properties/bangkok?page=2`

---

## 5. Additional Commands

### 5.1 Clear Cache
If you encounter issues, try clearing Laravel's cache:
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### 5.2 Check Defined Routes
To view all defined routes in your application, use:
```bash
php artisan route:list
```

---