<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * created by nilesh kumar
 * created date 18/06/2019
 */
class Timeline extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $data['title'] = 'Timeline';
        $data['job_detail'] = array();
        $data['type'] ='';
        $this->load->view('timeline',$data);
    }

    /**
     * fetch propsal detail from SugarCrm and display on the view 
     * Using ajax display view
     * required data macronomy number from view 
     */

    public function job_detail(){
        //91231524
        $maconomy_number_c = $this->input->post('job_number');
        $response =$this->proposalRecord($maconomy_number_c);
        echo json_encode($response);
    }

    public function update_timeline(){
        if(!empty($this->input->post('pst-date')) && !empty($this->input->post('pet-date')) && !empty($this->input->post('pct-date'))){
            /**
             * set post data
             */
            $postArray = array(
                "request_type"=>"Update",
                "maconomyNo"=> $this->input->post('maconomyNo'),
                "maconomyId"=>  $this->input->post('proposal_id'),
                "lastDateModified"=> $this->input->post('lastmodify'),
                "startDate"=>$this->input->post('pst-date'),
                "closeDate"=> $this->input->post('pet-date'),
                "estimatedCloseDate"=> $this->input->post('pct-date')
            );
            $this->load->library('client');
            $response = $this->client->proposalByID($postArray);
            $dataArray = json_decode($response,true);
            if(is_array($dataArray)){
                if($dataArray['status']=='Success'){
                    $this->session->set_flashdata('msg', 'Record Updated Successfully');
                    redirect('/timeline');
                }else if($dataArray['APIStatus']=='APISUCCESS'){
                    $this->session->set_flashdata('msg', 'Record not updated as it is not the latest record. Please update again.');
                    redirect('/proposal_detail/edit/'.$this->input->post('maconomyNo'));
                }else{
                    $this->session->set_flashdata('msg', 'Something went wrong. Please try again.');
                }
            }else{
                $this->session->set_flashdata('msg', 'Something went wrong. Please try again.');
            }
        }else{
            $this->session->set_flashdata('msg', 'Required fields cannot be empty.');
        }
        redirect('/timeline');
    }
    
    protected function proposalRecord($maconomy_number_c){
        $this->load->library('client');
        $response = $this->client->maconomyNumber($maconomy_number_c);
        log_message("debug", $response);
        return $response;
    }
    
    public function proposal_detail($type,$job_number)
    {
        $data['title'] = 'Timeline';
        $data['job_detail'] = array();
        if($job_number!=''){
            $response = json_decode($this->proposalRecord($job_number),true);
            if(is_array($response)){
                $data['job_detail'] = $response;
            }
        }
        $data['type'] = $type;
        $this->load->view('timeline',$data);
    }
            
}
