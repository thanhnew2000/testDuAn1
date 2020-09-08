<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Buổi 3</title>
	<link rel="stylesheet" href="">	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>
<style type="text/css" media="screen">
		#wrapper{width: 900px;height: 1200px;background: pink}
		#header{width:100%;height:50px;background: yellow}
		#body{width:100%;height:1100px;background: green}	
</style>

<script type="text/javascript">


	$(document).ready(function(){
	<?php  for ($i = 1 ; $i <= 9; $i++) { ?>
		$("#ab"+<?php echo $i ?>).click(function(){
	
				// var so='a6';
		  	 var $s = $('div');
			var optionTop = $s.find('[id="a<?php echo $i ?>"]').offset().top;
			var selectTop = $s.offset().top;

			$s.scrollTop($s.scrollTop() + (optionTop - selectTop));

				})
		<?php } ?>
	  });
		
</script>
<body>
	<div id="wrapper" style="border:1px solid black;width:200px;height:100px" >
		<div id="header"></div>
		<div id="body" style="overflow: scroll;height:200px;">
		
			<p id="a1">abc1</p>
			<p id="a2">abc2</p>
			<p id="a3">abc3</p>
			<p id="a4">abc4</p>
			<p id="a5">abc5</p>
			<p id="a6">abc6</p>
			<p id="a7">abc7</p>
			<p id="a8">abc8</p>
			<p id="a9">abc9</p>

	<!-- 		 <select size="3"> 
           <option value="1">value 1</option> 
           <option value="2">value 2</option> 
           <option value="3">value 3</option> 
           <option value="4">value 4</option> 
           <option value="5">value 5</option> 
           <option value="6">value 6</option> 
           <select>  -->

			
		</div>
		<button type="button" id="1" class="ok">1</button>
		<button type="button" id="ab1" value="" class="ok">2</button>
		<button type="button" id="ab2" class="ok">3</button>
		<button type="button" id="ab3" class="ok">4</button>
		<button type="button" id="ab4" class="ok">5</button>
		<button type="button" id="ab5" class="ok">6</button>
		<button type="button" id="ab6" class="ok">7</button>	</div>	
	<p>Scrolled <span>0</span> times.</p>
	

</body>
</html>