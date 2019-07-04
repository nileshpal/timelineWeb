<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Timeline_test extends TestCase{
    
    private $route;
    
    private $obj; //the lib
    
    private $date_modified;
    
    public function setUp()
    {
        $this->resetInstance();//reset the Codeigniter instance ($this->CI)
        $this->CI = &get_instance();
        $this->CI->load->library('client');
        $this->obj = $this->CI->client;
    }
    
    public function test_index()
    {
        $this->route =  "timeline/index";
        $this->test_method_200();
    }
   
    public function test_job_detail(){
        
        $expected = array(
            "APIStatus"=>"APIStatus",
            "id"=>"id",
            "name"=>"name",
            "date_modified"=>"date_modified",
            "maconomy_job_c"=>"maconomy_job_c",
            "proposalNO"=>"proposalNO",
            "accountName"=>"accountName",
            "startDate"=>"startDate",
            "closeDate"=>"closeDate",
            "estimatedCloseDate"=>"estimatedCloseDate",
            "status"=>"status",
            "maconomyStatus"=>"maconomyStatus"
        );
        $response = $this->obj->maconomyNumber("91231524");
        $dataArray = json_decode($response,true);
        foreach ($dataArray as $key=>$val) {
            if($key=="date_modified"){
                $this->date_modified = $val;
            }
            $this->assertEquals($expected[$key], $key);
        }
        $this->route =  "timeline/job_detail";
        $this->test_method_200();
    }
    
    public function test_update_timeline(){
        
        $expected = array(
            "status"=>"status",
            "msg"=>"msg"
        );
        $postArray = array(
            "request_type"=>"Update",
            "maconomyNo"=> "91231524",
            "maconomyId"=>  "324cb914-8d86-11e9-b75f-0a86afcfce28",
            "lastDateModified"=> $this->date_modified,
            "startDate"=>"2019-06-22",
            "closeDate"=> "2019-06-26",
            "estimatedCloseDate"=> "2019-06-30"
        );
        $response = $this->obj->proposalByID($postArray);
        $dataArray = json_decode($response,true);
        if(isset($dataArray["APIStatus"])){
            $expected = array(
                "APIStatus"=>"APIStatus",
                "id"=>"id",
                "name"=>"name",
                "date_modified"=>"date_modified",
                "maconomy_job_c"=>"maconomy_job_c",
                "proposalNO"=>"proposalNO",
                "accountName"=>"accountName",
                "startDate"=>"startDate",
                "closeDate"=>"closeDate",
                "estimatedCloseDate"=>"estimatedCloseDate",
                "status"=>"status",
                "maconomyStatus"=>"maconomyStatus"
            );
        }
        
        foreach ($dataArray as $key=>$val) {
            $this->assertEquals($expected[$key], $key);
        }
        $this->request('POST', "timeline/update_timeline");
        $this->assertResponseCode(302);
    }
    
    public function test_method_200()
    {
        $this->request('GET', $this->route);
        $this->assertResponseCode(200);
    }
    
    public function test_proposal_detail(){
        $expected = array(
            "APIStatus"=>"APIStatus",
            "id"=>"id",
            "name"=>"name",
            "date_modified"=>"date_modified",
            "maconomy_job_c"=>"maconomy_job_c",
            "proposalNO"=>"proposalNO",
            "accountName"=>"accountName",
            "startDate"=>"startDate",
            "closeDate"=>"closeDate",
            "estimatedCloseDate"=>"estimatedCloseDate",
            "status"=>"status",
            "maconomyStatus"=>"maconomyStatus"
        );
        $response = $this->obj->maconomyNumber("91231524");
        $dataArray = json_decode($response,true);
        if(count($dataArray)>0){
            foreach ($dataArray as $key=>$val) {
                if($key=="date_modified"){
                    $this->date_modified = $val;
                }
                $this->assertEquals($expected[$key], $key);
            }
        }
        
        //$this->assertEquals($dataArray["status"], "Success");
        
        $expected = "APISUCCESS";
        $actual = $dataArray["APIStatus"];
        
        $this->assertEquals($expected, $actual);
        
        $this->route =  "proposal_detail/detail/91231524";
        $this->test_method_200();
    }
}
