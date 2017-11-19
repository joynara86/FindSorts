<?php
require_once 'Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '341105149690525', // Replace {app-id} with your app id
  'app_secret' => 'f698e2c7b887452d94c3efb1289090eb',
  'default_graph_version' => 'v2.2',
  ]);
//helper
$login_f = $fb->getRedirectLoginHelper();