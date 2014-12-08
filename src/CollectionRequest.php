<?php namespace Alioygur\Postman2HTML;

/**
 * Class CollectionRequest
 * @package Alioygur\Postman2HTML
 */
class CollectionRequest
{
    use CollectionTrait;

    /**
     *
     */
    const HTTP_VERSION = 'HTTP/1.1';

    /**
     * @var array
     */
    private $rawData = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->rawData = $data;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function headers()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function rawRequest()
    {
        $header = $this->method() . ' ' . $this->url() . ' ' . self::HTTP_VERSION . PHP_EOL;
        $header .= 'Host: ' . $this->host() . PHP_EOL;
        $header .= $this->headers;

        if ($this->rawModeData) {
            $header .= PHP_EOL;
            $header .= $this->rawModeData;
        }

        return $header;
    }

    /**
     * @return mixed
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * @return null
     */
    public function host()
    {
        return parse_url($this->url(), PHP_URL_HOST) ?: null;
    }
} 