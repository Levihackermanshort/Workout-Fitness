<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Journal - All Activities</title>
    
</head>
<body>
    <div>
        <h1>All Activities</h1>
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
            <?php if (empty($activities)): ?>
                <div>
                    <h3>No activities found</h3>
                    <p>You haven't recorded any activities yet.</p>
                    <a href="/activities/create">Add Your First Activity</a>
                </div>
            <?php else: ?>
                <div>
                    <a href="/activities/create">Add New Activity</a>
                    <a href="/activities/search">Search Activities</a>
                </div>
                
                <table border="1" cellspacing="0" cellpadding="6">
                    <thead>
                        <tr>
                            <th>Date</th>
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
                                <td><?= htmlspecialchars($activity['date']) ?></td>
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
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
