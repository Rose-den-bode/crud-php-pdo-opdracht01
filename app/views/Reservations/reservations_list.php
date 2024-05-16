<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations List</title>
</head>
<body>
    <h1>Reservations List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Color 1</th>
                <th>Color 2</th>
                <th>Color 3</th>
                <th>Color 4</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Appointment</th>
                <th>Treatments</th>
                <th>Submission Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?php echo htmlspecialchars($reservation['id']); ?></td>
                <td><?php echo htmlspecialchars($reservation['color1']); ?></td>
                <td><?php echo htmlspecialchars($reservation['color2']); ?></td>
                <td><?php echo htmlspecialchars($reservation['color3']); ?></td>
                <td><?php echo htmlspecialchars($reservation['color4']); ?></td>
                <td><?php echo htmlspecialchars($reservation['phone']); ?></td>
                <td><?php echo htmlspecialchars($reservation['email']); ?></td>
                <td><?php echo htmlspecialchars($reservation['appointment']); ?></td>
                <td><?php echo htmlspecialchars($reservation['treatments']); ?></td>
                <td><?php echo htmlspecialchars($reservation['submission_time']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
