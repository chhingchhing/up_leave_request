// Check all checkbox child
$("body").on("click", 'th input[type="checkbox"]', function() {
    if ( $(this).is(':checked') )
        $('td input[type="checkbox"]').prop('checked', true);
    else
        $('td input[type="checkbox"]').prop('checked', false);
});


// Nav left side, as default is hide
$("ul.nav-second-level").hide();

$("body").on("click", "a.nav-left-9", function(){
	$(this).siblings("ul").toggle();
	$(this).parent().parent("li").addClass("active");
});

$("body").on("mouseover", ".theTooltip", function(){
	$(this).tooltip('show');
});

// Set feedback message
function set_feedback(text, classname, keep_displayed, actions)
{
    if (actions == "add") {
        var image = '<img src="../images/close.png" />';
    } else if(actions == "update") {
        var image = '<img src="../../images/close.png" />';
    } else {
        var image = '<img src="images/close.png" />';
    }
    if(text!='')
    {
        $('#feedback_bar').removeClass();
        $('#feedback_bar').addClass(classname);
        $('#feedback_bar').html(text + ' <span id="feedback_bar_close">'+image+'</span>');
        $('#feedback_bar').slideDown(250);
        var text_length = text.length;
        var text_lengthx = text_length*125;

        if(!keep_displayed)
        {
            $('#feedback_bar').show();
            
            setTimeout(function()
            {
                $('#feedback_bar').slideUp(250, function()
                {
                    $('#feedback_bar').removeClass();
                });
            },text_lengthx);
        }
    }
    else
    {
        $('#feedback_bar').hide();
    }

    $('#feedback_bar_close').click(function()
    {
        $('#feedback_bar').slideUp(250, function()
        {
            $('#feedback_bar').removeClass();
        });
    });
    
}

$("body").on("click", "button.add_update", function(event) {
	event.preventDefault();
	var url = $(this).parent().attr("action");
	var datas = $(this).parent().serialize();
	$.ajax({
		url: url,
		type: "POST",
		dataType: "json",
		data: datas,
		success: function(response){
			if(response.success)
            {
                // $(this).find('form')[0].reset();
                set_feedback(response.message,'success_message',true, response.actions);
            }
            else
            {
                set_feedback(response.message,'error_message',false, response.actions);    
            }
		}
	});
});

$('body').on("click", "a.delete", function(event) {
    event.preventDefault();
    var url = $(this).attr("href");
    $.ajax({
        url: url,
        dataType: "json",
        success: function(response) {
            if(response.success)
            {
                // $(this).find('form')[0].reset();
                set_feedback(response.message,'success_message',true, response.actions);
            }
            else
            {
                set_feedback(response.message,'error_message',false, response.actions);    
            }
        }
    });
});









$('body').on("click", "a.remove", function(event) {
    event.preventDefault();
    // var url = $(this).attr("href");
    /*var checkedID = getValueFromCheckboxUsingClass();
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: {"checkedID":checkedID},
        success: function(response) {
            console.log(response);
        }
    });*/

    if (jQuery('input[type="checkbox"]').is(':checked')) {
        var url = jQuery(this).attr('href');
        var rcdsChecked = jQuery('input:checkbox:checked.checkedID').map(function() {
            return jQuery(this).val();
        }).get();
        var confirming = "Do you want to delete as permanent?";
        if (!confirm(confirming)) {
            return false;
        };
        jQuery.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {"checkedID": rcdsChecked},
            success: function(response) {
                if (response.success) {
                    jQuery('input:checkbox:checked').each(function() {    
                        jQuery('input:checkbox:checked').parents("tr").remove();
                        jQuery('input:checkbox:checked').removeAttr('checked');
                    });
                    set_feedback(response.message,'success_message',false);
                } else {
                    set_feedback(response.message,'error_message',false);
                }
            }
        });
    } else {
        set_feedback('Please select check box to delete!','error_message',false);
        return false;
    }

});











/*$('body').on("click", "a.remove", function(event) {
    event.preventDefault();
    var url = $(this).attr("href");
    var checkedID = getValueFromCheckboxUsingClass();
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: {"checkedID":checkedID},
        success: function(response) {
            console.log(response);
        }
    });

});*/

function getValueFromCheckboxUsingClass(){
    /* declare an checkbox array */
    var chkArray = [];
    
    /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
    $(".checkedID:checked").each(function() {
        chkArray.push($(this).val());
    });
    
    /* we join the array separated by the comma */
    var selected;
    selected = chkArray.join(',') + ",";
    
    /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
    if(selected.length <= 1){
        // alert("You have selected " + selected); 
        alert("Please at least one of the checkbox");
    }

    return selected;
}