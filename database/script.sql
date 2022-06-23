PGDMP         !                z         	   ecommerce    13.1    14.1 0    	           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            
           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    75141 	   ecommerce    DATABASE     e   CREATE DATABASE ecommerce WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'French_France.1252';
    DROP DATABASE ecommerce;
                postgres    false            �            1259    75144    admin    TABLE     �   CREATE TABLE public.admin (
    id bigint NOT NULL,
    login character varying(255) NOT NULL,
    password character varying(255) NOT NULL
);
    DROP TABLE public.admin;
       public         heap    root    false            �            1259    75142    admin_id_seq    SEQUENCE     u   CREATE SEQUENCE public.admin_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.admin_id_seq;
       public          root    false    201                       0    0    admin_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.admin_id_seq OWNED BY public.admin.id;
          public          root    false    200            �            1259    75169    brand    TABLE     a   CREATE TABLE public.brand (
    id integer NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.brand;
       public         heap    root    false            �            1259    75167    brand_id_seq    SEQUENCE     �   CREATE SEQUENCE public.brand_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.brand_id_seq;
       public          root    false    205                       0    0    brand_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.brand_id_seq OWNED BY public.brand.id;
          public          root    false    204            �            1259    75201    customer    TABLE     �   CREATE TABLE public.customer (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    money numeric(10,3) NOT NULL,
    password character varying(256)
);
    DROP TABLE public.customer;
       public         heap    root    false            �            1259    75199    customer_id_seq    SEQUENCE     �   CREATE SEQUENCE public.customer_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.customer_id_seq;
       public          root    false    208                       0    0    customer_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.customer_id_seq OWNED BY public.customer.id;
          public          root    false    207            �            1259    75212    order    TABLE     s   CREATE TABLE public."order" (
    id integer NOT NULL,
    date date NOT NULL,
    customer_id integer NOT NULL
);
    DROP TABLE public."order";
       public         heap    root    false            �            1259    75243    order_details    TABLE     �   CREATE TABLE public.order_details (
    id integer NOT NULL,
    product_id integer NOT NULL,
    order_id integer NOT NULL,
    unit_price numeric(10,3) NOT NULL,
    nb numeric(5,0) NOT NULL
);
 !   DROP TABLE public.order_details;
       public         heap    root    false            �            1259    75241    order_details_id_seq    SEQUENCE     �   CREATE SEQUENCE public.order_details_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.order_details_id_seq;
       public          root    false    212                       0    0    order_details_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.order_details_id_seq OWNED BY public.order_details.id;
          public          root    false    211            �            1259    75210    order_id_seq    SEQUENCE     �   CREATE SEQUENCE public.order_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.order_id_seq;
       public          root    false    210                       0    0    order_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.order_id_seq OWNED BY public."order".id;
          public          root    false    209            �            1259    75155    product    TABLE     �   CREATE TABLE public.product (
    id bigint NOT NULL,
    name character varying(300) NOT NULL,
    price numeric(10,2) NOT NULL,
    description text NOT NULL,
    nb numeric(7,0) NOT NULL,
    brand integer NOT NULL
);
    DROP TABLE public.product;
       public         heap    root    false            �            1259    75190    product_details    VIEW     �   CREATE VIEW public.product_details AS
 SELECT p.id,
    p.name,
    p.price,
    p.description,
    p.nb,
    brand.name AS brand
   FROM (public.product p
     JOIN public.brand ON ((p.brand = brand.id)));
 "   DROP VIEW public.product_details;
       public          root    false    205    205    203    203    203    203    203    203            �            1259    75153    product_id_seq    SEQUENCE     w   CREATE SEQUENCE public.product_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.product_id_seq;
       public          root    false    203                       0    0    product_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.product_id_seq OWNED BY public.product.id;
          public          root    false    202            �            1259    75265    recharge    TABLE     �   CREATE TABLE public.recharge (
    id integer NOT NULL,
    customer_id integer NOT NULL,
    amount numeric(10,3) NOT NULL,
    is_valid boolean NOT NULL
);
    DROP TABLE public.recharge;
       public         heap    root    false            �            1259    75282    recharge_details    VIEW     �   CREATE VIEW public.recharge_details AS
 SELECT r.id,
    r.customer_id,
    c.name AS customer_name,
    r.amount,
    r.is_valid
   FROM (public.recharge r
     JOIN public.customer c ON ((r.customer_id = c.id)));
 #   DROP VIEW public.recharge_details;
       public          root    false    214    214    214    214    208    208            �            1259    75263    recharge_id_seq    SEQUENCE     �   CREATE SEQUENCE public.recharge_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.recharge_id_seq;
       public          root    false    214                       0    0    recharge_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.recharge_id_seq OWNED BY public.recharge.id;
          public          root    false    213            Q           2604    75147    admin id    DEFAULT     d   ALTER TABLE ONLY public.admin ALTER COLUMN id SET DEFAULT nextval('public.admin_id_seq'::regclass);
 7   ALTER TABLE public.admin ALTER COLUMN id DROP DEFAULT;
       public          root    false    200    201    201            S           2604    75172    brand id    DEFAULT     d   ALTER TABLE ONLY public.brand ALTER COLUMN id SET DEFAULT nextval('public.brand_id_seq'::regclass);
 7   ALTER TABLE public.brand ALTER COLUMN id DROP DEFAULT;
       public          root    false    205    204    205            T           2604    75204    customer id    DEFAULT     j   ALTER TABLE ONLY public.customer ALTER COLUMN id SET DEFAULT nextval('public.customer_id_seq'::regclass);
 :   ALTER TABLE public.customer ALTER COLUMN id DROP DEFAULT;
       public          root    false    207    208    208            U           2604    75215    order id    DEFAULT     f   ALTER TABLE ONLY public."order" ALTER COLUMN id SET DEFAULT nextval('public.order_id_seq'::regclass);
 9   ALTER TABLE public."order" ALTER COLUMN id DROP DEFAULT;
       public          root    false    210    209    210            V           2604    75246    order_details id    DEFAULT     t   ALTER TABLE ONLY public.order_details ALTER COLUMN id SET DEFAULT nextval('public.order_details_id_seq'::regclass);
 ?   ALTER TABLE public.order_details ALTER COLUMN id DROP DEFAULT;
       public          root    false    212    211    212            R           2604    75158 
   product id    DEFAULT     h   ALTER TABLE ONLY public.product ALTER COLUMN id SET DEFAULT nextval('public.product_id_seq'::regclass);
 9   ALTER TABLE public.product ALTER COLUMN id DROP DEFAULT;
       public          root    false    202    203    203            W           2604    75268    recharge id    DEFAULT     j   ALTER TABLE ONLY public.recharge ALTER COLUMN id SET DEFAULT nextval('public.recharge_id_seq'::regclass);
 :   ALTER TABLE public.recharge ALTER COLUMN id DROP DEFAULT;
       public          root    false    213    214    214            �          0    75144    admin 
   TABLE DATA                 public          root    false    201   r/       �          0    75169    brand 
   TABLE DATA                 public          root    false    205   �/                  0    75201    customer 
   TABLE DATA                 public          root    false    208   40                 0    75212    order 
   TABLE DATA                 public          root    false    210   �0                 0    75243    order_details 
   TABLE DATA                 public          root    false    212   X1       �          0    75155    product 
   TABLE DATA                 public          root    false    203   2                 0    75265    recharge 
   TABLE DATA                 public          root    false    214   �2                  0    0    admin_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.admin_id_seq', 1, true);
          public          root    false    200                       0    0    brand_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.brand_id_seq', 2, true);
          public          root    false    204                       0    0    customer_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.customer_id_seq', 4, true);
          public          root    false    207                       0    0    order_details_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.order_details_id_seq', 8, true);
          public          root    false    211                       0    0    order_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.order_id_seq', 13, true);
          public          root    false    209                       0    0    product_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.product_id_seq', 2010, true);
          public          root    false    202                       0    0    recharge_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.recharge_id_seq', 7, true);
          public          root    false    213            �   L   x���v
Q���W((M��L�KL���S��L�Q��O���Q(H,..�/J�Ts�	uV�0�QP�S�34���� ���      �   V   x���v
Q���W((M��L�K*J�KQ��L�Q�K�M�Ts�	uV�0�QPw��,.��S״��$A�Pk@b	PojQf*H7 6$J          w   x���v
Q���W((M��L�K.-.��M-R��L�Q�K�M�QH�M���Q���K��Q(H,..�/J�Ts�	uV�0�QPJLJU�E@�!�A/9?(b�g`` �0426Q״��� ��"�         �   x���v
Q���W((M��L�S�/JI-RR��L�QHI,I�QH.-.��M-��L�Ts�	uV�0�QP7202�50�52R�Q0Ѵ��$�<#*�gLe�L�l�)��3��y�T6ς��YR�<CjH�bH�,b��G��rq �p"�         �   x��ѱ
�0��ݧ�Q!H.�j���A(��*�q�J��_cJ|��r���+��x4PV���3�.���M��孇/�Z1�ͤ�ni�����zig�������u�=�Bd 8� g��������ر�a��D��eH_��2<ʨ��bv��-4wVBd�����PІe�d�8UY�(��f��`'      �   �   x����
�0D�����B���ĕH����ڧi��A����VA��®2��̹�lNOd����+%��ۢ�BU0�K畤�(k�k�5t�3�^�"�m���g�	���V�F�&|����Y�K�)*��8Zٟ�Y�Q(�E$�4�Ee}��\�j|n|�O�d �9�m��ʟ>��,��~Uty6H���[U��{�������ד�� ��N�(         �   x���v
Q���W((M��L�+JM�H,JOU��L�QH.-.��M-�qs�K�Jt2���s2S4�}B]�4�tL��P���@G���4UӚ˓J��74���&�i�rS��&41�l���ML7��n�j: �;��     