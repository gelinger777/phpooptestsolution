<?php
require 'bootstrap.php';

// Create datacache object
$datacache = new Datacache_Factory();
$datacache->forge('file');

//$datacache->forge('apc');   petqa php5-apc lini.

$driver = $datacache->driver();

// Data to cache
$data = array('one', 'two', 'three', 'four');

// Put data into Datacache_Item object
$item = new DataCache_Itemexp($data);


// Saving
$driver->save('the_cache_name', $item);
echo 'Data saved<br>';

// Fetching
$cached_data = $driver->get('the_cache_name');
echo 'Cached data: '. print_r($cached_data, true) .'<br>';
