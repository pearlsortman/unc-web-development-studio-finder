var url_base = "http://localhost/comp426_nebula";

$(document).ready(function() {

    $('#hacker').on("click", function () { load_space_item_byType("Hackspace"); } );

});

var load_space_item_byType = function(type) {
	var new_url = url_base + "/space_json.php/" + type;
    $.ajax(new_url, {
        type: "GET",
        dataType: "json",
        success: function(space_json, status, jqXHR) {
            for (var i = 0; i < space_json.length; i++) {
                var s = new Space(space_json[i]);
                $('#results').append(s.makeSearchResultDiv());
            }
        }
    });
}