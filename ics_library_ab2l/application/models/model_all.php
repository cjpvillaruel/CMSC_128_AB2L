<?php 
class Model_All extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    /*Function get_query: returns the rows after performing the query */
    function get_query()                
    {
        $sqlQuery = "SELECT GROUP_CONCAT(DISTINCT bs.subject SEPARATOR ' , ') as subject, 
                            GROUP_CONCAT(DISTINCT ba.author SEPARATOR ' and ') as author,
                            b.title, b.type, b.no_of_available, b.quantity
                     FROM book b, book_author ba, book_reservation br, book_subject bs
                     WHERE b.call_number = ba.call_number 
                     AND b.call_number = ba.call_number 
                     AND b.call_number = bs.call_number
                     GROUP BY b.call_number";

        $query= $this->db->query($sqlQuery);

        if($query->num_rows() > 0){         //should not be empty
            return $query->result();
        }

        
    }

}

?>