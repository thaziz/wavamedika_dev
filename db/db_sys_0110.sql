--
-- PostgreSQL database dump
--

-- Dumped from database version 10.6 (Ubuntu 10.6-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.6 (Ubuntu 10.6-0ubuntu0.18.04.1)

-- Started on 2019-10-01 10:12:14 WIB

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
-- TOC entry 8 (class 2615 OID 64354)
-- Name: sys; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA sys;


ALTER SCHEMA sys OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 203 (class 1259 OID 64497)
-- Name: groups; Type: TABLE; Schema: sys; Owner: postgres
--

CREATE TABLE sys.groups (
    id integer NOT NULL,
    name character varying(20) NOT NULL,
    description character varying(100) NOT NULL,
    CONSTRAINT check_id CHECK ((id >= 0))
);


ALTER TABLE sys.groups OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 64495)
-- Name: groups_id_seq; Type: SEQUENCE; Schema: sys; Owner: postgres
--

CREATE SEQUENCE sys.groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sys.groups_id_seq OWNER TO postgres;

--
-- TOC entry 2986 (class 0 OID 0)
-- Dependencies: 202
-- Name: groups_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: postgres
--

ALTER SEQUENCE sys.groups_id_seq OWNED BY sys.groups.id;


--
-- TOC entry 207 (class 1259 OID 64519)
-- Name: login_attempts; Type: TABLE; Schema: sys; Owner: postgres
--

CREATE TABLE sys.login_attempts (
    id integer NOT NULL,
    ip_address character varying(45),
    login character varying(100) NOT NULL,
    "time" integer,
    CONSTRAINT check_id CHECK ((id >= 0))
);


ALTER TABLE sys.login_attempts OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 64517)
-- Name: login_attempts_id_seq; Type: SEQUENCE; Schema: sys; Owner: postgres
--

CREATE SEQUENCE sys.login_attempts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sys.login_attempts_id_seq OWNER TO postgres;

--
-- TOC entry 2987 (class 0 OID 0)
-- Dependencies: 206
-- Name: login_attempts_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: postgres
--

ALTER SEQUENCE sys.login_attempts_id_seq OWNED BY sys.login_attempts.id;


--
-- TOC entry 199 (class 1259 OID 64397)
-- Name: permission_role; Type: TABLE; Schema: sys; Owner: postgres
--

CREATE TABLE sys.permission_role (
    permission_id integer,
    role_id integer
);


ALTER TABLE sys.permission_role OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 64388)
-- Name: permissions; Type: TABLE; Schema: sys; Owner: postgres
--

CREATE TABLE sys.permissions (
    id integer NOT NULL,
    name character varying,
    route character varying,
    enabled boolean,
    is_parent boolean,
    is_menu boolean,
    parent_id integer,
    sequence_number integer,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone
);


ALTER TABLE sys.permissions OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 64386)
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: sys; Owner: postgres
--

CREATE SEQUENCE sys.permissions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sys.permissions_id_seq OWNER TO postgres;

--
-- TOC entry 2988 (class 0 OID 0)
-- Dependencies: 197
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: postgres
--

ALTER SEQUENCE sys.permissions_id_seq OWNED BY sys.permissions.id;


--
-- TOC entry 201 (class 1259 OID 64476)
-- Name: users; Type: TABLE; Schema: sys; Owner: postgres
--

CREATE TABLE sys.users (
    id integer NOT NULL,
    ip_address character varying(45),
    username character varying(100),
    password character varying(255) NOT NULL,
    email character varying(254) NOT NULL,
    activation_selector character varying(255),
    activation_code character varying(255),
    forgotten_password_selector character varying(255),
    forgotten_password_code character varying(255),
    forgotten_password_time integer,
    remember_selector character varying(255),
    remember_code character varying(255),
    created_on integer NOT NULL,
    last_login integer,
    active integer,
    first_name character varying(50),
    last_name character varying(50),
    company character varying(100),
    phone character varying(20),
    CONSTRAINT check_active CHECK ((active >= 0)),
    CONSTRAINT check_id CHECK ((id >= 0))
);


