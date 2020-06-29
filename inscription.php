<?php
include ('pdo.php');

if(isset($_POST['inscription']))
{
   $name = htmlspecialchars($_POST['name']);
   $company_name = htmlspecialchars($_POST['company_name']);
   $email = htmlspecialchars($_POST['email']);
   $tel = htmlspecialchars($_POST['tel']);
   $mdp = htmlspecialchars($_POST['mdp']);

   if(!empty($_POST['name']) AND !empty($_POST['mdp']))
   {
        $insert_profile = $bdd->prepare("INSERT INTO profile values (null,?,?,?,?,?)");
        $insert_profile->execute(array($name,$mdp,$company_name,$email,$tel));
   }
}
?>

<form method="post">
    <h4>Inscription</h4>
    <input type="text" name="name" placeholder="Votre nom" required><br/>
    <input type="text" name="company_name" placeholder="Nom d'Entreprise" ><br/>
    <input type="text" name="email" placeholder="Votre email" ><br/>
    <input type="text" name="tel" placeholder="Votre téléphone" ><br/>
    <input type="text" name="mdp" placeholder="Votre mot de passe" required><br/>
    <input type="submit" name="inscription" value="inscription">
</form>