CREATE DATABASE IF NOT EXISTS videoteca;
USE videoteca;

CREATE TABLE IF NOT EXISTS Registi (
ID_Regista INT AUTO_INCREMENT PRIMARY KEY,
Nome VARCHAR (30) NOT NULL,
Cognome VARCHAR (30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Generi(
ID_Genere INT AUTO_INCREMENT PRIMARY KEY,
Nome VARCHAR (30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Film(
ID_Film INT AUTO_INCREMENT PRIMARY KEY,
Titolo VARCHAR (100) NOT NULL,
Anno_Uscita YEAR NOT NULL,
Durata INT NOT NULL,
ID_Regista INT NOT NULL,
ID_Genere INT NOT NULL,
FOREIGN KEY (ID_Regista) REFERENCES Registi (ID_Regista) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (ID_Genere) REFERENCES Generi (ID_Genere) ON DELETE NO ACTION ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Clienti(
ID_Cliente  INT AUTO_INCREMENT PRIMARY KEY,
Nome VARCHAR (30) NOT NULL,
Cognome VARCHAR (30) NOT NULL,
Email VARCHAR (50) NOT NULL
);

CREATE TABLE IF NOT EXISTS Ricevute(
ID_Ricevuta INT AUTO_INCREMENT PRIMARY KEY,
Data_Scandenza DATE NOT NULL,
ID_Cliente INT NOT NULL,
ID_Film INT NOT NULL,
FOREIGN KEY (ID_Cliente) REFERENCES Clienti (ID_Cliente) ON DELETE NO
ACTION ON UPDATE CASCADE,
FOREIGN KEY (ID_Film) REFERENCES Film (ID_Film) ON DELETE NO
ACTION ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Stati_Pagamenti(
ID_Stato INT AUTO_INCREMENT PRIMARY KEY,
Descrizione VARCHAR (30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Pagamenti(
ID_Pagamento INT AUTO_INCREMENT PRIMARY KEY,
Data_Pagamento DATE NOT NULL,
Prezzo INT NOT NULL,
ID_Ricevuta INT NOT NULL,
Stato_Pagamento INT NOT NULL,
FOREIGN KEY (ID_Ricevuta) REFERENCES Ricevute (ID_Ricevuta) ON DELETE NO
ACTION ON UPDATE CASCADE,
FOREIGN KEY (Stato_Pagamento) REFERENCES Stati_Pagamenti (ID_Stato) ON DELETE NO
ACTION ON UPDATE CASCADE
);

INSERT INTO Registi (Nome, Cognome) VALUES
('Steven', 'Spielberg'),
('Quentin', 'Tarantino' ),
('Martin', 'Scorsese');

INSERT INTO Generi (Nome) VALUES
("Fantascienza'),
('Azione"),
('Romantico');

INSERT INTO Film (Titolo, Durata, Anno Uscita, ID_Regista, ID_Genere) VALUES
('La dolce vita' ,'2:10', 2021, 3, 3),
('Taxi Driver' , '1:45', 1997, 1, 3),
('Via col Vento','3:21', 2013, 2, 2);

INSERT INTO Clienti (Nome, Cognome, Email) VALUES
('Giulio', 'Rossi', 'giulio.rossi@gmail.com'),
('Giorgio', 'Basso', 'giorgio.basso@gmail.com'),
('Sara', 'Verdi', 'sara.verdi21@gmail.com');

INSERT INTO Stati_Pagamenti (Descrizione) VALUES
('Pagato'),
('Non pagato'),
('In corso');