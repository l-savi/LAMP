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
ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
Nome VARCHAR (30) NOT NULL,
Cognome VARCHAR (30) NOT NULL,
Email VARCHAR (50) NOT NULL
);

CREATE TABLE IF NOT EXISTS Ricevute(
ID_Ricevuta INT AUTO_INCREMENT PRIMARY KEY,
Data_Scandenza DATE NOT NULL,
ID_Cliente INT NOT NULL,
ID_Film INT NOT NULL,
FOREIGN KEY (ID_Cliente) REFERENCES Clienti (ID_Cliente) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (ID_Film) REFERENCES Film (ID_Film) ON DELETE NO ACTION ON UPDATE CASCADE
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
('Fantascienza'),
('Azione'),
('Romantico');

INSERT INTO Film (Titolo, Durata, Anno_Uscita, ID_Regista, ID_Genere) VALUES
('La dolce vita' , '60', 2021, 3, 3),
('Taxi Driver' , '97', 1997, 1, 3),
('Via col Vento','102', 2013, 2, 2);

INSERT INTO Clienti (Nome, Cognome, Email) VALUES
('Giulio', 'Rossi', 'giulio.rossi@gmail.com'),
('Giorgio', 'Basso', 'giorgio.basso@gmail.com'),
('Sara', 'Verdi', 'sara.verdi21@gmail.com');

INSERT INTO Ricevute (ID_Film, ID_Cliente, Data_Scandenza) VALUES
(1, 1, '2024-10-02'),
(2, 2, '2024-10-28'),
(3, 4, '2024-10-28');

INSERT INTO Stati_Pagamenti (Descrizione) VALUES
('Pagato'),
('Non pagato');

INSERT INTO Pagamenti (Data_Pagamento, Prezzo, ID_Ricevuta, Stato_Pagamento) VALUES
('2024-10-30', 100, 1, 2),
('NULL', 200, 3, 1);