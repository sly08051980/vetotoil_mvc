<?php
$pass = "MotDEPass3";
  echo password_hash($pass, PASSWORD_DEFAULT);  // Affiche le mot de passe crypté


  $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
  if (password_verify($pass, $pass_hash))
{
  echo "Mot de passe correct";
}
else
{
  echo "Mot de passe incorrect";
}
?>