-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2012 at 07:03 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wadd0032`
--

-- --------------------------------------------------------

--
-- Table structure for table `garden_locations`
--

CREATE TABLE IF NOT EXISTS `garden_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street_address` text COLLATE utf8_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `rate_count` int(11) NOT NULL,
  `rate_total` int(11) NOT NULL,
  `contact` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `garden_locations`
--

INSERT INTO `garden_locations` (`id`, `name`, `street_address`, `longitude`, `latitude`, `rate_count`, `rate_total`, `contact`, `email`, `url`) VALUES
(1, 'Bethany Church Community Garden', '382 Centrepointe Dr.', -75.7734388991705, 45.345499587655, 2, 8, 'Damodharan (Dams) Narayanan, 613-592-8182', 'bethany-community-organic-gardens@googlegroups.com', 'n/a'),
(2, 'Bytown Urban Gardens (BUGs) CG', '75 Glendale Ave.', -75.6988143060323, 45.4050394322286, 1, 3, 'Susan Wellisch, 613-233-4443, x3000', 'bugscoordinator@gmail.com', 'http://www.bugsottawa.ca'),
(3, 'Carlington Community Garden', '900 Merivale Rd.', -75.7346269034471, 45.382842490324, 1, 2, 'Stefano Marconetto, 613-729-0899', 'stefanomarconetto@gmail.com', 'n/a'),
(4, 'Centretown Community Garden', '461 Lisgar St.', -75.7016583295769, 45.415195101353, 2, 6, 'Claire Kaufman', 'ccgardenproject@gmail.com', 'http://ccgardenproject.org'),
(5, 'Chateau Donald Community Garden', '251 Donald St.', -75.6577031103256, 45.4293097723174, 1, 4, 'Lynda Sinn, 613-742-6486', 'n/a', 'n/a'),
(6, 'Children’s Garden', '321 Main St.', -75.6759578122613, 45.406127619525, 1, 3, 'Rebecca Aird, 613-233-6286', 'childrensgarden@sustainablelivingottawaeast.ca', 'www.sustainablelivingottawaeast.ca'),
(7, 'Debra Dynes Family House Community Garden', '955 Debra Ave.', -75.7060251774863, 45.3680604451643, 1, 2, 'Barbara Carroll, 613-224-3824', 'debradynes@on.aibn.com', 'n/a'),
(8, 'Friendship Community Garden', '1240/1244 Donald St.', -75.6361507417946, 45.4273895810549, 2, 6, 'Debra Casey, 613-741-3843', 'debra.casey@eorc-gloucester.ca', 'n/a'),
(9, 'Gloucester Allotment Gardens', 'Corner of Weir and Anderson', -75.5676971825545, 45.420592825487, 1, 2, 'Irene Harrison', 'gaga@ncf.ca', 'n/a'),
(10, 'GO-VEG (Glebe Organic Vegetable Garden) / Corpus-Christi Children’s Garden', '185 Fifth Ave.', -75.6919950762557, 45.4012929697314, 1, 3, 'n/a', 'n/a', 'http://www.cog.ca/GUO-Ottawa/About GOVEG.html'),
(11, 'Go Green Community Garden', '110 Laurier Ave.', -75.6893017438533, 45.4210842738369, 1, 4, 'Glen Noakes, 613-850-4975', 'gogreencommunitygarden@gmail.com', 'n/a'),
(12, 'Jardin Arrowsmith Thyme-Less Community Garden', '2040 Arrowsmith Drive', -75.5953760439295, 45.4385515707265, 2, 5, 'Ruth Torok, 613-824-2986', 'rtorok@sympatico.ca', 'n/a'),
(13, 'Jardin Communautaire Orleans Community Garden', '3350 St Joseph Blvd.', -75.4989466307579, 45.4837565286994, 1, 4, 'Gina Lapointe', 'jcocg@hotmail.com', 'n/a'),
(14, 'Jardin Communautaire Vanier Community Garden', '300 des Peres Blancs.', -75.658575092874, 45.4437362531784, 1, 2, 'Mike Bulthuis, 613-222-9831', 'jardinvaniergarden@gmail.com', 'n/a'),
(15, 'Kilborn Allotment Garden', '1909/1975 Kilborn Ave.', -75.6388368817179, 45.3908440878158, 1, 2, 'Madeleine Brenning, 613-247-4846', 'n/a', 'www.kilborngardens.ca'),
(16, 'Leslie Park Community Garden', '31 Abingdon Dr.', -75.7878754564841, 45.3341129371286, 2, 5, 'Mark Howard, 613-321-1300', 'leslieparkcommunitygarden@gmail.com', 'n/a'),
(17, 'Lowertown/Basseville Community Garden', '40 Cobourg st.', -75.6817654861477, 45.4347668377398, 1, 2, 'Annie Mercier, 613-789-3930 x314', 'amercier@crcbv.ca', 'n/a'),
(18, 'Michele Heights Community Garden', '2955 Michelle Dr.', -75.800576543261, 45.3552345931046, 2, 5, 'Charmaine Moreau, 613-697-3508', 'michele_ht_nw@yahoo.com', 'n/a'),
(19, 'Nanny Goat Hill Community Garden', '575/551 Laurier Ave. West', -75.707485107864, 45.4153043246147, 1, 3, 'Elizabeth Eve, 613-851-1121', 'nangoathillgarden@gmail.com', 'n/a'),
(20, 'Nepean Allotment Garden', '230 Viewmont', -75.7180421437094, 45.3465105482307, 1, 1, 'Mike Chebbo', 'nagagardens@gmail.com', 'n/a'),
(21, 'Operation Go Home Community Garden', '179 Murray St.', -75.6907938739199, 45.4310697631841, 1, 4, 'n/a', 'n/a', 'n/a'),
(22, 'Ottawa East Community Garden', '249/223/175 Main St.', -75.6755847910067, 45.408059625321, 1, 4, 'Ian Detta', 'iandetta@hotmail.com', 'http://ottawaeastcommunitygarden.blogspot.com/'),
(23, 'Rochester Heights Children’s Garden', '299 Rochester St.', -75.708440804817, 45.4045126456476, 1, 2, 'Fauza Mohamed, 613-237-6529', 'fmohamed@swchc.on.ca', 'n/a'),
(24, 'Sandy Hill CG', '3 Hurdman Rd.', -75.6680134788833, 45.4199458444146, 1, 3, 'Trevor Haché, 613-789-0604', 'sandyhillcommunitygarden@gmail.com', 'http://sandyhillcommunitygarden.blogspot.com/'),
(25, 'Somali CG', '1975 Kilborn Ave.', -75.639200787966, 45.3895870241171, 1, 3, 'n/a', 'n/a', 'n/a'),
(26, 'Strathcona Heights Community Garden', '3 Hurdman Rd.', -75.669424051288, 45.4187323045188, 1, 2, 'Alastaire Henderson', 'ej923@freenet.carleton.ca', ''),
(27, 'Sweet Willow Community Garden', '31 Rochester St.', -75.7134104370893, 45.4118448361988, 1, 4, 'Meg McCallum', 'swgcoordinator@gmail.com', 'www.sweetwillowgarden.blogspot.com'),
(28, 'Van Lang CG', '295 Churchill Ave.', -75.7555660409407, 45.3956959360145, 1, 3, 'n/a', 'n/a', 'n/a'),
(29, 'Viscount Alexander CG', '55 Mann Ave.', -75.6747042678713, 45.4202733418521, 1, 2, 'n/a', 'n/a', 'n/a'),
(30, 'West Barrhaven Community Garden', '3058 Jockvale Rd.', -75.757698621139, 45.2710350131028, 1, 3, 'Andrea, 613-825-7512', 'wbcgarden@gmail.com', 'n/a');
