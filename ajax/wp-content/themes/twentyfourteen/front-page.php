<!DOCTYPE html>
<html>
<head>
	<title>ajax</title>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
  	function fetch() {
  		$.post('/jatin/ajax/wp-admin/admin-ajax.php',{'action':'my_action'},function(response){
  			$('#posts_div').append(response);
  		});
  	}
  </script>
</head>
<body>

<div id="posts_div">
	<button onclick="fetch()">Cick to load posts</button>
</div>
</body>
</html>