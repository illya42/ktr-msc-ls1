<?php
class profile
{
   private $db;
 
   function __construct($pdo)
   {
     $this->db = $pdo;
   }
 
   public function inscription($name,$mdp,$company_name,$email,$tel)
   {
      try
      {
          $new_mdp = password_hash($mdp, PASSWORD_DEFAULT);

          $stmt = $this->db->prepare("INSERT INTO profile(name,mdp,company_name,email,tel) VALUES(:name, :mdp, :company_name, :email, :tel)");
             
          $stmt->bindparam(":name", $name);
          $stmt->bindparam(":company_name", $company_name);
          $stmt->bindparam(":email", $email);
          $stmt->bindparam(":tel", $tel);
          $stmt->bindparam(":mdp", $new_mdp);            
          $stmt->execute(); 

          return $stmt; 
      }
      catch(PDOException $e)
      {
          echo $e->getMessage();
      }    
   }
 
   public function login($name,$mdp)
   {
      try
      {
         $stmt = $this->db->prepare("SELECT * FROM profile WHERE name =:name");
         $stmt->execute(array(':name'=>$name));
         $Resultat=$stmt->fetch(PDO::FETCH_ASSOC);

         if($stmt->rowCount() > 0)
         {
            if(password_verify($mdp, $Resultat['mdp']))
            {
               $_SESSION['user_session'] = $Resultat['p_id'];

               $_SESSION['nom'] = $Resultat['name'];
               return true;
            }
            else
            {
               return false;
            }
         }
      }
      catch(PDOException $e)
      {
          echo $e->getMessage();
      }
   }
 
   public function verif_session()
   {
      if($_SESSION['user_session'])
      {
         return true;
      }
   }
 
   public function deconnection()
   {
      session_destroy();
   }
}
?>
