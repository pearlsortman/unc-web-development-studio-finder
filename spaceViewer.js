var url_base = "http://localhost/comp426_nebula";

$(document).ready(function() {

    $('#hacker').on("click", load_space_item_byType("Hackspace"));

});

var load_space_item_byType = function(type) {
        alert("Loading space item " + type);
        var new_url = url_base + "/space_json.php/" + type;
        $.ajax(new_url, {
            type: "GET",
            dataType: "json",
            success: function(space_json, status, jqXHR) {
                alert("SUCCESS");
                alert("space_json: " + space_json[0].spaceID);

                for (var i = 0; i < space_json.length; i++) {
                    var s = new Space(space_json[i]);
                    alert("s= " + s);
                    $('#results').append(s.makeSearchResultDiv());
                }

            }
        });
}



        /*var load_space_item_byLocation = function (city, state) {
        	$.ajax(url_base + "/space_json.php/" + city  + "/" + state,
        		{
        			type: "GET",
        			dataType: "json",
        			success: function(space_ids, status, jqXHR) {
        			}
        		}
        	);
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
        };*/
