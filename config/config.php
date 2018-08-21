<?php

Config::set('site_name', 'Test02');
Config::set('languages', array('en','fr'));

Config::set('routes', array(
    'login'=>'',
    'admin'  =>'admin_',
    'user'=>'user_',
    'owner'  =>'owner_',
    ));

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'test02');

Config::set('salt', 'z#83khaRfmdH_m59vtSu5VzKy$NoHo!U');
