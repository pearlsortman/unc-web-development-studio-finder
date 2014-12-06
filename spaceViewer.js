/*var url_base = "http://wwwx.cs.unc.edu/Courses/comp426-f14/sortman/final";*/
var url_base = "http://localhost/Github/comp426_nebula";

$(document).ready(function () {


	$('#search-bar').on('submit',
		function (e) {
			e.preventDefault();
			$.ajax(url_base + "/space_json.php",
			{
				type: "POST",
				dataType: "json",
				data: $(this).serialize(),
				success: function (space_json, status, jqXHR) {
					var s = new Space(space_json);
					load_space_item_byLocation(s.makeSearchResultDiv());	
				},
				error: function (jqXHR, status, error) {
					alert(jqXHR.responseText);
				}
			});
		}
	);

	$('#hacker').on('click', load_space_item_byType("Hackspace"));

/*	$('#writing').on('click')

	$('#music').on('click')

	$('#art').on('click')

	$('#coworking').on('click',
		)

	$('#maker').on('click',
		)*/
});

var load_space_item_byType = function (type) {
	alert("loading space by type");
	$.ajax(url_base + "/space_json.php/" + type,
	{	
		type: "GET",
		dataType: "json",
		success: function(space_json, status, jqXHR) {
			var s = new Space(space_json);
			$('#results').append(s.makeSearchResultDiv());
		}
	});
};		

var load_space_item_byLocation = function (city, state) {
	$.ajax(url_base + "/space_json.php/" + city + "/" + state,
	{
		type: "GET",
		dataType: "json",
		success: function(space_json, status, jqXHR) {
			var s = new Space(space_json);
			$('#results').append(s.makeSearchResultDiv());
		}
	});
};

var load_space_item_byTypeAndLocation = function (type, city, state) {
	$.ajax(url_base + "/space_json.php/" + type + "/" + city + "/" + state,
	{
		type: "GET",
		dataType: "json",
		success: function (space_json, status, jqXHR) {
			var s = new Space(space_json);
			$('#results').append(s.makeSearchResultDiv());
		}
	});
};