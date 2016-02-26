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

    $app->get('/stylist/{id}', function($id) use ($app) {
        $stylist = Stylist::find($id);
        $clients = $stylist->getClients();

        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $clients));
    });

    $app->post('/add_client', function() use ($app) {
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $stylist_id = $_POST['stylist_id'];

        $client = new Client($name, $phone_number, $id = null, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);

        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    return $app;
?>
