<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Journal - Register</title>
    
</head>
<body>
    <div>
        <h1>Fitness Journal</h1>
        <h2>Register</h2>
        
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div>
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>
            
            <div>
                <div>
                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="weight" step="0.1" required>
                </div>
                <div>
                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="height" step="0.1" required>
                </div>
            </div>
            
            <div>
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" id="contact_number" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Register</button>
        </form>
        
        <div>
            <a href="/">Already have an account? Login here</a>
        </div>
    </div>
</body>
</html>
