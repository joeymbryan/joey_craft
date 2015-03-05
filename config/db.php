<?php

/**
 * Database Configuration
 *
 * All of your system's database configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/db.php
 */

return array(
  // All ENV
  '*' => array(
    'tablePrefix' => 'craft'
  ),

  // Local - Joey
  'craft.joeymbryan' => array(
    'server'   => 'localhost',
    'user'     => 'root',
    'password' => 'root',
    'database' => 'craft_db'
  ),

  '10.50.1.162' => array(
    'server'   => 'localhost',
    'user'     => 'root',
    'password' => 'root',
    'database' => 'craft_db'
  ),

  // Staging ENV
  '192.241.218.83' => array(
    'server'   => 'localhost',
    'user'     => 'root',
    'password' => 'root',
    'database' => 'craft_db'
  ),

  // Production ENV
  '.com' => array(
    'server'   => 'localhost',
    'user'     => 'root',
    'password' => 'root',
    'database' => 'craft_db'
  )

);
