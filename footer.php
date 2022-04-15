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
    <script async src="https://eco-price.ru/amo/saveLeadWithUTM.js"></script>
    <script async src="https://eco-price.ru/amo/amo.js"></script>
    <script>(function(a,m,o,c,r,m){a[m]={id:"50563",hash:"aac4762cfd032d2d454b4b28ecf68d2187d5dbd03fbb9912c5ce657701f8fa69",locale:"ru",inline:false,setMeta:function(p){this.params=(this.params||[]).concat([p])}};a[o]=a[o]||function(){(a[o].q=a[o].q||[]).push(arguments)};var d=a.document,s=d.createElement('script');s.async=true;s.id=m+'_script';s.src='https://gso.amocrm.ru/js/button.js?1622613526';d.head&&d.head.appendChild(s)}(window,0,'amoSocialButton',0,0,'amo_social_button'));</script>
 <?php }
?>

</body>
</html>