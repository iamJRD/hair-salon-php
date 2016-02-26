<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../src/Client.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
	$username = 'root';
	$password = 'root';
	$DB = new PDO($server, $username, $password);

	$app = new Silex\Application();

	$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

	use Symfony\Component\HttpFoundation\Request;
	Request::enableHttpMethodParameterOverride();

    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post('/add_stylist', function() use ($app) {
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $test_stylist = new Stylist($name, $phone_number);
        $test_stylist->save();
        $stylists = Stylist::getAll();

        return $app['twig']->render('index.html.twig', array('stylists' => $stylists));
    });

    return $app;
?>
