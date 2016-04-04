<?php
class Customer extends Person
{	
	
        var $table = 'customers';
	var $column = array('first_name','last_name','email','phone_number','account_number'); //set column field database for order and search
	var $order = array('first_name' => 'asc'); // default order
        /*
	Determines if a given person_id is a customer
	*/
	function exists($person_id)
	{
		$this->db->from('customers');	
		$this->db->join('people', 'people.person_id = customers.person_id');
		$this->db->where('customers.person_id',$person_id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	/*
	Returns all the customers
	*/
	function get_all($limit=10000, $offset=0)
	{
		$this->db->from('customers');
		$this->db->join('people','customers.person_id=people.person_id');			
		$this->db->where('deleted',0);
		$this->db->order_by("last_name", "asc");
		$this->db->limit($limit);
		$this->db->offset($offset);
		return $this->db->get();		
	}
	        
        //fetch customer details from database by prashant
        function get_customer_list($limit, $start)
        {
           // $sql = 'select var_dept_name, var_emp_name from tbl_dept, tbl_emp where tbl_dept.int_hod = tbl_emp.int_id order by var_dept_name limit ' . $start . ', ' . $limit;
          //  $query = $this->db->query($sql);
           
            $this->db->from('customers');
            $this->db->join('people','customers.person_id=people.person_id');			
            $this->db->where('deleted',0);
            $this->db->order_by("last_name", "asc");
            $this->db->limit($limit);
            $this->db->offset($start);            
            $query = $this->db->get();
            
            if($query->num_rows() > 0)
            {
                  $result = $query->result_array();

                  return $result;
            }
            else
            {
                    return false;
            }
            
        }
        
        
	function count_allOld()
	{
		$this->db->from('customers');
		$this->db->where('deleted',0);
		return $this->db->count_all_results();
	}
	
	/*
	Gets information about a particular customer
	*/
	function get_info($customer_id)
	{
		$this->db->from('customers');	
		$this->db->join('people', 'people.person_id = customers.person_id');
		$this->db->where('customers.person_id',$customer_id);
		$query = $this->db->get();
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//Get empty base parent object, as $customer_id is NOT an customer
			$person_obj=parent::get_info(-1);
			
			//Get all the fields from customer table
			$fields = $this->db->list_fields('customers');
			
			//append those fields to base parent object, we we have a complete empty object
			foreach ($fields as $field)
			{
				$person_obj->$field='';
			}
			
			return $person_obj;
		}
	}
	
	/*
	Gets information about multiple customers
	*/
	function get_multiple_info($customer_ids)
	{
		$this->db->from('customers');
		$this->db->join('people', 'people.person_id = customers.person_id');		
		$this->db->where_in('customers.person_id',$customer_ids);
		$this->db->order_by("last_name", "asc");
		return $this->db->get();		
	}
	
	/*
	Inserts or updates a customer
	*/
	function save(&$person_data, &$customer_data,$customer_id=false)
	{
		$success=false;
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();
		
		if(parent::save($person_data,$customer_id))
		{
			if (!$customer_id or !$this->exists($customer_id))
			{
				$customer_data['person_id'] = $person_data['person_id'];
				$success = $this->db->insert('customers',$customer_data);				
			}
			else
			{
				$this->db->where('person_id', $customer_id);
				$success = $this->db->update('customers',$customer_data);
			}
			
		}
		
		$this->db->trans_complete();		
		return $success;
	}
	
	/*
	Deletes one customer
	*/
	function delete($customer_id)
	{
		$this->db->where('person_id', $customer_id);
		return $this->db->update('customers', array('deleted' => 1));
	}
	
	/*
	Deletes a list of customers
	*/
	function delete_list($customer_ids)
	{
		$this->db->where_in('person_id',$customer_ids);
		return $this->db->update('customers', array('deleted' => 1));
 	}
 	
 	/*
	Get search suggestions to find customers
	*/
	function get_search_suggestions($search,$limit=25)
	{
		$suggestions = array();
		
		$this->db->from('customers');
		$this->db->join('people','customers.person_id=people.person_id');	
		$this->db->where("(first_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		last_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		CONCAT(`first_name`,' ',`last_name`) LIKE '%".$this->db->escape_like_str($search)."%') and deleted=0");
		$this->db->order_by("last_name", "asc");		
		$by_name = $this->db->get();
		foreach($by_name->result() as $row)
		{
			$suggestions[]=$row->first_name.' '.$row->last_name;		
		}
		
		$this->db->from('customers');
		$this->db->join('people','customers.person_id=people.person_id');	
		$this->db->where('deleted',0);		
		$this->db->like("email",$search);
		$this->db->order_by("email", "asc");		
		$by_email = $this->db->get();
		foreach($by_email->result() as $row)
		{
			$suggestions[]=$row->email;		
		}

		$this->db->from('customers');
		$this->db->join('people','customers.person_id=people.person_id');	
		$this->db->where('deleted',0);		
		$this->db->like("phone_number",$search);
		$this->db->order_by("phone_number", "asc");		
		$by_phone = $this->db->get();
		foreach($by_phone->result() as $row)
		{
			$suggestions[]=$row->phone_number;		
		}
		
		$this->db->from('customers');
		$this->db->join('people','customers.person_id=people.person_id');	
		$this->db->where('deleted',0);		
		$this->db->like("account_number",$search);
		$this->db->order_by("account_number", "asc");		
		$by_account_number = $this->db->get();
		foreach($by_account_number->result() as $row)
		{
			$suggestions[]=$row->account_number;		
		}
		
		//only return $limit suggestions
		if(count($suggestions > $limit))
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;
	}
	
	/*
	Get search suggestions to find customers
	*/
	function get_customer_search_suggestions($search,$limit=25)
	{
		$suggestions = array();
		
		$this->db->from('customers');
		$this->db->join('people','customers.person_id=people.person_id');	
		$this->db->where("(first_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		last_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		CONCAT(`first_name`,' ',`last_name`) LIKE '%".$this->db->escape_like_str($search)."%') and deleted=0");
		$this->db->order_by("last_name", "asc");		
		$by_name = $this->db->get();
		foreach($by_name->result() as $row)
		{
			$suggestions[]=$row->person_id.'|'.$row->first_name.' '.$row->last_name;		
		}
		
		$this->db->from('customers');
		$this->db->join('people','customers.person_id=people.person_id');	
		$this->db->where('deleted',0);		
		$this->db->like("account_number",$search);
		$this->db->order_by("account_number", "asc");		
		$by_account_number = $this->db->get();
		foreach($by_account_number->result() as $row)
		{
			$suggestions[]=$row->person_id.'|'.$row->account_number;
		}

		//only return $limit suggestions
		if(count($suggestions > $limit))
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;

	}
	/*
	Preform a search on customers
	*/
	function search($search)
	{
		$this->db->from('customers');
		$this->db->join('people','customers.person_id=people.person_id');		
		$this->db->where("(first_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		last_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		email LIKE '%".$this->db->escape_like_str($search)."%' or 
		phone_number LIKE '%".$this->db->escape_like_str($search)."%' or 
		account_number LIKE '%".$this->db->escape_like_str($search)."%' or 
		CONCAT(`first_name`,' ',`last_name`) LIKE '%".$this->db->escape_like_str($search)."%') and deleted=0");		
		$this->db->order_by("last_name", "asc");
		
		return $this->db->get();	
	}

        
     /** by prashant **/        
        private function _get_datatables_query()
	{
			      
                 $this->db->from($this->table);
                 $this->db->join('people','customers.person_id=people.person_id');			
                 $this->db->where('deleted',0);
              //$this->db->order_by("first_name", "asc");
                
		$i = 0;
	  /**  // working on version 3.x+
		foreach ($this->column as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
			    $match = $_POST['search']['value'];
                            if($i===0) // first loop
                            {
                                     // working on version 3.x+
                                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
                                   //$this->db->like($item, $_POST['search']['value']);                            
                                    
                            }
                            else
                            {         // working on version 3.x+
                                    //  $this->db->or_like($item, $_POST['search']['value']);                         
                            }
                            
                            // working on version 3.x+
                           // if(count($this->column) - 1 == $i) //last loop
                           // $this->db->group_end(); //close bracket
                            
			}
			$column[$i] = $item; // set column array variable to order processing
			$i++;
		}
           * 
           */
                if($_POST['search']['value']) // if datatable send POST for search
		{
                    $match = $_POST['search']['value'];
                    $this->db->where("(first_name LIKE '%".$this->db->escape_like_str($match)."%' or 
                            last_name LIKE '%".$this->db->escape_like_str($match)."%' or 
                            email LIKE '%".$this->db->escape_like_str($match)."%' or 
                            phone_number LIKE '%".$this->db->escape_like_str($match)."%' or 
                            account_number LIKE '%".$this->db->escape_like_str($match)."%' or 
                            CONCAT(`first_name`,' ',`last_name`) LIKE '%".$this->db->escape_like_str($match)."%')");
                 }
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();            
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();               
                
                $query = $this->db->get();         
                
		return $query->num_rows();            
                
	}

	public function count_all()
	{
		$this->db->from($this->table);
                
                 //start by prashant
                $this->db->join('people','customers.person_id=people.person_id');			
                $this->db->where('deleted',0);
                 //end
                
		return $this->db->count_all_results();
	}
        
}
?>
