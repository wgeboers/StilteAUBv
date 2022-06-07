<?php
require_once ('Crud.php');
$crud = new Crud ('root', '');
?>
<div class="language-header">
    <div class="demo-page-title"><?php if (isset($langmenu)){
            echo $langmenu["nl_title"];
            } ?></div>
<div class="language-link">
    <a class="language-link-item" href="index.php?lang=en"
        <?php $langmenuen ='en';
        if($langmenuen == 'en'){?> style="color: #ff9900;"
        <?php } ?>>English</a> | <a class="language-link-item"
                                      href="index.php?lang=en"
    <a class="language-linknl" href="index.php?lang=nl"
        <?php if($langmenu =='nl');
        if($langmenu == 'nl'){?> style="color: #ff9900;"
        <?php } ?>>Nederlands</a> | <a class="Language-link-item"
                                       href="index.php?lang=nl"
</div>
</div>

