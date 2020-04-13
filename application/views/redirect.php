<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= 'Absensi ? '.$judul.' Error';?></title>
</head>
<body>
			 <h3> Redirecting to <?=$judul?> after <span id="countdown">10</span> seconds </h3>
			<!-- JavaScript part -->
			<script type="text/javascript">
				
				// Total seconds to wait
				var seconds =3;
				
				function countdown() {
					seconds = seconds - 1;
					if (seconds < 0) {
						// Chnage your redirection link here
						window.location = "<?= base_url($judul.'/'.$param); ?>";
					} else {
						// Update remaining seconds
						document.getElementById("countdown").innerHTML = seconds;
						// Count down using javascript
						window.setTimeout("countdown()", 1000);
					}
				}
				
				// Run countdown function
				countdown();
				
			</script>
</body>
</html>