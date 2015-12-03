I.
	1.
	<script>
		document.getElementById("t").className += "a";
	</script>
	2.
	<script>
		var myClass = document.getElementById('t').getElementsByClassName('c');	
		for (var i = 0; i < myClass.length; i++) {
			myClass[i].style.color = "green";
		}	
	</script>
	3.
	<script>
		var myClass = document.getElementsByClassName('c');	
		for (var i = 0; i < myClass.length; i++) {
			myClass[i].style.color = "green";
		}	
	</script>
	4. jquery
	<script>
		$('table#t .c').css({'color':'green'});
	</script>
	5. jquery
	<script>
		$('#t').addClass('a');
	</script>

