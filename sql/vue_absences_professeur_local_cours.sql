create or replace viewe_absences_professeurs_locas_cours as select
professeurs.nom
local.lettre
local.numero
cours.intitulé
absence.date
absence.heure_debut
absence.heure_fin
from professeurs,local,cours,absence
where professeurs.id_professeur=absence.id_professeur and cours.id_professeur=professeurs.id_professeur and cours.id_local=local.id_local
