<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title> 
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.min.css?<?php echo rand(); ?>">
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css?<?php echo rand(); ?>">
<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css?<?php echo rand(); ?>">
<link href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.min.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/jquery.mobile-1.4.5.min.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- search div start -->
    <div class="container">
        <div class="form-group timeline-margin">
            <div class="row">
                <div class="col-md-2 col-sm-3 timeline-center-h webApp">
                    <label for="job_number_tile">Job Number:</label>
                </div>
                <div class="col-md-4 col-sm-3 webApp">
                    <input type="text" class="form-control stopEvent" max="9" id="job_number" value="<?php if(count($job_detail)>0){echo $job_detail["maconomy_job_c"];}?>">
                </div>
                <div class="col-md-1 col-sm-3 webApp">
                    <button type="submit" class="btn btn-primary" id="job_number_submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <div class="col-md-1 col-sm-3 webApp">
                    <div class="loader"></div>
                </div>
                <div class="col-md-4 col-sm-3 webApp">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close">&times;</button>
                        <span class="display_error"></span>
                    </div>
                    <?php if($this->session->flashdata('msg')){?>
                    <div class="alert alert-success">
                        <button type="button" class="close">&times;</button>
                        <?php echo $this->session->flashdata('msg')?>
                    </div>
                    <script>
                        setTimeout(function(){$(".alert").hide();}, 3000);
                    </script>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-xs-9 mobile">
                        <input type="job_number" max="9" class="form-control stopEvent" id="job_number_mob" placeholder="Job number" value="<?php if(count($job_detail)>0){echo $job_detail["maconomy_job_c"];}?>">
                    </div>
                    <div class="col-xs-3 mobile">
                        <button type="button" class="btn btn-primary" id="job_number_submit_mob"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 mobile">
                    <div class="row">
                        <div class="col-xs-11 mobile">
                            <div class="alert alert-danger alert-dismissible timeline-margin-header">
                                <button type="button" class="close">&times;</button>
                                <span class="display_error_mob"></span>
                            </div>
                            <?php if($this->session->flashdata('msg')){?>
                            <div class="alert alert-success">
                                <button type="button" class="close">&times;</button>
                                <?php echo $this->session->flashdata('msg')?>
                                <script>
                                    setTimeout(function(){$(".alert").hide();}, 3000);
                                </script>
                            </div>
                            <?php } ?>
                        </div>    
                    </div>
                </div> 
            </div>
        </div>    
    </div>
    <!-- search div end here -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 bottomline"></div>
        </div>   
    </div>

    <!-- job detail div start here -->
    <?php echo validation_errors(); ?>
    
    <?php $attributes = array('id' => 'myform'); echo form_open('update_timeline',$attributes); ?>
        <input type="hidden" id="site_url" value="<?php echo base_url(); ?>"/>
        <input type="hidden" id="type" value="<?php echo $type; ?>"/>
        <section id="jobDetailsDescription" <?php if(count($job_detail)>0){echo 'style="display:block;"';} ?>>
            <input type="hidden" name="proposal_id" id="proposal_id" value="<?php if(count($job_detail)>0){echo $job_detail['id'];}?>"/>
            <input type="hidden" name="maconomyNo" value="<?php if(count($job_detail)>0){echo $job_detail['maconomy_job_c'];}?>" id="maconomyNo"/>
            <input type="hidden" name="lastmodify" value="<?php if(count($job_detail)>0){echo $job_detail['date_modified'];}?>" id="lastmodify"/>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-3 timeline-margin-header">
                        <h5>Job Details</h5>
                    </div>
                </div>   
            </div>
            <div class="container ">
                <div class="row timeline-margin">
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Project Name</div>
                        <div class="col-md-12 lower-text-format" id="project_name"><?php if(count($job_detail)>0){echo $job_detail['name'];}?></div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Job Number</div>
                        <div class="col-md-12 lower-text-format"id="jobNumber"><?php if(count($job_detail)>0){echo $job_detail['maconomy_job_c'];}?></div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Proposal Id</div>
                        <div class="col-md-12 lower-text-format" id="proposalNo"><?php if(count($job_detail)>0){echo $job_detail['proposalNO'];}?></div>
                    </div>
                </div>   
            </div>
            <div class="container">
                <div class="row timeline-margin">
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Account Name</div>
                        <div class="col-md-12 lower-text-format" id="accountName"><?php if(count($job_detail)>0){echo $job_detail['accountName'];}?></div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Proposal Status</div>
                        <div class="col-md-12 lower-text-format" id="status"><?php if(count($job_detail)>0){echo $job_detail['status'];}?></div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Maconomy Status</div>
                        <div class="col-md-12 lower-text-format" id="maconomyStatus"><?php if(count($job_detail)>0){echo $job_detail['maconomyStatus'];}?></div>
                    </div>
                </div>   
            </div>
            <div class="container">
                <div class="row timeline-margin">
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Project Start Date <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i>
<span class="sup">*</span></div>
                        <div class="col-md-12 lower-text-format">
                            <div class="form-group">
                                <input type="hidden" class="form-control" readonly="readonly" data-date-format="dd-mm-yyyy" id="hidden-pst-date" name="hidden-pst-date" value="<?php if(count($job_detail)>0){echo $job_detail['startDate'];}?>">
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control datePick" readonly="readonly" data-date-format="dd-mm-yyyy" id="pst-date" name="pst-date" value="<?php if(count($job_detail)>0){echo $job_detail['startDate'];}?>">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Project End Date <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i>
<span class="sup">*</span></div>
                        <div class="col-md-12 lower-text-format">
                        <div class="form-group">
                                <input type="hidden" class="form-control" readonly="readonly" data-date-format="dd-mm-yyyy" name="hidden-pet-date" id="hidden-pet-date" value="<?php if(count($job_detail)>0){echo $job_detail['closeDate'];}?>">
                                <div class="input-group date " data-provide="datepicker">
                                    <input type="text" class="form-control datePick" readonly="readonly" data-date-format="dd-mm-yyyy" name="pet-date" id="pet-date" value="<?php if(count($job_detail)>0){echo $job_detail['closeDate'];}?>">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 upper-text-format">Estimate Close Date <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i>
<span class="sup">*</span></div>
                        <div class="col-md-12 lower-text-format">
                            <div class="form-group">
                                <input type="hidden" class="form-control" readonly="readonly" data-date-format="dd-mm-yyyy" name="hidden-pct-date" id="hidden-pct-date" value="<?php if(count($job_detail)>0){echo $job_detail['estimatedCloseDate'];}?>">
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control datePick" readonly="readonly" data-date-format="dd-mm-yyyy" name="pct-date" id="pct-date" value="<?php if(count($job_detail)>0){echo $job_detail['estimatedCloseDate'];}?>">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="container" id="hideTimeline" <?php if($type=='detail'){echo 'style="display:none;"';} ?>>
                <div class="form-group timeline-margin">
                    <div class="row">
                        <div class="col-md-1 col-sm-1">
                            <button type="submit" name="submit" class="btn btn-primary formSubmit webApp">Save</button>
                            <button type="submit" name="submit" class="btn btn-primary formSubmit submitEvent mobile">Save</button>
                        </div>
                        <div class="col-md-1 col-sm-1">
                            <button type="button" name="submit" class="btn btn-primary reset">Reset</button>
                        </div>
                    </div>
                </div>  
            </div>
        </section>    
        <!-- job detail div end here -->
     </form>
    <button class="customVisibility show-page-loading-msg" data-theme="b" data-textonly="false" data-textvisible="true" data-msgtext="Please wait..." data-inline="true">B</button>
    <button class="customVisibility hide-page-loading-msg" data-inline="true" data-icon="delete">Hide</button>
    <script type = "text/javascript" src = "<?php echo base_url(); ?>js/jquery-3.4.1.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
    <script type = "text/javascript" src = "<?php echo base_url(); ?>js/custom.js"></script>
    <script>
    $(document).ready(function() {
        $('.date').datetimepicker({
            format: 'yyyy-mm-dd',
            pickTime: false,
            maxView: 4,
            minView: 2,
            autoclose: true
        });
        $(document).on("click",".reset",function() {
            $("#pst-date").val($("#hidden-pst-date").val());
            $("#pet-date").val($("#hidden-pet-date").val());
            $("#pct-date").val($("#hidden-pct-date").val());
        });
    });
    </script>
</body>
</html>