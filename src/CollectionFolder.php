<?php namespace Alioygur\Postman2HTML;

/**
 * Class CollectionFolder
 * @package Alioygur\Postman2HTML
 */
class CollectionFolder
{
    use CollectionTrait;

    /**
     * @var array
     */
    private $rawData = [];
    /**
     * @var array
     */
    private $file = [];
    /**
     * @var array
     */
    private $requests = [];

    /**
     * @param array $data
     * @param array $file
     */
    public function __construct(array $data, array $file)
    {
        $this->rawData = $data;
        $this->file = $file;

        # Set requests
        foreach ($this->file['requests'] as $request) {
            if (in_array($request['id'], $this->order)) {
                $this->requests[] = new CollectionRequest($request);
            }
        }
    }

    /**
     * @return array
     */
    public function requests()
    {
        return $this->requests;
    }
} 