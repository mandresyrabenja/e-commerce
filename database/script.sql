--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 14.1

-- Started on 2022-06-24 01:53:05

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
-- TOC entry 3143 (class 1262 OID 75141)
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
-- TOC entry 3119 (class 0 OID 75144)
-- Dependencies: 201
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.admin (id, login, password) VALUES (1, 'admin', 'admin');


--
-- TOC entry 3123 (class 0 OID 75169)
-- Dependencies: 205
-- Data for Name: brand; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.brand (id, name) VALUES (3, 'Legume');
INSERT INTO public.brand (id, name) VALUES (4, 'Viande');
INSERT INTO public.brand (id, name) VALUES (5, 'Huile');


--
-- TOC entry 3125 (class 0 OID 75201)
-- Dependencies: 207
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.customer (id, name, email, money, password) VALUES (4, 'Rabe', 'rabe@gmail.com', 9479507.000, '1234');


--
-- TOC entry 3127 (class 0 OID 75212)
-- Dependencies: 209
-- Data for Name: order; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public."order" (id, date, customer_id) VALUES (14, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (15, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (16, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (17, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (18, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (19, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (20, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (21, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (22, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (23, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (24, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (25, '2022-06-23', 4);
INSERT INTO public."order" (id, date, customer_id) VALUES (26, '2022-06-23', 4);


--
-- TOC entry 3129 (class 0 OID 75243)
-- Dependencies: 211
-- Data for Name: order_details; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (9, 2012, 14, 2000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (10, 2013, 14, 2500.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (11, 2014, 14, 3000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (12, 2011, 15, 10000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (13, 2015, 15, 12000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (14, 2012, 16, 2000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (15, 2011, 16, 10000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (16, 2012, 16, 2000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (17, 2013, 16, 2500.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (18, 2014, 16, 3000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (19, 2011, 16, 10000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (20, 2011, 17, 10000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (21, 2011, 18, 10000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (22, 2015, 18, 12000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (23, 2012, 18, 2000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (24, 2013, 18, 2500.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (25, 2014, 18, 3000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (26, 2011, 18, 10000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (27, 2013, 19, 2500.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (28, 2011, 19, 10000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (29, 2011, 20, 10000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (30, 2012, 20, 2000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (31, 2013, 20, 2500.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (32, 2014, 20, 3000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (33, 2011, 21, 10000.000, 4);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (34, 2012, 21, 2000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (35, 2013, 21, 2500.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (36, 2014, 21, 3000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (37, 2012, 22, 2000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (38, 2015, 22, 12000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (39, 2012, 23, 2000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (40, 2013, 23, 2500.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (41, 2015, 23, 12000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (42, 2011, 24, 10000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (43, 2012, 24, 2000.000, 3);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (44, 2013, 24, 2500.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (45, 2014, 24, 3000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (46, 2015, 24, 12000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (47, 2011, 25, 10000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (48, 2012, 25, 2000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (49, 2013, 25, 2500.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (50, 2014, 25, 3000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (51, 2015, 25, 12000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (52, 2011, 26, 10000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (53, 2012, 26, 2000.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (54, 2013, 26, 2500.000, 2);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (55, 2014, 26, 3000.000, 1);
INSERT INTO public.order_details (id, product_id, order_id, unit_price, nb) VALUES (56, 2015, 26, 12000.000, 1);


--
-- TOC entry 3137 (class 0 OID 75342)
-- Dependencies: 222
-- Data for Name: order_recipe; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.order_recipe (id, recipe_id, date, nb) VALUES (5, 6, '2022-06-23', 2);
INSERT INTO public.order_recipe (id, recipe_id, date, nb) VALUES (6, 7, '2022-06-23', 1);


--
-- TOC entry 3121 (class 0 OID 75155)
-- Dependencies: 203
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2011, 'Tongotromby', 10000.00, 'Tongotr''omby 1 kilao', 8, 4, 'g', 1000.0);
INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2012, 'Pomme de terre', 2000.00, 'Ovy Ovy Ovy Ovy Ovy ', 4, 3, 'g', 500.0);
INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2013, 'Carotte', 2500.00, 'Karaoty Karaoty Karaoty Karaoty Karaoty Karaoty ', 8, 3, 'g', 500.0);
INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2014, 'Poireau', 3000.00, 'Zavamaintso Zavamaintso Zavamaintso Zavamaintso Zavamaintso ', 14, 3, 'g', 200.0);
INSERT INTO public.product (id, name, price, description, nb, brand, unit, quantity) VALUES (2015, 'Huile tournesol 1L', 12000.00, 'Menaka Menaka Menaka Menaka Menaka Menaka ', 15, 5, 'ml', 1000.0);


--
-- TOC entry 3131 (class 0 OID 75265)
-- Dependencies: 213
-- Data for Name: recharge; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (2, 4, 41.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (3, 4, 12.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (4, 4, 11.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (5, 4, 14.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (6, 4, 280.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (7, 4, 210.000, true);
INSERT INTO public.recharge (id, customer_id, amount, is_valid) VALUES (8, 4, 10000000.000, true);


--
-- TOC entry 3133 (class 0 OID 75288)
-- Dependencies: 215
-- Data for Name: recipe; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.recipe (id, name) VALUES (6, 'Lasopy tongotr''omby');
INSERT INTO public.recipe (id, name) VALUES (7, 'Lasopy silamangany');


--
-- TOC entry 3135 (class 0 OID 75300)
-- Dependencies: 217
-- Data for Name: recipe_details; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.recipe_details (id, quantity, recipe_id, product_id) VALUES (7, 1000.0, 6, 2011);
INSERT INTO public.recipe_details (id, quantity, recipe_id, product_id) VALUES (8, 300.0, 6, 2012);
INSERT INTO public.recipe_details (id, quantity, recipe_id, product_id) VALUES (9, 300.0, 6, 2013);
INSERT INTO public.recipe_details (id, quantity, recipe_id, product_id) VALUES (10, 100.0, 6, 2014);
INSERT INTO public.recipe_details (id, quantity, recipe_id, product_id) VALUES (11, 400.0, 7, 2012);
INSERT INTO public.recipe_details (id, quantity, recipe_id, product_id) VALUES (12, 100.0, 7, 2013);
INSERT INTO public.recipe_details (id, quantity, recipe_id, product_id) VALUES (13, 200.0, 7, 2015);


--
-- TOC entry 3154 (class 0 OID 0)
-- Dependencies: 200
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_seq', 1, true);


--
-- TOC entry 3155 (class 0 OID 0)
-- Dependencies: 204
-- Name: brand_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.brand_id_seq', 5, true);


--
-- TOC entry 3156 (class 0 OID 0)
-- Dependencies: 206
-- Name: customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.customer_id_seq', 4, true);


--
-- TOC entry 3157 (class 0 OID 0)
-- Dependencies: 210
-- Name: order_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.order_details_id_seq', 56, true);


--
-- TOC entry 3158 (class 0 OID 0)
-- Dependencies: 208
-- Name: order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.order_id_seq', 26, true);


--
-- TOC entry 3159 (class 0 OID 0)
-- Dependencies: 221
-- Name: order_recipe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.order_recipe_id_seq', 6, true);


--
-- TOC entry 3160 (class 0 OID 0)
-- Dependencies: 202
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.product_id_seq', 2015, true);


--
-- TOC entry 3161 (class 0 OID 0)
-- Dependencies: 212
-- Name: recharge_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recharge_id_seq', 9, true);


--
-- TOC entry 3162 (class 0 OID 0)
-- Dependencies: 216
-- Name: recipe_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recipe_details_id_seq', 13, true);


--
-- TOC entry 3163 (class 0 OID 0)
-- Dependencies: 214
-- Name: recipe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.recipe_id_seq', 7, true);


-- Completed on 2022-06-24 01:53:06

--
-- PostgreSQL database dump complete
--

