<div id="remove-wrapper">
	<form method="POST" action="/contest/form-process.php">
		<div id="contest-form-wrapper">
		<div id="contest-name-wrapper">
			<input type="hidden" name="contest_id" value="1">
			<input type="text" name="name" id="contest-name-input" class="footer-email-input" placeholder="Name" autocomplete="off" />
		</div>
		<div class="margin"></div>
		<div id="contest-email-wrapper">
			<input type="text" name="email" id="contest-email-input" class="footer-email-input" placeholder="E-mail Address" autocomplete="off" />
		</div>	
		
		<div class="clear"></div>		
	</div>
	<div class="margin"></div>
		<div id="contest-form-submit"><input type="submit" id="contest-submit" value="Submit"></div>
		<div class="clear"></div>
	</form>
	
</div>

<link rel="stylesheet" type="text/css" href="/ajax/css/bootstrap.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/ajax/js/jquery.cookie.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){
	  $('#footer-email-submit').click(function(){
		
	  });
});

</script>
<style type="text/css">
	#remove-wrapper{width:960px;margin:0px auto;margin-top: 10px;}
	#contest-form-wrapper{background: #f38732;width: 100%;padding: 10px;}
	#contest-form-wrapper input{width: 100%;border: none;height: 40px;padding: 4px;}	
	#contest-name-input{width: 100%;border: none;height: 40px;padding: 4px;}
	#contest-email-wrapper{width:100%;}
	#contest-contact-wrapper{width: 49%;float:right;}
	#contest-form-submit{background-color: #2fa9dd;border-radius: 5px;color: #fff;float: right;padding: 10px 16px;cursor: pointer;}
	.clear{clear:both;}
	.margin{height: 10px;width: 100%;}
	#contest-submit{ background: #2fa9dd; border: none;}
</style>