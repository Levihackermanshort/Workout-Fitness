<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Journal - Search Activities</title>
    
</head>
<body>
    <div>
        <h1>Search Activities</h1>
    </div>
    
    <div>
        <a href="/dashboard">Dashboard</a>
        <a href="/activities">All Activities</a>
        <a href="/activities/create">Add Activity</a>
        <a href="/activities/search">Search Activities</a>
        <a href="/logout">Logout</a>
    </div>
    
    <div>
        <div>
            <div>
                <h3>Search by Date</h3>
                <form method="POST">
                    <div>
                        <label for="search_date">Select Date:</label>
                        <input type="date" id="search_date" name="search_date" value="<?= $searchDate ?>" required>
                    </div>
                    <button type="submit">Search</button>
                </form>
            </div>
            
            <div>
                <a href="/activities/create">Add New Activity</a>
                <a href="/activities">View All Activities</a>
            </div>
            
            <?php if (!empty($activities)): ?>
                <div class="search-results">
                    <h3>Search Results for <?= htmlspecialchars($searchDate) ?></h3>
                    <table border="1" cellspacing="0" cellpadding="6">
                        <thead>
                            <tr>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Activity</th>
                                <th>Duration</th>
                                <th>Distance</th>
                                <th>Sets</th>
                                <th>Reps</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activities as $activity): ?>
                                <tr>
                                    <td><?= htmlspecialchars($activity['time_start'] ?: '-') ?></td>
                                    <td><?= htmlspecialchars($activity['time_end'] ?: '-') ?></td>
                                    <td><?= htmlspecialchars($activity['activity']) ?></td>
                                    <td><?= htmlspecialchars($activity['time_spent'] ?: '-') ?></td>
                                    <td><?= htmlspecialchars($activity['distance'] ?: '-') ?></td>
                                    <td><?= $activity['set_count'] ?: '-' ?></td>
                                    <td><?= $activity['reps'] ?: '-' ?></td>
                                    <td><?= htmlspecialchars($activity['note'] ?: '-') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php elseif ($searchDate): ?>
                <div class="no-data">
                    <h3>No activities found</h3>
                    <p>No activities were recorded on <?= htmlspecialchars($searchDate) ?>.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
