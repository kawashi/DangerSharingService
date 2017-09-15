<?php
return array (
  '_root_' => 'welcome/index',
  '_404_' => 'welcome/404',
  'hello(/:name)?' => 
  array (
    0 => 'welcome/hello',
    'name' => 'hello',
  ),
  'api/home/(:num)' => 'api/home/index/$1',
  'api/tweet/(:num)' => 'api/tweet/index/$1',
);
