<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Journal - Dashboard</title>
    
</head>
<body>
    <div>
        <h1>Fitness Journal Dashboard</h1>
        <p>Welcome, <?= htmlspecialchars(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? '')) ?>!</p>
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
                <div><?= $stats['total_activities'] ?? 0 ?></div>
                <div>Total Activities</div>
            </div>
            <div>
                <div><?= $stats['workout_days'] ?? 0 ?></div>
                <div>Workout Days</div>
            </div>
            <div>
                <div><?= round($stats['avg_duration'] ?? 0) ?></div>
                <div>Avg Duration (mins)</div>
            </div>
        </div>
        
        <div>
            <h2>Recent Activities</h2>
            <?php if (empty($activities)): ?>
                <p>No activities recorded yet. <a href="/activities/create">Add your first activity</a></p>
            <?php else: ?>
                <table border="1" cellspacing="0" cellpadding="6">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Activity</th>
                            <th>Duration</th>
                            <th>Distance</th>
                            <th>Sets/Reps</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($activities as $activity): ?>
                            <tr>
                                <td><?= htmlspecialchars($activity['date']) ?></td>
                                <td><?= htmlspecialchars($activity['activity']) ?></td>
                                <td><?= htmlspecialchars($activity['time_spent']) ?></td>
                                <td><?= htmlspecialchars($activity['distance']) ?></td>
                                <td><?= $activity['set_count'] ? $activity['set_count'] . 'x' . $activity['reps'] : '-' ?></td>
                                <td><?= htmlspecialchars($activity['note']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div>
                    <a href="/activities">View All Activities</a>
                    <a href="/activities/create">Add New Activity</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
