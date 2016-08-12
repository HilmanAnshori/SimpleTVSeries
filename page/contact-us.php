<div class="well bs-component mbottom" style=" max-width:600px;margin:auto;margin-bottom:60px">
<form name="contact" onsubmit="return validateForm()" class="form-horizontal" action="" method="post">
  <fieldset>
  	<div class="form-group">
      <label for="name" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" />
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
      </div>
    </div>
    <div class="form-group">
      <label for="message" class="col-lg-2 control-label">Message</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="15" name="message" id="message" /></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
<?php 
    if (isset($_POST['name'])) {
        $to = 'info@'.str_replace('www.', '', parse_url($curpage, PHP_URL_HOST));
        $subject = str_replace('www.', '', parse_url($curpage, PHP_URL_HOST)).' Contact Us';
        $message = $_POST['name'].PHP_EOL.$_POST['message'];
        $headers = 'From: '.$_POST['email']."\r\n".
            'Reply-To: '.$_POST['email']."\r\n".
            'X-Mailer: PHP/'.phpversion();

        mail($to, $subject, $message, $headers);
        echo '<span class="text-center">Your message has been sent, thank you.</span>';
    }
?>
</div>

<script type="text/javascript"> 
	function validateForm() {
	    var x = document.forms["contact"]["name"].value;
	    if (x == null || x == "") {
	        alert("Name must be filled out");
	        return false;
	    }
	    var x = document.forms["contact"]["email"].value;
	    if (x == null || x == "") {
	        alert("Email must be filled out");
	        return false;
	    }
	    var x = document.forms["contact"]["message"].value;
	    if (x == null || x == "") {
	        alert("Message must be filled out");
	        return false;
	    }
	}
</script>