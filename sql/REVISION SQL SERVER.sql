create database GestRendezvous
use GestRendezvous
drop table Patient
drop table Medecin 
create table Patient(CodePatient nvarchar(4) not null primary key,NomPatient nvarchar(50),VillePatient nvarchar(50),
DateNaiss date,SexePatient nvarchar(2),Age int)

create table Medecin(CodeMedecin nvarchar(4)not null primary key,NomMedecin nvarchar(50),Tel nvarchar(14),Fonction nvarchar(50)) 
drop table Medecin 
drop table RDV
create table RDV(NumRDV int not null primary key, DateRDV date,HeureRDV time,CodePatient nvarchar(4),
CodeMedecin nvarchar(4),constraint fkpatient foreign key(CodePatient) references Patient(CodePatient),
constraint fkmedecin foreign key(CodeMedecin) references Medecin(CodeMedecin))

create table Utilisateur(login int not null primary key,Motdepasse nvarchar(20),nom nvarchar(50),prenom nvarchar(50))

/* Question 3*/
/* Ajouter dans la table Utilisateur un nouveau champ nomme categorie de type nvarchar(20)  */
alter table Utilisateur Add Categorie nvarchar(20)
select * from Utilisateur
/* Question 4*/
/* Ajouter dans la table Medecin un nouveau champ nomme Salaire de type Entier  */
alter table Medecin add Salaire int 
select * from Medecin
/* Question 5*/
/* Dans la table Medecin renommer la colonne Fonction par Specialite */
Alter table Medecin Alter COLUMN Fonction Specialite 
sp_rename 'Medecin.Fonction' ,'Medecin.Specialite','COLUMN' 

select * from Medecin 
se
/* Question 6*/
/* Supprimer la contrainte DEFAULT definie dans le champ VillePatient de la Patient */
/*Ajout constrainte pour VillePatient='Chichaoua' par defaut   */
Alter table Patient Add constraint CP default 'Chichaoua' for  VillePatient
/* Supprimer la contrainte DEFAULT definie dans le champ VillePatient de la Patient */
Alter table Patient Drop constraint CP
/* Question 7*/
/* Renommer  la table Utilisateur par Agent   */
sp_rename 'Utilisateur' ,'Agent' 

select * from Agent

/* Question 8*/
/* Supprimer la table   Agent   */
DROP table Agent
/* Question 9*/
/* Ajouter un jeu d'enregistrements   */
insert into Patient values ('P1','JABER Fatiha','Casa','12/02/1995','F',20),
('P2','KARAM Anas','Chichaoua','03/04/2000','M',30),
('P3','NASSRI Younes','Marrakech','05/09/2005','M',65),
('P4','NOBOUR Hassan','Rabat','07/06/1992','M',47)


insert into Medecin  values ('M1','EL JARMOUNI','0203568924','La Chirurgie'),
('M2','BENJELLOUN','0325265458','La Cardiologie'),
('M3','EL JARMOUNIEL FASI','123456789','La Psychologie')
 
 insert into RDV  values (1,'11/04/2018','9:00','P1','M2'),
 (2,'10/04/2018','11:30','P3','M3'),
 (3,'05/05/2018','10:45','P1','M1'),
 (4,'06/05/2018','15:20','P2','M1'),
 (5,'07/04/2018','11:30','P3','M3'),
 (6,'09/06/2018','12:15','P3','M2')
 
 
 select Patient.NomPatient ,VillePatient,
 DateNaiss, NomMedecin,Fonction,DateRDV,HeureRDV  From RDV, Patient,Medecin 
  where RDV.CodeMedecin=Medecin.CodeMedecin
  and Patient.CodePatient =RDV.CodePatient 
  
  select * from Medecin 