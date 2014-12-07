$(document).ready(function() {
	var spaceID = location.search;
	spaceID = spaceID.substring(1);
	alert(spaceID);

	$.ajax("http://localhost/comp426_nebula/space_json.php/id/" + spaceID, {
        type: "GET",
        dataType: "json",
        success: function(space_json, status, jqXHR) {
        	var s = new Space(space_json[0]);
           	$('#container').append(s.makeProfileDiv());
            }
        }
    });

});

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

Space.prototype.makeProfileDiv = function() {

	var h2_name =		$("<h2>" + this.name + "</h2>");
	var p_type =		$("<p>" + this.type + "</p>");
	var p_location =	$("<p>" + this.street + "<br />" + this.city + "<br />" + this.state + "<br />" + this.zip + "</p>");
	var p_website =		$("<p>" + this.website + "</p>");
	var p_description = $("<p>" + this.description + "</p>");
	var p_numberSeats =	$("<p>" + this.numberSeats + "</p>");

	var h3_amenities =		$("<h3>Amenities</h3>");
	var amenitiesTable =	$("<table></table>");
	var amenitiesRow1 =		$("<tr></tr>");
	var amenitiesRow2 =		$("<tr></tr>");

	var td_wifi = $("<td>Wifi: " + this.hasWifi + "</td>");
	if (this.hasWifi === 0) {
		td_wifi.html("no");
		td_wifi.addClass("no");
	} else {
		td_wifi.html("yes");
		td_wifi.addClass("yes");
	}
	td_wifi.appendTo(amenitiesRow1);

	var td_parking = $("<td>Parking: " + this.hasParking + "</td>");
	if (this.hasParking === 0) {
		td_parking.html("no");
		td_parking.addClass("no");
	} else {
		td_parking.html("yes");
		td_parking.addClass("yes");
	}
	td_parking.appendTo(amenitiesRow1);

	var td_storage = $("<td>Storage: " + this.hasStorage + "</td>");
	if (this.hasStorage === 0) {
		td_storage.html("no");
		td_storage.addClass("no");
	} else {
		td_storage.html("yes");
		td_storage.addClass("yes");
	}
	td_storage.appendTo(amenitiesRow1);

	amenitiesRow1.appendTo(amenitiesTable);
	

	var td_desk = $("<td>Personal Desks: " + this.hasDesk + "</td>");
	if (this.hasDesk === 0) {
		td_desk.html("no");
		td_desk.addClass("no");
	} else {
		td_desk.html("yes");
		td_desk.addClass("yes");
	}
	td_desk.appendTo(amenitiesRow2);

	var td_breakroom = $("<td>Breakroom: " + this.hasBreakroom + "</td>");
	if (this.hasBreakroom === 0) {
		td_breakroom.html("no");
		td_breakroom.addClass("no");
	} else {
		td_breakroom.html("yes");
		td_breakroom.addClass("yes");
	}
	td_breakroom.appendTo(amenitiesRow2);

	var td_printing = $("<td>Printing: " + this.hasPrinting + "</td>");
	if (this.hasPrinting === 0) {
		td_printing.html("no");
		td_printing.addClass("no");
	} else {
		td_printing.html("yes");
		td_printing.addClass("yes");
	}
	td_printing.appendTo(amenitiesRow2);

	amenitiesRow2.appendTo(amenitiesTable);




/*	var spaceDiv = $("<div></div>");
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

	spaceDiv.appendTo($('#results'));*/

	return profileDiv;
};
