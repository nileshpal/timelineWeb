<input type="hidden" name="proposal_id" id="proposal_id" value="<?php if(isset($id)){echo $id;}?>"/>
<input type="hidden" name="maconomyNo" value="<?php if(isset($maconomy_job_c)){echo $maconomy_job_c;}?>" id="maconomyNo"/>
<input type="hidden" name="lastmodify" value="<?php if(isset($date_modified)){echo $date_modified;}?>" id="lastmodify"/>

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
            <div class="col-md-12 lower-text-format" id="project_name"><?php if(isset($name)){echo $name;}?></div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="col-md-12 upper-text-format">Job Number</div>
            <div class="col-md-12 lower-text-format"id="jobNumber"><?php if(isset($maconomy_job_c)){echo $maconomy_job_c;}?></div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="col-md-12 upper-text-format">Proposal Id</div>
            <div class="col-md-12 lower-text-format" id="proposalNo"><?php if(isset($proposalNO)){echo $proposalNO;}?></div>
        </div>
    </div>   
</div>
<div class="container">
    <div class="row timeline-margin">
        <div class="col-md-4 col-sm-12">
            <div class="col-md-12 upper-text-format">Account Name</div>
            <div class="col-md-12 lower-text-format" id="accountName"><?php if(isset($accountName)){echo $accountName;}?></div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="col-md-12 upper-text-format">Proposal Status</div>
            <div class="col-md-12 lower-text-format" id="status"><?php if(isset($status)){echo $status;}?></div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="col-md-12 upper-text-format">Maconomy Status</div>
            <div class="col-md-12 lower-text-format" id="maconomyStatus"><?php if(isset($maconomyStatus)){echo $maconomyStatus;}?></div>
        </div>
    </div>   
</div>
<div class="container">
    <div class="row timeline-margin">
        <div class="col-md-4 col-sm-12">
            <div class="col-md-12 upper-text-format">Project Start Date (PST)<span class="sup">*</span></div>
            <div class="col-md-12 lower-text-format">
                <div class="form-group">
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control datePick" readonly="readonly" data-date-format="dd-mm-yyyy" id="pst-date" name="pst-date" value="<?php if(isset($startDate)){echo $startDate;}?>">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="col-md-12 upper-text-format">Project End Date (PST)<span class="sup">*</span></div>
            <div class="col-md-12 lower-text-format">
            <div class="form-group">
                    <div class="input-group date " data-provide="datepicker">
                        <input type="text" class="form-control datePick" readonly="readonly" data-date-format="dd-mm-yyyy" name="pet-date" id="pet-date" value="<?php if(isset($closeDate)){echo $closeDate;}?>">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="col-md-12 upper-text-format">Estimate Close Date (PST)<span class="sup">*</span></div>
            <div class="col-md-12 lower-text-format">
                <div class="form-group">
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control datePick" readonly="readonly" data-date-format="dd-mm-yyyy" name="pct-date" id="pct-date" value="<?php if(isset($estimatedCloseDate)){echo $estimatedCloseDate;}?>">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<div class="container" id="hideTimeline" >
    <div class="form-group timeline-margin">
        <div class="row">
            <div class="col-md-1 col-sm-1">
                <button type="submit" name="submit" class="btn btn-primary formSubmit webApp">Save</button>
                <button type="submit" name="submit" class="btn btn-primary formSubmit submitEvent mobile">Save</button>
                
            </div>
            <div class="col-md-1 col-sm-1">
                <span class="reset">Reset</span>
            </div>
        </div>
    </div>  
</div>
