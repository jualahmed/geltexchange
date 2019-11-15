<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

echo (ENVIRONMENT == 'production') ? 'us-cdbr-iron-east-05.cleardb.net' : 'localhost';

$db['default'] = array(
  'dsn' => '',
  'hostname' => (ENVIRONMENT == 'production') ? 'us-cdbr-iron-east-05.cleardb.net' : 'localhost',
  'username' => (ENVIRONMENT == 'production') ? 'b0d3453f1a7678' : 'root',
  'password' => (ENVIRONMENT == 'production') ? '4d26eec5' : '',
  'database' => (ENVIRONMENT == 'production') ? 'heroku_71bce20d6ad0557' : 'geltexchange',
  'dbdriver' => 'mysqli',
  'dbprefix' => '',
  'pconnect' => FALSE,
  'db_debug' => (ENVIRONMENT !== 'production'),
  'cache_on' => FALSE,
  'cachedir' => '',
  'char_set' => 'utf8',
  'dbcollat' => 'utf8_general_ci',
  'swap_pre' => '',
  'encrypt' => FALSE,
  'compress' => FALSE,
  'stricton' => FALSE,
  'failover' => array(),
  'save_queries' => TRUE
);