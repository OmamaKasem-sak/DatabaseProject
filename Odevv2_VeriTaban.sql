--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

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
-- Name: Odevv2; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "Odevv2" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Arabic_Algeria.1252';


ALTER DATABASE "Odevv2" OWNER TO postgres;

\connect "Odevv2"

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
-- Name: addcountry(character varying); Type: PROCEDURE; Schema: public; Owner: postgres
--

CREATE PROCEDURE public.addcountry(countryname character varying)
    LANGUAGE sql
    AS $$
insert into public."Country"("Title") values (countryname);
$$;


ALTER PROCEDURE public.addcountry(countryname character varying) OWNER TO postgres;

--
-- Name: adddepartment(character varying); Type: PROCEDURE; Schema: public; Owner: postgres
--

CREATE PROCEDURE public.adddepartment(departmentname character varying)
    LANGUAGE sql
    AS $$
insert into public."Department"("Title") values (departmentName);
$$;


ALTER PROCEDURE public.adddepartment(departmentname character varying) OWNER TO postgres;

--
-- Name: getdepartment(character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.getdepartment(departmentname character varying) RETURNS TABLE(idcolumn integer, namecolumn character varying)
    LANGUAGE plpgsql
    AS $$
begin
    return query
    select public."Department"."DepartmentID", public."Department"."Title" from public."Department" where public."Department"."Title" like departmentname;
END;
$$;


ALTER FUNCTION public.getdepartment(departmentname character varying) OWNER TO postgres;

--
-- Name: getpersonalinfo(character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.getpersonalinfo(personalname character varying) RETURNS TABLE(idcolumn integer, namecolumn character varying)
    LANGUAGE plpgsql
    AS $$
begin
    return query
    select public."PersonalInfo"."PersonalInfoID", public."PersonalInfo"."Fullname" from public."PersonalInfo" where public."PersonalInfo"."Fullname" like personalname;
END;
$$;


ALTER FUNCTION public.getpersonalinfo(personalname character varying) OWNER TO postgres;

--
-- Name: pageekle(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.pageekle() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 NEW."Title" = UPPER(NEW."Title");
 
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.pageekle() OWNER TO postgres;

--
-- Name: personalinfo(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.personalinfo() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN update public."TotalPersonalInfo" set "TotalPersonalInfo"="TotalPersonalInfo"+1;
return new;
end;
$$;


ALTER FUNCTION public.personalinfo() OWNER TO postgres;

--
-- Name: personalinfodesc(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.personalinfodesc() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN update public."TotalPersonalInfo" set "TotalPersonalInfo"="TotalPersonalInfo"-1;
return new;
end;
$$;


ALTER FUNCTION public.personalinfodesc() OWNER TO postgres;

--
-- Name: totalmessage(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.totalmessage() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN update public."TotalMessage" set "TotalMessage"="TotalMessage"+1;
return new;
end;
$$;


ALTER FUNCTION public.totalmessage() OWNER TO postgres;

--
-- Name: totalmessagedesc(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.totalmessagedesc() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN update public."TotalMessage" set "TotalMessage"="TotalMessage"-1;
return new;
end;
$$;


ALTER FUNCTION public.totalmessagedesc() OWNER TO postgres;

--
-- Name: userekle(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.userekle() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 NEW."FullName" = UPPER(NEW."FullName");
 
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.userekle() OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: Admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Admin" (
    "AdminID" integer NOT NULL,
    "UserID" integer
);


ALTER TABLE public."Admin" OWNER TO postgres;

--
-- Name: Admin_AdminID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Admin_AdminID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Admin_AdminID_seq" OWNER TO postgres;

--
-- Name: Admin_AdminID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Admin_AdminID_seq" OWNED BY public."Admin"."AdminID";


--
-- Name: Category; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Category" (
    "CategoryID" integer NOT NULL,
    "Title" character varying
);


ALTER TABLE public."Category" OWNER TO postgres;

--
-- Name: Category_CategoryID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Category_CategoryID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Category_CategoryID_seq" OWNER TO postgres;

--
-- Name: Category_CategoryID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Category_CategoryID_seq" OWNED BY public."Category"."CategoryID";


--
-- Name: City; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."City" (
    "CityID" integer NOT NULL,
    "CountryID" integer,
    "Title" character varying
);


ALTER TABLE public."City" OWNER TO postgres;

--
-- Name: City_CityID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."City_CityID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."City_CityID_seq" OWNER TO postgres;

--
-- Name: City_CityID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."City_CityID_seq" OWNED BY public."City"."CityID";


--
-- Name: Country; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Country" (
    "CountryID" integer NOT NULL,
    "Title" character varying
);


ALTER TABLE public."Country" OWNER TO postgres;

--
-- Name: Country_CountryID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Country_CountryID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Country_CountryID_seq" OWNER TO postgres;

--
-- Name: Country_CountryID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Country_CountryID_seq" OWNED BY public."Country"."CountryID";


--
-- Name: Department; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Department" (
    "DepartmentID" integer NOT NULL,
    "Title" character varying
);


ALTER TABLE public."Department" OWNER TO postgres;

--
-- Name: Departments_DepartmentID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Departments_DepartmentID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Departments_DepartmentID_seq" OWNER TO postgres;

--
-- Name: Departments_DepartmentID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Departments_DepartmentID_seq" OWNED BY public."Department"."DepartmentID";


--
-- Name: District; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."District" (
    "DistrictID" integer NOT NULL,
    "CityID" integer,
    "Title" character varying
);


ALTER TABLE public."District" OWNER TO postgres;

--
-- Name: District_DistrictID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."District_DistrictID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."District_DistrictID_seq" OWNER TO postgres;

--
-- Name: District_DistrictID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."District_DistrictID_seq" OWNED BY public."District"."DistrictID";


--
-- Name: Education; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Education" (
    "EducationID" integer NOT NULL,
    "School" character varying,
    "Level" character varying,
    "StartDate" integer,
    "EndDate" integer
);


ALTER TABLE public."Education" OWNER TO postgres;

--
-- Name: EducationPersonalInfo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."EducationPersonalInfo" (
    "EducationPersonalInfoID" integer NOT NULL,
    "PersonalInfoID" integer,
    "EducationID" integer
);


ALTER TABLE public."EducationPersonalInfo" OWNER TO postgres;

--
-- Name: EducationPersonalInfo_EducationPersonalInfoID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."EducationPersonalInfo_EducationPersonalInfoID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."EducationPersonalInfo_EducationPersonalInfoID_seq" OWNER TO postgres;

--
-- Name: EducationPersonalInfo_EducationPersonalInfoID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."EducationPersonalInfo_EducationPersonalInfoID_seq" OWNED BY public."EducationPersonalInfo"."EducationPersonalInfoID";


--
-- Name: SocialMediaPersonalInfo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."SocialMediaPersonalInfo" (
    "SocialMediaPersonalInfoID" integer NOT NULL,
    "PersonalInfoID" integer,
    "SocialMediaID" integer
);


ALTER TABLE public."SocialMediaPersonalInfo" OWNER TO postgres;

--
-- Name: EducationSocialMedia_EducationSocialMediaID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."EducationSocialMedia_EducationSocialMediaID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."EducationSocialMedia_EducationSocialMediaID_seq" OWNER TO postgres;

--
-- Name: EducationSocialMedia_EducationSocialMediaID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."EducationSocialMedia_EducationSocialMediaID_seq" OWNED BY public."SocialMediaPersonalInfo"."SocialMediaPersonalInfoID";


--
-- Name: Education_EducationID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Education_EducationID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Education_EducationID_seq" OWNER TO postgres;

--
-- Name: Education_EducationID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Education_EducationID_seq" OWNED BY public."Education"."EducationID";


--
-- Name: Menu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Menu" (
    "MenuID" integer NOT NULL,
    "Title" character varying,
    "Order" integer,
    "Url" character varying
);


ALTER TABLE public."Menu" OWNER TO postgres;

--
-- Name: Menu_MenuID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Menu_MenuID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Menu_MenuID_seq" OWNER TO postgres;

--
-- Name: Menu_MenuID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Menu_MenuID_seq" OWNED BY public."Menu"."MenuID";


--
-- Name: Message; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Message" (
    "MessagesID" integer NOT NULL,
    "DepartmentID" integer,
    "FirstName" character varying,
    "LastName" character varying,
    "PhoneNumber" bigint,
    "Email" character varying,
    "Gender" boolean,
    "MessagesBox" text
);


ALTER TABLE public."Message" OWNER TO postgres;

--
-- Name: Messages_MessagesID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Messages_MessagesID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Messages_MessagesID_seq" OWNER TO postgres;

--
-- Name: Messages_MessagesID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Messages_MessagesID_seq" OWNED BY public."Message"."MessagesID";


--
-- Name: Page; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Page" (
    "PageID" integer NOT NULL,
    "CategoryID" integer,
    "Title" character varying,
    "Content" text,
    "Url" character varying,
    "Keyword" character varying,
    "Date" timestamp without time zone
);


