<?php
/**
* Clasa Links
*/

/**
* Clasa Links contine toate metodele specifice culorilor.
* Deoarece toate metodele comune sunt implementate in clasa
* abstracta Common sau in clasa Database, ea nu are nevoie de 
* nicio metoda speciala. Constructorul este redefinit pentru 
* crearea unui obiect cu date existente
*
* @package  	classes
* @author   	Alexandru Manta <alexandru.manta@hotmail.com>
* @version  	Version: 1.0
* @access   	public
*/
class Links extends Common{

	/**
	* Tabela culorilor
	*
	* @var 		string
	* @access 	public
	**/
	static $table = "links";

	/**
	* Campul de ordonare predefinit
	*
	* @var 		string
	* @access 	public
	**/
	static $order_field = "id";

	/**
	* Campurile protejate pentru operatii de actualizare
	*
	* @var 		array
	* @access 	protected
	**/
	protected $protected_fields = array('id');
	
	/**
    * Constructor - creeaza conexiunea cu baza de date si, in cazul
    * in care este furnizat un id, populeaza obiectul cu datele din
    * baza de date
	*
	* @param 	mixed 	ID-ul link-ului (int sau NULL)
    * @access 	public
    */
	public function __construct($id=null){
		$this->link = new Database();
		if ((is_numeric($id)) and ($id>0) and (filter_var($id, FILTER_VALIDATE_INT))){
			$option = $this->find($id);
			foreach (get_object_vars($option) as $prop=>$val){
				$this->$prop = $val;
			}
		}
	}
	
	/**
    * Extrage link-ul din tabela in functie de id-ul setat
    * in parametrul $value
    *
    * @param    int      	Id-ul setat in parametru
    * @return   array       Vectorul cu rezultate
    * @access   public
    */
	public function getLink($value){
		$query = "SELECT * FROM " . self::$table . " WHERE id = {$value}";
		$result = $this->link->execute($query);
		$link = $this->link->getObject($result);
			$links [] = $link;
		return $links;
	}

	/**
	* Extrage toate link-urile din tabela, ordonand rezultatele
    * dupa campul specificat in parametrul $order_field si in ordine
    * ascendenta
    *
    * @param    string      Campul folosit pentru ordonare
    * @return   array       Vectorul cu rezultate
    * @access   public
    */
	public function getLinks(){
		$query = "SELECT * FROM " . self::$table . " ORDER BY " . self::$order_field . " ASC";
		$result = $this->link->execute($query);
		if ($this->link->getCount($result) > 0){
			while ($link = $this->link->getObject($result)){
				$links[]= $link;
			}	
		    return $links;
		}
	}
}

?>