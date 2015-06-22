/*drop Table t_capteur;
drop Table t_typedonnee;
drop Table t_piece;
drop Table t_mesure;
*/
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
	timestamp_mesure timestamp,
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


