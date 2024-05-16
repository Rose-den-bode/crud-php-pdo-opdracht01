<?php
class ReservationController {
    public function create() {
        require 'app/views/reservation_form.php';
    }

    public function store() {
        $errors = [];

        // Validate colors
        foreach (['color1', 'color2', 'color3', 'color4'] as $color) {
            if (empty($_POST[$color])) {
                $errors[] = "Color selection is required.";
                break;
            }
        }

        // Validate phone number
        if (empty($_POST['phone']) || !preg_match('/^\d{3}-\d{3}-\d{4}$/', $_POST['phone'])) {
            $errors[] = "A valid phone number is required.";
        }

        // Validate email
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "A valid email address is required.";
        }

        // Validate appointment date/time
        if (empty($_POST['appointment']) || !strtotime($_POST['appointment'])) {
            $errors[] = "A valid appointment date and time is required.";
        }

        // Validate treatments
        if (empty($_POST['treatment']) || !is_array($_POST['treatment'])) {
            $errors[] = "At least one treatment type must be selected.";
        }

        // If there are errors, redisplay the form with errors
        if (!empty($errors)) {
            require 'app/views/reservation_form.php';
            return;
        }

        // Database connection
        $db = new PDO('mysql:host=localhost;dbname=Nailstudio', 'username', 'password');

        // Insert data into the database
        $stmt = $db->prepare("INSERT INTO Afspraak (color1, color2, color3, color4, phone, email, appointment, treatments, submission_time)
                              VALUES (:color1, :color2, :color3, :color4, :phone, :email, :appointment, :treatments, :submission_time)");

        $stmt->execute([
            ':color1' => $_POST['color1'],
            ':color2' => $_POST['color2'],
            ':color3' => $_POST['color3'],
            ':color4' => $_POST['color4'],
            ':phone' => $_POST['phone'],
            ':email' => $_POST['email'],
            ':appointment' => $_POST['appointment'],
            ':treatments' => implode(', ', $_POST['treatment']),
            ':submission_time' => $_POST['submission_time']
        ]);

        header('Location: /reservation/confirmation');
    }

    public function confirmation() {
        require 'app/views/confirmation.php';
    }

    public function index() {
        // Database connection
        $db = new PDO('mysql:host=localhost;dbname=Nailstudio', 'username', 'password');

        // Fetch reservations from the database
        $stmt = $db->query("SELECT * FROM Afspraak");
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require 'app/views/reservations_list.php';
    }
}
