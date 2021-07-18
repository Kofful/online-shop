<?php
include_once(__DIR__ . "/app/Loader.php");
spl_autoload_register(['Loader', 'autoload'], true, true);
include_once(__DIR__ . "/app/CustomErrorHandler.php");
set_error_handler(array("CustomErrorHandler", "handle"));

ob_start();
include_once(__DIR__ . "/resources/views/layouts/header.php");
?>
<body>
<div class="container">
    <?php
    include_once(__DIR__ . "/resources/views/layouts/nav.php");
    (new HomeController())->index();
    ?>
</div>
<?php
include_once(__DIR__ . "/resources/views/layouts/footer.php");
ob_end_flush();
?>
</body>