ALTER TABLE sys.users OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 64506)
-- Name: users_groups; Type: TABLE; Schema: sys; Owner: postgres
--

CREATE TABLE sys.users_groups (
    id integer NOT NULL,
    user_id integer NOT NULL,
    group_id integer NOT NULL,
    CONSTRAINT users_groups_check_group_id CHECK ((group_id >= 0)),
    CONSTRAINT users_groups_check_id CHECK ((id >= 0)),
    CONSTRAINT users_groups_check_user_id CHECK ((user_id >= 0))
);


ALTER TABLE sys.users_groups OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 64504)
-- Name: users_groups_id_seq; Type: SEQUENCE; Schema: sys; Owner: postgres
--

CREATE SEQUENCE sys.users_groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sys.users_groups_id_seq OWNER TO postgres;

--
-- TOC entry 2989 (class 0 OID 0)
-- Dependencies: 204
-- Name: users_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: postgres
--

ALTER SEQUENCE sys.users_groups_id_seq OWNED BY sys.users_groups.id;


--
-- TOC entry 200 (class 1259 OID 64474)
-- Name: users_id_seq; Type: SEQUENCE; Schema: sys; Owner: postgres
--

CREATE SEQUENCE sys.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sys.users_id_seq OWNER TO postgres;

--
-- TOC entry 2990 (class 0 OID 0)
-- Dependencies: 200
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: postgres
--

ALTER SEQUENCE sys.users_id_seq OWNED BY sys.users.id;


--
-- TOC entry 2821 (class 2604 OID 64500)
-- Name: groups id; Type: DEFAULT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.groups ALTER COLUMN id SET DEFAULT nextval('sys.groups_id_seq'::regclass);


--
-- TOC entry 2827 (class 2604 OID 64522)
-- Name: login_attempts id; Type: DEFAULT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.login_attempts ALTER COLUMN id SET DEFAULT nextval('sys.login_attempts_id_seq'::regclass);


--
-- TOC entry 2817 (class 2604 OID 64391)
-- Name: permissions id; Type: DEFAULT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.permissions ALTER COLUMN id SET DEFAULT nextval('sys.permissions_id_seq'::regclass);


--
-- TOC entry 2818 (class 2604 OID 64479)
-- Name: users id; Type: DEFAULT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users ALTER COLUMN id SET DEFAULT nextval('sys.users_id_seq'::regclass);


--
-- TOC entry 2823 (class 2604 OID 64509)
-- Name: users_groups id; Type: DEFAULT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users_groups ALTER COLUMN id SET DEFAULT nextval('sys.users_groups_id_seq'::regclass);


--
-- TOC entry 2976 (class 0 OID 64497)
-- Dependencies: 203
-- Data for Name: groups; Type: TABLE DATA; Schema: sys; Owner: postgres
--

INSERT INTO sys.groups (id, name, description) VALUES (1, 'admin', 'Administrator');
INSERT INTO sys.groups (id, name, description) VALUES (2, 'members', 'General User');


--
-- TOC entry 2980 (class 0 OID 64519)
-- Dependencies: 207
-- Data for Name: login_attempts; Type: TABLE DATA; Schema: sys; Owner: postgres
--

INSERT INTO sys.login_attempts (id, ip_address, login, "time") VALUES (1, '::1', 'admin@admin.com', 1569891866);


--
-- TOC entry 2972 (class 0 OID 64397)
-- Dependencies: 199
-- Data for Name: permission_role; Type: TABLE DATA; Schema: sys; Owner: postgres
--



--
-- TOC entry 2971 (class 0 OID 64388)
-- Dependencies: 198
-- Data for Name: permissions; Type: TABLE DATA; Schema: sys; Owner: postgres
--



--
-- TOC entry 2974 (class 0 OID 64476)
-- Dependencies: 201
-- Data for Name: users; Type: TABLE DATA; Schema: sys; Owner: postgres
--

