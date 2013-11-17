	</section>
	
	<script type="text/javascript" src="http://localhost/catalogo/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="http://localhost/catalogo/js/bootstrap.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/catalogo/js/jquery.catslider.js"></script>
	<script type="text/javascript" src="http://localhost/catalogo/js/borderMenu.js"></script>
	<script type="text/javascript" src="http://localhost/catalogo/js/classie.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

	<script>
		$(function() {

			$( '#mi-slider' ).catslider();
			
		});

		$(function(){
				$('input, textarea').placeholder();
		});
		
	</script>
	<?php
    	if($tela == 'report'){ echo $report['js']; } 
	?>
</body>

</html>