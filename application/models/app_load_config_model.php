<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_config_model extends CI_Model {
	 
	public function __construct()
	{
		$dt = $this->db->get("dlmbg_setting");
		foreach($dt->result() as $d)
		{
			$GLOBALS[$d->tipe] = $d->content_setting;
		}
	}
}

/* End of file app_load_config_model.php */
/* Location: ./application/models/app_load_config_model.php */