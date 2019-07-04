$(document).ready(function(e){
    getTimeZone(); 
    $('[data-toggle="tooltip"]').tooltip(); 
    $(document).on("click","#job_number_submit",function() {
        var job_number = $('#job_number').val();
        var site_url = $('#site_url').val();
        site_url = site_url+'job_detail';
        if(job_number==''){
            $(".alert-danger").show();
            $(".display_error").text("Please enter job number.");
            hideError();
            $('#jobDetailsDescription').hide();
            return false;
        }else{
            var mobile_device = 0;
            jobDetailSection(job_number,site_url,mobile_device);
        }
    });
    
    $(document).on("keypress", "#job_number", function(e){
        if(e.which == 13){
           $("#job_number_submit").trigger("click");
        }
    });

    

    $(document).on("click","#job_number_submit_mob",function() {
        var job_number = $('#job_number_mob').val();
        var site_url = $('#site_url').val();
        site_url = site_url+'job_detail';
        if(job_number==''){
            $(".alert-danger").show();
            $(".display_error_mob").text("Please Enter Job Number.");
            hideError();
            $('#jobDetailsDescription').hide();
            return false;
        }else{
            var mobile_device = 1;
            $(".show-page-loading-msg").trigger("click");
            jobDetailSection(job_number,site_url,mobile_device);
        }
    });
    
    $('.stopEvent').keyup(function(event) {
        var textlen = $(this).val().length;
        if(textlen < 10){
           event.stopPropagation();
        }
    });
    
    $('.stopEvent').on('keyup', function() {
        limitText(this, 9)
    });

    $(document).on("click",".close",function() {
        $(this).parent().hide();
    });

    
    
    $(".stopEvent").on("keypress keyup blur",function (event) {    
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
    
    $( document ).on( "click", ".show-page-loading-msg", function() {
        var $this = $( this ),
            theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
            msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
            textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
            textonly = !!$this.jqmData( "textonly" );
            html = $this.jqmData( "html" ) || "";
        $.mobile.loading( "show", {
                text: msgText,
                textVisible: textVisible,
                theme: theme,
                textonly: textonly,
                html: html
        });
    }).on( "click", ".hide-page-loading-msg", function() {
        $.mobile.loading("hide");
    });
    
    //$('#myform').on('submit', function () {
//    $( document ).on( "click", ".datePick", function() {
//        $(this).parent().removeClass("custom-border-color");
//        
//    });
    
    $( document ).on( "change", ".datePick", function() {
        $(this).parent().removeClass("custom-border-color");
        if((new Date($(this).val()) <= new Date($("#pst-date").val())) && $(this).attr("id")!="pst-date")
        {
            var id_attr = $(this).attr("id");
            if(id_attr==='pet-date'){
                id_attr = "hidden-"+id_attr;
                var hidden_pet_date = $('#'+id_attr).val();
                $(this).val(hidden_pet_date);
            }else if(id_attr==='pct-date'){
                id_attr = "hidden-"+id_attr;
                var hidden_pct_date = $('#'+id_attr).val();
                $(this).val(hidden_pct_date);
            }
            //$(".alert-danger").show();
            $(this).parent().addClass("custom-border-color");
            hideError();
        }
    });
    
    $( document ).on( "click", ".formSubmit", function() {
        
        var isMobile=$(".display_error");
        var isMobileFlag=false;
        if($(this).hasClass("mobile")){
            isMobile = $(".display_error_mob");
            isMobileFlag = true;
        }
        if($('#pst-date').val() == ""){
            $(".alert-danger").show();
            isMobile.text("Enter Project Start Date.");
            $('#pst-date').parent().addClass("custom-border-color");
            hideError();
            return false;
        }else if($('#pet-date').val() == ""){
            $(".alert-danger").show();
            isMobile.text("Enter Project Estimate Date.");
            $('#pet-date').parent().addClass("custom-border-color");
            hideError();
            return false;
        }else if($('#pct-date').val() == ""){
            $(".alert-danger").show();
            isMobile.text("Enter Project Closed Date.");
            $('#pct-date').parent().addClass("custom-border-color");
            hideError();
            return false;
        }else {
            var response = dateValidation($('#pst-date').val(),$('#pet-date').val(),$('#pct-date').val(),isMobile);
            if(response){
                if(isMobileFlag){
                    $(".show-page-loading-msg").trigger("click");
                }else{
                    $(".loader").show();
                }
                return true;
            }
            return false;
        }
    });
});

function jobDetailSection(job_number,jobdetail_url,mobile_device){
   
    $(".loader").show();
    $.ajax({
        type: "post",
        url: jobdetail_url,
        dataType:'json',
        cache: false,               
        data: {
            "job_number":job_number
        },
        success: function(res){                        
            try{
                var projectStatus = [
                    "Commissioning",
                    "Closing Re Commissioning",
                    "Pending Re Commissioning",
                    "Closed Invoiced",
                    "Cancelled Invoiced",
                    "Cancelled Expired",
                    "Pending Cancellation",
                    "Closed Invoice Finalized"
                ];
                var data = jQuery.parseJSON(res);
                if(data.status === "Fail" && data.msg != "Something went wrong. Please try again !"){
                    $(".alert-danger").show();
                    if(mobile_device){
                        $(".display_error_mob").text(data.msg);
                    }else{
                        $(".display_error").text(data.msg);
                    }
                    $(".loader").hide();
                    $('#jobDetailsDescription').hide();
                    hideError();
                }else{
                    if(data.id){
                        $("#hideTimeline").show();
                        $(".alert-danger").hide();
                        if(jQuery.inArray(data.status, projectStatus) !== -1) {
                            $(".datePick").attr("disabled", true);
                            $("#hideTimeline").hide();
                            $(".alert-danger").show();
                            if(mobile_device){
                                $(".display_error_mob").text("Record can't be edited.");
                            }else{
                                $(".display_error").text("Record can't be edited.");
                            }
                            hideError();
                        }else{
                            $(".datePick").attr("disabled", false);
                        }
                        $("#proposal_id").val(data.id);
                        $("#maconomyNo").val(data.maconomy_job_c);
                        $("#project_name").text(data.name);
                        $("#jobNumber").text(data.maconomy_job_c);
                        $("#proposalNo").text(data.proposalNO);
                        $("#accountName").text(data.accountName);
                        $("#status").text(data.status);
                        $("#maconomyStatus").text(data.maconomyStatus);
                        $("#hidden-pst-date").val(data.startDate);
                        $("#pst-date").val(data.startDate);
                        $("#hidden-pet-date").val(data.closeDate);
                        $("#pet-date").val(data.closeDate);
                        $("#hidden-pct-date").val(data.estimatedCloseDate);
                        $("#pct-date").val(data.estimatedCloseDate);
                        $("#lastmodify").val(data.date_modified);
                        $('#jobDetailsDescription').show();
                        $(".loader").hide();
                        if(mobile_device){  
                            $(".hide-page-loading-msg").trigger("click");
                        }
                    }
                }
            }catch(e) {     
                console.log('Exception while request..');
            }       
        },
        error: function(){                      
            console.log('Error while request..');
        }
    });
    
}

function limitText(field, maxChar){
    var ref = $(field),
        val = ref.val();
    if ( val.length >= maxChar ){
        ref.val(function() {
            return val.substr(0, maxChar);       
        });
    }
}

function hideError(){
  setTimeout(function(){$(".alert").hide();}, 5000);
}

function dateValidation(pst_date,pet_date,pct_date,isMobile){
    var f_return = true;
    if( new Date(pet_date) <= new Date(pst_date))
    {
        $('#pet-date').parent().addClass("custom-border-color");
        $(".alert-danger").show();
        isMobile.text("Project End Date should be greater then Project Start Date");
        hideError();
        f_return = false;
    }
    
    if(new Date(pct_date) <= new Date(pet_date))
    {
        $('#pct-date').parent().addClass("custom-border-color");
        $(".alert-danger").show();
        isMobile.text("Estimated Closed Date should be greater then Project End Date");
        hideError();
        f_return = false;
    }
    return f_return;
}

function getTimeZone() {
    var timeZone = /\((.*)\)/.exec(new Date().toString())[1];
    $('[data-toggle="tooltip"]').attr("title",timeZone);
    return true
}
