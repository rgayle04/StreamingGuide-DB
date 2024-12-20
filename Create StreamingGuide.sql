create database streaming_guide;
use streaming_guide;

Create Table Users	(
	userId	CHAR(8) NOT NULL,
    userName	CHAR(12),
    email	CHAR(20) NOT NULL,
    CONSTRAINT Users_userId_pk PRIMARY KEY (userId));

Create Table Plan (
	pType CHAR(8) NOT NULL,
    Price FLOAT(4),
    Mem_Amt INT,
    CONSTRAINT Plan_pType_pk PRIMARY KEY (pType)
);

Create Table Media (
	mediaId CHAR(8) NOT NULL, 
    title CHAR(20), 
    duration INT(3), 
    viewerShip INT, 
    rating FLOAT(2), 
    CONSTRAINT Media_mediaId_pk PRIMARY KEY (mediaId)
); 

Create Table Ad (
	adId CHAR(8) NOT NULL, 
    adName CHAR(12) NOT NULL, 
    advertiser CHAR(30),
    placement INT(3),
    duration INT(3),
    CONSTRAINT Ad_adId_pk PRIMARY KEY (adId)
);
Create Table Cast (
	castId CHAR(8) NOT NULL,
    name CHAR(20), 
    age INT(3), 
	CONSTRAINT Cast_castId_pk PRIMARY KEY (castId)
);

Create Table Subscription (
	userId CHAR(8) NOT NULL, 
    sub_Join_date CHAR(10) NOT NULL,
    sub_Renew_date CHAR(10) NOT NULL,
	pType CHAR(8) NOT NULL,
    Constraint subscription_userID_ptype_pk PRIMARY KEY(userId, pType),
    CONSTRAINT Subscription_userId_fk FOREIGN KEY (userId) REFERENCES Users (userId),
    CONSTRAINT Subscription_pType_fk FOREIGN KEY (pType) REFERENCES Plan (pType)
);

Create Table Domain(
	domainName CHAR(9),
    url CHAR(20), 
    dOwner CHAR(20), 
    pType CHAR(20),
    CONSTRAINT Domain_domainName_pk PRIMARY KEY (domainName),
    CONSTRAINT Domain_pType_Fk FOREIGN KEY (pType) REFERENCES Plan (pType)
);

Create Table Category(
	category CHAR(20), 
    mediaID CHAR(8) NOT NULL,
	CONSTRAINT Category_mediaId_pk PRIMARY KEY (mediaId, category),
	CONSTRAINT Category_mediaId_Fk FOREIGN KEY (mediaId) REFERENCES Media (mediaId)
);

Create Table mCast(
	mediaId CHAR(8) NOT NULL, 
    castId CHAR(8) NOT NULL,
    CONSTRAINT mCast_mediaId_pk PRIMARY KEY (mediaId, castID),
    CONSTRAINT mCast_mediaId_Fk FOREIGN KEY (mediaId) REFERENCES Media (mediaId) ,
    CONSTRAINT mCast_castId_Fk FOREIGN KEY (castId) REFERENCES Cast (castId)
);

Create Table mAd(
	adId CHAR(8) NOT NULL,
    mediaId CHAR(8) NOT NULL,
    adCount INT(1),
    CONSTRAINT mAd_mediaId_pk PRIMARY KEY (mediaId, adId),
    CONSTRAINT mAd_mediaId_Fk FOREIGN KEY (mediaId) REFERENCES Media (mediaId) ,
    CONSTRAINT mAd_adId_Fk FOREIGN KEY (adId) REFERENCES Ad (adId)
);

Create Table Role(
	castId CHAR(8) NOT NULL,
    role CHAR(30), 
    CONSTRAINT Role_castId_pk PRIMARY KEY (castId, role),
    CONSTRAINT Role_castId_Fk FOREIGN KEY (castId) REFERENCES Cast (castId)
);
Create Table serversPerMedia (
	availabilityStatus CHAR(4) NOT NULL,
    domainName CHAR(9) NOT NULL,
    mediaID CHAR(8) NOT NULL,
    CONSTRAINT serversPerMedia_PK PRIMARY KEY (availabilityStatus, domainName, mediaID),
    CONSTRAINT serversPerMedia_domainName_FK FOREIGN KEY (domainName) references Domain (domainName),
    CONSTRAINT serversPerMedia_mediaID_FK FOREIGN KEY (mediaID) references Media (mediaID)
);
Create Table Episodes (
	mediaID CHAR(8) NOT NULL,
    episodes INT(4) NOT NULL,
    CONSTRAINT episodes_PK PRIMARY KEY (mediaID, episodes),
    CONSTRAINT episodes_mediaID_FK FOREIGN KEY (mediaID) references Media (mediaID)
);

Create Table Servers (
	serverID CHAR(8) NOT NULL,
    ServerName CHAR(10),
    capacity INT(4),
    IPAddr CHAR(17),
    availabilityStatus CHAR(4) NOT NULL,
    CONSTRAINT server_serverID_PK PRIMARY KEY (serverID),
    CONSTRAINT servers_availabilityStatus_FK FOREIGN KEY (availabilityStatus) references serversPerMedia(availabilityStatus)
);



INSERT INTO Users VALUES ('U001', 'Alice', 'alice@example.com');
INSERT INTO Users VALUES ('U002', 'Bob', 'bob@example.com');
INSERT INTO Users VALUES ('U003', 'Charlie', 'charlie@example.com');
INSERT INTO Users VALUES ('U004', 'David', 'david@example.com');
INSERT INTO Users VALUES ('U005', 'Eve', 'eve@example.com');


