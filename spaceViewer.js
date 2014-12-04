var url_base = "http://wwwx.cs.unc.edu/Courses/comp426-f14/sortman/nebula";

$(document).ready(function () {

	$.ajax(url_base + "/space.php",
		{ type: "GET",
			dataType: "json",
			success: function(space_ids, status, jqXHR) {
				for (var i=0; i<space_ids.length; i++) {
					load_space(space_ids[i]);
				}
			}
		});

	$('#new_space_form').on('submit',
		function (e) {
			e.preventDefault();
			$.ajax(url_base + "/space.php",
				{type: "POST", 
					dataType: "json", 
					data: $(this).serialize(),
					success: function(space_json, status, jqXHR) {
						var s = new Space(space_json);
						$('#space_list').append(t.makeCompactDiv());
					},
					error: function(jqXHR, status, error) {
						alert(jqXHR.responseText);
					}});
		});

	$('#space_list').on('')





});