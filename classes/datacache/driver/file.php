<?php

class Datacache_Driver_File implements Datacache_Driver {

    private $path = 'cache';

    /**
     * Saves data into cache
     * @param	string $id					A unique identifer for a cache data
     * @param	DataCache_Itemexp $data					Item to cache
     * @return	bool						Returns true if successful otherwise false
     * @throws	Datacache_CanNotSave        This is thrown when the cache data can not be saved
     */
    public function save($id, DataCache_Itemexp $data) {
        $data = serialize($data);
        $filename = $this->filename($id);
        if (!realpath($this->path))
            throw new Datacache_CanNotSave('Cache path does not exist. ' . $filename);

        if (!is_writable($this->path))
            throw new Datacache_CanNotSave('Can not save file to ' . $filename);

        $result = @file_put_contents($filename, $data);

        if ($result === false)
            throw new Datacache_CanNotSave('Can not save file to ' . $filename);

        return true;
    }

    /**
     * Gets data from cache
     * @param	string $id	A unique identifer for a cache data
     * @return	mixed		The cached data
     * @throws	DataCache_ItemexpNotFound This is thrown when the cache data does not exist
     */
    public function get($id) {
        $filename = $this->filename($id);
        if (!file_exists($filename))
            throw new DataCache_ItemexpNotFound('Cache data does not exist');


        //@@TODO Here Needs to be fixed!!!!!
        if(filetime($filename) + $this->ttl < time()){
            return false;
        }

        $data = file_get_contents($filename);
        return unserialize($data);
    }

    /**
     * Either returns or set the cache path
     * @param  string $path A path to store cache data
     * @return string|void  Cache path
     */
    public function path($path = false) {
        if ($path === false)
            return $this->path;
			
        $path = rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $this->path = $path;
    }

    /**
     * Generate the filename for the cached data
     * @param  string $id A unique identifer for a cache data
     * @return string     Filename for the cache file
     */
    private function filename($id) {
        return $this->path ."/". md5($id) . '.cache';
    }

}
