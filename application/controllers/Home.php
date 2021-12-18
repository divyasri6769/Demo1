<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Homemodel');
		
		
	
	//$this->close();
		error_reporting(0);
    }


   public function index(){

      $this->load->view('addevents');

    }


function addevent(){

$this->form_validation->set_rules('name', 'Name', 'trim|required');
		
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		$this->form_validation->set_rules('location', 'Location', 'trim|required');

		$this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('addevents');
		}
		else
		{

		$time=date("Y-m-d H:i:s");
		$name 	= $this->escapeString(trim($this->input->post('name')));
		$description=$this->escapeString(trim($this->input->post('description')));
	    $location=$this->escapeString(trim($this->input->post('location')));


   $event_date=$this->escapeString(trim($this->input->post('event_date')));
        
 
		   $insertData = array(
		   	            'name'=>$name,
								'description'=>$description,
								'location'=>$location,
								'event_date'=>$event_date,
								'date_created'=>$time
							);
								
			$checkDuplicate = $this->Homemodel->checkDuplicate($name);


			if($checkDuplicate ==0){
				$insertUser = $this->Homemodel->insert($insertData);
			
				if($insertUser)
				{

				redirect(base_url()."index?suk=ok");

					
				}
				else
				{
				redirect(base_url()."index?suk=err");

				}
			}
			else{
            redirect(base_url()."index?suk=exist");

			}
		}
	}


function allevents(){


	$data['get'] = $this->Homemodel->allevents();

   if($this->input->get('act')=='del' && $this->input->get('uid')!=''){

		 $uid=$this->escapeString(trim($this->input->get('uid')));
		


		 $delphone = $this->Homemodel->del($uid);
		 redirect(base_url()."allevents?suk=deleted");
		 exit;
		 }
	
    $this->load->view('allevents',$data);

}


//update//
function updatevent(){

  

      $eventid=$this->input->get('id');

  
      $name = $this->escapeString(trim($this->input->post('name')));
		$description=$this->escapeString(trim($this->input->post('description')));
	   $location=$this->escapeString(trim($this->input->post('location')));
      $date_modified=$this->escapeString(trim($this->input->post('date_modified')));


        
     if($this->input->post('update')=="update") {


    
        $update=array(
			               'id'=> $eventid,
			              'name'=>$name,
								'description'=>$description,
								'location'=>$location,
								
				            'date_modified'=>$date_modified
					      );
           


             $update=$this->Homemodel->update($update,$eventid);
             redirect(base_url()."allevents?suk=ok");
			

    }
      $data = $this->Homemodel->getdat($eventid);

      $data['name']=$data[0]->name;
      $data['description']=$data[0]->description;
      $data['location']=$data[0]->location;
      $data['event_date']=$data[0]->event_date;



        $data['date_modified']=$data[0]->date_modified;
  
         $this->load->view('editevent',$data);
        }



	function escapeString($val){
	$db = get_instance()->db->conn_id;
    $val = mysqli_real_escape_string($db, $val);
    return $val;
	}
}


