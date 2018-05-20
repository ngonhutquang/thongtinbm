<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Data_Type_Model extends MY_Model
{
    //ten bang du lieu
    public $table = 'data_type';

      function get_data_type_info($id)
	    {
	        if (!$id)
	        {
	            return FALSE;
	        }
	        $where = array();
	        $where['id'] = $id;
	        return $this->get_info_rule($where);
	    }
}



?>