<?php
require_once ("person_controller.php");
class Customers extends Person_controller
{
	function __construct()
	{
		parent::__construct('customers');
               
	}
	
        
        
	function index()
	{
		               
            $this->body = 'customers/listallcustomer'; // passing middle to function. change this for different views.
            $this->layout();
               
	}
	       
        
	/*
	Returns customer table data rows. This will be called with AJAX.
	*/
	function search()
	{
		$search=$this->input->post('search');
		$data_rows=get_people_manage_table_data_rows($this->Customer->search($search),$this);
		echo $data_rows;
	}
	
	/*
	Gives search suggestions based on what is being searched for
	*/
	function suggest()
	{
		$suggestions = $this->Customer->get_search_suggestions($this->input->post('q'),$this->input->post('limit'));
		echo implode("\n",$suggestions);
	}
	
	/*
	Loads the customer edit form
	*/
	function view($customer_id=-1)
	{
		$data['person_info']=$this->Customer->get_info($customer_id);
                $this->body = 'customers/form'; // passing middle to function. change this for different views.
                $this->data = $data;
                $this->layout();
                
		//$this->load->view("customers/form",$data);
	}
	
	/*
	Inserts/updates a customer // here -1 means for update by prashant 
	*/
	function save($customer_id=-1)
	{
		$person_data = array(
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'email'=>$this->input->post('email'),
		'phone_number'=>$this->input->post('phone_number'),
		'address_1'=>$this->input->post('address_1'),
		'address_2'=>$this->input->post('address_2'),
		'city'=>$this->input->post('city'),
		'state'=>$this->input->post('state'),
		'zip'=>$this->input->post('zip'),
		'country'=>$this->input->post('country'),
		'comments'=>$this->input->post('comments')
		);
		$customer_data=array(
		'account_number'=>$this->input->post('account_number')=='' ? null:$this->input->post('account_number'),
		'taxable'=>$this->input->post('taxable'),
		);
		if($this->Customer->save($person_data,$customer_data,$customer_id))
		{
			//New customer
			if($customer_id==-1)
			{
				//echo json_encode(array('success'=>true,'message'=>$this->lang->line('customers_successful_adding').' '.
				// $person_data['first_name'].' '.$person_data['last_name'],'person_id'=>$customer_data['person_id']));                     
                                                               
                                $this->session->set_flashdata('flashSuccess', $this->lang->line('customers_successful_adding').' name '.$person_data['first_name'].' '.$person_data['last_name'] );
                                
                                redirect('/customers');
                                
			} 
			else //previous customer
			{
				//echo json_encode(array('success'=>true,'message'=>$this->lang->line('customers_successful_updating').' '.
				//$person_data['first_name'].' '.$person_data['last_name'],'person_id'=>$customer_id));
                                $this->session->set_flashdata('flashSuccess', $this->lang->line('customers_successful_updating').' name '.$person_data['first_name'].' '.$person_data['last_name']);    
                            
                                 redirect('/customers');
			}
		}
		else//failure
		{	
			//echo json_encode(array('success'=>false,'message'=>$this->lang->line('customers_error_adding_updating').' '.
			//$person_data['first_name'].' '.$person_data['last_name'],'person_id'=>-1));
                        
                        $this->session->set_flashdata('flashError', $this->lang->line('customers_error_adding_updating'));   
                        $this->view($customer_id=-1);
		}
	}
	
	/*
	This deletes customers from the customers table
	*/
	function delete()
	{
		$customers_to_delete=$this->input->post('ids');
		
		if($this->Customer->delete_list($customers_to_delete))
		{
			echo json_encode(array('success'=>true,'message'=>$this->lang->line('customers_successful_deleted').' '.
			count($customers_to_delete).' '.$this->lang->line('customers_one_or_multiple')));                      
		}
		else
		{
			echo json_encode(array('success'=>false,'message'=>$this->lang->line('customers_cannot_be_deleted')));                        
                 }
	}
	
	function excel()
	{
		$data = file_get_contents("import_customers.csv");
		$name = 'import_customers.csv';
		force_download($name, $data);
	}
	
