<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8" />

	<title>Anil Labs - Codeigniter mail templates</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

	<div>
		<div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif;text-align: center" align="center" id="emb-email-header"><img style="border: 0;-ms-interpolation-mode: bicubic;display: block;Margin-left: auto;Margin-right: auto;max-width: 152px" src="<?php echo public_url('templates/image/NLSdots.png')?>" alt="" width="152" height="108"></div>

		
		<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 

		Customer Contact Information
		</p> 
		<p>
		<?php	if(isset ($name)) { ?>
			<span> Customer name: 	</span>
			<?php echo $name; ?>
		<?php } ?> 
	   </p>
	   <p>
		<?php if (isset ($email)) { ?>
			<span> Customer email: 	</span>
			<?php echo $email; ?>
		<?php } ?> 
		</p>
		<p>
		<?php if (isset ($phone)) { ?>
			<span> Customer phone number: 	</span>
			<?php echo $phone; ?>
		<?php } ?>
		</p>
		<p>
		<?php if (isset ($comment)) { ?>
			<span> Customer comment: 	</span>
			<?php echo $comment; ?>
		<?php } ?>
		</p>
					
		


	</div>

</body>

</html>