--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.4
-- Dumped by pg_dump version 11.1

-- Started on 2019-06-06 14:48:46

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 198 (class 1255 OID 52545)
-- Name: ajouter_client(text, text, text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajouter_client(text, text, text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
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
';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 188 (class 1259 OID 52468)
-- Name: absence; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.absence (
    id_absence integer NOT NULL,
    id_professeur integer NOT NULL,
    id_etudiant integer,
    date text NOT NULL,
    heure_debut time without time zone NOT NULL,
    heure_fin time without time zone NOT NULL
);


--
-- TOC entry 187 (class 1259 OID 52466)
-- Name: absence_id_absence_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.absence_id_absence_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2207 (class 0 OID 0)
-- Dependencies: 187
-- Name: absence_id_absence_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.absence_id_absence_seq OWNED BY public.absence.id_absence;


--
-- TOC entry 196 (class 1259 OID 52536)
-- Name: admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    login text,
    password text,
    statut integer
);


--
-- TOC entry 195 (class 1259 OID 52534)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.admin_id_admin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2208 (class 0 OID 0)
-- Dependencies: 195
-- Name: admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;


--
-- TOC entry 194 (class 1259 OID 52503)
-- Name: cours; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cours (
    id_cour integer NOT NULL,
    id_professeur integer NOT NULL,
    id_local integer NOT NULL,
    intitule text NOT NULL
);


--
-- TOC entry 193 (class 1259 OID 52501)
-- Name: cours_id_cour_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.cours_id_cour_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2209 (class 0 OID 0)
-- Dependencies: 193
-- Name: cours_id_cour_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.cours_id_cour_seq OWNED BY public.cours.id_cour;


--
-- TOC entry 190 (class 1259 OID 52481)
-- Name: etudiant; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.etudiant (
    id_etudiant integer NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    adresse_mail text NOT NULL,
    mot_de_passe text NOT NULL
);


--
-- TOC entry 189 (class 1259 OID 52479)
-- Name: etudiant_id_etudiant_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.etudiant_id_etudiant_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2210 (class 0 OID 0)
-- Dependencies: 189
-- Name: etudiant_id_etudiant_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.etudiant_id_etudiant_seq OWNED BY public.etudiant.id_etudiant;


--
-- TOC entry 186 (class 1259 OID 52457)
-- Name: local; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.local (
    id_local integer NOT NULL,
    lettre text NOT NULL,
    numero integer NOT NULL
);


--
-- TOC entry 185 (class 1259 OID 52455)
-- Name: local_id_local_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.local_id_local_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2211 (class 0 OID 0)
-- Dependencies: 185
-- Name: local_id_local_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.local_id_local_seq OWNED BY public.local.id_local;


--
-- TOC entry 192 (class 1259 OID 52492)
-- Name: professeurs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.professeurs (
    id_professeur integer NOT NULL,
    nom text NOT NULL
);


--
-- TOC entry 191 (class 1259 OID 52490)
-- Name: professeurs_id_professeur_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.professeurs_id_professeur_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2212 (class 0 OID 0)
-- Dependencies: 191
-- Name: professeurs_id_professeur_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.professeurs_id_professeur_seq OWNED BY public.professeurs.id_professeur;


--
-- TOC entry 197 (class 1259 OID 58384)
-- Name: vue_absences_professeurs_local_cours; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_absences_professeurs_local_cours AS
 SELECT professeurs.nom,
    local.lettre,
    local.numero,
    cours.intitule,
    absence.date,
    absence.heure_debut,
    absence.heure_fin
   FROM public.professeurs,
    public.local,
    public.cours,
    public.absence
  WHERE ((professeurs.id_professeur = absence.id_professeur) AND (cours.id_professeur = professeurs.id_professeur) AND (cours.id_local = local.id_local));


--
-- TOC entry 2047 (class 2604 OID 52471)
-- Name: absence id_absence; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.absence ALTER COLUMN id_absence SET DEFAULT nextval('public.absence_id_absence_seq'::regclass);


--
-- TOC entry 2051 (class 2604 OID 52539)
-- Name: admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);


--
-- TOC entry 2050 (class 2604 OID 52506)
-- Name: cours id_cour; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cours ALTER COLUMN id_cour SET DEFAULT nextval('public.cours_id_cour_seq'::regclass);


--
-- TOC entry 2048 (class 2604 OID 52484)
-- Name: etudiant id_etudiant; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.etudiant ALTER COLUMN id_etudiant SET DEFAULT nextval('public.etudiant_id_etudiant_seq'::regclass);


--
-- TOC entry 2046 (class 2604 OID 52460)
-- Name: local id_local; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.local ALTER COLUMN id_local SET DEFAULT nextval('public.local_id_local_seq'::regclass);


--
-- TOC entry 2049 (class 2604 OID 52495)
-- Name: professeurs id_professeur; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.professeurs ALTER COLUMN id_professeur SET DEFAULT nextval('public.professeurs_id_professeur_seq'::regclass);