	function excel_import()
	{
		$this->load->view("customers/excel_import", null); // ajax page load by prashant
                
               // $this->body = 'customers/excel_import'; // passing middle to function. change this for different views.
              //  $this->data = null;
              //  $this->layout();
	}

	function do_excel_import()
	{
		$msg = 'do_excel_import';
		$failCodes = array();
                
                $type = explode(".",$_FILES['file_path']['name']);
                
                // by prashant
                if(strtolower(end($type)) == 'csv')
               {

              
                
		if ($_FILES['file_path']['error']!=UPLOAD_ERR_OK)
		{
			$msg = $this->lang->line('items_excel_import_failed');
			//echo json_encode( array('success'=>false,'message'=>$msg) );
                       $this->session->set_flashdata('flashError', $msg); 
                        redirect('/customers');		       
		}
		else
		{
			if (($handle = fopen($_FILES['file_path']['tmp_name'], "r")) !== FALSE)
			{
				//Skip first row
				fgetcsv($handle);
				
				$i=1;
				while (($data = fgetcsv($handle)) !== FALSE) 
				{
					$person_data = array(
					'first_name'=>$data[0],
					'last_name'=>$data[1],
					'email'=>$data[2],
					'phone_number'=>$data[3],
					'address_1'=>$data[4],
					'address_2'=>$data[5],
					'city'=>$data[6],
					'state'=>$data[7],
					'zip'=>$data[8],
					'country'=>$data[9],
					'comments'=>$data[10]
					);
					
					$customer_data=array(
					'account_number'=>$data[11]=='' ? null:$data[11],
					'taxable'=>$data[12]=='' ? 0:1,
					);
					
					if(!$this->Customer->save($person_data,$customer_data))
					{	
						$failCodes[] = $i;
					}
					
					$i++;
				}
			}
			else 
			{
				//echo json_encode( array('success'=>false,'message'=>'Your upload file has no data or not in supported format.') );
				$this->session->set_flashdata('flashError', 'Your upload file has no data or not in supported format.'); 
                                redirect('/customers');
			}
		}

		$success = true;
		if(count($failCodes) > 1)
		{
			$msg = "Most customers imported. But some were not, here is list of their CODE (" .count($failCodes) ."): ".implode(", ", $failCodes);
			$success = false;
                        
		}
		else
		{
			$msg = "Import Customers successful";
		}

		//echo json_encode( array('success'=>$success,'message'=>$msg) );                
                $this->session->set_flashdata('flashSuccess', $msg); 
                
                redirect('/customers');
                
              }
            else
            {
                 $this->session->set_flashdata('flashError', 'Your uploaded file are not in supported format. Please upload in required csv format'); 
                    redirect('/customers');	
            }   
	} //end of method
	
	/*
	get the width for the add/edit form
	*/
	function get_form_width()
	{			
		return 350;
	}
         
   /* by prashant */
        
    public function ajax_list()
    {
            $list = $this->Customer->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $customer) 
             {
                    $no++;
                    $row = array();                    
                    $row[] = '<input type="checkbox" class="row-checkbox" id="person_'.$customer->person_id.'" value="'.$customer->person_id.'" " />';
                              
                    $row[] = $customer->first_name;
                    $row[] = $customer->last_name;
                    $row[] = $customer->email;
                    $row[] = $customer->phone_number;
                    $row[] = $customer->account_number;
                    
                    //add html for action
                    $row[] = '<a href="index.php/customers/view/'.$customer->person_id.'" title="Edit" ">
                              <span class="btn btn-info btn-condensed btn-xs"><i class="fa fa-edit"></i></span></a>';                                
                    $data[] = $row;
             }

            $output = array(
                            "draw" => $_POST['draw'],
                            "recordsTotal" => $this->Customer->count_all(),
                            "recordsFiltered" => $this->Customer->count_filtered(),
                            "data" => $data,
                            );
            //output to json format
           
            echo json_encode($output);     
           
            

    }

}
?>