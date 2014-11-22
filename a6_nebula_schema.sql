CREATE TABLE a6_hours (
    spaceID int NOT NULL REFERENCES a6_spaces(spaceID),
    day int NOT NULL,
    open time NOT NULL,
    close time NOT NULL,
    PRIMARY KEY (spaceID),
    UNIQUE (day, open, close)
);

CREATE TABLE a6_locations (
    addressID int NOT NULL AUTO_INCREMENT,
    streetAddress varchar(100) NOT NULL,
    city char(100) NOT NULL,
    state char(2) NOT NULL,
    country char(50) NOT NULL,
    PRIMARY KEY (addressID)
);

CREATE TABLE a6_reservations (
    spaceID int NOT NULL REFERENCES a6_spaces(spaceID),
    date date NOT NULL,
    time time NOT NULL,
    userID varchar(20) NOT NULL REFERENCES a6_users(userID),
    paid bool NOT NULL DEFAULT 0,
    PRIMARY KEY (spaceID, date, time, userID)
);

CREATE TABLE a6_spaces (
    spaceID int NOT NULL AUTO_INCREMENT,
    defaultImage blob NOT NULL,
    mapLink blob NOT NULL,

    name varchar(255),
    addressID int NOT NULL REFERENCES a6_locations(addressID),
    type char(20),
    description varchar(1000) NOT NULL,
    website varchar(200) NOT NULL,
    numberSeats int,

    wifi bool NOT NULL DEFAULT 1,
    parking bool NOT NULL DEFAULT 0,
    personalDesk bool NOT NULL DEFAULT 0,
    breakroom bool NOT NULL DEFAULT 0,
    printing bool NOT NULL DEFAULT 0,
    storage bool NOT NULL DEFAULT 0,

    PRIMARY KEY (spaceID)
);

CREATE TABLE a6_rates (
    spaceID int NOT NULL REFERENCES a6_spaces(spaceID),
    hourly decimal(4,2),
    daily decimal(4,2),
    weekly decimal(4,2),
    monthly decimal(4,2),
    yearly decimal(4,2),
    PRIMARY KEY (spaceID)
);

CREATE TABLE a6_users (
    userID varchar(20) NOT NULL,
    email varchar(100) NOT NULL,
    first varchar(100) NOT NULL,
    last varchar(100) NOT NULL,
    password varchar(20) NOT NULL,
    addressID int NOT NULL REFERENCES a6_locations(addressID),
    owner bool NOT NULL DEFAULT 0,
    PRIMARY KEY (userID)
);

CREATE TABLE a6_spacesAndOwners (
    spaceID int NOT NULL REFERENCES a6_spaces(spaceID),
    userID varchar(20) NOT NULL REFERENCES a6_users(userID),
    PRIMARY KEY (spaceID, userID)
);