
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<style>
#showLayers {
  transition: transform 0.3s;
}

.rotate {
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg);
}
	</style>
</head>
<body>

	

<img id="showLayers" class="miniToolbarContant" src="https://i.imgur.com/J5YLlJvl.png" width="250" />
<script>
$('#showLayers').click(function() {
  $(this).toggleClass('rotate');
});
</script>
</body>
</html>

