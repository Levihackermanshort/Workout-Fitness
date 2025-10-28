<?php

// Database setup script
require_once __DIR__ . '/app/Database.php';

echo "Setting up Fitness Journal Database...\n";

try {
    // First, try to connect without specifying database to create it
    $mysqli = new mysqli('127.0.0.1', 'root', '', '', 3306);
    
    if ($mysqli->connect_error) {
        throw new Exception('Connection failed: ' . $mysqli->connect_error);
    }
    
    // Create database if it doesn't exist
    $mysqli->query("CREATE DATABASE IF NOT EXISTS fitness_journal_db");
    $mysqli->select_db('fitness_journal_db');
    
    // Read SQL file
    $sql = file_get_contents(__DIR__ . '/database/fitness_journal_db.sql');
    
    // Split into individual queries
    $queries = array_filter(array_map('trim', explode(';', $sql)));
    
    foreach ($queries as $query) {
        if ($query === '' || preg_match('/^--/', $query)) {
            continue;
        }
        if (!$mysqli->query($query)) {
            throw new Exception('Query failed: ' . $mysqli->error);
        }
    }
    
    $mysqli->close();
    
    echo "Database setup completed successfully!\n";
    echo "Sample data has been inserted.\n";
    echo "\nTest credentials:\n";
    echo "Username: john_doe, Password: password123\n";
    echo "Username: jane_smith, Password: password123\n";
    echo "Username: mike_j, Password: password123\n";
    echo "Username: sarah_w, Password: password123\n";
    echo "Username: david_b, Password: password123\n";
    
} catch (Exception $e) {
    echo "Error setting up database: " . $e->getMessage() . "\n";
}
