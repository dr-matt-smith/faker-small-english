<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$faker = Mattsmithdev\FakerSmallEnglish\Factory::create();

for($i = 0; $i < 20; $i++){
    print $faker->name();
    print PHP_EOL;
    print $faker->catchPhrase();

    print PHP_EOL;
    print $faker->sentence($nbWords = 3, $variableNbWords = false);
    print PHP_EOL;
    print PHP_EOL;
}