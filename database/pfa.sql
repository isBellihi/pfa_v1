#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: etudiant
#------------------------------------------------------------

CREATE TABLE etudiant(
        id               int (11) Auto_increment  NOT NULL ,
        NOM              Varchar (25) ,
        PRENOM           Varchar (25) ,
        ADRESS           Varchar (100) ,
        EMAIL            Varchar (25) ,
        TELE             Varchar (25) ,
        DATE_NAISSANCE   Date ,
        photo            Varchar (300) ,
        id_etablissement Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: administrateur
#------------------------------------------------------------

CREATE TABLE administrateur(
        id               int (11) Auto_increment  NOT NULL ,
        NOM              Varchar (25) NOT NULL ,
        PRENOM           Varchar (25) NOT NULL ,
        ADRESS           Varchar (100) NOT NULL ,
        EMAIL            Varchar (25) NOT NULL ,
        TELE             Varchar (25) NOT NULL ,
        DATE_NAISSANCE   Date NOT NULL ,
        POSTE            Varchar (25) ,
        photo            Varchar (300) NOT NULL ,
        id_etablissement Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Compétition
#------------------------------------------------------------

CREATE TABLE Competition(
        id                int (11) Auto_increment  NOT NULL ,
        titre             Varchar (250) ,
        slogon            Varchar (250) ,
        details           Varchar (300) ,
        regles            Varchar (300) ,
        frais             Float ,
        phase1            Varchar (50) ,
        dateDebut         Date ,
        dateFin           Date ,
        dateLimite        Date ,
        nbrMaxEqui        Int ,
        img               Varchar (300) ,
        id_administrateur Int ,
        id_etablissement  Int ,
        id_type           Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etablissement
#------------------------------------------------------------

CREATE TABLE etablissement(
        id            int (11) Auto_increment  NOT NULL ,
        adress        Varchar (100) ,
        ville         Varchar (25) ,
        codePostal    Int ,
        email         Varchar (25) ,
        id_Universite Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: equipe
#------------------------------------------------------------

CREATE TABLE equipe(
        id             int (11) Auto_increment  NOT NULL ,
        nom            Varchar (100) ,
        nbrMembre      Int ,
        photo          Varchar (300) NOT NULL ,
        id_etudiant    Int ,
        id_Competition Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Universite
#------------------------------------------------------------

CREATE TABLE Universite(
        id         int (11) Auto_increment  NOT NULL ,
        nom        Varchar (100) ,
        adress     Varchar (400) ,
        codePostal Int ,
        email      Varchar (25) ,
        ville      Varchar (100) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type
#------------------------------------------------------------

CREATE TABLE type(
        id  int (11) Auto_increment  NOT NULL ,
        nom Varchar (100) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: membre
#------------------------------------------------------------

CREATE TABLE membre(
        id        Int NOT NULL ,
        id_equipe Int NOT NULL ,
        PRIMARY KEY (id ,id_equipe )
)ENGINE=InnoDB;

ALTER TABLE etudiant ADD CONSTRAINT FK_etudiant_id_etablissement FOREIGN KEY (id_etablissement) REFERENCES etablissement(id);
ALTER TABLE administrateur ADD CONSTRAINT FK_administrateur_id_etablissement FOREIGN KEY (id_etablissement) REFERENCES etablissement(id);
ALTER TABLE Competition ADD CONSTRAINT FK_Competition_id_administrateur FOREIGN KEY (id_administrateur) REFERENCES administrateur(id);
ALTER TABLE Competition ADD CONSTRAINT FK_Competition_id_etablissement FOREIGN KEY (id_etablissement) REFERENCES etablissement(id);
ALTER TABLE Competition ADD CONSTRAINT FK_Competition_id_type FOREIGN KEY (id_type) REFERENCES type(id);
ALTER TABLE etablissement ADD CONSTRAINT FK_etablissement_id_Universite FOREIGN KEY (id_Universite) REFERENCES Universite(id);
ALTER TABLE equipe ADD CONSTRAINT FK_equipe_id_etudiant FOREIGN KEY (id_etudiant) REFERENCES etudiant(id);
ALTER TABLE equipe ADD CONSTRAINT FK_equipe_id_Competition FOREIGN KEY (id_Competition) REFERENCES Competition(id);
ALTER TABLE membre ADD CONSTRAINT FK_membre_id FOREIGN KEY (id) REFERENCES etudiant(id);
ALTER TABLE membre ADD CONSTRAINT FK_membre_id_equipe FOREIGN KEY (id_equipe) REFERENCES equipe(id);