ALTER TABLE public."Page" OWNER TO postgres;

--
-- Name: Page_PageID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Page_PageID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Page_PageID_seq" OWNER TO postgres;

--
-- Name: Page_PageID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Page_PageID_seq" OWNED BY public."Page"."PageID";


--
-- Name: PersonalInfo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."PersonalInfo" (
    "PersonalInfoID" integer NOT NULL,
    "Fullname" character varying,
    "Age" integer,
    "Department" character varying,
    "Country" character varying,
    "Hobby" character varying,
    "FavoriteSpor" character varying,
    "School" character varying
);


ALTER TABLE public."PersonalInfo" OWNER TO postgres;

--
-- Name: PersonalInfo_PersonalInfoID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."PersonalInfo_PersonalInfoID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."PersonalInfo_PersonalInfoID_seq" OWNER TO postgres;

--
-- Name: PersonalInfo_PersonalInfoID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."PersonalInfo_PersonalInfoID_seq" OWNED BY public."PersonalInfo"."PersonalInfoID";


--
-- Name: Setting; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Setting" (
    "SettingID" integer NOT NULL,
    "Url" character varying,
    "Description" character varying,
    "Logo" character varying,
    "Footer" character varying,
    "Email" character varying,
    "Adress" character varying
);


ALTER TABLE public."Setting" OWNER TO postgres;

