<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Journal - Add Activity</title>
    
</head>
<body>
    <div class="header">
        <h1>Add New Activity</h1>
    </div>
    
    <div class="nav">
        <a href="/dashboard">Dashboard</a>
        <a href="/activities">All Activities</a>
        <a href="/activities/create">Add Activity</a>
        <a href="/activities/search">Search Activities</a>
        <a href="/logout">Logout</a>
    </div>
    
    <div class="container">
        <div class="form-container">
            <form method="POST">
                <p>Date: <input type="date" name="date" value="<?= date('Y-m-d') ?>" required></p>
                <p>Start Time: <input type="time" name="time_start"></p>
                <p>End Time: <input type="time" name="time_end"></p>
                <h3>Activity</h3>
                <p>Name: <input type="text" name="activities[0][activity]" required></p>
                <p>Duration: <input type="text" name="activities[0][time_spent]"></p>
                <p>Distance: <input type="text" name="activities[0][distance]"></p>
                <p>Sets: <input type="number" name="activities[0][set_count]" min="0"></p>
                <p>Reps: <input type="number" name="activities[0][reps]" min="0"></p>
                <p>Notes: <input type="text" name="activities[0][note]"></p>
                <p><button type="submit">Save Activity</button></p>
            </form>
        </div>
    </div>
    
    
</body>
</html>
