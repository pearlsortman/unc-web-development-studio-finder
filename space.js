var Space = function(space_json) {
	this.spaceID = 	space_json.spaceID;
	this.name = 	space_json.name;
	this.type = 	space_json.type;
	this.street = 	space_json.street;
	this.city = 	space_json.city;
	this.state = 	space_json.state;
	this.zip =		space_json.zip;
	this.logo =		space_json.logo;
	this.description = 	space_json.description;
	this.website =		space_json.website;
	this.numberSeats =	space_json.numberSeats;
	this.hasWifi =		space_json.hasWifi;
	this.hasParking =	space_json.hasParking;
	this.hasDesk =		space_json.hasDesk;
	this.hasBreakroom =	space_json.hasBreakroom;
	this.hasPrinting =	space_json.hasPrinting;
	this.hasStorage =	space_json.hasStorage;
};

 function sendData(id)
            {
        // Initialize packed or we get the word 'undefined'
        var packed = id;
        // for (i = 0; (i < data.length); i++) {
        //     if (i > 0) {
        //      packed += ",";
        //     }
        //     packed += escape(data[i]);
        // }
        window.location = "space-profile.html?" + packed;
        }
Space.prototype.makeSearchResultDiv = function() {
	var spaceDiv = $("<div></div>");
	spaceDiv.addClass('result');

	var h3_name = $("<h3></h3>");
	h3_name.addClass('name');
	h3_name.html(this.name);
	spaceDiv.append(h3_name);

	var divTable = $("<table></table>");
	divTable.addClass('resultTable');
	divTable.appendTo(spaceDiv);

	var tr_website = $("<tr></tr>");
	tr_website.html(this.website);
	tr_website.appendTo(divTable);

	var tr_street = $("<tr></tr>");
	tr_street.html(this.street);
	tr_street.appendTo(divTable);

	var tr_city_state_zip = $("<tr></tr>");
	tr_city_state_zip.html(this.city + ", " + this.state + " " + this.zip);
	tr_city_state_zip.appendTo(divTable);

	var sendDataContents = "Go to Page Two";
	var sendData = $("<a href='javascript:sendData(" + this.spaceID + ");'></a>");
	sendData.html(sendDataContents);
	sendData.appendTo(spaceDiv);

	spaceDiv.appendTo($('#results'));




	return spaceDiv;
};