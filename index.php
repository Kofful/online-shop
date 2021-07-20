<?php
include_once(__DIR__ . "/Framework/Helpers/Loader.php");
spl_autoload_register(['Loader', 'autoload'], true, true);
include_once(__DIR__ . "/Framework/Helpers/CustomErrorHandler.php");
register_shutdown_function(array("CustomErrorHandler", "handle"));
ob_start();
include_once(__DIR__ . "/App/View/Layouts/header.php");
set_error_handler(array("CustomErrorHandler", "handle"));
include_once(__DIR__ . "/Framework/Router/routes.php");
?>
<body>
<div class="container">
    <?php
    include_once(__DIR__ . "/App/View/Layouts/nav.php");
    try {
        Router::run();
    } catch(Exception $e) {
        TemplateEngine::render(null, null, "home.php");
    }
    ?>
</div>
<?php
include_once(__DIR__ . "/App/View/Layouts/footer.php");
ob_end_flush();
?>
</body>

