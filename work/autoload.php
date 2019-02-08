<?php 

$_SESSION['lang'] = "EN";

spl_autoload_register('autoload');

function autoload( $class, $dir = null ) {
 
   if ( is_null( $dir ) )
     $dir = 'classes/';

   foreach ( scandir( $dir ) as $file ) {

     if ( is_dir( $dir.$file ) && substr( $file, 0, 1 ) !== '.' )
       autoload( $class, $dir.$file.'/' );

     if ( substr( $file, 0, 2 ) !== '._' && preg_match( "/.php$/i" , $file ) ) {

       if ( str_replace( '.php', '', $file ) == $class || str_replace( '.class.php', '', $file ) == $class ) {

           include $dir . $file;
       }
     }
   }
 }

   $languageData = new languageData();
   $lang = $languageData->lang(); 
   $auth = new auth();

?>