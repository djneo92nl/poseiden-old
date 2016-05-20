<?php
namespace Poseiden\Core\Bootstrap\Cache;

use Poseiden\Core\lib;
use Poseiden\Core\Service;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;


/**
 * Class main
 * @package djneo\poseiden
 */
class ConfigurationParser {

	public function create() {
		//Get files
		$files = new Service\fileService(CONFIGPATH);
		$ArrayToWrite = array('creationTime' => date('Y-m-d H:i:s'));
		foreach ($files->getFiles() as $file) {
			$fileInfo = pathinfo(CONFIGPATH.DIRECTORY_SEPARATOR.$file);
			if ($fileInfo['extension'] == 'yaml') {
				$content = file_get_contents(CONFIGPATH.DIRECTORY_SEPARATOR.$file);
				$value = $this->parseYaml($content);
			}

			$ArrayToWrite = array_replace_recursive($ArrayToWrite, $value);
			unset($value);

		}

		file_put_contents(CACHEPATH.'Configuration'.DIRECTORY_SEPARATOR.'Parsed.php', '<?php $configuration = '.var_export($ArrayToWrite, true).';');
	}

	public function read() {
		include CACHEPATH.'Configuration'.DIRECTORY_SEPARATOR.'Parsed.php';
	}

	/**
	 * @param string $yaml
	 * @return mixed
	 */
	public function parseYaml($yaml) {
		$parser = new Parser();
		try {
			return $parser->parse($yaml);
		} catch (ParseException $e) {
			lib\debug::debugMessage('cache', "", "Unable to parse the YAML string: %s".$e->getMessage(), false);
		}
	}
}