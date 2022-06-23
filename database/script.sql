--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 14.1

-- Started on 2022-06-23 16:09:55

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE ecommerce;
--
-- TOC entry 3114 (class 1262 OID 75141)
-- Name: ecommerce; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE ecommerce WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'French_France.1252';


\connect ecommerce

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3092 (class 0 OID 75144)
-- Dependencies: 201
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.admin (id, login, password) VALUES (1, 'admin', 'admin');


--
-- TOC entry 3096 (class 0 OID 75169)
-- Dependencies: 205
-- Data for Name: brand; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3098 (class 0 OID 75201)
-- Dependencies: 208
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.customer (id, name, email, money, password) VALUES (4, 'Rabe', 'rabe@gmail.com', 7.000, '1234');


--
-- TOC entry 3100 (class 0 OID 75212)
-- Dependencies: 210
-- Data for Name: order; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3102 (class 0 OID 75243)
-- Dependencies: 212
-- Data for Name: order_details; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3094 (class 0 OID 75155)
-- Dependencies: 203
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3104 (class 0 OID 75265)
-- Dependencies: 214
-- Data for Name: recharge; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (2, 4, 41.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (3, 4, 12.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (4, 4, 11.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (5, 4, 14.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (6, 4, 280.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (7, 4, 210.000, true);


--
-- TOC entry 3106 (class 0 OID 75288)
-- Dependencies: 217
-- Data for Name: recipe; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3108 (class 0 OID 75300)
-- Dependencies: 219
-- Data for Name: recipe_details; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3124 (class 0 OID 0)
-- Dependencies: 200
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_seq', 1, true);


--
-- TOC entry 3125 (class 0 OID 0)
-- Dependencies: 204
-- Name: brand_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.brand_id_seq', 2, true);


--
-- TOC entry 3126 (class 0 OID 0)
-- Dependencies: 207
-- Name: customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.customer_id_seq', 4, true);


--
-- TOC entry 3127 (class 0 OID 0)
-- Dependencies: 211
-- Name: order_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.order_details_id_seq', 8, true);


--
-- TOC entry 3128 (class 0 OID 0)
-- Dependencies: 209
-- Name: order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.order_id_seq', 13, true);


--
-- TOC entry 3129 (class 0 OID 0)
-- Dependencies: 202
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.product_id_seq', 2010, true);


--
-- TOC entry 3130 (class 0 OID 0)
-- Dependencies: 213
-- Name: recharge_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recharge_id_seq', 7, true);


--
-- TOC entry 3131 (class 0 OID 0)
-- Dependencies: 218
-- Name: recipe_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recipe_details_id_seq', 1, false);


--
-- TOC entry 3132 (class 0 OID 0)
-- Dependencies: 216
-- Name: recipe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recipe_id_seq', 1, false);


-- Completed on 2022-06-23 16:09:56

--
-- PostgreSQL database dump complete
--

