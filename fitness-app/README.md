# Workout Journal Web Application

## Overview

The Workout Journal Web Application is a comprehensive PHP-based web platform designed to help fitness enthusiasts track and manage their workout activities, monitor progress, and maintain detailed exercise journals. This application provides users with a user-friendly interface to record daily workouts, view historical data, and maintain consistency in their fitness journey.

## Features

### User Authentication System
- **User Registration**: Complete registration form with personal details including name, weight, height, birthday, contact information, email, username, and password
- **Secure Login**: Username and password-based authentication with session management
- **Session Management**: Persistent user sessions for seamless navigation throughout the application
- **Logout Functionality**: Secure session termination and redirection to login page

### Workout Journal Management
- **Activity Recording**: Comprehensive form to record various types of physical activities including:
  - Exercise type (jogging, push-ups, bench press, etc.)
  - Time tracking (start time, end time, duration)
  - Distance covered for cardio activities
  - Set count and repetitions for strength training
  - Personal notes and observations
- **Dynamic Activity Addition**: JavaScript-powered interface allowing users to add multiple activities in a single session
- **Date-based Organization**: Activities are organized by date for easy tracking and progress monitoring

### Data Retrieval and Search
- **Date-based Search**: Users can search and retrieve workout activities for specific dates
- **Historical Data Viewing**: Access to past workout journals with detailed activity information
- **Tabular Data Display**: Clean, organized table format for viewing workout history

## Technical Architecture

### Backend Technology Stack
- **PHP**: Server-side scripting language for application logic and database interactions
- **MySQL/MariaDB**: Relational database management system for data storage
- **PDO (PHP Data Objects)**: Secure database connection and query execution with prepared statements
- **Session Management**: PHP sessions for user authentication and state maintenance

### Frontend Technology Stack
- **HTML5**: Semantic markup for application structure
- **CSS3**: Custom styling with responsive design principles
- **Bootstrap 4.6.2**: Frontend framework for responsive UI components and grid system
- **JavaScript**: Client-side interactivity for dynamic form management and user experience enhancement

### Database Schema
The application utilizes a well-structured MySQL database with two primary tables:

**tbl_user Table**:
- User identification and authentication data
- Personal information (name, weight, height, birthday)
- Contact details (phone number, email)
- Login credentials (username, password)

**tbl_activities Table**:
- Activity tracking with user association
- Comprehensive workout data (date, time, activity type)
- Performance metrics (sets, reps, distance, duration)
- Personal notes and observations
- Automatic timestamp tracking for data integrity

## File Structure

```
workout-journal/
├── assets/
│   ├── style.css          # Custom CSS styling
│   ├── script.js          # JavaScript functionality
│   ├── read.jpg           # UI assets
│   └── write.jpg          # UI assets
├── conn/
│   └── conn.php           # Database connection configuration
├── endpoint/
│   ├── add-activity.php   # Activity creation endpoint
│   ├── add-user.php       # User registration endpoint
│   ├── login.php          # Authentication endpoint
│   ├── logout.php         # Session termination endpoint
│   └── search-journal.php # Data retrieval endpoint
├── index.php              # Application entry point and login interface
├── home.php               # Main dashboard after authentication
├── write-journal.php      # Activity recording interface
├── read-journal.php       # Historical data viewing interface
└── workout_journal_db.sql # Database schema and initial data
```

## Installation and Setup

### Prerequisites
- Web server with PHP support (Apache, Nginx, or similar)
- PHP 7.4 or higher with PDO MySQL extension
- MySQL 5.7+ or MariaDB 10.3+
- Web browser with JavaScript support

### Installation Steps
1. **Database Setup**: Import the provided `workout_journal_db.sql` file into your MySQL/MariaDB database
2. **Configuration**: Update database connection parameters in `conn/conn.php` to match your database settings
3. **File Deployment**: Upload all application files to your web server's document root or appropriate directory
4. **Permissions**: Ensure proper file permissions for PHP execution and database access
5. **Testing**: Access the application through your web browser and verify functionality

## Usage Instructions

### Getting Started
1. Navigate to the application's main page (`index.php`)
2. Create a new account using the registration form with your personal details
3. Log in using your created credentials
4. Access the main dashboard (`home.php`) to begin using the application

### Recording Workouts
1. Click "Write your today's journal" from the main dashboard
2. Select the date and specify start/end times for your workout session
3. Add activities using the dynamic form interface
4. Include relevant details such as sets, reps, distance, and personal notes
5. Submit your journal entry for storage

### Viewing Historical Data
1. Click "Read your past workout journals" from the main dashboard
2. Use the date search functionality to find specific workout sessions
3. Review detailed activity information in the organized table format
4. Track progress and consistency over time

## Security Features

- **Prepared Statements**: All database queries use PDO prepared statements to prevent SQL injection attacks
- **Session Management**: Secure session handling with proper user authentication checks
- **Input Validation**: Basic input sanitization and validation for user-submitted data
- **Access Control**: Page-level authentication checks to prevent unauthorized access

## Future Enhancements

The application provides a solid foundation for additional features such as:
- Advanced analytics and progress tracking
- Exercise recommendations based on historical data
- Social features for sharing achievements
- Mobile-responsive design improvements
- Integration with fitness tracking devices
- Advanced reporting and visualization tools

This Workout Journal Web Application demonstrates proficiency in PHP web development, database design, user authentication, and modern web development practices, making it an excellent project for showcasing full-stack development skills.
