

function set_feedback(text, classname, keep_displayed)
{
       if(text!='')
	{
		$('#feedback_bar').removeClass();
		$('#feedback_bar').addClass(classname);
		$('#feedback_bar').text(text);
                $('#feedback_bar').append('<button type="button" class="close" data-dismiss="alert">x</button>');
                $('#feedback_bar').fadeTo(3000, 500).slideUp(500, function(){
                $('#feedback_bar').alert('close');
                  });
               	
	}
}

