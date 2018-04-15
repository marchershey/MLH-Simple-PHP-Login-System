<?php

class Database {

	public $isConn;
	protected $datab;

	// Connect Database
	public function __construct($options = []){
		global $global;

		try {
			$this->datab = new PDO("mysql:host={$global['database']['host']};dbname={$global['database']['dbname']};charset=utf8", $global['database']['username'], $global['database']['password'], $options);
			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$this->isConn = TRUE;
			console("Connected");
		} catch (PDOException $e) {
			echo '<b>Connection failed:</b> ' . $e->getMessage();exit();
		}
	}

	// Terminate Database
	public function __destruct(){
		if($this->isConn == true){
			$this->datab = NULL;
			$this->isConn = FALSE;
			console("Disconnected");
		}
	}

	// Get row
	protected function fetchRow($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetch();
		} catch (PDOException $e) {
			// echo 'Connection failed: ' . $e->getMessage();exit();
			return false;
		}
	}

	// Get rows
	protected function fetchRows($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			//echo 'Connection failed: ' . $e->getMessage();exit();
			return false;
		}
	}

	// Query
	protected function query($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return true;
		} catch (PDOException $e) {
			//echo 'Connection failed: ' . $e->getMessage();exit();
			return false;
		}
	}

	// Count rows
	protected function count($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchColumn();
		} catch (PDOException $e) {
			//echo 'Connection failed: ' . $e->getMessage();exit();
			return false;
		}
	}

}



?>
