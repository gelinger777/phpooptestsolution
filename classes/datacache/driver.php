<?php

interface Datacache_Driver {

    /**
     * Saves item into cache
     * @param  string $id		A unique identifer for a cache item
     * @param  DataCache_Itemexp $data		Item to cache
     * @return bool				Returns true if successful otherwise false
     * @throws Datacache_CanNotSave        This is thrown when the cache data can not be saved
     */
    public function save($id, DataCache_Itemexp $data);

    /**
     * Gets item from cache
     * @param	string $id                      A unique identifer for a cache item
     * @return	DataCache_Itemexp                           The cached item
     * @throws  DataCache_ItemexpNotFound   This is thrown when the cache data does not exist
     */
    public function get($id);
}