--
-- Name: Setting_SettingID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Setting_SettingID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Setting_SettingID_seq" OWNER TO postgres;

--
-- Name: Setting_SettingID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Setting_SettingID_seq" OWNED BY public."Setting"."SettingID";


--
-- Name: Slider; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Slider" (
    "SliderID" integer NOT NULL,
    "Title" character varying,
    "Url" character varying,
    "Description" character varying,
    "Order" integer
);


ALTER TABLE public."Slider" OWNER TO postgres;

--
-- Name: Slider_SliderID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Slider_SliderID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Slider_SliderID_seq" OWNER TO postgres;

--
-- Name: Slider_SliderID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Slider_SliderID_seq" OWNED BY public."Slider"."SliderID";


--
-- Name: SocialMedia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."SocialMedia" (
    "SocialMediaID" integer NOT NULL,
    "Title" character varying,
    "Url" character varying,
    "Class" character varying
);


ALTER TABLE public."SocialMedia" OWNER TO postgres;

--
-- Name: SocialMedia_SocialMediaID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."SocialMedia_SocialMediaID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."SocialMedia_SocialMediaID_seq" OWNER TO postgres;

--
-- Name: SocialMedia_SocialMediaID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."SocialMedia_SocialMediaID_seq" OWNED BY public."SocialMedia"."SocialMediaID";


--
-- Name: SubMenu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."SubMenu" (
    "SubMenuID" integer NOT NULL,
    "MenuID" integer,
    "Title" character varying,
    "Order" integer
);


ALTER TABLE public."SubMenu" OWNER TO postgres;

--
-- Name: SubMenu_SubMenuID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."SubMenu_SubMenuID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."SubMenu_SubMenuID_seq" OWNER TO postgres;

--
-- Name: SubMenu_SubMenuID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."SubMenu_SubMenuID_seq" OWNED BY public."SubMenu"."SubMenuID";


--
-- Name: TotalMessage; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TotalMessage" (
    "TotalMessage" integer
);


ALTER TABLE public."TotalMessage" OWNER TO postgres;

--
-- Name: TotalPersonalInfo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TotalPersonalInfo" (
    "TotalPersonalInfo" integer NOT NULL
);


