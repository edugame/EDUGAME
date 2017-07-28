<?php
/**
 * Object represents connection to database
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class Connection{
	private $connection;

	public function Connection(){
		$this->connection = ConnectionFactory::getConnection();
	}

	public function close(){
		ConnectionFactory::close($this->connection);
	}

	/**
	 * Wykonanie zapytania sql na biezacym polaczeniu
	 *
	 * @param sql zapytanie sql
	 * @return wynik zapytania
	 */
	public function executeQuery($sql){
                mysqli_set_charset($this->connection,'utf8');
                mysqli_query($this->connection,'SET CHARACTER SET utf8');
                mysqli_query($this->connection,"SET NAMES 'utf8'");
                mysqli_query($this->connection,"SET character_set_client=utf8");
	        mysqli_query($this->connection,"SET character_set_results=utf8");
		return mysqli_query($this->connection,$sql);
	}
        
        public function executeQueryInsert($sql){
                mysqli_set_charset($this->connection,'utf8');
                mysqli_query($this->connection,'SET CHARACTER SET utf8');
		mysqli_query($this->connection,$sql);
                return mysqli_insert_id($this->connection);
	}
}
?>