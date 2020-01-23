<?php ob_start(); ?>

<h1>This is my page.</h1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus libero odio assumenda. Officia, recusandae. Nesciunt corporis dolores consequuntur maiores culpa ratione molestiae, ab dolorum praesentium quas delectus rem quidem nemo.
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius corrupti dolorum harum exercitationem pariatur eum aperiam quae optio est nihil nulla natus, labore maiores provident sapiente? Adipisci molestias atque corporis!
</p>

<?php

$redirect_page = 'https://www.google.com/';
$redirect = "";
$redirect == false;

if ($redirect == true) {
    header('Location:' . $redirect_page);
}
ob_end_flush();

?>