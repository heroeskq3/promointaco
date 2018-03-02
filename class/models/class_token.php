<?php
//hash
//$pass = "sk101080";
//echo $passHash = password_hash($pass, PASSWORD_BCRYPT);
//$token = new Token();
//$_SESSION['token'] = $token->make();
 /*/
  * Crea tokens seguros de 10 caracteres.
 /*/
 class Token {
     /*/
      * Un token de 10 caracteres unico y constante
      * para cada instalacion del sistema que hagas.
     /*/
     const SERVER_TOKEN = "sk101080";
 
     /*/
      * Genera un token de 50 caracteres.
     /*/
     public static function make() {
 
         if(function_exists("random_bytes"))
             // PHP >= 7
             $token = bin2hex(random_bytes(5));
 
         elseif(function_exists("openssl_random_pseudo_bytes"))
             // OpenSSL disponible
             {
                 $strong = true;
                 $token = bin2hex(openssl_random_pseudo_bytes(5, $strong));
                 if(!$strong)
                     $token = substr(md5(rand(0, 999).$token.rand(0, 999)), rand(0, 21), 256);
             }
 
         elseif(function_exists("hash"))
             // PECL Hash disponible
             $token = substr(hash("sha512", uniqid("", true)), rand(0, 117), 256);
 
         else
             // Si no hay nada mejor disponible...
             $token = substr(md5(rand(0, 999).uniqid("", true).rand(0, 999)), rand(0, 21), 256);
 
         return substr(md5(self::SERVER_TOKEN.$token), rand(0, 21), 256);
     }
 }
 ?>