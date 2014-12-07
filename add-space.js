var url_base = "http://localhost/comp426_nebula"

$(document).ready(function() {
	$('#newSpaceForm').on('submit',
		function(e) {
			e.preventDefault();
			alert("serialized code: " + $(this).serialize());
			$.ajax(url_base + "/space_json.php",
				{
					type: "POST",
					dataType: "json",
					data: $(this).serialize(), 
					success: function(space_json, status, jqXHR) {
						alert("Your space has been added.");
					}, 
					error: function(jqXHR, status, error) {
						alert(jqXHR.responseText);
					}
				}
				
			);}
		);
});