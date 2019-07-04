<?php
require_once('Curl.php');

class Client extends Curl{
	/**
	* Get Proposal by Id
	* @param, string 
	* @return, object/Exception
	*/
	public function __construct() {
		$this->ci =& get_instance();
		parent::__construct();
	
	}
	
	public function maconomyNumber($maconomyNo)
	{
            $sugarClientUrl = $this->getBaseUrlFromConfig()."APIRequest.php";
            $params = array(
                "request_type"=>"Fetch",
                "maconomyNo"=>$maconomyNo
            );
            $method = "post";
            return $this->_simple_call($method, $sugarClientUrl, $params, $options = array());
		
	}
	public function proposalByID($post)
        {
            $sugarClientUrl = $this->getBaseUrlFromConfig()."APIRequest.php";
            $method = "post";
            return $this->_simple_call($method, $sugarClientUrl, $post, $options = array());
        }
}
?>
