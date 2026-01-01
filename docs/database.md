# Database Management Guide

This guide outlines the procedures for managing and updating the MariaDB database for the jasonbrain.com project.

## Schema Source of Truth
The canonical database schema is located at:
`database/database.sql`

This file contains the structure for all tables (`users`, `settings`, `auth_tokens`, etc.) and initial data for the `settings` table.

## Updating the Database

As the project evolves, you may need to apply changes to your local or production database. There are two primary methods to do this.

### Method 1: Incremental Update (SQL Execution)
**Best for:** Adding a specific feature (e.g., "Remember Me") or modifying an existing table structure without affecting other data.

1.  **Locate the Change**: Identify the specific SQL command required for the new feature. This is often found in the Pull Request description or by comparing the old and new `database.sql`.
    *   *Example*: Creating the `auth_tokens` table.
2.  **Access phpMyAdmin**: Log in to your hosting control panel (cPanel) and open **phpMyAdmin**.
3.  **Select Database**: Click on your database name (e.g., `jasonbra_jasonbra1n`) in the left sidebar.
4.  **Run SQL**:
    *   Click the **SQL** tab at the top.
    *   Paste the specific SQL command into the text box.
    *   Click **Go**.

### Method 2: Full Schema Import
**Best for:** Initial setup or ensuring your database has all the latest tables.

**Note:** The `database.sql` file uses `CREATE TABLE IF NOT EXISTS`. This means importing it **will add missing tables** but **will not modify existing tables** (e.g., it won't add a missing column to the `users` table if the table already exists).

1.  **Access phpMyAdmin**: Open **phpMyAdmin** and select your database.
2.  **Import**:
    *   Click the **Import** tab at the top.
    *   Click **Choose File** and select `database/database.sql` from your local repository.
    *   Ensure format is set to **SQL**.
    *   Click **Import** (or **Go**).

## Database Connection
The application connects to the database using credentials defined in `public/config.php`.
- **Host**: Defined by `DB_HOST`
- **User**: Defined by `DB_USER`
- **Password**: Defined by `DB_PASS`
- **Name**: Defined by `DB_NAME`

Ensure these match your environment (Local vs. Production).