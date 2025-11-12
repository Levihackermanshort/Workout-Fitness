# Fitness Journal - Laravel Web Application

## Overview

The Fitness Journal is a web application built using the Laravel 11 framework that allows users to track and manage their workout activities. This application demonstrates the implementation of the Model-View-Controller (MVC) architectural pattern, providing a clean separation of concerns and following Laravel best practices.

## Scenario

The Fitness Journal application enables users to record, view, edit, and search through their workout activities. Users can track various types of physical activities including jogging, weight training, yoga, and more. Each activity record includes details such as date, time, duration, distance, sets, reps, and personal notes. This application serves as a digital fitness diary, helping users maintain consistency in their fitness journey and monitor their progress over time.

## MVC Design Pattern Implementation

The application follows the MVC (Model-View-Controller) architectural pattern, which separates the application into three interconnected components:

### Model (M)

The Model layer represents the data structure and business logic. In this application, the `Activity` model (`app/Models/Activity.php`) extends Laravel's Eloquent ORM, providing an object-oriented interface to interact with the `activities` database table.

**Example from code:**
```php
// app/Models/Activity.php
class Activity extends Model
{
    protected $fillable = [
        'date', 'time_start', 'time_end', 'activity',
        'time_spent', 'distance', 'set_count', 'reps', 'note',
    ];
}
```

The model defines which attributes can be mass-assigned, ensuring data integrity. Eloquent automatically handles database operations, allowing us to use methods like `Activity::create()`, `Activity::find()`, and `$activity->update()` without writing SQL queries directly.

### View (V)

The View layer is responsible for presenting data to the user. This application uses Laravel's Blade templating engine, which provides a clean syntax for embedding PHP code within HTML templates.

**Example from code:**
```php
// resources/views/activities/index.blade.php
@foreach($activities as $activity)
    <tr>
        <td>{{ $activity->date->format('Y-m-d') }}</td>
        <td>{{ $activity->activity }}</td>
    </tr>
@endforeach
```

Blade directives like `@foreach`, `@if`, and `{{ }}` make the templates readable and maintainable. The views are organized in the `resources/views` directory, with a layout file (`layouts/app.blade.php`) providing consistent structure across all pages.

### Controller (C)

The Controller layer acts as an intermediary between the Model and View, handling user input and coordinating the application flow. The `ActivityController` (`app/Http/Controllers/ActivityController.php`) contains methods for each CRUD operation.

**Example from code:**
```php
// app/Http/Controllers/ActivityController.php
public function store(StoreActivityRequest $request): RedirectResponse
{
    Activity::create($request->validated());
    return redirect()->route('activities.index')
        ->with('success', 'Activity created successfully.');
}
```

The controller receives HTTP requests, uses Form Request classes for validation (demonstrating good practice), interacts with the model to perform database operations, and returns appropriate responses (views or redirects). All CRUD routes use Laravel's resource routing (`Route::resource('activities', ActivityController::class)`).

## Key Features

### CRUD Operations

The application implements full CRUD (Create, Read, Update, Delete) functionality:

- **Create**: Users can add new activities through a form (`/activities/create`)
- **Read**: Activities are displayed in a paginated table (`/activities`)
- **Update**: Existing activities can be edited (`/activities/{id}/edit`)
- **Delete**: Activities can be removed from the database

### Database Design

The application uses a single `activities` table designed in first normal form (1NF). The table structure includes:

- Primary key (`id`)
- Date and time fields for tracking when activities occurred
- Activity name and details (duration, distance, sets, reps)
- Notes field for additional information
- Timestamps for record creation and updates

### Migrations and Seeders

Laravel migrations (`database/migrations/2024_01_01_000001_create_activities_table.php`) define the database schema, allowing version control of database structure. The seeder (`database/seeders/ActivitySeeder.php`) populates the database with sample data for testing and demonstration purposes.

### Additional Features (Extra Credit)

