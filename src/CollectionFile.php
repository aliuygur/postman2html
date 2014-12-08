<?php namespace Alioygur\Postman2HTML;

use Alioygur\Postman2HTML\Exception\CollectionFileNotFound;
use Alioygur\Postman2HTML\Exception\InvalidCollectionFile;

/**
 * Class CollectionFile
 * @package Alioygur\Postman2HTML
 */
class CollectionFile
{
    use CollectionTrait;

    /**
     * the name of template file
     */
    const TEMPLATE_FILE = 'template.php';

    /**
     * @var array
     */
    private $folders = [];
    /**
     * @var array|mixed
     */
    private $rawData = [];

    /**
     * @param $file
     */
    public function __construct($file)
    {
        $this->rawData = $this->loadFile($file);

        $this->init();
    }

    /**
     * @param $file
     * @return mixed
     */
    private function loadFile($file)
    {
        if (is_file($file)) {
            $decodedFile = json_decode(file_get_contents($file), true);

            if (is_null($decodedFile) || !isset($decodedFile['folders']) || !isset($decodedFile['requests'])) {
                throw new InvalidCollectionFile();
            }

            return $decodedFile;
        }

        throw new CollectionFileNotFound();
    }

    /**
     * Initialize
     */
    private function init()
    {
        # Set folders
        foreach ($this->rawData['folders'] as $folder) {
            $this->folders[] = new CollectionFolder($folder, $this->rawData);
        }
    }

    /**
     * @return array
     */
    public function folders()
    {
        return $this->folders;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @param array $vars
     * @return string
     */
    public function render(array $vars = [])
    {
        $vars['collection'] = $this;
        extract($vars);

        ob_start();
        include __DIR__ . '/' . self::TEMPLATE_FILE;

        return ob_get_clean();
    }
}