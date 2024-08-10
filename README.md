
## Prerequisites for the challenge

### Platform:

The application is developed using Laravel for the backend and Vue.js for the frontend. Ensure you have the following prerequisites installed:

- **PHP** (version 7.4 or higher) with Composer to manage Laravel dependencies.
- **Node.js** (version 12 or higher) with npm to manage Vue.js dependencies.

### Application Installation

#### 1. Clone the Repository

Clone the repository from GitHub:

```bash
git clone <repository-url>
```

#### 2. Configure the Environment

Copy the `.env.example` file to `.env` and configure the environment variables as needed, especially those related to the database and external services like Google Places API.

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

#### 3. Prepare the Database

Run the migrations and seeders to prepare the database:

```bash
php artisan migrate --seed
```

This will create the necessary tables and pre-seed the users in the database.

#### 4. Start the Application

Start the Laravel development server:

```bash
php artisan serve
```

In a separate terminal, start the Vue.js development server:

```bash
npm run dev
```

#### 7. Configure the Frontend

In the `app.js` file (located in `public/js/app.js`), ensure that state management with Pinia, form validations with Vee-Validate, and authentication with Laravel Sanctum or JWT are properly configured.

### Application Features

#### 1. **Login**:

Allows users to log in to the platform. A registration screen is not necessary as users will be pre-seeded in the backend.

#### 2. **Contacts List**:

Displays a list of contacts stored by the authenticated user, showing their name and profile photo.

#### 3. **Add New Contact**:

Allows the user to add a new contact by specifying an image binary file, name, address, email, and phone number. Uses VeeValidate to validate the form fields.

#### 4. **Update Contact**:

Allows the user to update contacts by specifying an image binary file, name, address, email, and phone number. Uses VeeValidate to validate the form fields.

#### 5. **Integration with Google Places API**:

Implements the functionality to search for addresses using the Google Places API or another similar service. Allows users to search and select an address intuitively when adding a new contact.