ALTER TABLE public."TotalPersonalInfo" OWNER TO postgres;

--
-- Name: User; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."User" (
    "UserID" integer NOT NULL,
    "Username" character varying,
    "Password" character varying,
    "FullName" character varying,
    "Email" character varying
);


ALTER TABLE public."User" OWNER TO postgres;

--
-- Name: User_UserID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."User_UserID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."User_UserID_seq" OWNER TO postgres;

--
-- Name: User_UserID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."User_UserID_seq" OWNED BY public."User"."UserID";


--
-- Name: Admin AdminID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Admin" ALTER COLUMN "AdminID" SET DEFAULT nextval('public."Admin_AdminID_seq"'::regclass);


--
-- Name: Category CategoryID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Category" ALTER COLUMN "CategoryID" SET DEFAULT nextval('public."Category_CategoryID_seq"'::regclass);


--
-- Name: City CityID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."City" ALTER COLUMN "CityID" SET DEFAULT nextval('public."City_CityID_seq"'::regclass);


--
-- Name: Country CountryID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Country" ALTER COLUMN "CountryID" SET DEFAULT nextval('public."Country_CountryID_seq"'::regclass);


--
-- Name: Department DepartmentID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Department" ALTER COLUMN "DepartmentID" SET DEFAULT nextval('public."Departments_DepartmentID_seq"'::regclass);


--
-- Name: District DistrictID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."District" ALTER COLUMN "DistrictID" SET DEFAULT nextval('public."District_DistrictID_seq"'::regclass);


--
-- Name: Education EducationID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Education" ALTER COLUMN "EducationID" SET DEFAULT nextval('public."Education_EducationID_seq"'::regclass);


--
-- Name: EducationPersonalInfo EducationPersonalInfoID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."EducationPersonalInfo" ALTER COLUMN "EducationPersonalInfoID" SET DEFAULT nextval('public."EducationPersonalInfo_EducationPersonalInfoID_seq"'::regclass);


--
-- Name: Menu MenuID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Menu" ALTER COLUMN "MenuID" SET DEFAULT nextval('public."Menu_MenuID_seq"'::regclass);


--
-- Name: Message MessagesID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Message" ALTER COLUMN "MessagesID" SET DEFAULT nextval('public."Messages_MessagesID_seq"'::regclass);


--
-- Name: Page PageID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Page" ALTER COLUMN "PageID" SET DEFAULT nextval('public."Page_PageID_seq"'::regclass);


--
-- Name: PersonalInfo PersonalInfoID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."PersonalInfo" ALTER COLUMN "PersonalInfoID" SET DEFAULT nextval('public."PersonalInfo_PersonalInfoID_seq"'::regclass);


--
-- Name: Setting SettingID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Setting" ALTER COLUMN "SettingID" SET DEFAULT nextval('public."Setting_SettingID_seq"'::regclass);


--
-- Name: Slider SliderID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Slider" ALTER COLUMN "SliderID" SET DEFAULT nextval('public."Slider_SliderID_seq"'::regclass);


--
-- Name: SocialMedia SocialMediaID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SocialMedia" ALTER COLUMN "SocialMediaID" SET DEFAULT nextval('public."SocialMedia_SocialMediaID_seq"'::regclass);


--
-- Name: SocialMediaPersonalInfo SocialMediaPersonalInfoID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SocialMediaPersonalInfo" ALTER COLUMN "SocialMediaPersonalInfoID" SET DEFAULT nextval('public."EducationSocialMedia_EducationSocialMediaID_seq"'::regclass);


--
-- Name: SubMenu SubMenuID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SubMenu" ALTER COLUMN "SubMenuID" SET DEFAULT nextval('public."SubMenu_SubMenuID_seq"'::regclass);


--
-- Name: User UserID; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."User" ALTER COLUMN "UserID" SET DEFAULT nextval('public."User_UserID_seq"'::regclass);


--
-- Data for Name: Admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Admin" VALUES
	(3, 8);


--
-- Data for Name: Category; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Category" VALUES
	(1, 'Mirasımız');


--
-- Data for Name: City; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."City" VALUES
	(1, 1, 'İstanbul');


