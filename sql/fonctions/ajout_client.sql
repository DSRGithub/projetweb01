CREATE OR REPLACE FUNCTION public.ajouter_client(
	text,
	text,
	text,
	text)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$
  DECLARE f_nom ALIAS FOR $1;
  DECLARE f_prenom ALIAS FOR $2;
  DECLARE f_adresse_mail ALIAS FOR $3;
  DECLARE f_mot_de_passe ALIAS FOR $4;
 
  DECLARE id integer;
  DECLARE retour integer;
  
BEGIN
  SELECT INTO id id_etudiant FROM etudiant WHERE adresse_mail = f_adresse_mail and mot_de_passe = f_mot_de_passe;
  IF NOT FOUND
  THEN
    retour=-1;
	INSERT INTO etudiant(nom,prenom,adresse_mail,mot_de_passe) values 
	(f_nom,f_prenom,f_adresse_mail,f_mot_de_passe);
	SELECT INTO id id_etudiant FROM etudiant WHERE adresse_mail = f_adresse_mail and mot_de_passe = f_mot_de_passe;
	IF NOT FOUND
	THEN
	  retour=0;
	ELSE
	  retour=1;
	END IF;
  ELSE
    retour=2;
  END IF;
    
  
  return retour; 
  END; 
$BODY$