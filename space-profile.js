$(document).ready(function() {
	var spaceID = location.search;
	spaceID = spaceID.substring(1);

	$.ajax("http://localhost/comp426_nebula/space_json.php/id/" + spaceID, {
        type: "GET",
        dataType: "json",
        success: function(space_json, status, jqXHR) {
        	var s = new Space(space_json);
           	$('#container').append(s.makeProfileDiv());
            }
        }
    );

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

		var profileDiv = $("<div></div>");
		profileDiv.attr("id", "profile");

		var h2_name =		$("<h2>" + this.name + "</h2>");
		var p_type =		$("<p>" + this.type + "</p>");
		var p_location =	$("<p>" + this.street + "<br />" + this.city + ", " + this.state + " " + this.zip + "</p>");
		var a_website =		$("<a href='" + this.website + "'>" + this.website + "</a>");
		var p_description = $("<p>" + this.description + "</p>");
		var p_numberSeats =	$("<p>" + this.numberSeats + "</p>");

		profileDiv.append(h2_name);
		profileDiv.append(p_type);
		profileDiv.append(p_location);
		profileDiv.append(a_website);
		profileDiv.append(p_description);
		profileDiv.append(p_numberSeats);

		var h3_amenities =		$("<h3>Amenities</h3>");
		var amenitiesTable =	$("<table></table>");
		var amenitiesRow1 =		$("<tr></tr>");
		var amenitiesRow2 =		$("<tr></tr>");

		var td_wifi = $("<td>" + this.hasWifi + "</td>");
		if (this.hasWifi === 0) {
			td_wifi.html("Wifi: no");
			td_wifi.addClass("no");
		} else {
			td_wifi.html("Wifi: yes");
			td_wifi.addClass("yes");
		}
		td_wifi.appendTo(amenitiesRow1);

		var td_parking = $("<td>" + this.hasParking + "</td>");
		if (this.hasParking === 0) {
			td_parking.html("Parking: no");
			td_parking.addClass("no");
		} else {
			td_parking.html("Parking: yes");
			td_parking.addClass("yes");
		}
		td_parking.appendTo(amenitiesRow1);

		var td_storage = $("<td>" + this.hasStorage + "</td>");
		if (this.hasStorage === 0) {
			td_storage.html("Storage: no");
			td_storage.addClass("no");
		} else {
			td_storage.html("Storage: yes");
			td_storage.addClass("yes");
		}
		td_storage.appendTo(amenitiesRow1);

		amenitiesRow1.appendTo(amenitiesTable);
		

		var td_desk = $("<td>" + this.hasDesk + "</td>");
		if (this.hasDesk === 0) {
			td_desk.html("Personal Desks: no");
			td_desk.addClass("no");
		} else {
			td_desk.html("Personal Desks: yes");
			td_desk.addClass("yes");
		}
		td_desk.appendTo(amenitiesRow2);

		var td_breakroom = $("<td>" + this.hasBreakroom + "</td>");
		if (this.hasBreakroom === 0) {
			td_breakroom.html("Breakroom: no");
			td_breakroom.addClass("no");
		} else {
			td_breakroom.html("Breakroom: yes");
			td_breakroom.addClass("yes");
		}
		td_breakroom.appendTo(amenitiesRow2);

		var td_printing = $("<td>" + this.hasPrinting + "</td>");
		if (this.hasPrinting === 0) {
			td_printing.html("Printing: no");
			td_printing.addClass("no");
		} else {
			td_printing.html("Printing: yes");
			td_printing.addClass("yes");
		}
		td_printing.appendTo(amenitiesRow2);

		amenitiesRow2.appendTo(amenitiesTable);
		profileDiv.append(h3_amenities);
		profileDiv.append(amenitiesTable);

		return profileDiv;
	};
});