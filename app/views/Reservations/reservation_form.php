<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bling Bling Nail Studio Chantal Reservation</title>
</head>
<body>
    <h1>Bling Bling Nail Studio Chantal</h1>
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="post" action="/reservation/store">
        <label for="color1">Choose 4 base colors for your nails:</label>
        <input type="color" id="color1" name="color1" value="#ff0000" required>
        <input type="color" id="color2" name="color2" value="#00ff00" required>
        <input type="color" id="color3" name="color3" value="#0000ff" required>
        <input type="color" id="color4" name="color4" value="#ffff00" required>
        
        <br><br>
        
        <label for="phone">Your phone number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>
        
        <br><br>
        
        <label for="email">Your email address:</label>
        <input type="email" id="email" name="email" required>
        
        <br><br>
        
        <label for="appointment">Appointment date/time:</label>
        <input type="datetime-local" id="appointment" name="appointment" required>
        
        <br><br>
        
        <label>Type of treatment:</label>
        <input type="checkbox" name="treatment[]" value="manicure"> Manicure
        <input type="checkbox" name="treatment[]" value="pedicure"> Pedicure
        <input type="checkbox" name="treatment[]" value="gel"> Gel
        <input type="checkbox" name="treatment[]" value="acrylic"> Acrylic
        
        <br><br>
        
        <input type="hidden" name="submission_time" value="<?php echo date('Y-m-d H:i:s'); ?>">
        
        <button type="reset">Reset</button>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
