<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cd.php";
    require_once __DIR__."/../src/Artist.php";


    session_start();
        if (empty($_SESSION['list_of_cds'])) {
            $_SESSION['list_of_cds'] = array();
        }
        if (empty($_SESSION['list_of_artists'])) {
            $_SESSION['list_of_artists'] = array();
        }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // routes

    $app->get("/", function() use ($app) {
        return $app['twig']->render('cds.html.twig', array('cds' => Cd::getAll()), array('artists' => Artist::getAll()));
    });

    $app->post("/cds", function() use ($app) {

        $new_artist = new Artist($_POST['artist']);
        $new_cd = new Cd($new_artist, $_POST['title'], $_POST['cover']);
        $new_cd->saveCd();
        $new_artist->saveArtist();

        return $app['twig']->render('cds.html.twig', array('cds' => Cd::getAll()));
    });

    $app->post("/delete_cds", function() use ($app) {
        Cd::deleteAll();
        return $app['twig']->render('cds.html.twig', array('cds' => Cd::getAll()));
    });

    return $app;
?>
