<?php
const DEFAULT_APP = 'Frontend';
 
// If the application is not valid, we will load the default application that will generate a 404 error
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;
 
// We start by including the class allowing us to save our autoload
require __DIR__.'/../lib/ETFram/SplClassLoader.php';
 
// We will then register the autoloads corresponding to each vendor (ETFram, App, Model, etc.)
$ETFramLoader = new SplClassLoader('ETFram', __DIR__.'/../lib');
$ETFramLoader->register();
 
$appLoader = new SplClassLoader('App', __DIR__.'/..');
$appLoader->register();
 
$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();
 
$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();
 
$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/../lib/vendors');
$formBuilderLoader->register();
 
 
// It is enough for us to deduce the name of the class and instantiate (create) it
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
 
$app = new $appClass;
$app->run();