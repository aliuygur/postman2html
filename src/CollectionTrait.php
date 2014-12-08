<?php namespace Alioygur\Postman2HTML;

use Michelf\Markdown;

/**
 * Class CollectionTrait
 * @package Alioygur\Postman2HTML
 */
trait CollectionTrait
{
    /**
     * @param $property
     * @return mixed
     */
    public function markdown($property)
    {
        return Markdown::defaultTransform($this->getProperty($property));
    }

    /**
     * @param $key
     * @return mixed
     */
    private function getProperty($key)
    {
        return isset($this->rawData[$key]) ? $this->rawData[$key] : null;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getProperty($key);
    }
}