<?php
require_once('../classes/class.keyValue.php');

class testKeyValueStorage extends PHPUnit_Framework_TestCase {

    protected $stack;

    protected function setUp()
    {
        $this->stack = array();
    }

    public function testEmpty()
    {
        $this->assertTrue( empty($this->stack) );
    }

    public function testInstantiateKeyValue()
    {
        $kv = new keyValue();
    }

    public function testCanStoreOneKeyValue()
    {
        $key = 'emotion';
        $value = 'happy';

        $kv = new keyValue();
        $kv->register($key, $value);
    }

    public function testCanRetreiveKeyValue()
    {
        $key = 'movie';
        $value = 'real genius';

        $kv = keyValue::getInstance();
        $kv->register($key, $value);
        $retreived_value = $kv->retreive($key);

        $this->assertEquals( $value, $retreived_value);
    }

    public function testIsSingletonPattern()
    {
        $key = 'good quote';
        $value = 'to be or not to be';

        $kv = keyValue::getInstance();
        $kv->register($key, $value);
        $this->assertEquals( $value, $kv->retreive($key));

        $kv2 = keyValue::getInstance();
        $retrieved_value = $kv2::retreive($key);

        $this->assertEquals( $value, $retrieved_value);
    }


    public function testCanDeleteKeyFromKeyValue()
    {
        $key = 'status';
        $value = 'hunting';

        $kv = keyValue::getInstance();
        $kv->register($key, $value);
        $this->assertEquals( $value, $kv->retreive($key) );

        $kv->deleteKey($key);

        $this->assertEquals( null , $kv->retreive($key) );
    }

    public function testOnlyDeletesSpecifiedKeyFromKeyValue()
    {
        $key = 'status';
        $value = 'hunting';

        $key2 = 'favorite color';
        $value2 = 'blue';

        $kv = keyValue::getInstance();
        $kv->register($key, $value);
        $this->assertEquals( $value, $kv->retreive($key) );

        $kv->register($key2, $value2);
        $this->assertEquals( $value2, $kv->retreive($key2) );

        $kv->deleteKey($key);

        $this->assertEquals( null , $kv->retreive($key) );
        $this->assertEquals( $value2 , $kv->retreive($key2) );
    }

}
 