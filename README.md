StormCacher
===========

Non Distributed Memory Caching Key Value Storage system


Usage
===========
$key = '134234234';
$value = 'some data to JSON Encode';

$kv = keyValue::getInstance();
$kv->register($key, $value);
$kv->retreive($key);
