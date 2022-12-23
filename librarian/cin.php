<style>
body{width:50%;}

.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'cin='+$("#cin").val(),
	type: "POST",
	success:function(data){
		//alert("test");
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();

		//document.getElementById("cin").focus();
	}
	error:function (){}
	});
}
</script>

<div class="control-label" id="frmCheckUsername">
<label class="control-label" for="inputPassword">CIN:</label>
			<div class="controls">
    <input name="cin" type="text" id="cin"  onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
   
</div>
</div>
<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>