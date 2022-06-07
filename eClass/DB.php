<?php
class DB 
{    
    //protected $db_host = 'sql107.epizy.com';

	// protected $db_user = 'epiz_26302519';
	// protected $db_pass = 'Q3GBGdDFirxz';
	 protected $db_name = 'epiz_26927936_resume';

    protected $db_host = 'localhost';
    protected $db_user = 'root';
    protected $db_pass = '';
    //protected $db_name = 'ecommerce';
    
    protected $connection;
    
    public function __construct()
    {
        if (!isset($this->connection))
        {         
           
                  $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name,3308);
           
                     
            
            if (!$this->connection)
            {
                echo 'Cannot connect to database server';
                //exit;               
            }            
        }    
        
        return $this->connection;
    }
}
//$obj = new DB;


?>