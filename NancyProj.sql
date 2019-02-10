/*
Nancy Mikyska
Project Fall 2017 CIS 2360
Creates Vets, Pets, Adoptions tables with larger view table
*/

DROP VIEW IF EXISTS AdoptionsView;
DROP TABLE IF EXISTS Vets;
DROP TABLE IF EXISTS Pets;
DROP TABLE IF EXISTS Adoptions;

CREATE TABLE Vets
(
	VetId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	DrLastName VARCHAR(30) NOT NULL,
	DrFirstName VARCHAR(30) NOT NULL,
	NonEmergencyPhone VARCHAR(17) NOT NULL,
	EmergencyPhone VARCHAR(17) NOT NULL
);

INSERT INTO Vets VALUES
	(NULL, 'Choi', 'Colleen', '6307590093', '6309999999'),
	(NULL, 'Graske', 'Henry', '6307590093', '6309999999'),
    (NULL, 'Autremont', 'Rochele', '6307590093', '6309999999'),
    (NULL, 'DuPuis', 'Roger', '6309042020', '6309999999'),
	(NULL, 'DuPuis', 'Chris', '6309042020', '6309999999'),
    (NULL, 'Faith', 'Scott', '6309042020', '6309999999'),
    (NULL, 'Reed', 'David', '6309042020', '6309999999'),
	(NULL, 'Peters', 'Brian', '6309042020', '6309999999'),
    (NULL, 'Rees', 'Rebecca', '8152548387', '6309999999'),
    (NULL, 'Choi', 'Colleen', '6307590093', '6309999999');
    
CREATE TABLE Pets
(
	PetId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    MicroChipId INT NOT NULL,
	AnimalType VARCHAR(30) NOT NULL,
	Gender VARCHAR(1) NOT NULL,  
	PetName VARCHAR(20) NOT NULL,
	Breed VARCHAR(30) NOT NULL,
	Age DECIMAL(2) NOT NULL
);
INSERT INTO Pets VALUES
	(NULL, 1001, 'Dog', 'M', 'Buddy', 'Lab Mix', 5),
    (NULL, 1002, 'Dog', 'F', 'Lady', 'Irish Setter', 3),
    (NULL, 1003, 'Cat', 'M', 'Rex', 'Persian', 8),
    (NULL, 1004, 'Dog', 'F', 'Kyla', 'Hound', 5),
    (NULL, 1005, 'Dog', 'M', 'Cheerio', 'Maltese', 3),
    (NULL, 1006, 'Dog', 'M', 'Alex', 'Labrador Retriever', 8),
    (NULL, 1007, 'Cat', 'M', 'Klondike', 'Domestic Short Hair', 5),
    (NULL, 1008, 'Cat', 'F', 'Coral', 'Domestic Short Hair', 3),
    (NULL, 1009, 'Dog', 'M', 'Ruffus', 'Basset Hound', 8),
    (NULL, 1010, 'Dog', 'F', 'Matilda', 'Miniature Pinscher', 5),
    (NULL, 1011, 'Dog', 'F', 'Clare', 'Chihuahua', 3),
    (NULL, 1012, 'Dog', 'M', 'Blaze', 'Pitbull/Hound Mix', 8),
    (NULL, 1013, 'Dog', 'F', 'Ginger', 'Irish Setter', 3),
    (NULL, 1014, 'Cat', 'F', 'Zoe', 'Domestic Short Hair', 8),
    (NULL, 1015, 'Dog', 'F', 'Bridget', 'Scottish Deerhound', 1);
    

CREATE TABLE Adoptions
(
	AdoptionId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PetId INT NOT NULL,
    AdoptionNbr VARCHAR(5) NOT NULL,
    VetId INT NOT NULL,
	LastName VARCHAR(50) NOT NULL,
	FirstName VARCHAR(30) NOT NULL,
	StreetAddress VARCHAR(50) NOT NULL,
	City VARCHAR(30) NOT NULL,
	State VARCHAR(2) NOT NULL,
	ZipCode VARCHAR(5) NOT NULL,
	PhoneNmbr VARCHAR(17) NOT NULL,
	DateOfAdoption DATE NOT NULL,
	PreviousPetExp VARCHAR(1) NOT NULL	
);
INSERT INTO Adoptions VALUES
	(NULL, 1, 'AD101', 1, 'Abrams', 'Bonnie', '1020 E. Porter', 'Naperville', 'IL', '60563', '6305551234', "2017-02-24", '1'),
	(NULL, 2, 'AD102', 2, 'Hull', 'George', '574 5th St.', 'Naperville', 'IL', '60563', '6305551234', "2017-11-24", '0'),
    (NULL, 3, 'AD103', 3, 'Simpson', 'Christine', '1140 Sylvan Circle', 'Naperville', 'IL', '60563', '6305551234', "2017-09-24", '1'),
    (NULL, 4, 'AD104', 4, 'Smith', 'Clark', '24 Mill St.', 'Naperville', 'IL', '60563', '6305551234', "2017-06-24", '1'),
    (NULL, 12, 'AD105', 10, 'Trager', 'Tig', '30 Mill St.', 'Naperville', 'IL', '60563', '6305559755', "2017-01-10", '1'),
	(NULL, 15, 'AD106', 5, 'Telford', 'Chibs', '1140 E. Brighton.', 'Naperville', 'IL', '60563', '6305551234', "2017-02-24", '0'),
    (NULL, 9, 'AD107', 6, 'Teller', 'Jax', '11 Mill St.', 'Naperville', 'IL', '60563', '6305551234', "2017-01-15", '1'),
    (NULL, 5, 'AD108', 7, 'Winston', 'Opie', '30 Mill St.', 'Naperville', 'IL', '60563', '6305551234', "2017-06-24", '1'),
    (NULL, 7, 'AD109', 8, 'Lowman', 'Happy', '114 Second St.', 'Naperville', 'IL', '60563', '6305551234', "2017-09-15", '1'),
    (NULL, 8, 'AD110', 9, 'Knowles', 'Tara', '11 Mill St.', 'Naperville', 'IL', '60563', '6305551234', "2017-01-15", '1');
    
/*ALTER TABLE Adoptions
	ADD CONSTRAINT fkAdoptions_Vets
    FOREIGN KEY(VetId)
    REFERENCES Vets(VetId);

ALTER TABLE Adoptions
	ADD CONSTRAINT fkADOPTIONS_Pets
    FOREIGN KEY(PetId)
    REFERENCES Pets(PetId);*/
    
CREATE VIEW AdoptionsView AS
	 SELECT a.AdoptionId,
			a.AdoptionNbr,
			a.PetId,
			p.MicroChipId,
			p.AnimalType,
			p.Gender,
			p.PetName,
			p.Breed,
			p.Age, 
			a.VetId,
			v.DrLastName,
			v.DrFirstName,
			v.NonEmergencyPhone,
			v.EmergencyPhone,
			a.LastName,
			a.FirstName,
			a.StreetAddress,
			a.City,
			a.State,
			a.ZipCode,
			a.PhoneNmbr,
			a.DateOfAdoption,
			a.PreviousPetExp
       FROM Adoptions AS a
 INNER JOIN Vets AS v
         ON a.VetId = v.VetId
 INNER JOIN Pets as p
	     ON a.PetId = p.PetId;

 
		