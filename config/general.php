<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

return array(
  // All ENV
  '*' => array(
    'omitScriptNameInUrls' => true,
    'defaultImageQuality' => 100,
    'useCompressedJs' => false,
    'errorTemplatePrefix' => "_errors/",
  ),

  // Local – Zack
  'zack.local' => array(
    'devMode' => true,
    'environmentVariables' => array(
      'siteUrl'        => 'http://localhost/projects/joey_craft/www',
      'fileSystemPath' => '/Users/joeymbryan/projects/cosmic/craft-starter/www'
    )
  ),

  '10.50.1.162' => array(
    'devMode' => true,
    'environmentVariables' => array(
      'siteUrl'        => 'http://10.50.1.162/cosmic/craft-starter/www',
      'fileSystemPath' => '/Users/zackspear/projects/cosmic/craft-starter/www'
    )
  ),

  // Staging ENV
  '192.241.218.83' => array(
    'devMode' => true,
    'environmentVariables' => array(
      'siteUrl'        => 'http://192.241.218.83',
      // DigitalOcean specific
      'fileSystemPath' => '/home/cosmic/site/www'
    )
  ),

  // Production ENV
  '.com' => array(
    'devMode' => false,
    'environmentVariables' => array(
      // Ex: http://107.170.205.223 OR http://designbycosmic.com
      'siteUrl'        => 'YOUR_SITE_URL',
      // Ex: /home/cosmic/site/www
      'fileSystemPath' => 'YOUR_PATH'
    )
  )
);
