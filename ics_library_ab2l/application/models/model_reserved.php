<?php
class Model_reserved extends CI_Model{

/*Model for Controller controller_reserved.php and View view_reserved.php

function: get the books which are reserved

query used: select statement to get the necessary info about the reserved book
			joined the book and the book_reservation table using call_number 
			the result were then stored to result */

function getAllReserved(){	
	$sqlQuery="SELECT GROUP_CONCAT(DISTINCT bs.subject SEPARATOR ' , ') as subject,
                        GROUP_CONCAT(DISTINCT ba.author SEPARATOR ' and ') as author,
                        b.title, b.type, u.first_name,u.middle_initial, u.last_name, u.account_number, b.call_number
                        FROM book b, book_reservation br, user_account u, book_subject bs, book_author ba
                        WHERE  b.call_number = br.call_number 
                                AND b.call_number = ba.call_number
                                AND b.call_number = bs.call_number
                                 AND br.account_number = u.account_number
                                AND br.status='reserved' 
                        GROUP BY b.call_number";
	
        $query = $this->db->query($sqlQuery);

        return $query->result();
	}
}

?>