INSERT INTO sys.users (id, ip_address, username, password, email, activation_selector, activation_code, forgotten_password_selector, forgotten_password_code, forgotten_password_time, remember_selector, remember_code, created_on, last_login, active, first_name, last_name, company, phone) VALUES (1, '127.0.0.1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1569578653, 1, 'admin', 'admin', 'ADMIN', '08123456789');
INSERT INTO sys.users (id, ip_address, username, password, email, activation_selector, activation_code, forgotten_password_selector, forgotten_password_code, forgotten_password_time, remember_selector, remember_code, created_on, last_login, active, first_name, last_name, company, phone) VALUES (2, '127.0.0.1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@user1.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'user1', 'user1', 'user1', '08123456789');
INSERT INTO sys.users (id, ip_address, username, password, email, activation_selector, activation_code, forgotten_password_selector, forgotten_password_code, forgotten_password_time, remember_selector, remember_code, created_on, last_login, active, first_name, last_name, company, phone) VALUES (3, '127.0.0.1', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user2@user2.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'user2', 'user2', 'user2', '08123456789');


--
-- TOC entry 2978 (class 0 OID 64506)
-- Dependencies: 205
-- Data for Name: users_groups; Type: TABLE DATA; Schema: sys; Owner: postgres
--

INSERT INTO sys.users_groups (id, user_id, group_id) VALUES (1, 1, 1);
INSERT INTO sys.users_groups (id, user_id, group_id) VALUES (2, 1, 2);


--
-- TOC entry 2991 (class 0 OID 0)
-- Dependencies: 202
-- Name: groups_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: postgres
--

SELECT pg_catalog.setval('sys.groups_id_seq', 1, false);


--
-- TOC entry 2992 (class 0 OID 0)
-- Dependencies: 206
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: postgres
--

SELECT pg_catalog.setval('sys.login_attempts_id_seq', 1, true);


--
-- TOC entry 2993 (class 0 OID 0)
-- Dependencies: 197
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: postgres
--

SELECT pg_catalog.setval('sys.permissions_id_seq', 1, false);


--
-- TOC entry 2994 (class 0 OID 0)
-- Dependencies: 204
-- Name: users_groups_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: postgres
--

SELECT pg_catalog.setval('sys.users_groups_id_seq', 2, true);


--
-- TOC entry 2995 (class 0 OID 0)
-- Dependencies: 200
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: postgres
--

SELECT pg_catalog.setval('sys.users_id_seq', 2, true);


--
-- TOC entry 2842 (class 2606 OID 64503)
-- Name: groups groups_pkey; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);


--
-- TOC entry 2848 (class 2606 OID 64525)
-- Name: login_attempts login_attempts_pkey; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.login_attempts
    ADD CONSTRAINT login_attempts_pkey PRIMARY KEY (id);


--
-- TOC entry 2830 (class 2606 OID 64396)
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 2832 (class 2606 OID 64490)
-- Name: users uc_activation_selector; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users
    ADD CONSTRAINT uc_activation_selector UNIQUE (activation_selector);


--
-- TOC entry 2834 (class 2606 OID 64488)
-- Name: users uc_email; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users
    ADD CONSTRAINT uc_email UNIQUE (email);


--
-- TOC entry 2836 (class 2606 OID 64492)
-- Name: users uc_forgotten_password_selector; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users
    ADD CONSTRAINT uc_forgotten_password_selector UNIQUE (forgotten_password_selector);


--
-- TOC entry 2838 (class 2606 OID 64494)
-- Name: users uc_remember_selector; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users
    ADD CONSTRAINT uc_remember_selector UNIQUE (remember_selector);


--
-- TOC entry 2844 (class 2606 OID 64516)
-- Name: users_groups uc_users_groups; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users_groups
    ADD CONSTRAINT uc_users_groups UNIQUE (user_id, group_id);


--
-- TOC entry 2846 (class 2606 OID 64514)
-- Name: users_groups users_groups_pkey; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users_groups
    ADD CONSTRAINT users_groups_pkey PRIMARY KEY (id);


--
-- TOC entry 2840 (class 2606 OID 64486)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: sys; Owner: postgres
--

ALTER TABLE ONLY sys.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


-- Completed on 2019-10-01 10:12:16 WIB

--
-- PostgreSQL database dump complete
--

