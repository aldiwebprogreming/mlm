<?php 
	
	/**
	 * 
	 */
	class M_data extends CI_Model
	{
		
		function __construct()
		{
			parent:: __construct();
		}


		function get($table){

			return $this->db->get($table)->result_array();

		}
	}

 ?>