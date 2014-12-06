/*var url_base = "http://wwwx.cs.unc.edu/Courses/comp426-f14/sortman/final";*/
<<<<<<< HEAD
var url_base = "http://localhost/Github/comp426_nebula";

$(document).ready(function () {

=======
var url_base = "http://localhost/comp426_nebula";

$(document).ready(function () {

/*	$.ajax(url_base + "/space_json.php",
		{
			type: "GET",
			dataType: "json",
			success: function(space_ids, status, jqXHR) {
				for (var i=0; i<space_ids.length; i++) {
					load_space_item(space_ids[i]);
				}
			}
		}
	);*/

>>>>>>> origin/master

/*	$('#search-bar').on('submit',
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
	);*/

	$('#hacker').click(function () {
		load_space_item_byType("Hackspace");
	});
	$('#writing').click(function () {
		load_space_item_byType("Writerspace");
	});
	$('#art').click(function() {
		load_space_item_byType("Artspace");
	});
	$('#music').click(function() {
		load_space_item_byType("Musicspace");
	});
	$('#coworking').click(function() {
		load_space_item_byType("Coworkingspace");
	});
	$('#maker').click(function() {
		load_space_item_byType("Makerspace");
	});

});

var load_space_item_byType = function (type) {
	alert(url_base + "/space_json.php/" + type);
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