<?php
include_once(__DIR__ . "/app/Loader.php");
spl_autoload_register(['Loader', 'autoload'], true, true);
include_once(__DIR__ . "/app/CustomErrorHandler.php");
register_shutdown_function(array("CustomErrorHandler", "handle"));
ob_start();
include_once(__DIR__ . "/resources/views/layouts/header.php");
set_error_handler(array("CustomErrorHandler", "handle"));
?>
<body>
<div class="container">
    <?php
    include_once(__DIR__ . "/resources/views/layouts/nav.php");
    if (isset($_GET['page'])) {
        TemplateEngine::render($_GET['page'], $_GET, $_GET['page'] . ".php");
    } else {
        TemplateEngine::render(null, null, "home.php");
    }
    ?>
</div>
<?php
include_once(__DIR__ . "/resources/views/layouts/footer.php");
ob_end_flush();
?>
</body>

