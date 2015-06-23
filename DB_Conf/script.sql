drop Table t_capteur;
drop Table t_typedonnee;
drop Table t_piece;
drop Table t_mesure;

/**********************************/

Create Table t_capteur(
	id_capteur serial primary key,
	idtypedonnee_capteur int,
	intitule_capteur varchar, 
	idpiece_capteur int);

/**********************************/

Create Table t_typedonnee(
	id_typedonnee serial primary key,
	intitule_typedonnee varchar);

/**********************************/

Create Table t_piece(
	id_piece serial primary key,
	intitule_piece varchar);

/**********************************/

Create Table t_mesure(
	id_mesure serial primary key,
	timestamp_mesure float,
	idcapteur_mesure int,
	valeur_mesure float);

/**********************************/

CREATE OR REPLACE VIEW v_mesurepiece AS
(
	Select t_piece.id_piece, t_capteur.id_capteur, t_mesure.valeur_mesure 
	from t_piece, t_capteur, t_mesure
	where (t_piece.id_piece = t_capteur.idpiece_capteur AND t_capteur.id_capteur = t_mesure.idcapteur_mesure));


/**********************************/

CREATE OR REPLACE FUNCTION afficher_valeur(
	id_capteur VARCHAR, date_debut VARCHAR, date_fin VARCHAR,
	OUT valeur TEXT, OUT date_valeur TEXT)
RETURNS SETOF RECORD AS $BODY$
DECLARE
	requete TEXT;
BEGIN
	requete:= 'SELECT TEXT(valeur_mesure), TEXT(timestamp_mesure) FROM t_mesure WHERE idcapteur_mesure = ' || id_capteur || ' AND (timestamp_mesure > ' || date_debut || ' AND timestamp_mesure < ' || date_fin || ');';
	RAISE NOTICE '%', requete;
	FOR valeur, date_valeur IN EXECUTE requete LOOP
		RETURN NEXT;
	END LOOP;
END;
$BODY$
LANGUAGE 'plpgsql';

/**********************************/


CREATE OR REPLACE FUNCTION afficher_piece(
	id_piece integer,
	OUT id integer, OUT piece TEXT)
RETURNS SETOF RECORD AS $BODY$
DECLARE
	requete TEXT;
BEGIN
	requete:= 'SELECT id_piece, TEXT(intitule_piece) FROM t_piece WHERE id_piece = ' || id_piece || ' ;';
	RAISE NOTICE '%', requete;
	FOR id, piece IN EXECUTE requete LOOP
		RETURN NEXT;
	END LOOP;
END;
$BODY$
LANGUAGE 'plpgsql';

/**********************************/

/*Requêtes*/

create table import (d float, idcapteur int, typecapteur int, valeur float);

insert into t_capteur values (1, 1, 'capteur_1', 1);
insert into t_capteur values (5, 2, 'capteur_2', 1);
insert into t_capteur values (17, 2, 'capteur_3', 2);
insert into t_capteur values (30, 1, 'capteur_4', 3);
insert into t_capteur values (43, 1, 'capteur_5', 4);
insert into t_capteur values (44, 1, 'capteur_6', 4);
insert into t_capteur values (58, 2, 'capteur_7', 5);
insert into t_capteur values (66, 1, 'capteur_8', 6);
insert into t_capteur values (68, 1, 'capteur_9', 6);

insert into t_mesure (timestamp_mesure, idcapteur_mesure, valeur_mesure) select d, idcapteur, valeur from import;
