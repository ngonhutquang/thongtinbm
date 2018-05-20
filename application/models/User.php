<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Model {


		 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }



		public function getList (){

					$query = $this->db->query("select * from user");

					return $query;

					
		}


		



	}



?>