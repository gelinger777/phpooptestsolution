<?php


/**
 * Class DataCache_Itemexp
 */
class DataCache_Itemexp extends Datacache_Item {


    /**
     * @var
     */
    public $ttl = 1800;


    /**
     * @var mixed|null
     */
    public $data = null;


    /**
     * Construct
     * @param mixed $data Data to be cached
     */
    public function __construct($data) {

        $this->data =
            array(
                'ttl' => $this->ttl,
                'data' => $data
            );

    }

}