--
-- Data for Name: Country; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Country" VALUES
	(1, 'Türkiye'),
	(2, 'Filistin');


--
-- Data for Name: Department; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Department" VALUES
	(1, 'Bilgisayar Mühendisliği'),
	(4, 'Makine Mühendisliği'),
	(5, 'Makine Mühendisliği'),
	(6, 'Makine Mühendis');


--
-- Data for Name: District; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."District" VALUES
	(1, 1, 'Başakşehir');


--
-- Data for Name: Education; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Education" VALUES
	(4, 'Atma Ortaokulu', 'Lise', 2014, 2016),
	(1, 'Sakarya Üniversitesi - Bilgisayar Mühendisliği', 'Lisans', 2019, 2023),
	(2, 'Gazze İlkokulu', 'İlkokul', 2006, 2011),
	(3, 'Yafa Ortaokulu', 'Ortaokul', 2011, 2014),
	(5, 'Diş Hekimliği', 'Lisans (Terk)', 2016, 2017),
	(6, 'Sabahattin Zaim Üniversitesi - Tömer (Türkçe)', 'Dil Eğitimi', 2017, 2018),
	(7, 'Karabük Üniversitesi - İngilizce Hazırlık', 'Dil Eğitimi', 2018, 2019);


--
-- Data for Name: EducationPersonalInfo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."EducationPersonalInfo" VALUES
	(1, 1, 1);


--
-- Data for Name: Menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Menu" VALUES
	(2, 'Şehrim', 2, 'sehrim.php'),
	(3, 'Mirasımız', 3, 'mirasimiz.php'),
	(4, 'İletişim', 4, 'iletisim.php'),
	(1, 'Anasayfa', 1, 'index.php');


--
-- Data for Name: Message; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Message" VALUES
	(45, 1, 'Omama', 'Kasem', 5301445567, 'omama.kasem@ogr.sakarya.edu.tr', false, 'Selamun aleykum ben mesajım');


--
-- Data for Name: Page; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Page" VALUES
	(1, 1, 'Sultanahmet', 'Sultanahmet aşsdfdfafe', 'localhost.com/mirasimiz/sultanahmet', 'sultanahmet, cami', NULL);


--
-- Data for Name: PersonalInfo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."PersonalInfo" VALUES
	(1, 'Omama Kasem', 21, 'Bilgisayar Mühendisliği', 'Filistin', 'asdqweads', 'Yüzmek ve masa tenisi.', 'Sakarya Üniversitesi');


--
-- Data for Name: Setting; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Setting" VALUES
	(1, 'http://localhost/OmamaWeb/', 'Kişisel tanıtım websitesi', 'logo.jpg', 'Her hakkı saklıdır.', 'omama.kasem@ogr.sakarya.edu.tr', 'Fatih Cad. Mevlana Sok. Fatih/İstanbul');


--
-- Data for Name: Slider; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Slider" VALUES
	(1, 'Kudüs', '1.png', 'En eski şehirlerinden biridir.', 1),
	(2, 'Mescid-i Aksa', '2.jpg', 'Müslümanların ilk kıblesidir.', 2),
	(3, 'Kıble Mescidi', '3.jpg', 'Kubbesi kurşun kaplamadır.', 3),
	(4, 'Esbat Kapısı', '4.jpg', 'Esbat Kapısı ise Mescid-i Aksa’nın en önemli kapılardan biridir.', 4);


--
-- Data for Name: SocialMedia; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."SocialMedia" VALUES
	(3, 'Youtube', 'https://www.youtube.com/channel/UCtd1JyXGsJ0DwylTOO0Dpyg', 'fa fa-youtube'),
	(1, 'İnstagram', 'https://www.instagram.com/omama_qasem', 'fa fa-instagram'),
	(2, 'Facebook', 'https://www.facebook.com/omama.ahmed.7982', 'fa fa-facebook');


--
-- Data for Name: SocialMediaPersonalInfo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."SocialMediaPersonalInfo" VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3);


--
-- Data for Name: SubMenu; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."SubMenu" VALUES
	(1, 1, 'Sultanahmet', 1);


--
-- Data for Name: TotalMessage; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TotalMessage" VALUES
	(1);


--
-- Data for Name: TotalPersonalInfo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TotalPersonalInfo" VALUES
	(1);


