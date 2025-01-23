CREATE DATABASE IF NOT EXISTS studenti;
USE studenti;


CREATE TABLE IF NOT EXISTS corso_studi (
    codice INT AUTO_INCREMENT PRIMARY KEY,
    nome_corso VARCHAR(30) NOT NULL
);


INSERT INTO corso_studi(codice, nome_corso)
VALUES
    ('liceo aristico'),
    ('liceo scientifico'),
    ('liceo linguistico');

SELECT * FROM corso_studi;


CREATE TABLE IF NOT EXISTS disciplina (
    codice_disciplina INT AUTO_INCREMENT PRIMARY KEY,
    nome_disciplina VARCHAR(30) NOT NULL
);


INSERT INTO disciplina(codice, nome_disciplina)
VALUES
    ('arte'),
    ('matematica'),
    ('italiano'),
    ('inglese');

SELECT * FROM disciplina;


CREATE TABLE IF NOT EXISTS studenti (
    matricola INT AUTO_INCREMENT PRIMARY KEY,
    cognome VARCHAR(30) NOT NULL,
    data_nascita DATE,
    FK_corso FOREIGN KEY
    capo_g INT
    FOREIGN KEY(FK_corso) REFERENCES corso_studi(codice)
);



INSERT INTO studenti(matricola, cognome, data_nascita, capo_g)
VALUES
    ('rossi',15-03-2004,03),
    ('menicucci',09-02-2007,02),
    ('santoro',26-02-2007,01);

SELECT * FROM studenti;



CREATE TABLE IF NOT EXISTS valutazioni (
    codice_val INT AUTO_INCREMENT PRIMARY KEY,
    voto INT,
    data_voto DATE,
    FK_studenti FOREIGN KEY
    FK_disc INT
    FOREIGN KEY(FK_studenti) REFERENCES studenti(matricola)
    FOREIGN KEY(FK_disc) REFERENCES disciplina(codice_disciplina)
);



INSERT INTO valutazioni(matricola, voto, data_voto)
VALUES
    ( 8 , 15-03-2004),
    ( 9, 09-02-2007),
    ( 7,26-02-2007);

SELECT * FROM valutazioni;


SELECT s.cognome, v.voto 
FROM studenti s, valutazioni v
WHERE s.matricola = v.FK_studenti;

SELECT max(voto), min(voto), avg(voto);
FROM valutazioni v, studenti s
WHERE s.matricola = v.FK_studenti
AND s.cognome = 'santoro'

SELECT count(*) FROM studenti

SELECT count(voto) FROM valutazioni


SELECT s.cognome, v.disciplina, v.voto, YEAR(CURDATE()) - YEAR(s.data_nascita) AS eta --La funzione curdate è utilizzata per ottenere la data corrente nel formato YYYY-MM-DD. 
FROM  Studenti s
JOIN  Voti v ON s.matricola = v.matricola
WHERE s.cognome LIKE 'S%';  


SELECT s.cognome, COUNT(v.voto) AS numero_voti, AVG(v.voto) AS media_voti, MAX(v.voto) AS voto_piu_alto, MIN(v.voto) AS voto_piu_basso
FROM Studenti s
JOIN Voti v ON s.matricola = v.matricola
WHERE s.matricola = '1' 

SELECT COUNT(*) AS studenti_over_18
FROM Studenti
WHERE YEAR(CURDATE()) - YEAR(data_nascita) > 18;

SELECT s.cognome
FROM Studenti s
LEFT JOIN Voti v ON s.matricola = v.matricola
WHERE v.matricola IS NULL;