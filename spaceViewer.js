var url_base = "http://wwwx.cs.unc.edu/Courses/comp426-f14/sortman/final";

$(document).ready(function () {

	$.ajax(url_base + "/space.php",
		{
			type: "GET",
			dataType: "json",
			success: function(space_ids, status, jqXHR) {
				for (var i=0; i<space_ids.length; i++) {
					load_space_item(space_ids[i]);
				}
			}
		});


	$('#search-bar').on('submit',
		function (e) {
			e.preventDefault();
		}
		)

	$('#hacker').on('click')

	$('#writing').on('click')

	$('#music').on('click')

	$('#art').on('click')

	$('#')
});

var load_space_item = function (id) {
	$.ajax(url_base + "/space.php/",
		{	
			type: "GET",
			dataType: "json",
			success: function(space_json, status, jqXHR) {
				var s = new Space(space_json);
				$('#results').append(s.makeSearchResultDiv());
			}
		});
};		