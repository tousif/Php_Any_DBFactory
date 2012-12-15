<?php

 class ResultSetIterator implements Iterator 
{ 
    private $result; 
    private $position; 
    private $row_data; 
    private $length;
    
    
    public function __construct ($result) 
    { 
        $this->result = $result; 
        $this->length=mysql_num_rows($result);
        $this->position = 0; 
    } 
    
    public function getLength()
    {
    	return $this->length;
    }
    
    public function current () 
    { 
        return $this->row_data; 
    } 
    
    public function key () 
    { 
        return $this->position; 
    } 
    
    public function next () 
    { 
        $this->position++; 
        $this->row_data = mysql_fetch_array($this->result); 
    } 

    public function rewind () 
    { 
        $this->position = 0; 
        mysql_data_seek($this->result, 0); 
        
        /* The initial call to valid requires that data 
            pre-exists in $this->row_data 
        */ 
        $this->row_data = mysql_fetch_array($this->result); 
    } 

    
    public function seek($pos)
    {
    	 $this->position = $pos; 
        mysql_data_seek($this->result, $pos);
        $this->row_data= mysql_fetch_array($this->result);
    }
    
    public function valid () 
    { 
        return (boolean) $this->row_data; 
    } 
} 

?>