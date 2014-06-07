<?php

/**
 * Class Datacache_Driver_Apc
 */
class Datacache_Driver_Apc implements Datacache_Driver
{


    private $prefix  =  "mytest_";


    /**
     * Saves the data to APC
     * @param string $id
     * @param DataCache_Itemexp $data
     * @return array|bool
     */
    public function save($id, DataCache_Itemexp $data)
    {

        return apc_store($this->prefix.$id, $data,$data->ttl);
    }

    /**
     * Gets data from APC
     * @param string $id
     * @return mixed
     */
    public function get($id)
    {

        return apc_fetch($this->prefix.$id);

    }

}
