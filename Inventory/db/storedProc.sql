SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema NetworkInventory
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `NetworkInventory` DEFAULT CHARACTER SET utf8 ;
USE `NetworkInventory` ;
USE `NetworkInventory` ;

-- -----------------------------------------------------
-- procedure create_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Application`(
			IN _idSoftware int(11),
			IN _idOperatingSystem int(11),
			IN _name varchar(45),
			IN _version varchar(45),
			IN _Location varchar(150)
)
BEGIN
	DECLARE software int(11) DEFAULT 0;	
	CALL `NetworkInventory`.`create_Software`(_idSoftware, _name, _version, _Location);
	SET software = LAST_INSERT_ID();
	INSERT INTO NetworkInventory.Application (idSoftware, idOperatingSystem) values (software, _idOperatingSystem);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Fix
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Fix`(
			 IN _idFix int(11),
			 IN _description varchar(45)
)
BEGIN
	INSERT INTO NetworkInventory.Fix (idFix, description) values (_idFix, _description);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Fix_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Fix_has_Note`(
			 IN _Fix int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Fix_has_Note (Fix, Note) values (_Fix, _Note);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Fix_has_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Fix_has_Software`(
			 IN _Fix int(11),
			 IN _Software int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Fix_has_Software (Fix, Software) values (_Fix, _Software);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Hardware`(
			 IN _idHardware int(11),
			 IN _Hostname varchar(45),
			 IN _OperatingSystem int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware (idHardware, Hostname, OperatingSystem) values (_idHardware, _Hostname, _OperatingSystem);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Hardware_connected_to_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Hardware_connected_to_Hardware`(
			 IN _Hardware int(11),
			 IN _Connection int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware_connected_to_Hardware (Hardware, Connection) values (_Hardware, _Connection);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Hardware_has_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Hardware_has_Application`(
			 IN _Hardware int(11),
			 IN _Application int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware_has_Application (Hardware, Application) values (_Hardware, _Application);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Hardware_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Hardware_has_Note`(
			 IN _Hardware int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware_has_Note (Hardware, Note) values (_Hardware, _Note);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Hardware_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Hardware_has_Vulnerability`(
			 IN _Hardware int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Hardware_has_Vulnerability (Hardware, Vulnerability) values (_Hardware, _Vulnerability);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Network
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Network`(
			 IN _idNetwork int(11),
			 IN _address varchar(45),
			 IN _name varchar(45)
)
BEGIN
	INSERT INTO NetworkInventory.Network (idNetwork, address, name) values (_idNetwork, _address, _name);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Network_has_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Network_has_Hardware`(
			 IN _Network int(11),
			 IN _Hardware int(11)
			 IN _ip_address varchar(45),
			 IN _mac_address varchar(45),
)
BEGIN
	INSERT INTO NetworkInventory.Network_has_Hardware (Network, Hardware, ip_address, mac_address) 
	values (_Network, _Hardware, _ip_address, _mac_address);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Network_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Network_has_Note`(
			 IN _Network int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Network_has_Note (Network, Note) values (_Network, _Note);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Network_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Network_has_Vulnerability`(
			 IN _Network int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Network_has_Vulnerability (Network, Vulnerability) values (_Network, _Vulnerability);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Note`(
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

-- -----------------------------------------------------
-- procedure create_OperatingSystem
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_OperatingSystem`(
									IN _idOperatingSystem int(11),
									IN _name varchar(45),
									IN _version varchar(45),
									IN _Location varchar(150)
)
BEGIN
	DECLARE idSoftware int(11) DEFAULT 0;	
	CALL `NetworkInventory`.`create_Software`(_idOperatingSystem, _name, _version, _Location);
	SET idSoftware = LAST_INSERT_ID();
	INSERT INTO NetworkInventory.OperatingSystem (idOperatingSystem) values (idSoftware);
	
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Software`(
			 IN _idSoftware int(11),
			 IN _name varchar(45),
			 IN _version varchar(45),
			 IN _Location varchar(150)
)
BEGIN
	INSERT INTO NetworkInventory.Software (idSoftware, name, version, Location) values (_idSoftware, _name, _version, _Location);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Software_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Software_has_Note`(
			 IN _Software int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Software_has_Note (Software, Note) values (_Software, _Note);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Software_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Software_has_Vulnerability`(
			 IN _Software int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Software_has_Vulnerability (Software, Vulnerability) values (_Software, _Vulnerability);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_User
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_User`(
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

-- -----------------------------------------------------
-- procedure create_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Vulnerability`(
			 IN _idVulnerability int(11),
			 IN _name varchar(45),
			 IN _description varchar(45)
)
BEGIN
	INSERT INTO NetworkInventory.Vulnerability (idVulnerability, name, description) values (_idVulnerability, _name, _description);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Vulnerability_has_Fix
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Vulnerability_has_Fix`(
			 IN _Vulnerability int(11),
			 IN _Fix int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Vulnerability_has_Fix (Vulnerability, Fix) values (_Vulnerability, _Fix);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_Vulnerability_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_Vulnerability_has_Note`(
			 IN _Vulnerability int(11),
			 IN _Note int(11)
)
BEGIN
	INSERT INTO NetworkInventory.Vulnerability_has_Note (Vulnerability, Note) values (_Vulnerability, _Note);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Application`(
			 IN _idSoftware int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Application
	WHERE idSoftware = _idSoftware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Fix
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Fix`(
			 IN _idFix int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Fix
	WHERE idFix = _idFix;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Fix_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Fix_has_Note`(
			 IN _Fix int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Fix_has_Note
	WHERE Fix = _Fix
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Fix_has_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Fix_has_Software`(
			 IN _Fix int(11),
			 IN _Software int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Fix_has_Software
	WHERE Fix = _Fix
		AND Software = _Software;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Hardware`(
			 IN _idHardware int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware
	WHERE idHardware = _idHardware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Hardware_connected_to_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Hardware_connected_to_Hardware`(
			 IN _Hardware int(11),
			 IN _Connection int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware_connected_to_Hardware
	WHERE Hardware = _Hardware
		AND Connection = _Connection;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Hardware_has_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Hardware_has_Application`(
			 IN _Hardware int(11),
			 IN _Application int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware_has_Application
	WHERE Hardware = _Hardware
		AND Application = _Application;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Hardware_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Hardware_has_Note`(
			 IN _Hardware int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware_has_Note
	WHERE Hardware = _Hardware
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Hardware_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Hardware_has_Vulnerability`(
			 IN _Hardware int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Hardware_has_Vulnerability
	WHERE Hardware = _Hardware
		AND Vulnerability = _Vulnerability;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Network
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Network`(
			 IN _idNetwork int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Network
	WHERE idNetwork = _idNetwork;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Network_has_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Network_has_Hardware`(
			 IN _Network int(11),
			 IN _Hardware int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Network_has_Hardware
	WHERE Network = _Network
		AND Hardware = _Hardware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Network_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Network_has_Note`(
			 IN _Network int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Network_has_Note
	WHERE Network = _Network
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Network_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Network_has_Vulnerability`(
			 IN _Network int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Network_has_Vulnerability
	WHERE Network = _Network
		AND Vulnerability = _Vulnerability;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Note`(
			 IN _idNote int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Note
	WHERE idNote = _idNote;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_OperatingSystem
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_OperatingSystem`(
			 IN _idOperatingSystem int(11)
)
BEGIN
	DELETE FROM NetworkInventory.OperatingSystem
	WHERE idOperatingSystem = _idOperatingSystem;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Software`(
			 IN _idSoftware int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Software
	WHERE idSoftware = _idSoftware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Software_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Software_has_Note`(
			 IN _Software int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Software_has_Note
	WHERE Software = _Software
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Software_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Software_has_Vulnerability`(
			 IN _Software int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Software_has_Vulnerability
	WHERE Software = _Software
		AND Vulnerability = _Vulnerability;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_User
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_User`(
			 IN _idUser int(11)
)
BEGIN
	DELETE FROM NetworkInventory.User
	WHERE idUser = _idUser;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Vulnerability`(
			 IN _idVulnerability int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Vulnerability
	WHERE idVulnerability = _idVulnerability;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Vulnerability_has_Fix
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Vulnerability_has_Fix`(
			 IN _Vulnerability int(11),
			 IN _Fix int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Vulnerability_has_Fix
	WHERE Vulnerability = _Vulnerability
		AND Fix = _Fix;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_Vulnerability_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Vulnerability_has_Note`(
			 IN _Vulnerability int(11),
			 IN _Note int(11)
)
BEGIN
	DELETE FROM NetworkInventory.Vulnerability_has_Note
	WHERE Vulnerability = _Vulnerability
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Application`(
			 IN _idSoftware int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Application
	WHERE idSoftware = _idSoftware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Fix
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Fix`(
			 IN _idFix int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Fix
	WHERE idFix = _idFix;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Fix_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Fix_has_Note`(
			 IN _Fix int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Fix_has_Note
	WHERE Fix = _Fix
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Fix_has_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Fix_has_Software`(
			 IN _Fix int(11),
			 IN _Software int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Fix_has_Software
	WHERE Fix = _Fix
		AND Software = _Software;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Hardware`(
			 IN _idHardware int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware
	WHERE idHardware = _idHardware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Hardware_connected_to_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Hardware_connected_to_Hardware`(
			 IN _Hardware int(11),
			 IN _Connection int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware_connected_to_Hardware
	WHERE Hardware = _Hardware
		AND Connection = _Connection;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Hardware_has_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Hardware_has_Application`(
			 IN _Hardware int(11),
			 IN _Application int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware_has_Application
	WHERE Hardware = _Hardware
		AND Application = _Application;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Hardware_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Hardware_has_Note`(
			 IN _Hardware int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware_has_Note
	WHERE Hardware = _Hardware
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Hardware_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Hardware_has_Vulnerability`(
			 IN _Hardware int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Hardware_has_Vulnerability
	WHERE Hardware = _Hardware
		AND Vulnerability = _Vulnerability;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Network
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Network`(
			 IN _idNetwork int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Network
	WHERE idNetwork = _idNetwork;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Network_has_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Network_has_Hardware`(
			 IN _Network int(11),
			 IN _Hardware int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Network_has_Hardware
	WHERE Network = _Network
		AND Hardware = _Hardware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Network_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Network_has_Note`(
			 IN _Network int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Network_has_Note
	WHERE Network = _Network
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Network_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Network_has_Vulnerability`(
			 IN _Network int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Network_has_Vulnerability
	WHERE Network = _Network
		AND Vulnerability = _Vulnerability;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Note`(
			 IN _idNote int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Note
	WHERE idNote = _idNote;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_OperatingSystem
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_OperatingSystem`(
			 IN _idOperatingSystem int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.OperatingSystem
	WHERE idOperatingSystem = _idOperatingSystem;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Software`(
			 IN _idSoftware int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Software
	WHERE idSoftware = _idSoftware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Software_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Software_has_Note`(
			 IN _Software int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Software_has_Note
	WHERE Software = _Software
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Software_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Software_has_Vulnerability`(
			 IN _Software int(11),
			 IN _Vulnerability int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Software_has_Vulnerability
	WHERE Software = _Software
		AND Vulnerability = _Vulnerability;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_User
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_User`(
			 IN _idUser int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.User
	WHERE idUser = _idUser;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Vulnerability`(
			 IN _idVulnerability int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Vulnerability
	WHERE idVulnerability = _idVulnerability;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Vulnerability_has_Fix
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Vulnerability_has_Fix`(
			 IN _Vulnerability int(11),
			 IN _Fix int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Vulnerability_has_Fix
	WHERE Vulnerability = _Vulnerability
		AND Fix = _Fix;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure read_Vulnerability_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_Vulnerability_has_Note`(
			 IN _Vulnerability int(11),
			 IN _Note int(11)
)
BEGIN
	SELECT * FROM NetworkInventory.Vulnerability_has_Note
	WHERE Vulnerability = _Vulnerability
		AND Note = _Note;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure select_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_Application`()
BEGIN
SELECT NetworkInventory.Software.* FROM NetworkInventory.Application, NetworkInventory.Software
Where Application.idSoftware = Software.idSoftware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure select_Network
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_Network`()
BEGIN
	SELECT * FROM Network;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure select_OperatingSystem
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_OperatingSystem`()
BEGIN

SELECT NetworkInventory.Software.* 
FROM NetworkInventory.OperatingSystem, NetworkInventory.Software 
Where OperatingSystem.idOperatingSystem = Software.idSoftware;

END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure select_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_Software`()
BEGIN
SELECT * From Software;

END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure update_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Application`(
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

-- -----------------------------------------------------
-- procedure update_Fix
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Fix`(
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

-- -----------------------------------------------------
-- procedure update_Fix_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Fix_has_Note`(
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

-- -----------------------------------------------------
-- procedure update_Fix_has_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Fix_has_Software`(
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

-- -----------------------------------------------------
-- procedure update_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Hardware`(
			 IN _idHardware int(11),
			 IN _Hostname varchar(45),
			 IN _OperatingSystem int(11)
)
BEGIN
	UPDATE  NetworkInventory.Hardware
	SET
		idHardware = _idHardware,
		Hostname = _Hostname,
		OperatingSystem = _OperatingSystem
	WHERE idHardware = _idHardware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure update_Hardware_connected_to_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Hardware_connected_to_Hardware`(
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

-- -----------------------------------------------------
-- procedure update_Hardware_has_Application
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Hardware_has_Application`(
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

-- -----------------------------------------------------
-- procedure update_Hardware_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Hardware_has_Note`(
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

-- -----------------------------------------------------
-- procedure update_Hardware_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Hardware_has_Vulnerability`(
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

-- -----------------------------------------------------
-- procedure update_Network
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Network`(
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

-- -----------------------------------------------------
-- procedure update_Network_has_Hardware
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Network_has_Hardware`(
			 IN _Network int(11),
			 IN _Hardware int(11),
			 IN _ip_address varchar(45),
			 IN _mac_address varchar(45),
)
BEGIN
	UPDATE  NetworkInventory.Network_has_Hardware
	SET
		Network = _Network,
		Hardware = _Hardware,
		ip_address =_ip_address,
		mac_address = _ip_address
	WHERE Network = _Network
		AND Hardware = _Hardware;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure update_Network_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Network_has_Note`(
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

-- -----------------------------------------------------
-- procedure update_Network_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Network_has_Vulnerability`(
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

-- -----------------------------------------------------
-- procedure update_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Note`(
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

-- -----------------------------------------------------
-- procedure update_OperatingSystem
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_OperatingSystem`(
			 IN _idOperatingSystem int(11)
)
BEGIN
	UPDATE  NetworkInventory.OperatingSystem
	SET
		idOperatingSystem = _idOperatingSystem
	WHERE idOperatingSystem = _idOperatingSystem;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure update_Software
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Software`(
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

-- -----------------------------------------------------
-- procedure update_Software_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Software_has_Note`(
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

-- -----------------------------------------------------
-- procedure update_Software_has_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Software_has_Vulnerability`(
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

-- -----------------------------------------------------
-- procedure update_User
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_User`(
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

-- -----------------------------------------------------
-- procedure update_Vulnerability
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Vulnerability`(
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

-- -----------------------------------------------------
-- procedure update_Vulnerability_has_Fix
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Vulnerability_has_Fix`(
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

-- -----------------------------------------------------
-- procedure update_Vulnerability_has_Note
-- -----------------------------------------------------

DELIMITER $$
USE `NetworkInventory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_Vulnerability_has_Note`(
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

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
