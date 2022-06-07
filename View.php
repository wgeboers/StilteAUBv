<div class="page-heading">
    <h1>Enable Multi-Language Support for a Webpage in PHP</h1>
</div>
<div class="language-header">
    <div class="demo-page-title"><?php echo $langmenu["LIST_TITLE"]; ?></div>
<div class="language-link">
    <a class="language-link-item" href="index.php?lang=en"
        <?php if($lang == 'en'){?> style="color: #ff9900;"
        <?php } ?>>English</a> | <a class="language-link-item"
                                    href="index.php?lang=de" <?php if($lang == 'de'){?>
        style="color: #ff9900;" <?php } ?>>Deutsche</a>
</div>
</div>
<?php
if (! empty($result)) {
    foreach ($result as $k => $v) {
        ?>
        <div class="demo-row-data">
            <div>
                <strong><?php echo $result[$k][$lang.'_title']; ?></strong>
            </div>
            <p class="demo-row-description"><?php echo $result[$k][$lang.'_description']; ?>
            </p>
        </div>
        <?php
    }
} else {
    ?>
    <div class="no-result"><?php echo $language["NOTIFY_NO_RESULT"]; ?></div>
    <?php
}
?>
