
## Contacts Management Platform

This is a contact management platform that allows users to store and manage contact information

## Prerequisites for the Challenge

### Platform

The application is developed using Laravel for the backend and Vue.js for the frontend. Ensure you have the following prerequisites installed:

- **PHP** (version 7.4 or higher) with Composer to manage Laravel dependencies.
- **Node.js** (version 12 or higher) with npm to manage Vue.js dependencies.

## Application Installation

### 1. Clone the Repository

Clone the repository from GitHub:

```bash
git clone <repository-url>
```


### 2. Prepare the Database

Run the migrations and seeders to prepare the database:

```bash
php artisan migrate --seed
```

This will create the necessary tables and pre-seed the users in the database.

### 3. Start the Application

Start the Laravel development server:

```bash
php artisan serve
```

In a separate terminal, start the Vue.js development server:

```bash
npm run dev
```


### Application Features

#### 1. **Login**

Allows users to log in to the platform. A registration screen is not necessary as users are pre-seeded in the backend.

**Note:** To access the platform, retrieve an email from the database, and use the password `12345678`. The password is encrypted in the database.

#### 2. **Contacts List**

Displays a list of contacts stored by the authenticated user, showing their name and profile photo.

#### 3. **Add New Contact**

Allows the user to add a new contact by specifying an image binary file, name, address, email, and phone number. Uses VeeValidate to validate the form fields.

#### 4. **Update Contact**

Allows the user to update contacts by specifying an image binary file, name, address, email, and phone number. Uses VeeValidate to validate the form fields.

#### 5. **Integration with Google Places API**

Implements the functionality to search for addresses using the Google Places API or another similar service. Allows users to search and select an address intuitively when adding a new contact.

## Challenges Faced

### Nuxt.js Integration

During the development process, I encountered challenges with integrating Nuxt.js due to compatibility issues between Vue 2 and the state management library (Pinia) recommended for use with Vue 3. After exploring multiple solutions, including downgrading dependencies and trying alternative configurations, I decided to focus on delivering a stable and functional application using Vue.js alone.

### Pinia State Management

In an attempt to implement state management using Pinia, I encountered several issues, especially when managing authentication (authStore) and contact management (contactStore). The primary challenge was related to the integration of Pinia with Vue 2 and the handling of state across different components.

Despite these challenges, I attempted to integrate Pinia for state management to manage the authentication process (`authStore`) and contact information (`contactStore`). However, due to these issues, I decided to maintain a simpler state management strategy until the application's core functionality was stabilized.

### Issue with PUT Method and VeeValidate

During the development of the contact editing feature, I encountered an issue when attempting to use the PUT method in combination with VeeValidate for form validation. The problem arose due to VeeValidate's internal handling of form submissions, which conflicted with the expected behavior of the PUT method in Laravel. Specifically, the validation errors were not properly displayed, and the form submission was not processed correctly.
After some investigation, I found that VeeValidate’s default behavior assumes a POST request for form submissions, which led to unexpected behavior when trying to perform a PUT request. This limitation forced me to handle the form submission and validation errors manually in my Vue.js setup. To work around this, I implemented custom error handling in app.js to properly manage the validation and display errors without relying on VeeValidate's default form handling.
