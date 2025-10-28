-- Fitness Journal Database Schema
-- Created for Laravel-style PHP application

CREATE DATABASE IF NOT EXISTS fitness_journal_db;
USE fitness_journal_db;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    weight DECIMAL(5,2) NOT NULL,
    height DECIMAL(5,2) NOT NULL,
    birthday DATE NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Activities table
CREATE TABLE activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    date DATE NOT NULL,
    time_start TIME,
    time_end TIME,
    activity VARCHAR(255) NOT NULL,
    time_spent VARCHAR(50),
    distance VARCHAR(50),
    set_count INT DEFAULT 0,
    reps INT DEFAULT 0,
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert sample users
INSERT INTO users (first_name, last_name, weight, height, birthday, contact_number, email, username, password) VALUES
('John', 'Doe', 75.5, 180.0, '1990-05-15', '1234567890', 'john.doe@email.com', 'john_doe', 'password123'),
('Jane', 'Smith', 65.2, 165.0, '1992-08-22', '0987654321', 'jane.smith@email.com', 'jane_smith', 'password123'),
('Mike', 'Johnson', 80.0, 185.0, '1988-12-10', '1122334455', 'mike.johnson@email.com', 'mike_j', 'password123'),
('Sarah', 'Wilson', 58.7, 160.0, '1995-03-18', '5566778899', 'sarah.wilson@email.com', 'sarah_w', 'password123'),
('David', 'Brown', 85.3, 190.0, '1987-07-25', '9988776655', 'david.brown@email.com', 'david_b', 'password123');

-- Insert sample activities
INSERT INTO activities (user_id, date, time_start, time_end, activity, time_spent, distance, set_count, reps, note) VALUES
(1, '2024-10-15', '07:00:00', '08:00:00', 'Morning Jog', '60 mins', '8 km', 0, 0, 'Great morning run, felt energetic'),
(1, '2024-10-15', '18:00:00', '19:00:00', 'Push-ups', '30 mins', '0', 3, 15, 'Standard push-ups, good form'),
(1, '2024-10-15', '19:00:00', '19:30:00', 'Planks', '30 mins', '0', 3, 1, 'Held for 60 seconds each'),
(2, '2024-10-15', '06:30:00', '07:30:00', 'Yoga Session', '60 mins', '0', 0, 0, 'Vinyasa flow, very relaxing'),
(2, '2024-10-15', '17:00:00', '18:00:00', 'Weight Training', '60 mins', '0', 4, 12, 'Chest and shoulders workout'),
(3, '2024-10-16', '08:00:00', '09:00:00', 'Cycling', '60 mins', '15 km', 0, 0, 'Outdoor cycling, beautiful weather'),
(3, '2024-10-16', '19:00:00', '20:00:00', 'Squats', '45 mins', '0', 4, 20, 'Bodyweight squats, legs feeling strong'),
(4, '2024-10-16', '07:00:00', '08:00:00', 'Swimming', '60 mins', '1.5 km', 0, 0, 'Pool session, worked on technique'),
(4, '2024-10-16', '18:30:00', '19:00:00', 'Stretching', '30 mins', '0', 0, 0, 'Post-workout stretching routine'),
(5, '2024-10-17', '06:00:00', '07:00:00', 'CrossFit', '60 mins', '0', 0, 0, 'High intensity workout, very challenging'),
(5, '2024-10-17', '17:00:00', '18:00:00', 'Deadlifts', '60 mins', '0', 5, 8, 'Heavy deadlifts, new personal record'),
(1, '2024-10-17', '07:30:00', '08:30:00', 'Running', '60 mins', '10 km', 0, 0, 'Longer run today, building endurance'),
(2, '2024-10-17', '18:00:00', '19:00:00', 'Pilates', '60 mins', '0', 0, 0, 'Core strengthening session'),
(3, '2024-10-18', '08:30:00', '09:30:00', 'Basketball', '60 mins', '0', 0, 0, 'Played with friends, great cardio'),
(4, '2024-10-18', '19:00:00', '20:00:00', 'Dance Class', '60 mins', '0', 0, 0, 'Zumba class, lots of fun and energy');
