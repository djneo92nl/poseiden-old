<?php

/**
 * Created by PhpStorm.
 * User: Remko
 * Date: 8-12-2014
 * Time: 21:30
 */
class pdoLib extends main {

    private $dboHandler;

    public function __construct() {
        //Include settings
        include_once(ROOTPATH . '/lib/config.local.php');
        $this->settings = $settings;
    }

    public function setConnection () {
        if (!isset($this->settings['database'])) {
            debugMessage('Model ', null, 'No Config setting', false);

        }
        try{
            $this->dboHandler = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8',
                $this->settings['database']['username'],
                $this->settings['database']['password']);
            $this->dboHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dboHandler->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            debugMessage('ModelPDO', null, $e->getMessage(), false);
        }
    }

    public function getData() {
        $stmt = $this->dboHandler->query("SELECT * FROM" . $this->database);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}