--
-- Data for Name: User; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."User" VALUES
	(8, 'omamakasem', '123', 'Omama Kasem', 'b191210568@sakarya.edu.tr');


--
-- Name: Admin_AdminID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Admin_AdminID_seq"', 3, true);


--
-- Name: Category_CategoryID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Category_CategoryID_seq"', 1, true);


--
-- Name: City_CityID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."City_CityID_seq"', 2, true);


--
-- Name: Country_CountryID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Country_CountryID_seq"', 2, true);


--
-- Name: Departments_DepartmentID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Departments_DepartmentID_seq"', 6, true);


--
-- Name: District_DistrictID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."District_DistrictID_seq"', 1, true);


--
-- Name: EducationPersonalInfo_EducationPersonalInfoID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."EducationPersonalInfo_EducationPersonalInfoID_seq"', 1, true);


--
-- Name: EducationSocialMedia_EducationSocialMediaID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."EducationSocialMedia_EducationSocialMediaID_seq"', 3, true);


--
-- Name: Education_EducationID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Education_EducationID_seq"', 10, true);


--
-- Name: Menu_MenuID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Menu_MenuID_seq"', 10, true);


--
-- Name: Messages_MessagesID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Messages_MessagesID_seq"', 56, true);


--
-- Name: Page_PageID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Page_PageID_seq"', 1, true);


--
-- Name: PersonalInfo_PersonalInfoID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."PersonalInfo_PersonalInfoID_seq"', 4, true);


--
-- Name: Setting_SettingID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Setting_SettingID_seq"', 2, true);


--
-- Name: Slider_SliderID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Slider_SliderID_seq"', 4, true);


--
-- Name: SocialMedia_SocialMediaID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."SocialMedia_SocialMediaID_seq"', 5, true);


--
-- Name: SubMenu_SubMenuID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."SubMenu_SubMenuID_seq"', 1, true);


--
-- Name: User_UserID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."User_UserID_seq"', 9, true);


--
-- Name: Admin Admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Admin"
    ADD CONSTRAINT "Admin_pkey" PRIMARY KEY ("AdminID");


--
-- Name: Category Category_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Category"
    ADD CONSTRAINT "Category_pkey" PRIMARY KEY ("CategoryID");


--
-- Name: City City_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."City"
    ADD CONSTRAINT "City_pkey" PRIMARY KEY ("CityID");


--
-- Name: Country Country_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Country"
    ADD CONSTRAINT "Country_pkey" PRIMARY KEY ("CountryID");


--
-- Name: Department Departments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Department"
    ADD CONSTRAINT "Departments_pkey" PRIMARY KEY ("DepartmentID");


--
-- Name: District District_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."District"
    ADD CONSTRAINT "District_pkey" PRIMARY KEY ("DistrictID");


--
-- Name: EducationPersonalInfo EducationPersonalInfo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."EducationPersonalInfo"
    ADD CONSTRAINT "EducationPersonalInfo_pkey" PRIMARY KEY ("EducationPersonalInfoID");


--
-- Name: SocialMediaPersonalInfo EducationSocialMedia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SocialMediaPersonalInfo"
    ADD CONSTRAINT "EducationSocialMedia_pkey" PRIMARY KEY ("SocialMediaPersonalInfoID");


--
-- Name: Education Education_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Education"
    ADD CONSTRAINT "Education_pkey" PRIMARY KEY ("EducationID");


--
-- Name: Menu Menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Menu"
    ADD CONSTRAINT "Menu_pkey" PRIMARY KEY ("MenuID");


--
-- Name: Message Messages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Message"
    ADD CONSTRAINT "Messages_pkey" PRIMARY KEY ("MessagesID");


--
-- Name: Page Page_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Page"
    ADD CONSTRAINT "Page_pkey" PRIMARY KEY ("PageID");


--
-- Name: PersonalInfo PersonalInfo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."PersonalInfo"
    ADD CONSTRAINT "PersonalInfo_pkey" PRIMARY KEY ("PersonalInfoID");


--
-- Name: Setting Setting_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Setting"
    ADD CONSTRAINT "Setting_pkey" PRIMARY KEY ("SettingID");