--
-- TOC entry 2193 (class 0 OID 52468)
-- Dependencies: 188
-- Data for Name: absence; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.absence VALUES (1, 1, NULL, '22/05/19
', '08:00:00', '12:00:00');
INSERT INTO public.absence VALUES (4, 4, NULL, '30/05/19', '08:20:00', '10:20:00');
INSERT INTO public.absence VALUES (3, 3, NULL, '07/06/19', '11:00:00', '12:30:00');
INSERT INTO public.absence VALUES (2, 2, NULL, '30/12/19', '08:00:00', '12:00:00');


--
-- TOC entry 2201 (class 0 OID 52536)
-- Dependencies: 196
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.admin VALUES (1, 'admin', 'admin', 1);


--
-- TOC entry 2199 (class 0 OID 52503)
-- Dependencies: 194
-- Data for Name: cours; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.cours VALUES (1, 1, 1, 'Math');
INSERT INTO public.cours VALUES (2, 2, 1, 'Analyse');
INSERT INTO public.cours VALUES (3, 3, 1, 'Architecture');
INSERT INTO public.cours VALUES (4, 4, 2, 'sgbd');


--
-- TOC entry 2195 (class 0 OID 52481)
-- Dependencies: 190
-- Data for Name: etudiant; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.etudiant VALUES (1, 'Jules', 'Blothiaux', 'Jules@hotmail.com', 'Jules');
INSERT INTO public.etudiant VALUES (2, 'Gregoire', 'Le Sang', 'Grogoire@hotmail.com', 'aaa');
INSERT INTO public.etudiant VALUES (3, 'Wawa', 'HERBACHE', 'Lionnel@hotmail.com', 'bbb');
INSERT INTO public.etudiant VALUES (4, 'Logan', 'Heyman', 'Lolo@hotmail.com', 'Logan');
INSERT INTO public.etudiant VALUES (5, 'Jean', 'Labie', 'Jean@hotmail.com', 'Jean');
INSERT INTO public.etudiant VALUES (6, 'Sanchez', 'David', 'dave@hotmail.com', 'dave');


--
-- TOC entry 2191 (class 0 OID 52457)
-- Dependencies: 186
-- Data for Name: local; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.local VALUES (1, 'f', 10);
INSERT INTO public.local VALUES (2, 'f', 7);
INSERT INTO public.local VALUES (3, 'f', 7);


--
-- TOC entry 2197 (class 0 OID 52492)
-- Dependencies: 192
-- Data for Name: professeurs; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.professeurs VALUES (1, 'Pijke');
INSERT INTO public.professeurs VALUES (2, 'Erradi');
INSERT INTO public.professeurs VALUES (3, 'Andry');
INSERT INTO public.professeurs VALUES (4, 'Legrand');


--
-- TOC entry 2213 (class 0 OID 0)
-- Dependencies: 187
-- Name: absence_id_absence_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.absence_id_absence_seq', 5, true);


--
-- TOC entry 2214 (class 0 OID 0)
-- Dependencies: 195
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 1, true);


--
-- TOC entry 2215 (class 0 OID 0)
-- Dependencies: 193
-- Name: cours_id_cour_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cours_id_cour_seq', 5, true);


--
-- TOC entry 2216 (class 0 OID 0)
-- Dependencies: 189
-- Name: etudiant_id_etudiant_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.etudiant_id_etudiant_seq', 6, true);


--
-- TOC entry 2217 (class 0 OID 0)
-- Dependencies: 185
-- Name: local_id_local_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.local_id_local_seq', 3, true);


--
-- TOC entry 2218 (class 0 OID 0)
-- Dependencies: 191
-- Name: professeurs_id_professeur_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.professeurs_id_professeur_seq', 6, true);


--
-- TOC entry 2067 (class 2606 OID 52544)
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 2057 (class 2606 OID 52476)
-- Name: absence pk_absence; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.absence
    ADD CONSTRAINT pk_absence PRIMARY KEY (id_absence);


--
-- TOC entry 2065 (class 2606 OID 52511)
-- Name: cours pk_cours; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cours
    ADD CONSTRAINT pk_cours PRIMARY KEY (id_cour);


--
-- TOC entry 2059 (class 2606 OID 52489)
-- Name: etudiant pk_etudiant; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.etudiant
    ADD CONSTRAINT pk_etudiant PRIMARY KEY (id_etudiant);


--
-- TOC entry 2053 (class 2606 OID 52465)
-- Name: local pk_local; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.local
    ADD CONSTRAINT pk_local PRIMARY KEY (id_local);


--
-- TOC entry 2061 (class 2606 OID 52500)
-- Name: professeurs pk_professeurs; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.professeurs
    ADD CONSTRAINT pk_professeurs PRIMARY KEY (id_professeur);


--
-- TOC entry 2054 (class 1259 OID 52478)
-- Name: i_fk_absence_etudiant; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_absence_etudiant ON public.absence USING btree (id_etudiant);


--
-- TOC entry 2055 (class 1259 OID 52477)
-- Name: i_fk_absence_professeurs; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_absence_professeurs ON public.absence USING btree (id_professeur);


--
-- TOC entry 2062 (class 1259 OID 52513)
-- Name: i_fk_cours_local; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_cours_local ON public.cours USING btree (id_local);


--
-- TOC entry 2063 (class 1259 OID 52512)
-- Name: i_fk_cours_professeurs; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_cours_professeurs ON public.cours USING btree (id_professeur);


--
-- TOC entry 2069 (class 2606 OID 52519)
-- Name: absence fk_absence_etudiant; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.absence
    ADD CONSTRAINT fk_absence_etudiant FOREIGN KEY (id_etudiant) REFERENCES public.etudiant(id_etudiant);


--
-- TOC entry 2068 (class 2606 OID 52514)
-- Name: absence fk_absence_professeurs; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.absence
    ADD CONSTRAINT fk_absence_professeurs FOREIGN KEY (id_professeur) REFERENCES public.professeurs(id_professeur);


--
-- TOC entry 2071 (class 2606 OID 52529)
-- Name: cours fk_cours_local; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cours
    ADD CONSTRAINT fk_cours_local FOREIGN KEY (id_local) REFERENCES public.local(id_local);


--
-- TOC entry 2070 (class 2606 OID 52524)
-- Name: cours fk_cours_professeurs; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cours
    ADD CONSTRAINT fk_cours_professeurs FOREIGN KEY (id_professeur) REFERENCES public.professeurs(id_professeur);


-- Completed on 2019-06-06 14:48:51

--
-- PostgreSQL database dump complete
--