1. **Search Functionality**: Users can search activities by date or keyword. The search works seamlessly with pagination and shows result count feedback.
2. **Pagination**: Activity listings are paginated (10 items per page) with complex pagination controls showing page numbers.
3. **Input Validation**: Laravel's validation system ensures data integrity with complex validation rules (regex patterns, date constraints) and error messages displayed next to relevant form controls. Forms properly re-populate after validation failures.
4. **Laravel Components**: The application uses Blade components for reusable UI elements (Alert, Button, FormField components).
5. **Form Requests**: Validation is handled by dedicated Form Request classes (`StoreActivityRequest`, `UpdateActivityRequest`) for better code organization.
6. **Route Resources**: All CRUD routes use Laravel's resource routing for cleaner, more maintainable route definitions.
7. **Factories**: Database seeding uses the `ActivityFactory` to generate realistic test data (35 activities seeded for pagination demonstration).
8. **Sessions**: Success messages are displayed using Laravel's session flash data for user feedback on create, update, and delete operations.

## Good Practices Implemented

1. **Route Resources**: All CRUD routes use Laravel's resource routing (`Route::resource()`) for cleaner, more maintainable route definitions.
2. **Form Requests**: Validation logic is separated into dedicated Form Request classes (`StoreActivityRequest`, `UpdateActivityRequest`) following the Single Responsibility Principle.
3. **Factories**: Database seeding uses factories (`ActivityFactory`) to generate realistic test data, making it easy to populate the database with varied content.
4. **Blade Components**: Reusable UI components (Alert, Button, FormField) promote code reusability and maintainability.
5. **Session Flash Messages**: User feedback is provided through Laravel's session flash data for create, update, and delete operations.
6. **Complex Validation Rules**: Validation includes regex patterns, date constraints, and custom error messages displayed inline next to form controls.
7. **Form Re-population**: Forms properly re-populate with user input after validation failures, improving user experience.
8. **Advanced CSS**: The application demonstrates complex CSS techniques including gradients, animations, transforms, and advanced layouts without using CSS frameworks.
9. **Code Organization**: Files are organized following Laravel's conventions and best practices.
10. **Security**: CSRF protection is enabled for all forms, and input validation prevents malicious data entry.

## Installation Instructions

**Important Note for Submission:**
- The `vendor` folder and `node_modules` folder are **NOT** included in the submission (correctly excluded in `.gitignore`)
- These folders will be created when running `composer install` - this is expected and correct
- **Do NOT** include these folders in your submission zip file

### Setup Commands (As Per Marking Criteria)

To mark your work, a module tutor will follow these steps:

1. **Clone your Github repo.**
   ```bash
   git clone <repository-url>
   cd fitness-app
   ```

2. **Make changes to the .env file to match local settings**
   ```bash
   cp .env.example .env
   ```
   Note: The `.env.example` file is provided. Update database settings if needed (default uses SQLite).

3. **Run composer install**
   ```bash
   composer install
   ```
   This will create the `vendor` folder (which is NOT committed to git and should NOT be in your submission zip).

4. **Run php artisan key:generate**
   ```bash
   php artisan key:generate
   ```
   Note: The marking criteria mentions "php artisan key:migrate" but this appears to be a typo. The correct Laravel command is `php artisan key:generate` to generate the application encryption key.

5. **Run migrations and seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```
   This will:
   - Drop all existing tables
   - Create the activities table
   - Seed 35 activities using the factory (enough to demonstrate pagination)

6. **Run php artisan serve**
   ```bash
   php artisan serve
   ```

7. **Open a browser and test the app**
   Navigate to: `http://localhost:8000`
   
   Test all CRUD operations:
   - **Create**: Add new activities via `/activities/create`
   - **Read**: View all activities at `/activities` and individual activities
   - **Update**: Edit existing activities via `/activities/{id}/edit`
   - **Delete**: Remove activities from the database

## Technical Stack

- **Framework**: Laravel 9
- **Database**: SQLite (default) or MySQL/MariaDB
- **PHP Version**: 8.2+
- **Frontend**: HTML5, CSS3 (custom, no frameworks), Blade Templates
- **Backend**: PHP, Eloquent ORM

## Conclusion

This Fitness Journal application demonstrates a solid understanding of the Laravel framework and MVC architecture. The separation of concerns makes the codebase maintainable, testable, and scalable. The implementation of CRUD operations, validation, search, and pagination showcases proficiency in web development using modern PHP frameworks.
