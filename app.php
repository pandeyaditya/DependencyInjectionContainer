<?php

require __DIR__.'/vendor/autoload.php';


/* Pimple Container */

$container = new Pimple();

require __DIR__.'/app/config.php';
require __DIR__.'/app/services.php';

/* Ends Pimple Container */

$friendHarvester = $container['friend_harvester'];
$friendHarvester->emailFriends();


