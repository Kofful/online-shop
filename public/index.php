<?php
use Framework\Router\Router;
use Framework\Session\Session;
use Framework\Helpers\TemplateEngine;

require_once(__DIR__ . "/../vendor/autoload.php");
include_once(__DIR__ . "/../Framework/Helpers/logger.php");
register_shutdown_function(array("CustomErrorHandler", "handle"));
ob_start();
include_once(__DIR__ . "/../App/View/Layouts/header.php");
set_error_handler(array("CustomErrorHandler", "handle"));
include_once(__DIR__ . "/../Framework/Router/routes.php");
?>
<body>
<div class="container">
    <?php
    include_once(__DIR__ . "/../App/View/Layouts/nav.php");
    try {
        if(Session::cookieExists()) {
            Session::start();
        }
        $routeParams = Router::run();
        extract($routeParams);
        //if middleware doesn't exist, or it exists and lets us continue
        if(!isset($middleware) || call_user_func(["App\\Service\\Middleware", $middleware["name"]], $middleware["params"])) {
            call_user_func(["App\\Controllers\\" . $class, $method], $_POST);
        } else {
            TemplateEngine::redirect("/");
        }
    } catch(Exception $e) {
        echo $e->getMessage();
        error_log($e->getMessage());
        TemplateEngine::render(null, null, "home.php");
    }
    ?>
</div>
<?php
include_once(__DIR__ . "/../App/View/Layouts/footer.php");
ob_end_flush();
?>
</body>

