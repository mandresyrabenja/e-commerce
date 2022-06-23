--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 14.1

-- Started on 2022-06-23 19:38:11

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
-- TOC entry 3119 (class 1262 OID 75141)
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
-- TOC entry 3097 (class 0 OID 75144)
-- Dependencies: 201
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.admin (id, login, password) VALUES (1, 'admin', 'admin');


--
-- TOC entry 3101 (class 0 OID 75169)
-- Dependencies: 205
-- Data for Name: brand; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.brand (id, name) VALUES (3, 'Legume');
INSERT INTO public.brand (id, name) VALUES (4, 'Viande');
INSERT INTO public.brand (id, name) VALUES (5, 'Huile');


--
-- TOC entry 3103 (class 0 OID 75201)
-- Dependencies: 207
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.customer (id, name, email, money, password) VALUES (4, 'Rabe', 'rabe@gmail.com', 7.000, '1234');


--
-- TOC entry 3105 (class 0 OID 75212)
-- Dependencies: 209
-- Data for Name: order; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3107 (class 0 OID 75243)
-- Dependencies: 211
-- Data for Name: order_details; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3099 (class 0 OID 75155)
-- Dependencies: 203
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2011, 'Tongotromby', 10000.00, 'Tongotr''omby 1 kilao', 20, 4, 'g', 1000.0);
INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2012, 'Pomme de terre', 2000.00, 'Ovy Ovy Ovy Ovy Ovy ', 11, 3, 'g', 500.0);
INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2013, 'Carotte', 2500.00, 'Karaoty Karaoty Karaoty Karaoty Karaoty Karaoty ', 15, 3, 'g', 500.0);
INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2014, 'Poireau', 3000.00, 'Zavamaintso Zavamaintso Zavamaintso Zavamaintso Zavamaintso ', 8, 3, 'g', 200.0);
INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2015, 'Huile tournesol 1L', 12000.00, 'Menaka Menaka Menaka Menaka Menaka Menaka ', 4, 5, 'ml', 1000.0);


--
-- TOC entry 3109 (class 0 OID 75265)
-- Dependencies: 213
-- Data for Name: recharge; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (2, 4, 41.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (3, 4, 12.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (4, 4, 11.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (5, 4, 14.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (6, 4, 280.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (7, 4, 210.000, true);


--
-- TOC entry 3111 (class 0 OID 75288)
-- Dependencies: 216
-- Data for Name: recipe; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.recipe (id, name) VALUES (2, 'ab');
INSERT INTO public.recipe (id, name) VALUES (3, 'abb');
INSERT INTO public.recipe (id, name) VALUES (4, 'a');


--
-- TOC entry 3113 (class 0 OID 75300)
-- Dependencies: 218
-- Data for Name: recipe_details; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.recipe_details (id, quantity, recipe_id, product_id) VALUES (1, 100.0, 2, 2015);


--
-- TOC entry 3129 (class 0 OID 0)
-- Dependencies: 200
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_seq', 1, true);


--
-- TOC entry 3130 (class 0 OID 0)
-- Dependencies: 204
-- Name: brand_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.brand_id_seq', 5, true);


--
-- TOC entry 3131 (class 0 OID 0)
-- Dependencies: 206
-- Name: customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.customer_id_seq', 4, true);


--
-- TOC entry 3132 (class 0 OID 0)
-- Dependencies: 210
-- Name: order_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.order_details_id_seq', 8, true);


--
-- TOC entry 3133 (class 0 OID 0)
-- Dependencies: 208
-- Name: order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.order_id_seq', 13, true);


--
-- TOC entry 3134 (class 0 OID 0)
-- Dependencies: 202
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.product_id_seq', 2015, true);


--
-- TOC entry 3135 (class 0 OID 0)
-- Dependencies: 212
-- Name: recharge_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recharge_id_seq', 7, true);


--
-- TOC entry 3136 (class 0 OID 0)
-- Dependencies: 217
-- Name: recipe_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recipe_details_id_seq', 1, true);


--
-- TOC entry 3137 (class 0 OID 0)
-- Dependencies: 215
-- Name: recipe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recipe_id_seq', 4, true);


-- Completed on 2022-06-23 19:38:11

--
-- PostgreSQL database dump complete
--

