## Contacts Management Platform

This is a contact management platform that allows users to store and manage contact information.

## Prerequisites for the Challenge

### Platform

The application is developed using Laravel for the backend and Vue.js for the frontend. Ensure you have the following prerequisites installed:

- **PHP** (version 7.4 or higher) with Composer to manage Laravel dependencies.
- **Node.js** (version 12 or higher) with npm to manage Vue.js dependencies.
- **TablePlus** (or any other database management tool) to manage and inspect the database. During this process, I used TablePlus to inspect the database and ensure that data was being updated correctly.

## Application Setup

### 1. Clone the Repository

Clone the repository from GitHub:

```bash
git clone <repository-url>
```

### 2. Set Up the Environment

Before proceeding with the database setup, ensure that your environment is correctly configured:

1. **Copy the environment file:**

   ```bash
   cp .env.example .env
   ```

2. **Configure the `.env` file:**

   Open the `.env` file and configure your database connection settings. Ensure that the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` fields match your local MySQL setup. For example:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

### 3. Install Dependencies

Next, you'll need to install the dependencies for both Laravel (backend) and Vue.js (frontend):

1. **Install Composer Dependencies:**

   In the root directory of the project, run the following command to install Laravel's dependencies:

   ```bash
   composer install
   ```

2. **Install NPM Dependencies:**

   If you're encountering peer dependency issues, use the `--legacy-peer-deps` flag:

   ```bash
   npm install --legacy-peer-deps
   ```

### 4. Prepare the Database

Make sure your MySQL server is running and accessible. Then, create the database that Laravel will use:


1. **Run Migrations and Seeders:**

   Once the database is created and the environment is configured, run the following command to refresh the migrations and seed the database:

   ```bash
   php artisan migrate:refresh --seed
   ```

   This will create the necessary tables and pre-seed the users in the database.

### 5. Start the Application

Start the Laravel development server:

```bash
php artisan serve
```

In a separate terminal, start the Vue.js development server:

```bash
npm run dev
```

## Application Features

### 1. **Login**

Allows users to log in to the platform. A registration screen is not necessary as users are pre-seeded in the backend.

**Note:** To access the platform, retrieve an email from the database, and use the password `12345678`. The password is encrypted in the database.

### 2. **Contacts List**

Displays a list of contacts stored by the authenticated user, showing their name and profile photo.

### 3. **Add New Contact**

Allows the user to add a new contact by specifying an image binary file, name, address, email, and phone number. Uses VeeValidate to validate the form fields.

### 4. **Update Contact**

Allows the user to update contacts by specifying an image binary file, name, address, email, and phone number. Uses VeeValidate to validate the form fields.

### 5. **Integration with Google Places API**

Implements the functionality to search for addresses using the Google Places API or another similar service. Allows users to search and select an address intuitively when adding a new contact.

## Challenges Faced

### Nuxt.js Integration

During the development process, I encountered challenges with integrating Nuxt.js due to compatibility issues between Vue 2 and the state management library (Pinia) recommended for use with Vue 3. After exploring multiple solutions, including downgrading dependencies and trying alternative configurations, I decided to focus on delivering a stable and functional application using Vue.js alone.

### Issue with PUT Method and VeeValidate

When developing the contact editing feature, I encountered an issue with using the PUT method in conjunction with VeeValidate for form validation. The problem was particularly challenging because VeeValidate's internal form submission handling is designed primarily for POST requests.
VeeValidate assumes form submissions are done via POST, which led to issues when trying to perform a PUT request for updating a contact. This conflict caused the validation errors not to display correctly, and the form submission process was interrupted.
