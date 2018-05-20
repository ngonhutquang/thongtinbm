<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Csv_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('product');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('product', $data);
	}
}
