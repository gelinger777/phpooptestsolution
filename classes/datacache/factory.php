<?php

/**
 * Class Datacache_Factory
 */
class Datacache_Factory
{

    /**
     * @var
     */
    public $driver;

    /**
     * @var array
     */
    private $drivers = array(

        'file' => 'Datacache_Driver_File',
        'apc' => 'Datacache_Driver_Apc'
    );

    /**
     * @param $driver
     */
    public function forge($driver)
    {

        $this->setDriver($driver);

    }


    public function setDriver($driver)
    {

        $this->driver = $this->drivers[$driver];

    }

    /**
     * @return mixed
     */
    public function driver()
    {

        return new $this->driver();

    }

}