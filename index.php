<?php
include_once(__DIR__ . "/App/Loader.php");
spl_autoload_register(['Loader', 'autoload'], true, true);
include_once(__DIR__ . "/App/CustomErrorHandler.php");
register_shutdown_function(array("CustomErrorHandler", "handle"));
ob_start();
include_once(__DIR__ . "/App/View/Layouts/header.php");
set_error_handler(array("CustomErrorHandler", "handle"));
?>
<body>
<div class="container">
    <?php
    include_once(__DIR__ . "/App/View/Layouts/nav.php");
    if (isset($_GET['page'])) {
        TemplateEngine::render($_GET['page'], $_GET, $_GET['page'] . ".php");
    } else {
        TemplateEngine::render(null, null, "home.php");
    }
    ?>
</div>
<?php
include_once(__DIR__ . "/App/View/Layouts/footer.php");
ob_end_flush();
?>
</body>

