DELIMITER $$
CREATE PROCEDURE create_Application (
			 IN _idSoftware int(11),
			 IN _idOperatingSystem int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Application (idSoftware, idOperatingSystem) values (_idSoftware, _idOperatingSystem);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Application (
			 IN _idSoftware int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Application
	WHERE idSoftware = _idSoftware
		AND idOperatingSystem = _idOperatingSystem;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Application (
			 IN _idSoftware int(11),
			 IN _idOperatingSystem int(11)
)
BEGIN
	UPDATE  NetworkInventory.Application
	SET
		idSoftware = _idSoftware,
		idOperatingSystem = _idOperatingSystem
	WHERE idSoftware = _idSoftware;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Application (
			 IN _idSoftware int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Application
	WHERE idSoftware = _idSoftware
		AND idOperatingSystem = _idOperatingSystem;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Fix (
			 IN _idFix int(11),
			 IN _description varchar(45)
)
BEGIN
	INSERT INTO NetworkInventory.Fix (idFix, description) values (_idFix, _description);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Fix (
			 IN _idFix int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Fix
	WHERE idFix = _idFix
		AND description = _description;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Fix (
			 IN _idFix int(11),
			 IN _description varchar(45)
)
BEGIN
	UPDATE  NetworkInventory.Fix
	SET
		idFix = _idFix,
		description = _description
	WHERE idFix = _idFix;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Fix (
			 IN _idFix int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Fix
	WHERE idFix = _idFix
		AND description = _description;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Fix_has_Note (
			 IN _Fix int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Fix_has_Note (Fix, Note) values (_Fix, _Note);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Fix_has_Note (
			 IN _Fix int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Fix_has_Note
	WHERE Fix = _Fix
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Fix_has_Note (
			 IN _Fix int(11),
			 IN _Note int(11)
)
BEGIN
	UPDATE  NetworkInventory.Fix_has_Note
	SET
		Fix = _Fix,
		Note = _Note
	WHERE Fix = _Fix
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Fix_has_Note (
			 IN _Fix int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Fix_has_Note
	WHERE Fix = _Fix
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Fix_has_Software (
			 IN _Fix int(11),
			 IN _Software int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Fix_has_Software (Fix, Software) values (_Fix, _Software);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Fix_has_Software (
			 IN _Fix int(11),
			 IN _Software int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Fix_has_Software
	WHERE Fix = _Fix
		AND Software = _Software;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Fix_has_Software (
			 IN _Fix int(11),
			 IN _Software int(11)
)
BEGIN
	UPDATE  NetworkInventory.Fix_has_Software
	SET
		Fix = _Fix,
		Software = _Software
	WHERE Fix = _Fix
		AND Software = _Software;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Fix_has_Software (
			 IN _Fix int(11),
			 IN _Software int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Fix_has_Software
	WHERE Fix = _Fix
		AND Software = _Software;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Hardware (
			 IN _idHardware int(11),
			 IN _Hostname varchar(45),
			 IN _ip_address varchar(45),
			 IN _mac_address varchar(45),
			 IN _OperatingSystem int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware (idHardware, Hostname, ip_address, mac_address, OperatingSystem) values (_idHardware, _Hostname, _ip_address, _mac_address, _OperatingSystem);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Hardware (
			 IN _idHardware int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware
	WHERE idHardware = _idHardware
		AND Hostname = _Hostname
		AND ip_address = _ip_address
		AND mac_address = _mac_address
		AND OperatingSystem = _OperatingSystem;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Hardware (
			 IN _idHardware int(11),
			 IN _Hostname varchar(45),
			 IN _ip_address varchar(45),
			 IN _mac_address varchar(45),
			 IN _OperatingSystem int(11)
)
BEGIN
	UPDATE  NetworkInventory.Hardware
	SET
		idHardware = _idHardware,
		Hostname = _Hostname,
		ip_address = _ip_address,
		mac_address = _mac_address,
		OperatingSystem = _OperatingSystem
	WHERE idHardware = _idHardware;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Hardware (
			 IN _idHardware int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware
	WHERE idHardware = _idHardware
		AND Hostname = _Hostname
		AND ip_address = _ip_address
		AND mac_address = _mac_address
		AND OperatingSystem = _OperatingSystem;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Hardware_connected_to_Hardware (
			 IN _Hardware int(11),
			 IN _Connection int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware_connected_to_Hardware (Hardware, Connection) values (_Hardware, _Connection);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Hardware_connected_to_Hardware (
			 IN _Hardware int(11),
			 IN _Connection int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware_connected_to_Hardware
	WHERE Hardware = _Hardware
		AND Connection = _Connection;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Hardware_connected_to_Hardware (
			 IN _Hardware int(11),
			 IN _Connection int(11)
)
BEGIN
	UPDATE  NetworkInventory.Hardware_connected_to_Hardware
	SET
		Hardware = _Hardware,
		Connection = _Connection
	WHERE Hardware = _Hardware
		AND Connection = _Connection;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Hardware_connected_to_Hardware (
			 IN _Hardware int(11),
			 IN _Connection int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware_connected_to_Hardware
	WHERE Hardware = _Hardware
		AND Connection = _Connection;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Hardware_has_Application (
			 IN _Hardware int(11),
			 IN _Application int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware_has_Application (Hardware, Application) values (_Hardware, _Application);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Hardware_has_Application (
			 IN _Hardware int(11),
			 IN _Application int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware_has_Application
	WHERE Hardware = _Hardware
		AND Application = _Application;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Hardware_has_Application (
			 IN _Hardware int(11),
			 IN _Application int(11)
)
BEGIN
	UPDATE  NetworkInventory.Hardware_has_Application
	SET
		Hardware = _Hardware,
		Application = _Application
	WHERE Hardware = _Hardware
		AND Application = _Application;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Hardware_has_Application (
			 IN _Hardware int(11),
			 IN _Application int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware_has_Application
	WHERE Hardware = _Hardware
		AND Application = _Application;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Hardware_has_Note (
			 IN _Hardware int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware_has_Note (Hardware, Note) values (_Hardware, _Note);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Hardware_has_Note (
			 IN _Hardware int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware_has_Note
	WHERE Hardware = _Hardware
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Hardware_has_Note (
			 IN _Hardware int(11),
			 IN _Note int(11)
)
BEGIN
	UPDATE  NetworkInventory.Hardware_has_Note
	SET
		Hardware = _Hardware,
		Note = _Note
	WHERE Hardware = _Hardware
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Hardware_has_Note (
			 IN _Hardware int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware_has_Note
	WHERE Hardware = _Hardware
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Hardware_has_Vulnerability (
			 IN _Hardware int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware_has_Vulnerability (Hardware, Vulnerability) values (_Hardware, _Vulnerability);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Hardware_has_Vulnerability (
			 IN _Hardware int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware_has_Vulnerability
	WHERE Hardware = _Hardware
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Hardware_has_Vulnerability (
			 IN _Hardware int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	UPDATE  NetworkInventory.Hardware_has_Vulnerability
	SET
		Hardware = _Hardware,
		Vulnerability = _Vulnerability
	WHERE Hardware = _Hardware
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Hardware_has_Vulnerability (
			 IN _Hardware int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware_has_Vulnerability
	WHERE Hardware = _Hardware
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Network (
			 IN _idNetwork int(11),
			 IN _address varchar(45),
			 IN _name varchar(45)
)
BEGIN
	INSERT INTO NetworkInventory.Network (idNetwork, address, name) values (_idNetwork, _address, _name);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Network (
			 IN _idNetwork int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Network
	WHERE idNetwork = _idNetwork
		AND address = _address
		AND name = _name;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Network (
			 IN _idNetwork int(11),
			 IN _address varchar(45),
			 IN _name varchar(45)
)
BEGIN
	UPDATE  NetworkInventory.Network
	SET
		idNetwork = _idNetwork,
		address = _address,
		name = _name
	WHERE idNetwork = _idNetwork;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Network (
			 IN _idNetwork int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Network
	WHERE idNetwork = _idNetwork
		AND address = _address
		AND name = _name;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Network_has_Hardware (
			 IN _Network int(11),
			 IN _Hardware int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Network_has_Hardware (Network, Hardware) values (_Network, _Hardware);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Network_has_Hardware (
			 IN _Network int(11),
			 IN _Hardware int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Network_has_Hardware
	WHERE Network = _Network
		AND Hardware = _Hardware;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Network_has_Hardware (
			 IN _Network int(11),
			 IN _Hardware int(11)
)
BEGIN
	UPDATE  NetworkInventory.Network_has_Hardware
	SET
		Network = _Network,
		Hardware = _Hardware
	WHERE Network = _Network
		AND Hardware = _Hardware;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Network_has_Hardware (
			 IN _Network int(11),
			 IN _Hardware int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Network_has_Hardware
	WHERE Network = _Network
		AND Hardware = _Hardware;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Network_has_Note (
			 IN _Network int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Network_has_Note (Network, Note) values (_Network, _Note);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Network_has_Note (
			 IN _Network int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Network_has_Note
	WHERE Network = _Network
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Network_has_Note (
			 IN _Network int(11),
			 IN _Note int(11)
)
BEGIN
	UPDATE  NetworkInventory.Network_has_Note
	SET
		Network = _Network,
		Note = _Note
	WHERE Network = _Network
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Network_has_Note (
			 IN _Network int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Network_has_Note
	WHERE Network = _Network
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Network_has_Vulnerability (
			 IN _Network int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Network_has_Vulnerability (Network, Vulnerability) values (_Network, _Vulnerability);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Network_has_Vulnerability (
			 IN _Network int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Network_has_Vulnerability
	WHERE Network = _Network
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Network_has_Vulnerability (
			 IN _Network int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	UPDATE  NetworkInventory.Network_has_Vulnerability
	SET
		Network = _Network,
		Vulnerability = _Vulnerability
	WHERE Network = _Network
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Network_has_Vulnerability (
			 IN _Network int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Network_has_Vulnerability
	WHERE Network = _Network
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Note (
			 IN _idNote int(11),
			 IN _subject text,
			 IN _note varchar(100),
			 IN _added timestamp,
			 IN _modified timestamp,
			 IN _User int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Note (idNote, subject, note, added, modified, User) values (_idNote, _subject, _note, _added, _modified, _User);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Note (
			 IN _idNote int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Note
	WHERE idNote = _idNote
		AND subject = _subject
		AND note = _note
		AND added = _added
		AND modified = _modified
		AND User = _User;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Note (
			 IN _idNote int(11),
			 IN _subject text,
			 IN _note varchar(100),
			 IN _added timestamp,
			 IN _modified timestamp,
			 IN _User int(11)
)
BEGIN
	UPDATE  NetworkInventory.Note
	SET
		idNote = _idNote,
		subject = _subject,
		note = _note,
		added = _added,
		modified = _modified,
		User = _User
	WHERE idNote = _idNote;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Note (
			 IN _idNote int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Note
	WHERE idNote = _idNote
		AND subject = _subject
		AND note = _note
		AND added = _added
		AND modified = _modified
		AND User = _User;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_OperatingSystem (
			 IN _idOperatingSystem int(11)
)
BEGIN
	INSERT INTO NetworkInventory.OperatingSystem (idOperatingSystem) values (_idOperatingSystem);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_OperatingSystem (
			 IN _idOperatingSystem int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.OperatingSystem
	WHERE idOperatingSystem = _idOperatingSystem;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_OperatingSystem (
			 IN _idOperatingSystem int(11)
)
BEGIN
	UPDATE  NetworkInventory.OperatingSystem
	SET
		idOperatingSystem = _idOperatingSystem
	WHERE idOperatingSystem = _idOperatingSystem;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_OperatingSystem (
			 IN _idOperatingSystem int(11)
)
BEGIN
	DELETE FROM NetworkInventory.OperatingSystem
	WHERE idOperatingSystem = _idOperatingSystem;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Software (
			 IN _idSoftware int(11),
			 IN _name varchar(45),
			 IN _version varchar(45),
			 IN _Location varchar(150)
)
BEGIN
	INSERT INTO NetworkInventory.Software (idSoftware, name, version, Location) values (_idSoftware, _name, _version, _Location);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Software (
			 IN _idSoftware int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Software
	WHERE idSoftware = _idSoftware
		AND name = _name
		AND version = _version
		AND Location = _Location;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Software (
			 IN _idSoftware int(11),
			 IN _name varchar(45),
			 IN _version varchar(45),
			 IN _Location varchar(150)
)
BEGIN
	UPDATE  NetworkInventory.Software
	SET
		idSoftware = _idSoftware,
		name = _name,
		version = _version,
		Location = _Location
	WHERE idSoftware = _idSoftware;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Software (
			 IN _idSoftware int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Software
	WHERE idSoftware = _idSoftware
		AND name = _name
		AND version = _version
		AND Location = _Location;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Software_has_Note (
			 IN _Software int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Software_has_Note (Software, Note) values (_Software, _Note);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Software_has_Note (
			 IN _Software int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Software_has_Note
	WHERE Software = _Software
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Software_has_Note (
			 IN _Software int(11),
			 IN _Note int(11)
)
BEGIN
	UPDATE  NetworkInventory.Software_has_Note
	SET
		Software = _Software,
		Note = _Note
	WHERE Software = _Software
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Software_has_Note (
			 IN _Software int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Software_has_Note
	WHERE Software = _Software
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Software_has_Vulnerability (
			 IN _Software int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Software_has_Vulnerability (Software, Vulnerability) values (_Software, _Vulnerability);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Software_has_Vulnerability (
			 IN _Software int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Software_has_Vulnerability
	WHERE Software = _Software
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Software_has_Vulnerability (
			 IN _Software int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	UPDATE  NetworkInventory.Software_has_Vulnerability
	SET
		Software = _Software,
		Vulnerability = _Vulnerability
	WHERE Software = _Software
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Software_has_Vulnerability (
			 IN _Software int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Software_has_Vulnerability
	WHERE Software = _Software
		AND Vulnerability = _Vulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_User (
			 IN _idUser int(11),
			 IN _username varchar(45),
			 IN _name varchar(45),
			 IN _password varchar(128),
			 IN _salt varchar(45)
)
BEGIN
	INSERT INTO NetworkInventory.User (idUser, username, name, password, salt) values (_idUser, _username, _name, _password, _salt);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_User (
			 IN _idUser int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.User
	WHERE idUser = _idUser
		AND username = _username
		AND name = _name
		AND password = _password
		AND salt = _salt;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_User (
			 IN _idUser int(11),
			 IN _username varchar(45),
			 IN _name varchar(45),
			 IN _password varchar(128),
			 IN _salt varchar(45)
)
BEGIN
	UPDATE  NetworkInventory.User
	SET
		idUser = _idUser,
		username = _username,
		name = _name,
		password = _password,
		salt = _salt
	WHERE idUser = _idUser;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_User (
			 IN _idUser int(11)
)
BEGIN
	DELETE FROM NetworkInventory.User
	WHERE idUser = _idUser
		AND username = _username
		AND name = _name
		AND password = _password
		AND salt = _salt;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Vulnerability (
			 IN _idVulnerability int(11),
			 IN _name varchar(45),
			 IN _description varchar(45)
)
BEGIN
	INSERT INTO NetworkInventory.Vulnerability (idVulnerability, name, description) values (_idVulnerability, _name, _description);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Vulnerability (
			 IN _idVulnerability int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Vulnerability
	WHERE idVulnerability = _idVulnerability
		AND name = _name
		AND description = _description;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Vulnerability (
			 IN _idVulnerability int(11),
			 IN _name varchar(45),
			 IN _description varchar(45)
)
BEGIN
	UPDATE  NetworkInventory.Vulnerability
	SET
		idVulnerability = _idVulnerability,
		name = _name,
		description = _description
	WHERE idVulnerability = _idVulnerability;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Vulnerability (
			 IN _idVulnerability int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Vulnerability
	WHERE idVulnerability = _idVulnerability
		AND name = _name
		AND description = _description;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Vulnerability_has_Fix (
			 IN _Vulnerability int(11),
			 IN _Fix int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Vulnerability_has_Fix (Vulnerability, Fix) values (_Vulnerability, _Fix);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Vulnerability_has_Fix (
			 IN _Vulnerability int(11),
			 IN _Fix int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Vulnerability_has_Fix
	WHERE Vulnerability = _Vulnerability
		AND Fix = _Fix;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Vulnerability_has_Fix (
			 IN _Vulnerability int(11),
			 IN _Fix int(11)
)
BEGIN
	UPDATE  NetworkInventory.Vulnerability_has_Fix
	SET
		Vulnerability = _Vulnerability,
		Fix = _Fix
	WHERE Vulnerability = _Vulnerability
		AND Fix = _Fix;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Vulnerability_has_Fix (
			 IN _Vulnerability int(11),
			 IN _Fix int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Vulnerability_has_Fix
	WHERE Vulnerability = _Vulnerability
		AND Fix = _Fix;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE create_Vulnerability_has_Note (
			 IN _Vulnerability int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Vulnerability_has_Note (Vulnerability, Note) values (_Vulnerability, _Note);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE read_Vulnerability_has_Note (
			 IN _Vulnerability int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Vulnerability_has_Note
	WHERE Vulnerability = _Vulnerability
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_Vulnerability_has_Note (
			 IN _Vulnerability int(11),
			 IN _Note int(11)
)
BEGIN
	UPDATE  NetworkInventory.Vulnerability_has_Note
	SET
		Vulnerability = _Vulnerability,
		Note = _Note
	WHERE Vulnerability = _Vulnerability
		AND Note = _Note;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE delete_Vulnerability_has_Note (
			 IN _Vulnerability int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Vulnerability_has_Note
	WHERE Vulnerability = _Vulnerability
		AND Note = _Note;
END$$
DELIMITER ;