--
-- Name: Slider Slider_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Slider"
    ADD CONSTRAINT "Slider_pkey" PRIMARY KEY ("SliderID");


--
-- Name: SocialMedia SocialMedia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SocialMedia"
    ADD CONSTRAINT "SocialMedia_pkey" PRIMARY KEY ("SocialMediaID");


--
-- Name: SubMenu SubMenu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SubMenu"
    ADD CONSTRAINT "SubMenu_pkey" PRIMARY KEY ("SubMenuID");


--
-- Name: User User_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."User"
    ADD CONSTRAINT "User_pkey" PRIMARY KEY ("UserID");


--
-- Name: Page  pageEkletrig; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER " pageEkletrig" BEFORE INSERT OR UPDATE ON public."Page" FOR EACH ROW EXECUTE FUNCTION public.pageekle();


--
-- Name: PersonalInfo personalinfodesctrig; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER personalinfodesctrig AFTER DELETE ON public."PersonalInfo" FOR EACH ROW EXECUTE FUNCTION public.personalinfodesc();


--
-- Name: PersonalInfo personalinfotrig; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER personalinfotrig AFTER INSERT ON public."PersonalInfo" FOR EACH ROW EXECUTE FUNCTION public.personalinfo();


--
-- Name: Message totalmessagedesctrig; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER totalmessagedesctrig AFTER DELETE ON public."Message" FOR EACH ROW EXECUTE FUNCTION public.totalmessagedesc();


--
-- Name: Message totalmessagetrig; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER totalmessagetrig AFTER INSERT ON public."Message" FOR EACH ROW EXECUTE FUNCTION public.totalmessage();


--
-- Name: User userEkle; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER "userEkle" BEFORE INSERT OR UPDATE ON public."User" FOR EACH ROW EXECUTE FUNCTION public.userekle();


--
-- Name: Page FK_CategoryPage; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Page"
    ADD CONSTRAINT "FK_CategoryPage" FOREIGN KEY ("CategoryID") REFERENCES public."Category"("CategoryID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: District FK_CityDistrict; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."District"
    ADD CONSTRAINT "FK_CityDistrict" FOREIGN KEY ("CityID") REFERENCES public."City"("CityID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: City FK_CountryCity; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."City"
    ADD CONSTRAINT "FK_CountryCity" FOREIGN KEY ("CountryID") REFERENCES public."Country"("CountryID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Message FK_DepartmentMessage; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Message"
    ADD CONSTRAINT "FK_DepartmentMessage" FOREIGN KEY ("DepartmentID") REFERENCES public."Department"("DepartmentID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: EducationPersonalInfo FK_EducationEducationpersonalinfo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."EducationPersonalInfo"
    ADD CONSTRAINT "FK_EducationEducationpersonalinfo" FOREIGN KEY ("EducationID") REFERENCES public."Education"("EducationID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: SubMenu FK_MenuSubmenu; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SubMenu"
    ADD CONSTRAINT "FK_MenuSubmenu" FOREIGN KEY ("MenuID") REFERENCES public."Menu"("MenuID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: EducationPersonalInfo FK_PersonalinfoEducationpersonalinfo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."EducationPersonalInfo"
    ADD CONSTRAINT "FK_PersonalinfoEducationpersonalinfo" FOREIGN KEY ("PersonalInfoID") REFERENCES public."PersonalInfo"("PersonalInfoID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: SocialMediaPersonalInfo FK_PersonalinfoSocialmediapersonalinfo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SocialMediaPersonalInfo"
    ADD CONSTRAINT "FK_PersonalinfoSocialmediapersonalinfo" FOREIGN KEY ("PersonalInfoID") REFERENCES public."PersonalInfo"("PersonalInfoID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: SocialMediaPersonalInfo FK_SocialMediaSocialMediaPersonalInfo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SocialMediaPersonalInfo"
    ADD CONSTRAINT "FK_SocialMediaSocialMediaPersonalInfo" FOREIGN KEY ("SocialMediaID") REFERENCES public."SocialMedia"("SocialMediaID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Admin FK_UserAdmin; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Admin"
    ADD CONSTRAINT "FK_UserAdmin" FOREIGN KEY ("UserID") REFERENCES public."User"("UserID") MATCH FULL ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

