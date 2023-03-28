<?php
require 'database.php';

SESSION_START();

if(isset($_POST['firstname'],$_POST['lastname'], $_POST[    'email'], $_POST['password'], $_POST['geslacht'])){
    $stmt = $conn->prepare("INSERT INTO Gebruiker (first_name, last_name, email, password, geslacht)
    VALUES (:firstname, :lastname, :email, :password, :geslacht)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':geslacht', $geslacht);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $geslacht = $_POST['geslacht'];
    $stmt->execute();
    header("Location: inlog.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registreren</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="inlog-container">
        <div class="inlog-items">
            <form method="post">
                <div class="text-white">
                    <h2>Registeren</h2>
                    <label for="firstname">Voornaam</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Voornaam" name="firstname"> <br><br>
                    <label for="lastname">Achternaam</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Achternaam" name="lastname"> <br><br>
                    <label for="email">Email Adres</label>
                    <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter Email" name="email">
                    <label for="Password">Wachtwoord</label>
                    <input type="password" class="form-control" id="Password" placeholder="Wachtwoord" name= "password">
                    <label for="geslacht">Geslacht</label>
                    <select id="geslacht" name="geslacht">
                        <option value="man">Man</option>
                        <option value="vrouw">Vrouw</option>
                        <option value="overige">overige</option>
                    </select><br><br>
                    <button type="submit" id="Submit"class="submit-button">Registeren</button>
                    <h1>Al een account gemaakt? <a href="inlog.php">Klik hier</a> om in te loggen!</h1>
                </div>
            </form>
            </div>
        </div>
    <?php include 'footer.php'; ?>
</body>
</html>