INSERT INTO Plan VALUES ('P001', 9.99, 1);
INSERT INTO Plan VALUES ('P002', 19.99, 5);
INSERT INTO Plan VALUES ('P003', 29.99, 10);
INSERT INTO Plan VALUES ('P004', 39.99, 15);
INSERT INTO Plan VALUES ('P005', 49.99, 20);


INSERT INTO Subscription VALUES ('U001', '2023-01-01', '2024-01-01', 'P001');
INSERT INTO Subscription VALUES ('U002', '2023-02-01', '2024-02-01', 'P002');
INSERT INTO Subscription VALUES ('U003', '2023-03-01', '2024-03-01', 'P003');
INSERT INTO Subscription VALUES ('U004', '2023-04-01', '2024-04-01', 'P004');
INSERT INTO Subscription VALUES ('U005', '2023-05-01', '2024-05-01', 'P005');


INSERT INTO Media VALUES ('M001', 'Movie A', 120, 10000, 4.5);
INSERT INTO Media VALUES ('M002', 'Movie B', 90, 8000, 4.0);
INSERT INTO Media VALUES ('M003', 'Movie C', 150, 15000, 4.8);
INSERT INTO Media VALUES ('M004', 'Movie D', 110, 9000, 3.9);
INSERT INTO Media VALUES ('M005', 'Movie E', 130, 12000, 4.3);


INSERT INTO Ad VALUES ('A001', 'Ad A', 'Company A', 5, 30);
INSERT INTO Ad VALUES ('A002', 'Ad B', 'Company B', 10, 45);
INSERT INTO Ad VALUES ('A003', 'Ad C', 'Company C', 15, 60);
INSERT INTO Ad VALUES ('A004', 'Ad D', 'Company D', 20, 30);
INSERT INTO Ad VALUES ('A005', 'Ad E', 'Company E', 25, 45);


INSERT INTO Cast VALUES ('C001', 'Actor A', 30);
INSERT INTO Cast VALUES ('C002', 'Actor B', 35);
INSERT INTO Cast VALUES ('C003', 'Actor C', 28);
INSERT INTO Cast VALUES ('C004', 'Actor D', 40);
INSERT INTO Cast VALUES ('C005', 'Actor E', 25);


INSERT INTO Domain VALUES ('Domain1', 'www.domain1.com', 'Owner1', 'P001');
INSERT INTO Domain VALUES ('Domain2', 'www.domain2.com', 'Owner2', 'P002');
INSERT INTO Domain VALUES ('Domain3', 'www.domain3.com', 'Owner3', 'P003');
INSERT INTO Domain VALUES ('Domain4', 'www.domain4.com', 'Owner4', 'P004');
INSERT INTO Domain VALUES ('Domain5', 'www.domain5.com', 'Owner5', 'P005');


INSERT INTO Category VALUES ('Action', 'M001');
INSERT INTO Category VALUES ('Comedy', 'M002');
INSERT INTO Category VALUES ('Drama', 'M003');
INSERT INTO Category VALUES ('Horror', 'M004');
INSERT INTO Category VALUES ('Sci-Fi', 'M005');


INSERT INTO mCast VALUES ('M001', 'C001');
INSERT INTO mCast VALUES ('M002', 'C002');
INSERT INTO mCast VALUES ('M003', 'C003');
INSERT INTO mCast VALUES ('M004', 'C004');
INSERT INTO mCast VALUES ('M005', 'C005');


INSERT INTO mAd VALUES ('A001', 'M001', 3);
INSERT INTO mAd VALUES ('A002', 'M002', 2);
INSERT INTO mAd VALUES ('A003', 'M003', 4);
INSERT INTO mAd VALUES ('A004', 'M004', 1);
INSERT INTO mAd VALUES ('A005', 'M005', 5);


INSERT INTO Role VALUES ('C001', 'Protagonist');
INSERT INTO Role VALUES ('C002', 'Antagonist');
INSERT INTO Role VALUES ('C003', 'Supporting');
INSERT INTO Role VALUES ('C004', 'Lead');
INSERT INTO Role VALUES ('C005', 'Extra');


INSERT INTO serversPerMedia VALUES ('Actv', 'Domain1', 'M001');
INSERT INTO serversPerMedia VALUES ('Inac', 'Domain2', 'M002');
INSERT INTO serversPerMedia VALUES ('Actv', 'Domain3', 'M003');
INSERT INTO serversPerMedia VALUES ('Inac', 'Domain4', 'M004');
INSERT INTO serversPerMedia VALUES ('Actv', 'Domain5', 'M005');


INSERT INTO Episodes VALUES ('M001', 1);
INSERT INTO Episodes VALUES ('M002', 2);
INSERT INTO Episodes VALUES ('M003', 1000);
INSERT INTO Episodes VALUES ('M004', 2);
INSERT INTO Episodes VALUES ('M005', 2);

INSERT INTO Servers (serverID, ServerName, capacity, IPAddr, availabilityStatus) VALUES
('SRVR0001', 'ServerA   ', 5000, '192.168.1.1', 'Actv'),
('SRVR0002', 'ServerB   ', 10000, '192.168.1.2', 'Inac'),
('SRVR0003', 'ServerC   ', 7500, '192.168.1.3', 'Inac'),
('SRVR0004', 'ServerD   ', 12000, '192.168.1.4', 'Actv'),
('SRVR0005', 'ServerE   ', 3000, '192.168.1.5', 'inac');

INSERT INTO Media(mediaId, title, duration, viewerShip, rating)
Values("M006", "Bleach", 22, 11000, 8.6);

INSERT INTO Episodes(mediaId, episodes)
Values("M006", 760);


