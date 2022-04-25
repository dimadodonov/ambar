<?php

/**
* Functions hooked in to Home Page action
*
* @hooked hook_footer                       - 10
*/

do_action( 'hook_footer' );
wp_footer(); 

$host = $_SERVER['HTTP_HOST']; 
 if($host == "www.eco-price.ru" or $host == "eco-price.ru") { ?>
   
 <?php }
?>

</body>
</html>