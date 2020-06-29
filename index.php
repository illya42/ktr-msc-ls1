<?php
include ('pdo.php');

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $mdp = $_POST['mdp'];
     
    if($profile->login($name,$mdp))
    {
       $profile->redirect('home.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
</head>
<body>
    <form method="post">
        <h4>Connection</h4>

        <input type="text" name="name" placeholder="Votre nom" required />
        <input type="password" name="mdp" placeholder="Votre mot de passe" required />

        <input type="submit" name="submit" value="Connexion">
    </form>
</div>
<div>
    <a href='inscription.php'><button>Inscription</button></a>
</div>
</body>
</html>