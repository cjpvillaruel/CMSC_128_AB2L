<?php 
class Model_Overdue extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    /*Function get_query: returns the rows after performing the query */
    function get_query()                
    {
        $sqlQuery = "SELECT br.status,b.title, b.type, br.due_date,
                            u.first_name, u.middle_initial, u.last_name, 
                            GROUP_CONCAT(DISTINCT bs.subject SEPARATOR ' , ') as subject, 
                            GROUP_CONCAT(DISTINCT ba.author SEPARATOR ' and ') as author
                     FROM book b, book_author ba, book_reservation br, book_subject bs, user_account u
                     WHERE b.call_number = br.call_number 
                            AND b.call_number = ba.call_number 
                            AND b.call_number = bs.call_number
                            AND br.account_number = u.account_number
                     GROUP BY br.call_number
                     HAVING br.status = 'overdue'
                     ORDER BY br.due_date";

        $query= $this->db->query($sqlQuery);

        if($query->num_rows() > 0){         //should not be empty
            return $query->result();
        }

       
    }

}

?>