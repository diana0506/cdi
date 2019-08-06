<?php
/**
* Clasa Slider
*/

/**
* Clasa Slider contine toate metodele specifice slider-ului.
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
class Slider extends Common{

	/**
	* Tabela categoriilor
	*
	* @var 		string
	* @access 	public
	**/
	static $table = "slider";

	/**
	* Campul de ordonare predefinit
	*
	* @var 		string
	* @access 	public
	**/
	static $order_field = "img";

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
	* @param 	mixed 	ID-ul categoriei (int sau NULL)
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
	* Extrage toate categoriile din tabela, ordonand rezultatele
    * dupa campul specificat in parametrul $order_field si in ordine
    * ascendenta
    *
    * @param    string      Campul folosit pentru ordonare
    * @return   array       Vectorul cu rezultate
    * @access   public
	*/
	
	public function getSliders(){
		$query = "SELECT * FROM " . self::$table . " ORDER BY " . self::$order_field . " ASC";
		$result = $this->link->execute($query);
		if ($this->link->getCount($result) > 0){
			while ($slide = $this->link->getObject($result)){
				$slides[]= $slide;
			}	
		return $slides;
		}
	}

	/**
    * Functia saveImages() este apelata pentru un produs in urma salvarii
    * acestuia. Ea va insera imaginile din formular in tabela 
    * corespunzatoare. Deoarece operatiile de salvare a datelor si salvare 
    * a imaginilor se fac pe rand, este posibila salvarea datelor fara a 
    * salva imaginile, ce pot fi adaugate ulterior prin editare
    *
    * @param    array       Vectorul de imagini (contine caile
    * unde vor fi stocate imaginile)
    * @return   int         Numarul de randuri afectate
    * @access   public
    */

    public function saveImages($images){
		if (!is_array($images)){
			throw new Exception("Incorect data");
		}
		$query = "INSERT INTO " . self::$table . " (img) VALUES ";
		foreach ($images as $image){
			$query .= "('" . $image . "'), ";
		} 
		$query = substr($query,0,-2);
		$this->link->execute($query);
		return $this->link->getAffected();
	}
}

?>