<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cd.php";

    session_start();
        if (empty($_SESSION['list_of_cds'])) {
            $_SESSION['list_of_cds'] = array();
        }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // routes

    $app->get("/", function() use ($app) {
        return $app['twig']->render('cds.html.twig', array('cds' => Cd::getAll()));
    });

    $app->post("/cds", function() use ($app) {
        $new_cd = new Cd($_POST['artist'], $_POST['title'], $_POST['cover']);
        $new_cd->save();

        return $app['twig']->render('cds.html.twig', array('cds' => Cd::getAll()));
    });

    $app->post("/delete_cds", function() use ($app) {
        Cd::deleteAll();
        return $app['twig']->render('cds.html.twig', array('cds' => Cd::getAll()));
    });

    return $app;
?>
