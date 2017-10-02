-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 08:28 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `os_v27`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `name` longtext,
  `phone` longtext,
  `address` longtext,
  `email` longtext,
  `password` longtext,
  `role` varchar(10) DEFAULT NULL,
  `timestamp` varchar(20) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `phone`, `address`, `email`, `password`, `role`, `timestamp`) VALUES
(1, 'Super Duper Admin', '', '', 'chrispmusni@gmail.com', '0ff41c01c06f7737b8b954e2a3126d4e272cd608', '1', '1444918188'),
(4, 'Christopher musni', '+639272445964', '', 'christopher.musni@gmail.com', '74ce06afb96d9256c1aa7d5305bbf691b39827fe', '9', '1444921577');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`banner_id` int(11) NOT NULL,
  `page` longtext,
  `place` longtext,
  `num` longtext,
  `status` longtext,
  `link` longtext
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `page`, `place`, `num`, `status`, `link`) VALUES
(1, 'home', 'after_slider', '1', '0', ''),
(2, 'home', 'after_slider', '2', '0', ''),
(3, 'home', 'after_slider', '3', '0', ''),
(4, 'home', 'after_slider', '4', '0', ''),
(5, 'home', 'after_featured', '1', '0', ''),
(6, 'home', 'after_featured', '2', '0', ''),
(7, 'home', 'after_featured', '3', '0', ''),
(8, 'home', 'after_featured', '4', '0', ''),
(9, 'home', 'after_search', '1', '0', ''),
(10, 'home', 'after_search', '2', '0', ''),
(11, 'home', 'after_search', '3', '0', ''),
(12, 'home', 'after_search', '4', '0', ''),
(13, 'home', 'after_category', '1', '0', ''),
(14, 'home', 'after_category', '2', '0', ''),
(15, 'home', 'after_category', '3', '0', ''),
(16, 'home', 'after_category', '4', '0', ''),
(17, 'home', 'after_latest', '1', '0', ''),
(18, 'home', 'after_popular', '1', '0', ''),
(19, 'home', 'after_most_viewed', '1', '0', ''),
(20, 'category', 'after_filters', '1', '0', ''),
(21, 'featured', 'after_most_sold', '1', '0', ''),
(22, 'featured', 'after_most_viewed', '1', '0', ''),
(23, 'vendor_home', 'after_filter', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`blog_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `summery` varchar(1000) NOT NULL,
  `author` varchar(500) NOT NULL,
  `date` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `blog_category` varchar(25) NOT NULL,
  `number_of_view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
`blog_category_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`brand_id` int(11) NOT NULL,
  `name` longtext,
  `description` longtext,
  `category` varchar(10) DEFAULT NULL,
  `added_by` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE IF NOT EXISTS `business_settings` (
`business_settings_id` int(11) NOT NULL,
  `type` longtext,
  `status` varchar(10) DEFAULT NULL,
  `value` longtext CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`business_settings_id`, `type`, `status`, `value`) VALUES
(1, 'paypal_email', 'ok', 'chrispmusni@gmail.com'),
(2, 'shipping_cost', 'ok', '150'),
(3, 'shipping_cost_type', '', 'fixed'),
(4, 'currency', '', 'P'),
(6, 'shipment_info', '', '<p><br></p>'),
(7, 'currency_name', '', 'Peso'),
(8, 'exchange', '', '45'),
(9, 'paypal_set', '', 'no'),
(10, 'paypal_type', '', 'sandbox'),
(11, 'faqs', '', '[]'),
(12, 'cash_set', '', 'no'),
(13, 'stripe_set', '', 'no'),
(14, 'stripe_secret', '', ''),
(15, 'stripe_publishable', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(11) NOT NULL,
  `category_name` longtext,
  `description` longtext
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
(1, 'Food', '0'),
(2, 'Agriculture', '0'),
(3, 'Furniture', NULL),
(4, 'Handicrafts', NULL),
(5, 'Metals', NULL),
(6, 'Others', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('61ef02efc2e3d0d0cf830d79369a807ba8c3586c', '::1', 1523717160, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333731353830343b6c6f67696e7c733a333a22796573223b61646d696e5f6c6f67696e7c733a333a22796573223b61646d696e5f69647c733a313a2234223b61646d696e5f6e616d657c733a31373a224368726973746f70686572206d75736e69223b7469746c657c733a363a2276656e646f72223b74696d657374616d707c693a313532333731373136303b76656e646f725f6c6f67696e7c733a333a22796573223b76656e646f725f69647c733a313a2231223b76656e646f725f6e616d657c733a363a22432e452e432e223b),
('6808db329db90727baa752b7b441e575f3608727', '::1', 1492496575, ''),
('6d66ad0c2d1e8b00bdc99230133869708b71cdbc', '::1', 1492496575, ''),
('7058397b5f43837c636830f081f1a85a0f98cb11', '::1', 1492496575, ''),
('924d2085bbbf827e41ff4ec9ae44686eb8bfc41c', '::1', 1492496575, 0x66625f3533323538303839303232353436315f73746174657c733a33323a223061336433343861303330333632333439323464666334323139316131383333223b),
('9587316bb11a6e4d34ad0ca3ee68b4505d19648e', '::1', 1492496575, 0x66625f3533323538303839303232353436315f73746174657c733a33323a223765323261313130323735666565336232393963306337346236353538326333223b),
('b6a59198e8af036c79382365466c691b8cc3d793', '::1', 1492495120, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439323439353131373b66625f3533323538303839303232353436315f73746174657c733a33323a223933383030623234613531366433663666623464383231383733393863346332223b),
('e9ac38f36a7ddb31c6e4b89a497c34ffd74f62f4', '::1', 1492332761, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439323332393536353b74696d657374616d707c693a313439323333323736313b);

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE IF NOT EXISTS `contact_message` (
`contact_message_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `subject` varchar(1000) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `message` longtext,
  `timestamp` varchar(20) DEFAULT NULL,
  `view` varchar(10) DEFAULT NULL,
  `reply` longtext,
  `other` longtext
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`contact_message_id`, `name`, `subject`, `email`, `message`, `timestamp`, `view`, `reply`, `other`) VALUES
(1, 'christopher musni', 'Hello World', 'christopher.musni@gmail.com', 'Hi Great.', '1468042009', 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
`coupon_id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `spec` varchar(1000) DEFAULT NULL,
  `added_by` varchar(300) DEFAULT NULL,
  `till` varchar(30) DEFAULT NULL,
  `code` varchar(30) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE IF NOT EXISTS `general_settings` (
`general_settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `value` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`general_settings_id`, `type`, `value`) VALUES
(1, 'system_name', 'oneSTore'),
(2, 'system_email', 'admin@onestore.ph'),
(3, 'system_title', 'oneSTore'),
(4, 'address', ''),
(5, 'phone', ''),
(6, 'language', 'english'),
(9, 'terms_conditions', '<div id="Inner">  <div id="Languages"><a class="hy" href="http://hy.lipsum.com/">Հայերեն</a> <a class="sq" href="http://sq.lipsum.com/">Shqip</a> <span class="ltr" dir="ltr"><a class="xx" href="http://ar.lipsum.com/"><img src="/images/ar/ar.gif" width="18" height="12" border="0" alt="&#8235;العربية"></a><a class="xx" href="http://ar.lipsum.com/">&#8235;العربية</a></span>&nbsp;&nbsp; <a class="bg" href="http://bg.lipsum.com/">Български</a> <a class="ca" href="http://ca.lipsum.com/">Català</a> <a class="cn" href="http://cn.lipsum.com/">中文简体</a> <a class="hr" href="http://hr.lipsum.com/">Hrvatski</a> <a class="cs" href="http://cs.lipsum.com/">Česky</a> <a class="da" href="http://da.lipsum.com/">Dansk</a> <a class="nl" href="http://nl.lipsum.com/">Nederlands</a> <a class="en zz" href="http://www.lipsum.com/">English</a> <a class="et" href="http://et.lipsum.com/">Eesti</a> <a class="ph" href="http://ph.lipsum.com/">Filipino</a> <a class="fi" href="http://fi.lipsum.com/">Suomi</a> <a class="fr" href="http://fr.lipsum.com/">Français</a> <a class="ka" href="http://ka.lipsum.com/">ქართული</a> <a class="de" href="http://de.lipsum.com/">Deutsch</a> <a class="el" href="http://el.lipsum.com/">Ελληνικά</a> <span class="ltr" dir="ltr"><a class="xx" href="http://he.lipsum.com/"><img src="/images/he/he.gif" width="18" height="12" border="0" alt="&#8235;עברית"></a><a class="xx" href="http://he.lipsum.com/">&#8235;עברית</a></span>&nbsp;&nbsp; <a class="hu" href="http://hu.lipsum.com/">Magyar</a> <a class="id" href="http://id.lipsum.com/">Indonesia</a> <a class="it" href="http://it.lipsum.com/">Italiano</a> <a class="lv" href="http://lv.lipsum.com/">Latviski</a> <a class="lt" href="http://lt.lipsum.com/">Lietuviškai</a> <a class="mk" href="http://mk.lipsum.com/">македонски</a> <a class="ms" href="http://ms.lipsum.com/">Melayu</a> <a class="no" href="http://no.lipsum.com/">Norsk</a> <a class="pl" href="http://pl.lipsum.com/">Polski</a> <a class="pt" href="http://pt.lipsum.com/">Português</a> <a class="ro" href="http://ro.lipsum.com/">Româna</a> <a class="ru" href="http://ru.lipsum.com/">Pyccкий</a> <a class="sr" href="http://sr.lipsum.com/">Српски</a> <a class="sk" href="http://sk.lipsum.com/">Slovenčina</a> <a class="sl" href="http://sl.lipsum.com/">Slovenščina</a> <a class="es" href="http://es.lipsum.com/">Español</a> <a class="sv" href="http://sv.lipsum.com/">Svenska</a> <a class="th" href="http://th.lipsum.com/">ไทย</a> <a class="tr" href="http://tr.lipsum.com/">Türkçe</a> <a class="uk" href="http://uk.lipsum.com/">Українська</a> <a class="vi" href="http://vi.lipsum.com/">Tiếng Việt</a> </div>  <h1>Lorem Ipsum</h1> <h4>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</h4> <h5>"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</h5>   <div id="Panes"><div> <h2>What is Lorem Ipsum?</h2> <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> </div><div> <h2>Why do we use it?</h2> <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p> </div><br><div> <h2>Where does it come from?</h2> <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p> </div><div> <h2>Where can I get some?</h2> <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> <form method="post" action="/feed/html"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td rowspan="2"><input type="text" name="amount" value="5" size="3" id="amount"></td><td rowspan="2"><table border="0" cellpadding="0" cellspacing="0" align="left"><tbody><tr><td width="20"><input type="radio" name="what" value="paras" id="paras" checked="checked"></td><td><label for="paras">paragraphs</label></td></tr><tr><td width="20"><input type="radio" name="what" value="words" id="words"></td><td><label for="words">words</label></td></tr><tr><td width="20"><input type="radio" name="what" value="bytes" id="bytes"></td><td><label for="bytes">bytes</label></td></tr><tr><td width="20"><input type="radio" name="what" value="lists" id="lists"></td><td><label for="lists">lists</label></td></tr></tbody></table></td><td width="5%"><input type="checkbox" name="start" id="start" value="yes" checked="checked"></td><td width="45%" style="text-align:left"><label for="start">Start with ''Lorem<br>ipsum dolor sit amet...''</label></td></tr><tr><td></td><td style="text-align:left"><input type="submit" name="generate" id="generate" value="Generate Lorem Ipsum"></td></tr></tbody></table></form></div></div><hr><div class="boxedTight"><a href="/116/1468282730/ding.io" target="_blank" rel="nofollow"><img src="/banners/ding.png" width="100%" border="0" alt="Time tracking for freelancers"></a></div> <hr><div class="boxed" style="color:#ff0000;"><strong>Translations:</strong> Can you help translate this site into a foreign language ? Please email us with details if you can help.</div>  <hr><div class="boxed">There are now a set of mock banners available <a href="/banners" class="lnk">here</a> in three colours and in a range of standard banner sizes:<br><a href="/banners"><img src="/images/banners/black_234x60.gif" width="234" height="60" border="0" alt="Banners"></a><a href="/banners"><img src="/images/banners/grey_234x60.gif" width="234" height="60" border="0" alt="Banners"></a><a href="/banners"><img src="/images/banners/white_234x60.gif" width="234" height="60" border="0" alt="Banners"></a></div>  <hr><div class="boxed"><strong>Donate:</strong> If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click <a target="_blank" href="/donate" class="lnk">here</a> to donate using PayPal. Thank you for your support.</div>  <hr><div class="boxed" id="Packages"> <a target="_blank" rel="nofollow" href="https://chrome.google.com/extensions/detail/jkkggolejkaoanbjnmkakgjcdcnpfkgi">Chrome</a> <a target="_blank" rel="nofollow" href="https://addons.mozilla.org/en-US/firefox/addon/dummy-lipsum/">Firefox Add-on</a> <a target="_blank" rel="nofollow" href="https://github.com/traviskaufman/node-lipsum">NodeJS</a> <a target="_blank" rel="nofollow" href="http://ftp.ktug.or.kr/tex-archive/help/Catalogue/entries/lipsum.html">TeX Package</a> <a target="_blank" rel="nofollow" href="http://code.google.com/p/pypsum/">Python Interface</a> <a target="_blank" rel="nofollow" href="http://gtklipsum.sourceforge.net/">GTK Lipsum</a> <a target="_blank" rel="nofollow" href="http://github.com/gsavage/lorem_ipsum/tree/master">Rails</a> <a target="_blank" rel="nofollow" href="https://github.com/cerkit/LoremIpsum/">.NET</a> <a target="_blank" rel="nofollow" href="http://groovyconsole.appspot.com/script/64002">Groovy</a> <a target="_blank" ref="nofollow" href="http://www.layerhero.com/lorem-ipsum-generator/">Adobe Plugin</a></div>  <hr><div id="Translation">  <h3>The standard Lorem Ipsum passage, used since the 1500s</h3><p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><h3>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3><p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p> <h3>1914 translation by H. Rackham</h3> <p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p> <h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3> <p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p> <h3>1914 translation by H. Rackham</h3> <p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</p> </div>   <hr><div class="boxed"><a style="text-decoration:none" href="mailto:help@lipsum.com">help@lipsum.com</a></div>  <div id="Footer"><a href="/azure-billing">Azure Billing</a> </div>  </div>'),
(10, 'fb_appid', '532580890225461'),
(11, 'fb_secret', 'e5b9c08725d5bd831378a7f9b4d9752a'),
(12, 'google_languages', '{}'),
(24, 'meta_description', ''),
(25, 'meta_keywords', ''),
(26, 'meta_author', 'intelmatics'),
(27, 'captcha_public', '6LdsXPQSAAAAALRQB-m8Irt6-2_s2t10QsVnndVN'),
(28, 'captcha_private', '6LdsXPQSAAAAAFEnxFqW9qkEU_vozvDvJFV67yho'),
(29, 'application_name', 'oneSTore system 1.5'),
(30, 'client_id', ''),
(31, 'client_secret', ''),
(32, 'redirect_uri', ''),
(33, 'api_key', ''),
(44, 'contact_about', '<p><br></p>'),
(39, 'contact_phone', '09272445964'),
(40, 'contact_email', 'support@onestore.ph'),
(41, 'contact_website', 'https://onestore.ph'),
(42, 'footer_text', 'oneSTore.ph is an E-commerce that operates nationwide and caters primarily to Philippine consumers. oneSTore helps the DOST''s assisted MSMEs widen the scope of their target market.'),
(43, 'footer_category', '["1","2","3","4","5","6"]'),
(38, 'contact_address', 'Tuguegarao City, Cagayan'),
(45, 'admin_notification_sound', 'no'),
(46, 'admin_notification_volume', '0.00'),
(47, 'privacy_policy', '<div id="Inner">  <div id="Languages"><a class="hy" href="http://hy.lipsum.com/">Հայերեն</a> <a class="sq" href="http://sq.lipsum.com/">Shqip</a> <span class="ltr" dir="ltr"><a class="xx" href="http://ar.lipsum.com/"><img src="/images/ar/ar.gif" width="18" height="12" border="0" alt="&#8235;العربية"></a><a class="xx" href="http://ar.lipsum.com/">&#8235;العربية</a></span>&nbsp;&nbsp; <a class="bg" href="http://bg.lipsum.com/">Български</a> <a class="ca" href="http://ca.lipsum.com/">Català</a> <a class="cn" href="http://cn.lipsum.com/">中文简体</a> <a class="hr" href="http://hr.lipsum.com/">Hrvatski</a> <a class="cs" href="http://cs.lipsum.com/">Česky</a> <a class="da" href="http://da.lipsum.com/">Dansk</a> <a class="nl" href="http://nl.lipsum.com/">Nederlands</a> <a class="en zz" href="http://www.lipsum.com/">English</a> <a class="et" href="http://et.lipsum.com/">Eesti</a> <a class="ph" href="http://ph.lipsum.com/">Filipino</a> <a class="fi" href="http://fi.lipsum.com/">Suomi</a> <a class="fr" href="http://fr.lipsum.com/">Français</a> <a class="ka" href="http://ka.lipsum.com/">ქართული</a> <a class="de" href="http://de.lipsum.com/">Deutsch</a> <a class="el" href="http://el.lipsum.com/">Ελληνικά</a> <span class="ltr" dir="ltr"><a class="xx" href="http://he.lipsum.com/"><img src="/images/he/he.gif" width="18" height="12" border="0" alt="&#8235;עברית"></a><a class="xx" href="http://he.lipsum.com/">&#8235;עברית</a></span>&nbsp;&nbsp; <a class="hu" href="http://hu.lipsum.com/">Magyar</a> <a class="id" href="http://id.lipsum.com/">Indonesia</a> <a class="it" href="http://it.lipsum.com/">Italiano</a> <a class="lv" href="http://lv.lipsum.com/">Latviski</a> <a class="lt" href="http://lt.lipsum.com/">Lietuviškai</a> <a class="mk" href="http://mk.lipsum.com/">македонски</a> <a class="ms" href="http://ms.lipsum.com/">Melayu</a> <a class="no" href="http://no.lipsum.com/">Norsk</a> <a class="pl" href="http://pl.lipsum.com/">Polski</a> <a class="pt" href="http://pt.lipsum.com/">Português</a> <a class="ro" href="http://ro.lipsum.com/">Româna</a> <a class="ru" href="http://ru.lipsum.com/">Pyccкий</a> <a class="sr" href="http://sr.lipsum.com/">Српски</a> <a class="sk" href="http://sk.lipsum.com/">Slovenčina</a> <a class="sl" href="http://sl.lipsum.com/">Slovenščina</a> <a class="es" href="http://es.lipsum.com/">Español</a> <a class="sv" href="http://sv.lipsum.com/">Svenska</a> <a class="th" href="http://th.lipsum.com/">ไทย</a> <a class="tr" href="http://tr.lipsum.com/">Türkçe</a> <a class="uk" href="http://uk.lipsum.com/">Українська</a> <a class="vi" href="http://vi.lipsum.com/">Tiếng Việt</a> </div>  <h1>Lorem Ipsum</h1> <h4>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</h4> <h5>"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</h5>   <div id="Panes"><div> <h2>What is Lorem Ipsum?</h2> <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> </div><div> <h2>Why do we use it?</h2> <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p> </div><br><div> <h2>Where does it come from?</h2> <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p> </div><div> <h2>Where can I get some?</h2> <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> <form method="post" action="/feed/html"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td rowspan="2"><input type="text" name="amount" value="5" size="3" id="amount"></td><td rowspan="2"><table border="0" cellpadding="0" cellspacing="0" align="left"><tbody><tr><td width="20"><input type="radio" name="what" value="paras" id="paras" checked="checked"></td><td><label for="paras">paragraphs</label></td></tr><tr><td width="20"><input type="radio" name="what" value="words" id="words"></td><td><label for="words">words</label></td></tr><tr><td width="20"><input type="radio" name="what" value="bytes" id="bytes"></td><td><label for="bytes">bytes</label></td></tr><tr><td width="20"><input type="radio" name="what" value="lists" id="lists"></td><td><label for="lists">lists</label></td></tr></tbody></table></td><td width="5%"><input type="checkbox" name="start" id="start" value="yes" checked="checked"></td><td width="45%" style="text-align:left"><label for="start">Start with ''Lorem<br>ipsum dolor sit amet...''</label></td></tr><tr><td></td><td style="text-align:left"><input type="submit" name="generate" id="generate" value="Generate Lorem Ipsum"></td></tr></tbody></table></form></div></div><hr><div class="boxedTight"><a href="/116/1468282730/ding.io" target="_blank" rel="nofollow"><img src="/banners/ding.png" width="100%" border="0" alt="Time tracking for freelancers"></a></div> <hr><div class="boxed" style="color:#ff0000;"><strong>Translations:</strong> Can you help translate this site into a foreign language ? Please email us with details if you can help.</div>  <hr><div class="boxed">There are now a set of mock banners available <a href="/banners" class="lnk">here</a> in three colours and in a range of standard banner sizes:<br><a href="/banners"><img src="/images/banners/black_234x60.gif" width="234" height="60" border="0" alt="Banners"></a><a href="/banners"><img src="/images/banners/grey_234x60.gif" width="234" height="60" border="0" alt="Banners"></a><a href="/banners"><img src="/images/banners/white_234x60.gif" width="234" height="60" border="0" alt="Banners"></a></div>  <hr><div class="boxed"><strong>Donate:</strong> If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click <a target="_blank" href="/donate" class="lnk">here</a> to donate using PayPal. Thank you for your support.</div>  <hr><div class="boxed" id="Packages"> <a target="_blank" rel="nofollow" href="https://chrome.google.com/extensions/detail/jkkggolejkaoanbjnmkakgjcdcnpfkgi">Chrome</a> <a target="_blank" rel="nofollow" href="https://addons.mozilla.org/en-US/firefox/addon/dummy-lipsum/">Firefox Add-on</a> <a target="_blank" rel="nofollow" href="https://github.com/traviskaufman/node-lipsum">NodeJS</a> <a target="_blank" rel="nofollow" href="http://ftp.ktug.or.kr/tex-archive/help/Catalogue/entries/lipsum.html">TeX Package</a> <a target="_blank" rel="nofollow" href="http://code.google.com/p/pypsum/">Python Interface</a> <a target="_blank" rel="nofollow" href="http://gtklipsum.sourceforge.net/">GTK Lipsum</a> <a target="_blank" rel="nofollow" href="http://github.com/gsavage/lorem_ipsum/tree/master">Rails</a> <a target="_blank" rel="nofollow" href="https://github.com/cerkit/LoremIpsum/">.NET</a> <a target="_blank" rel="nofollow" href="http://groovyconsole.appspot.com/script/64002">Groovy</a> <a target="_blank" ref="nofollow" href="http://www.layerhero.com/lorem-ipsum-generator/">Adobe Plugin</a></div>  <hr><div id="Translation">  <h3>The standard Lorem Ipsum passage, used since the 1500s</h3><p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><h3>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3><p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p> <h3>1914 translation by H. Rackham</h3> <p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p> <h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3> <p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p> <h3>1914 translation by H. Rackham</h3> <p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</p> </div>   <hr><div class="boxed"><a style="text-decoration:none" href="mailto:help@lipsum.com">help@lipsum.com</a></div>  <div id="Footer"><a href="/azure-billing">Azure Billing</a> </div>  </div>'),
(48, 'discus_id', ''),
(49, 'home_notification_sound', 'no'),
(50, 'homepage_notification_volume', '0.00'),
(51, 'fb_login_set', 'no'),
(52, 'g_login_set', 'no'),
(53, 'slider', 'no'),
(54, 'revisit_after', '2'),
(55, 'default_member_product_limit', '10'),
(56, 'fb_comment_api', '1585558938370718'),
(57, 'comment_type', ''),
(58, 'vendor_system', 'ok'),
(59, 'cache_time', '1'),
(60, 'file_folder', 'q6hs6enc1'),
(62, 'slides', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
`word_id` int(11) NOT NULL,
  `word` longtext NOT NULL,
  `english` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `Bangla` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Spanish` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Arabic` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `French` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Chinese` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=626 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(1, 'create_new_account', 'Create New Account', NULL, NULL, NULL, NULL, NULL),
(2, 'email_address', 'Email Address', NULL, NULL, NULL, NULL, NULL),
(3, 'password', 'Password', NULL, NULL, NULL, NULL, NULL),
(4, 'confirm_password', 'Confirm Password', NULL, NULL, NULL, NULL, NULL),
(5, 'first_name', 'First Name', NULL, NULL, NULL, NULL, NULL),
(6, 'last_name', 'Last Name', NULL, NULL, NULL, NULL, NULL),
(7, 'phone', 'Phone', NULL, NULL, NULL, NULL, NULL),
(8, 'address_line_1', 'Address Line 1', NULL, NULL, NULL, NULL, NULL),
(9, 'address_line_2', 'Address Line 2', NULL, NULL, NULL, NULL, NULL),
(10, 'city', 'City', NULL, NULL, NULL, NULL, NULL),
(11, 'ZIP', 'ZIP', NULL, NULL, NULL, NULL, NULL),
(12, 'registering..', 'Registering..', NULL, NULL, NULL, NULL, NULL),
(13, 'register', 'Register', NULL, NULL, NULL, NULL, NULL),
(14, 'facebook_log_in', 'Facebook Log In', NULL, NULL, NULL, NULL, NULL),
(15, 'already_you_have_an_account?', 'Already You Have An Account?', NULL, NULL, NULL, NULL, NULL),
(16, 'sign_in', 'Sign In', NULL, NULL, NULL, NULL, NULL),
(17, 'log_in_to_your_account', 'Log In To Your Account', NULL, NULL, NULL, NULL, NULL),
(18, 'forget_your_password_?', 'Forget Your Password ?', NULL, NULL, NULL, NULL, NULL),
(19, 'log_in', 'Log In', NULL, NULL, NULL, NULL, NULL),
(20, 'Don''t_have_account_yet?', 'Don''t Have Account Yet?', NULL, NULL, NULL, NULL, NULL),
(21, 'sign_up', 'Sign Up', NULL, NULL, NULL, NULL, NULL),
(22, 'forgot_password', 'Forgot Password', NULL, NULL, NULL, NULL, NULL),
(23, 'login', 'Login', NULL, NULL, NULL, NULL, NULL),
(24, 'submit', 'Submit', NULL, NULL, NULL, NULL, NULL),
(25, 'home', 'Home', NULL, NULL, NULL, NULL, NULL),
(26, 'search', 'Search', NULL, NULL, NULL, NULL, NULL),
(27, 'search_locally_produced_products', 'Search Locally Produced Products', NULL, NULL, NULL, NULL, NULL),
(28, 'facebook', 'Facebook', NULL, NULL, NULL, NULL, NULL),
(29, 'google_plus', 'Google Plus', NULL, NULL, NULL, NULL, NULL),
(30, 'twitter', 'Twitter', NULL, NULL, NULL, NULL, NULL),
(31, 'skype', 'Skype', NULL, NULL, NULL, NULL, NULL),
(32, 'youtube', 'Youtube', NULL, NULL, NULL, NULL, NULL),
(33, 'pinterest', 'Pinterest', NULL, NULL, NULL, NULL, NULL),
(34, 'Hotline', 'Hotline', NULL, NULL, NULL, NULL, NULL),
(35, 'toggle_navigation', 'Toggle Navigation', NULL, NULL, NULL, NULL, NULL),
(36, 'sector', 'Sector', NULL, NULL, NULL, NULL, NULL),
(37, 'featured_product', 'Featured Product', NULL, NULL, NULL, NULL, NULL),
(38, 'see_more', 'See More', NULL, NULL, NULL, NULL, NULL),
(39, 'blog', 'Blog', NULL, NULL, NULL, NULL, NULL),
(40, 'all_blogs', 'All Blogs', NULL, NULL, NULL, NULL, NULL),
(41, 'contact', 'Contact', NULL, NULL, NULL, NULL, NULL),
(42, 'quick_view', 'Quick View', NULL, NULL, NULL, NULL, NULL),
(43, 'view', 'View', NULL, NULL, NULL, NULL, NULL),
(44, 'add_to_cart', 'Add To Cart', NULL, NULL, NULL, NULL, NULL),
(45, 'off', 'Off', NULL, NULL, NULL, NULL, NULL),
(46, 'seller', 'Seller', NULL, NULL, NULL, NULL, NULL),
(47, 'add_to_wishlist', 'Add To Wishlist', NULL, NULL, NULL, NULL, NULL),
(48, 'our_hubs', 'Our Hubs', NULL, NULL, NULL, NULL, NULL),
(49, 'products_by_sector', 'Products By Sector', NULL, NULL, NULL, NULL, NULL),
(50, 'latest_products', 'Latest Products', NULL, NULL, NULL, NULL, NULL),
(51, 'most_sold', 'Most Sold', NULL, NULL, NULL, NULL, NULL),
(52, 'most_viewed', 'Most Viewed', NULL, NULL, NULL, NULL, NULL),
(53, 'subscribe_to_our_weekly', 'Subscribe To Our Weekly', NULL, NULL, NULL, NULL, NULL),
(54, 'newsletter', 'Newsletter', NULL, NULL, NULL, NULL, NULL),
(55, 'recent_blogs', 'Recent Blogs', NULL, NULL, NULL, NULL, NULL),
(56, 'useful_links', 'Useful Links', NULL, NULL, NULL, NULL, NULL),
(57, 'featured', 'Featured', NULL, NULL, NULL, NULL, NULL),
(58, 'contact_us', 'Contact Us', NULL, NULL, NULL, NULL, NULL),
(59, 'website', 'Website', NULL, NULL, NULL, NULL, NULL),
(60, 'email', 'Email', NULL, NULL, NULL, NULL, NULL),
(61, 'all_rights_reserved', 'All Rights Reserved', NULL, NULL, NULL, NULL, NULL),
(62, 'terms_&_condition', 'Terms & Condition', NULL, NULL, NULL, NULL, NULL),
(63, 'privacy_policy', 'Privacy Policy', NULL, NULL, NULL, NULL, NULL),
(64, 'logout..', 'Logout..', NULL, NULL, NULL, NULL, NULL),
(65, 'vendor_registration', 'Vendor Registration', NULL, NULL, NULL, NULL, NULL),
(66, 'registration', 'Registration', NULL, NULL, NULL, NULL, NULL),
(67, 'you_registered_successfully', 'You Registered Successfully', NULL, NULL, NULL, NULL, NULL),
(68, 'you_logged_in_successfully', 'You Logged In Successfully', NULL, NULL, NULL, NULL, NULL),
(69, 'you_logged_out_successfully', 'You Logged Out Successfully', NULL, NULL, NULL, NULL, NULL),
(70, 'adding_to_cart..', 'Adding To Cart..', NULL, NULL, NULL, NULL, NULL),
(71, 'added_to_cart', 'Added To Cart', NULL, NULL, NULL, NULL, NULL),
(72, 'adding_to_wishlist..', 'Adding To Wishlist..', NULL, NULL, NULL, NULL, NULL),
(73, 'added_to_wishlist', 'Added To Wishlist', NULL, NULL, NULL, NULL, NULL),
(74, 'product_added_to_cart', 'Product Added To Cart', NULL, NULL, NULL, NULL, NULL),
(75, 'product_already_added_to_cart!', 'Product Already Added To Cart!', NULL, NULL, NULL, NULL, NULL),
(76, 'product_quantity_exceed_availability!', 'Product Quantity Exceed Availability!', NULL, NULL, NULL, NULL, NULL),
(77, 'wishing..', 'Wishing..', NULL, NULL, NULL, NULL, NULL),
(78, 'wished', 'Wished', NULL, NULL, NULL, NULL, NULL),
(79, 'product_added_to_wishlist', 'Product Added To Wishlist', NULL, NULL, NULL, NULL, NULL),
(80, 'product_removed_from_wishlist', 'Product Removed From Wishlist', NULL, NULL, NULL, NULL, NULL),
(81, 'working..', 'Working..', NULL, NULL, NULL, NULL, NULL),
(82, 'you_already_subscribed', 'You Already Subscribed', NULL, NULL, NULL, NULL, NULL),
(83, 'you_subscribed_successfully', 'You Subscribed Successfully', NULL, NULL, NULL, NULL, NULL),
(84, 'you_already_subscribed_thrice_from_this_browser', 'You Already Subscribed Thrice From This Browser', NULL, NULL, NULL, NULL, NULL),
(85, 'must_be_a_valid_email_address', 'Must Be A Valid Email Address', NULL, NULL, NULL, NULL, NULL),
(86, 'logging_in..', 'Logging In..', NULL, NULL, NULL, NULL, NULL),
(87, 'login_failed!_try_again!', 'Login Failed! Try Again!', NULL, NULL, NULL, NULL, NULL),
(88, 'submitting..', 'Submitting..', NULL, NULL, NULL, NULL, NULL),
(89, 'email_sent_successfully', 'Email Sent Successfully', NULL, NULL, NULL, NULL, NULL),
(90, 'email_does_not_exist!', 'Email Does Not Exist!', NULL, NULL, NULL, NULL, NULL),
(91, 'email_sending_failed!_try_again', 'Email Sending Failed! Try Again', NULL, NULL, NULL, NULL, NULL),
(92, 'product_rated_successfully', 'Product Rated Successfully', NULL, NULL, NULL, NULL, NULL),
(93, 'product_rating_failed', 'Product Rating Failed', NULL, NULL, NULL, NULL, NULL),
(94, 'you_already_rated_this_product', 'You Already Rated This Product', NULL, NULL, NULL, NULL, NULL),
(95, 'registration_failed!_try_again!', 'Registration Failed! Try Again!', NULL, NULL, NULL, NULL, NULL),
(96, 'product_removed_from_cart', 'Product Removed From Cart', NULL, NULL, NULL, NULL, NULL),
(97, 'cart_emptied', 'Cart Emptied', NULL, NULL, NULL, NULL, NULL),
(98, 'field_is_required', 'Field Is Required', NULL, NULL, NULL, NULL, NULL),
(99, 'must_be_a_number', 'Must Be A Number', NULL, NULL, NULL, NULL, NULL),
(100, 'product_added_to_compared', 'Product Added To Compared', NULL, NULL, NULL, NULL, NULL),
(101, 'compared', 'Compared', NULL, NULL, NULL, NULL, NULL),
(102, 'product_removed_from_compare', 'Product Removed From Compare', NULL, NULL, NULL, NULL, NULL),
(103, 'compare_category_full', 'Compare Category Full', NULL, NULL, NULL, NULL, NULL),
(104, 'product_already_added_to_compare', 'Product Already Added To Compare', NULL, NULL, NULL, NULL, NULL),
(105, 'applying..', 'Applying..', NULL, NULL, NULL, NULL, NULL),
(106, 'coupon_not_valid', 'Coupon Not Valid', NULL, NULL, NULL, NULL, NULL),
(107, 'coupon_discount_successful', 'Coupon Discount Successful', NULL, NULL, NULL, NULL, NULL),
(108, 'message_sent!', 'Message Sent!', NULL, NULL, NULL, NULL, NULL),
(109, 'incorrect_captcha!', 'Incorrect Captcha!', NULL, NULL, NULL, NULL, NULL),
(110, 'password_mismatched', 'Password Mismatched', NULL, NULL, NULL, NULL, NULL),
(111, 'incorrect_password', 'Incorrect Password', NULL, NULL, NULL, NULL, NULL),
(112, 'downloading...', 'Downloading...', NULL, NULL, NULL, NULL, NULL),
(113, 'product_by_sector', 'Product By Sector', NULL, NULL, NULL, NULL, NULL),
(114, 'sign_in_to_your_account', 'Sign In To Your Account', NULL, NULL, NULL, NULL, NULL),
(115, 'forget_password', 'Forget Password', NULL, NULL, NULL, NULL, NULL),
(116, 'email_sent_with_new_password!', 'Email Sent With New Password!', NULL, NULL, NULL, NULL, NULL),
(117, 'cancelled', 'Cancelled', NULL, NULL, NULL, NULL, NULL),
(118, 'this_field_is_required', 'This Field Is Required', NULL, NULL, NULL, NULL, NULL),
(119, 'signing_in...', 'Signing In...', NULL, NULL, NULL, NULL, NULL),
(120, 'new_password_sent_to_your_email', 'New Password Sent To Your Email', NULL, NULL, NULL, NULL, NULL),
(121, 'login_failed!', 'Login Failed!', NULL, NULL, NULL, NULL, NULL),
(122, 'wrong_e-mail_address!_try_again', 'Wrong E-mail Address! Try Again', NULL, NULL, NULL, NULL, NULL),
(123, 'login_successful!', 'Login Successful!', NULL, NULL, NULL, NULL, NULL),
(124, 'SUCCESS!', 'SUCCESS!', NULL, NULL, NULL, NULL, NULL),
(125, 'reset_password', 'Reset Password', NULL, NULL, NULL, NULL, NULL),
(126, 'account_not_approved._wait_for_approval.', 'Account Not Approved. Wait For Approval.', NULL, NULL, NULL, NULL, NULL),
(127, 'visit_home_page', 'Visit Home Page', NULL, NULL, NULL, NULL, NULL),
(128, 'profile', 'Profile', NULL, NULL, NULL, NULL, NULL),
(129, 'logout', 'Logout', NULL, NULL, NULL, NULL, NULL),
(130, 'dashboard', 'Dashboard', NULL, NULL, NULL, NULL, NULL),
(131, '24_hours_stock', '24 Hours Stock', NULL, NULL, NULL, NULL, NULL),
(132, '24_hours_sale', '24 Hours Sale', NULL, NULL, NULL, NULL, NULL),
(133, '24_hours_destroy', '24 Hours Destroy', NULL, NULL, NULL, NULL, NULL),
(134, 'total_HUBs', 'Total HUBs', NULL, NULL, NULL, NULL, NULL),
(135, 'pending_HUBs', 'Pending HUBs', NULL, NULL, NULL, NULL, NULL),
(136, 'HUB_stat', 'HUB Stat', NULL, NULL, NULL, NULL, NULL),
(137, 'monthly_stock', 'Monthly Stock', NULL, NULL, NULL, NULL, NULL),
(138, 'monthly_sale', 'Monthly Sale', NULL, NULL, NULL, NULL, NULL),
(139, 'monthly_destroy', 'Monthly Destroy', NULL, NULL, NULL, NULL, NULL),
(140, 'monthly_grand_profit', 'Monthly Grand Profit', NULL, NULL, NULL, NULL, NULL),
(141, 'cost', 'Cost', NULL, NULL, NULL, NULL, NULL),
(142, 'value', 'Value', NULL, NULL, NULL, NULL, NULL),
(143, 'loss', 'Loss', NULL, NULL, NULL, NULL, NULL),
(144, 'profit', 'Profit', NULL, NULL, NULL, NULL, NULL),
(145, 'products', 'Products', NULL, NULL, NULL, NULL, NULL),
(146, 'category', 'Category', NULL, NULL, NULL, NULL, NULL),
(147, 'sub-category', 'Sub-category', NULL, NULL, NULL, NULL, NULL),
(148, 'all_products', 'All Products', NULL, NULL, NULL, NULL, NULL),
(149, 'product_stock', 'Product Stock', NULL, NULL, NULL, NULL, NULL),
(150, 'all_blog_categories', 'All Blog Categories', NULL, NULL, NULL, NULL, NULL),
(151, 'sale', 'Sale', NULL, NULL, NULL, NULL, NULL),
(152, 'reports', 'Reports', NULL, NULL, NULL, NULL, NULL),
(153, 'product_compare', 'Product Compare', NULL, NULL, NULL, NULL, NULL),
(154, 'product_wishes', 'Product Wishes', NULL, NULL, NULL, NULL, NULL),
(155, 'customers', 'Customers', NULL, NULL, NULL, NULL, NULL),
(156, 'discount_coupon', 'Discount Coupon', NULL, NULL, NULL, NULL, NULL),
(157, 'vendors', 'Vendors', NULL, NULL, NULL, NULL, NULL),
(158, 'vendor_list', 'Vendor List', NULL, NULL, NULL, NULL, NULL),
(159, 'membership_payments', 'Membership Payments', NULL, NULL, NULL, NULL, NULL),
(160, 'membership_type', 'Membership Type', NULL, NULL, NULL, NULL, NULL),
(161, 'create_new_page', 'Create New Page', NULL, NULL, NULL, NULL, NULL),
(162, 'front_settings', 'Front Settings', NULL, NULL, NULL, NULL, NULL),
(163, 'site_settings', 'Site Settings', NULL, NULL, NULL, NULL, NULL),
(164, 'staffs', 'Staffs', NULL, NULL, NULL, NULL, NULL),
(165, 'all_staffs', 'All Staffs', NULL, NULL, NULL, NULL, NULL),
(166, 'messaging', 'Messaging', NULL, NULL, NULL, NULL, NULL),
(167, 'newsletters', 'Newsletters', NULL, NULL, NULL, NULL, NULL),
(168, 'contact_messages', 'Contact Messages', NULL, NULL, NULL, NULL, NULL),
(169, 'business_settings', 'Business Settings', NULL, NULL, NULL, NULL, NULL),
(170, 'manage_admin_profile', 'Manage Admin Profile', NULL, NULL, NULL, NULL, NULL),
(171, 'SEO_proggres', 'SEO Proggres', NULL, NULL, NULL, NULL, NULL),
(172, 'online_tutorial', 'Online Tutorial', NULL, NULL, NULL, NULL, NULL),
(173, 'checkout', 'Checkout', NULL, NULL, NULL, NULL, NULL),
(174, 'deleted_successfully', 'Deleted Successfully', NULL, NULL, NULL, NULL, NULL),
(175, 'cancel', 'Cancel', NULL, NULL, NULL, NULL, NULL),
(176, 'required', 'Required', NULL, NULL, NULL, NULL, NULL),
(177, 'save', 'Save', NULL, NULL, NULL, NULL, NULL),
(178, 'product_published!', 'Product Published!', NULL, NULL, NULL, NULL, NULL),
(179, 'product_unpublished!', 'Product Unpublished!', NULL, NULL, NULL, NULL, NULL),
(180, 'product_featured!', 'Product Featured!', NULL, NULL, NULL, NULL, NULL),
(181, 'product_unfeatured!', 'Product Unfeatured!', NULL, NULL, NULL, NULL, NULL),
(182, 'product_in_todays_deal!', 'Product In Todays Deal!', NULL, NULL, NULL, NULL, NULL),
(183, 'product_removed_from_todays_deal!', 'Product Removed From Todays Deal!', NULL, NULL, NULL, NULL, NULL),
(184, 'slider_published!', 'Slider Published!', NULL, NULL, NULL, NULL, NULL),
(185, 'slider_unpublished!', 'Slider Unpublished!', NULL, NULL, NULL, NULL, NULL),
(186, 'page_published!', 'Page Published!', NULL, NULL, NULL, NULL, NULL),
(187, 'page_unpublished!', 'Page Unpublished!', NULL, NULL, NULL, NULL, NULL),
(188, 'notification_sound_enabled!', 'Notification Sound Enabled!', NULL, NULL, NULL, NULL, NULL),
(189, 'notification_sound_disabled!', 'Notification Sound Disabled!', NULL, NULL, NULL, NULL, NULL),
(190, 'google_login_enabled!', 'Google Login Enabled!', NULL, NULL, NULL, NULL, NULL),
(191, 'google_login_disabled!', 'Google Login Disabled!', NULL, NULL, NULL, NULL, NULL),
(192, 'facebook_login_enabled!', 'Facebook Login Enabled!', NULL, NULL, NULL, NULL, NULL),
(193, 'facebook_login_disabled!', 'Facebook Login Disabled!', NULL, NULL, NULL, NULL, NULL),
(194, 'paypal_payment_disabled!', 'Paypal Payment Disabled!', NULL, NULL, NULL, NULL, NULL),
(195, 'paypal_payment_enabled!', 'Paypal Payment Enabled!', NULL, NULL, NULL, NULL, NULL),
(196, 'slider_enabled!', 'Slider Enabled!', NULL, NULL, NULL, NULL, NULL),
(197, 'slider_disabled!', 'Slider Disabled!', NULL, NULL, NULL, NULL, NULL),
(198, 'cash_payment_enabled!', 'Cash Payment Enabled!', NULL, NULL, NULL, NULL, NULL),
(199, 'cash_payment_disabled!', 'Cash Payment Disabled!', NULL, NULL, NULL, NULL, NULL),
(200, 'enabled!', 'Enabled!', NULL, NULL, NULL, NULL, NULL),
(201, 'disabled!', 'Disabled!', NULL, NULL, NULL, NULL, NULL),
(202, 'notification_email_sent_to_vendor!', 'Notification Email Sent To Vendor!', NULL, NULL, NULL, NULL, NULL),
(203, 'manage_site', 'Manage Site', NULL, NULL, NULL, NULL, NULL),
(204, 'general_settings', 'General Settings', NULL, NULL, NULL, NULL, NULL),
(205, 'header_/_footer_scheme', 'Header / Footer Scheme', NULL, NULL, NULL, NULL, NULL),
(206, 'logo', 'Logo', NULL, NULL, NULL, NULL, NULL),
(207, 'favicon', 'Favicon', NULL, NULL, NULL, NULL, NULL),
(208, 'social_media', 'Social Media', NULL, NULL, NULL, NULL, NULL),
(209, 'social_login_configuaration', 'Social Login Configuaration', NULL, NULL, NULL, NULL, NULL),
(210, 'product_comment_settings', 'Product Comment Settings', NULL, NULL, NULL, NULL, NULL),
(211, 'captcha_settings', 'Captcha Settings', NULL, NULL, NULL, NULL, NULL),
(212, 'home_page', 'Home Page', NULL, NULL, NULL, NULL, NULL),
(213, 'category_page', 'Category Page', NULL, NULL, NULL, NULL, NULL),
(214, 'contact_page', 'Contact Page', NULL, NULL, NULL, NULL, NULL),
(215, 'footer', 'Footer', NULL, NULL, NULL, NULL, NULL),
(216, 'system_name', 'System Name', NULL, NULL, NULL, NULL, NULL),
(217, 'system_email', 'System Email', NULL, NULL, NULL, NULL, NULL),
(218, 'system_title', 'System Title', NULL, NULL, NULL, NULL, NULL),
(219, 'downloadable_product_folder_name', 'Downloadable Product Folder Name', NULL, NULL, NULL, NULL, NULL),
(220, 'homepage_cache_time', 'Homepage Cache Time', NULL, NULL, NULL, NULL, NULL),
(221, 'vendor_system', 'Vendor System', NULL, NULL, NULL, NULL, NULL),
(222, 'language', 'Language', NULL, NULL, NULL, NULL, NULL),
(223, 'admin_notification_sound', 'Admin Notification Sound', NULL, NULL, NULL, NULL, NULL),
(224, 'admin_notification_volume', 'Admin Notification Volume', NULL, NULL, NULL, NULL, NULL),
(225, 'Volume_:_', 'Volume : ', NULL, NULL, NULL, NULL, NULL),
(226, 'homepage_notification_sound', 'Homepage Notification Sound', NULL, NULL, NULL, NULL, NULL),
(227, 'homepage_notification_volume', 'Homepage Notification Volume', NULL, NULL, NULL, NULL, NULL),
(228, 'saving', 'Saving', NULL, NULL, NULL, NULL, NULL),
(229, 'settings_updated!', 'Settings Updated!', NULL, NULL, NULL, NULL, NULL),
(230, 'slider', 'Slider', NULL, NULL, NULL, NULL, NULL),
(231, 'category_menu_slider', 'Category Menu Slider', NULL, NULL, NULL, NULL, NULL),
(232, 'home_category', 'Home Category', NULL, NULL, NULL, NULL, NULL),
(233, 'home_brands', 'Home Brands', NULL, NULL, NULL, NULL, NULL),
(234, 'manage_category_page', 'Manage Category Page', NULL, NULL, NULL, NULL, NULL),
(235, 'side_bar_position', 'Side Bar Position', NULL, NULL, NULL, NULL, NULL),
(236, 'upload_logo', 'Upload Logo', NULL, NULL, NULL, NULL, NULL),
(237, 'drop_logos_to_upload', 'Drop Logos To Upload', NULL, NULL, NULL, NULL, NULL),
(238, 'or_click_to_pick_manually', 'Or Click To Pick Manually', NULL, NULL, NULL, NULL, NULL),
(239, 'all_logos', 'All Logos', NULL, NULL, NULL, NULL, NULL),
(240, 'select_logo', 'Select Logo', NULL, NULL, NULL, NULL, NULL),
(241, 'place', 'Place', NULL, NULL, NULL, NULL, NULL),
(242, 'options', 'Options', NULL, NULL, NULL, NULL, NULL),
(243, 'admin_logo', 'Admin Logo', NULL, NULL, NULL, NULL, NULL),
(244, 'successfully_selected!', 'Successfully Selected!', NULL, NULL, NULL, NULL, NULL),
(245, 'change', 'Change', NULL, NULL, NULL, NULL, NULL),
(246, 'homepage_header_logo', 'Homepage Header Logo', NULL, NULL, NULL, NULL, NULL),
(247, 'homepage_footer_logo', 'Homepage Footer Logo', NULL, NULL, NULL, NULL, NULL),
(248, 'select_favicon', 'Select Favicon', NULL, NULL, NULL, NULL, NULL),
(249, 'social_links', 'Social Links', NULL, NULL, NULL, NULL, NULL),
(250, 'type', 'Type', NULL, NULL, NULL, NULL, NULL),
(251, 'none', 'None', NULL, NULL, NULL, NULL, NULL),
(252, 'facebook_comment', 'Facebook Comment', NULL, NULL, NULL, NULL, NULL),
(253, 'disqus_comment', 'Disqus Comment', NULL, NULL, NULL, NULL, NULL),
(254, 'discus_ID', 'Discus ID', NULL, NULL, NULL, NULL, NULL),
(255, 'fb_comment_id', 'Fb Comment Id', NULL, NULL, NULL, NULL, NULL),
(256, 'facebook_login_settings', 'Facebook Login Settings', NULL, NULL, NULL, NULL, NULL),
(257, 'status', 'Status', NULL, NULL, NULL, NULL, NULL),
(258, 'google+_login_settings', 'Google+ Login Settings', NULL, NULL, NULL, NULL, NULL),
(259, 'public_key', 'Public Key', NULL, NULL, NULL, NULL, NULL),
(260, 'private_key', 'Private Key', NULL, NULL, NULL, NULL, NULL),
(261, 'contact_address', 'Contact Address', NULL, NULL, NULL, NULL, NULL),
(262, 'contact_phone', 'Contact Phone', NULL, NULL, NULL, NULL, NULL),
(263, 'contact_email', 'Contact Email', NULL, NULL, NULL, NULL, NULL),
(264, 'contact_website', 'Contact Website', NULL, NULL, NULL, NULL, NULL),
(265, 'contact_about', 'Contact About', NULL, NULL, NULL, NULL, NULL),
(266, 'footer_category', 'Footer Category', NULL, NULL, NULL, NULL, NULL),
(267, 'footer_text', 'Footer Text', NULL, NULL, NULL, NULL, NULL),
(268, 'choode_your_scheme', 'Choode Your Scheme', NULL, NULL, NULL, NULL, NULL),
(269, 'really_want_to_delete_this_logo?', 'Really Want To Delete This Logo?', NULL, NULL, NULL, NULL, NULL),
(270, 'select', 'Select', NULL, NULL, NULL, NULL, NULL),
(271, 'recent', 'Recent', NULL, NULL, NULL, NULL, NULL),
(272, 'recent_product', 'Recent Product', NULL, NULL, NULL, NULL, NULL),
(273, 'latest_item', 'Latest Item', NULL, NULL, NULL, NULL, NULL),
(274, 'rate_it', 'Rate It', NULL, NULL, NULL, NULL, NULL),
(275, 'quantity', 'Quantity', NULL, NULL, NULL, NULL, NULL),
(276, 'sector:', 'Sector:', NULL, NULL, NULL, NULL, NULL),
(277, 'hub:', 'Hub:', NULL, NULL, NULL, NULL, NULL),
(278, 'full_description', 'Full Description', NULL, NULL, NULL, NULL, NULL),
(279, 'additional_specification', 'Additional Specification', NULL, NULL, NULL, NULL, NULL),
(280, 'shipment_info', 'Shipment Info', NULL, NULL, NULL, NULL, NULL),
(281, 'reviews', 'Reviews', NULL, NULL, NULL, NULL, NULL),
(282, 'related_products', 'Related Products', NULL, NULL, NULL, NULL, NULL),
(283, 'firm', 'Firm', NULL, NULL, NULL, NULL, NULL),
(284, 'address', 'Address', NULL, NULL, NULL, NULL, NULL),
(285, 'products_of', 'Products Of', NULL, NULL, NULL, NULL, NULL),
(286, 'filter_by', 'Filter By', NULL, NULL, NULL, NULL, NULL),
(287, 'all_sectors', 'All Sectors', NULL, NULL, NULL, NULL, NULL),
(288, 'price', 'Price', NULL, NULL, NULL, NULL, NULL),
(289, 'results', 'Results', NULL, NULL, NULL, NULL, NULL),
(290, 'hub', 'Hub', NULL, NULL, NULL, NULL, NULL),
(291, 'all_hubs', 'All Hubs', NULL, NULL, NULL, NULL, NULL),
(292, 'terms_conditions', 'Terms Conditions', NULL, NULL, NULL, NULL, NULL),
(293, 'our_contacts', 'Our Contacts', NULL, NULL, NULL, NULL, NULL),
(294, 'get_in_touch', 'Get In Touch', NULL, NULL, NULL, NULL, NULL),
(295, 'name', 'Name', NULL, NULL, NULL, NULL, NULL),
(296, 'subject', 'Subject', NULL, NULL, NULL, NULL, NULL),
(297, 'message', 'Message', NULL, NULL, NULL, NULL, NULL),
(298, 'sending..', 'Sending..', NULL, NULL, NULL, NULL, NULL),
(299, 'send_message', 'Send Message', NULL, NULL, NULL, NULL, NULL),
(300, 'contacts', 'Contacts', NULL, NULL, NULL, NULL, NULL),
(301, 'business_hours', 'Business Hours', NULL, NULL, NULL, NULL, NULL),
(302, 'about_us', 'About Us', NULL, NULL, NULL, NULL, NULL),
(303, 'popular_blogs', 'Popular Blogs', NULL, NULL, NULL, NULL, NULL),
(304, 'new_product', 'New Product', NULL, NULL, NULL, NULL, NULL),
(305, 'top_rated', 'Top Rated', NULL, NULL, NULL, NULL, NULL),
(306, 'color', 'Color', NULL, NULL, NULL, NULL, NULL),
(307, 'special_specifications', 'Special Specifications', NULL, NULL, NULL, NULL, NULL),
(308, 'featured_products', 'Featured Products', NULL, NULL, NULL, NULL, NULL),
(309, 'out_of_stock', 'Out Of Stock', NULL, NULL, NULL, NULL, NULL),
(310, 'my_account', 'My Account', NULL, NULL, NULL, NULL, NULL),
(311, 'personal_information', 'Personal Information', NULL, NULL, NULL, NULL, NULL),
(312, 'total_purchase', 'Total Purchase', NULL, NULL, NULL, NULL, NULL),
(313, 'last_7_days', 'Last 7 Days', NULL, NULL, NULL, NULL, NULL),
(314, 'last_30_days', 'Last 30 Days', NULL, NULL, NULL, NULL, NULL),
(315, 'wished_products', 'Wished Products', NULL, NULL, NULL, NULL, NULL),
(316, 'user_since', 'User Since', NULL, NULL, NULL, NULL, NULL),
(317, 'last_login', 'Last Login', NULL, NULL, NULL, NULL, NULL),
(318, 'purchase_history', 'Purchase History', NULL, NULL, NULL, NULL, NULL),
(319, 'downloads', 'Downloads', NULL, NULL, NULL, NULL, NULL),
(320, 'wishlist', 'Wishlist', NULL, NULL, NULL, NULL, NULL),
(321, 'edit_info', 'Edit Info', NULL, NULL, NULL, NULL, NULL),
(322, 'change_password', 'Change Password', NULL, NULL, NULL, NULL, NULL),
(323, 'view_purchase_history', 'View Purchase History', NULL, NULL, NULL, NULL, NULL),
(324, 'date', 'Date', NULL, NULL, NULL, NULL, NULL),
(325, 'total', 'Total', NULL, NULL, NULL, NULL, NULL),
(326, 'payment_status', 'Payment Status', NULL, NULL, NULL, NULL, NULL),
(327, 'delivery_status', 'Delivery Status', NULL, NULL, NULL, NULL, NULL),
(328, 'invoice', 'Invoice', NULL, NULL, NULL, NULL, NULL),
(329, 'vendor', 'Vendor', NULL, NULL, NULL, NULL, NULL),
(330, 'image', 'Image', NULL, NULL, NULL, NULL, NULL),
(331, 'download', 'Download', NULL, NULL, NULL, NULL, NULL),
(332, 'manage_your_wishlist', 'Manage Your Wishlist', NULL, NULL, NULL, NULL, NULL),
(333, 'availability', 'Availability', NULL, NULL, NULL, NULL, NULL),
(334, 'purchase', 'Purchase', NULL, NULL, NULL, NULL, NULL),
(335, 'remove', 'Remove', NULL, NULL, NULL, NULL, NULL),
(336, 'available', 'Available', NULL, NULL, NULL, NULL, NULL),
(337, 'add', 'Add', NULL, NULL, NULL, NULL, NULL),
(338, 'remove_from_wishlist', 'Remove From Wishlist', NULL, NULL, NULL, NULL, NULL),
(339, 'unvailable', 'Unvailable', NULL, NULL, NULL, NULL, NULL),
(340, 'manage_your_name,_contact_details,_etc.', 'Manage Your Name, Contact Details, Etc.', NULL, NULL, NULL, NULL, NULL),
(341, 're-write your_first_name', 'Re-write Your First Name', NULL, NULL, NULL, NULL, NULL),
(342, 're-write your_last_name', 'Re-write Your Last Name', NULL, NULL, NULL, NULL, NULL),
(343, 'phone_number', 'Phone Number', NULL, NULL, NULL, NULL, NULL),
(344, 're-write_your_phone_number', 'Re-write Your Phone Number', NULL, NULL, NULL, NULL, NULL),
(345, 're-write_your_address_line_1', 'Re-write Your Address Line 1', NULL, NULL, NULL, NULL, NULL),
(346, 're-write_your_address_line_2', 'Re-write Your Address Line 2', NULL, NULL, NULL, NULL, NULL),
(347, 'ZIP_Code', 'ZIP Code', NULL, NULL, NULL, NULL, NULL),
(348, 're-write_your_ZIP_Code', 'Re-write Your ZIP Code', NULL, NULL, NULL, NULL, NULL),
(349, 're-write_your_city_name', 'Re-write Your City Name', NULL, NULL, NULL, NULL, NULL),
(350, 'skype_id', 'Skype Id', NULL, NULL, NULL, NULL, NULL),
(351, 're-write_your_skype_id', 'Re-write Your Skype Id', NULL, NULL, NULL, NULL, NULL),
(352, 're-write_your_facebook_profile_link', 'Re-write Your Facebook Profile Link', NULL, NULL, NULL, NULL, NULL),
(353, 'google+', 'Google+', NULL, NULL, NULL, NULL, NULL),
(354, 're-write_your_google+_profile_link', 'Re-write Your Google+ Profile Link', NULL, NULL, NULL, NULL, NULL),
(355, 'profile_picture', 'Profile Picture', NULL, NULL, NULL, NULL, NULL),
(356, 'browse', 'Browse', NULL, NULL, NULL, NULL, NULL),
(357, 'update_info', 'Update Info', NULL, NULL, NULL, NULL, NULL),
(358, 'manage_your_security_settings', 'Manage Your Security Settings', NULL, NULL, NULL, NULL, NULL),
(359, 'current_password', 'Current Password', NULL, NULL, NULL, NULL, NULL),
(360, 'enter_your_current_password', 'Enter Your Current Password', NULL, NULL, NULL, NULL, NULL),
(361, 'new_password', 'New Password', NULL, NULL, NULL, NULL, NULL),
(362, 'enter_your_new_password', 'Enter Your New Password', NULL, NULL, NULL, NULL, NULL),
(363, 'confirm_new_password', 'Confirm New Password', NULL, NULL, NULL, NULL, NULL),
(364, 're-enter_your_new_password', 'Re-enter Your New Password', NULL, NULL, NULL, NULL, NULL),
(365, 'update_password', 'Update Password', NULL, NULL, NULL, NULL, NULL),
(366, 'invoice_no', 'Invoice No', NULL, NULL, NULL, NULL, NULL),
(367, 'client_information', 'Client Information', NULL, NULL, NULL, NULL, NULL),
(368, 'address1', 'Address1', NULL, NULL, NULL, NULL, NULL),
(369, 'address2', 'Address2', NULL, NULL, NULL, NULL, NULL),
(370, 'shipping_information', 'Shipping Information', NULL, NULL, NULL, NULL, NULL),
(371, 'payment_details', 'Payment Details', NULL, NULL, NULL, NULL, NULL),
(372, 'due', 'Due', NULL, NULL, NULL, NULL, NULL),
(373, 'payment_method', 'Payment Method', NULL, NULL, NULL, NULL, NULL),
(374, 'invoice_details', 'Invoice Details', NULL, NULL, NULL, NULL, NULL),
(375, 'item', 'Item', NULL, NULL, NULL, NULL, NULL),
(376, 'unit_cost', 'Unit Cost', NULL, NULL, NULL, NULL, NULL),
(377, 'payment_date', 'Payment Date', NULL, NULL, NULL, NULL, NULL),
(378, 'sub_total_amount', 'Sub Total Amount', NULL, NULL, NULL, NULL, NULL),
(379, 'tax', 'Tax', NULL, NULL, NULL, NULL, NULL),
(380, 'shipping', 'Shipping', NULL, NULL, NULL, NULL, NULL),
(381, 'grand_total', 'Grand Total', NULL, NULL, NULL, NULL, NULL),
(382, 'print', 'Print', NULL, NULL, NULL, NULL, NULL),
(383, 'empty_cart', 'Empty Cart', NULL, NULL, NULL, NULL, NULL),
(384, 'my_cart', 'My Cart', NULL, NULL, NULL, NULL, NULL),
(385, 'shopping_cart', 'Shopping Cart', NULL, NULL, NULL, NULL, NULL),
(386, 'review_&_edit_your_product', 'Review & Edit Your Product', NULL, NULL, NULL, NULL, NULL),
(387, 'product', 'Product', NULL, NULL, NULL, NULL, NULL),
(388, 'qty', 'Qty', NULL, NULL, NULL, NULL, NULL),
(389, 'shipping_info', 'Shipping Info', NULL, NULL, NULL, NULL, NULL),
(390, 'shipping_and_address_info', 'Shipping And Address Info', NULL, NULL, NULL, NULL, NULL),
(391, 'shipping_address', 'Shipping Address', NULL, NULL, NULL, NULL, NULL),
(392, 'zip/postal_code', 'Zip/postal Code', NULL, NULL, NULL, NULL, NULL),
(393, 'payment', 'Payment', NULL, NULL, NULL, NULL, NULL),
(394, 'select_payment_method', 'Select Payment Method', NULL, NULL, NULL, NULL, NULL),
(395, 'choose_a_payment_method', 'Choose A Payment Method', NULL, NULL, NULL, NULL, NULL),
(396, 'cash_on_delivery', 'Cash On Delivery', NULL, NULL, NULL, NULL, NULL),
(397, 'pay_with_paypal', 'Pay With Paypal', NULL, NULL, NULL, NULL, NULL),
(398, 'frequently_asked_questions', 'Frequently Asked Questions', NULL, NULL, NULL, NULL, NULL),
(399, 'discount_code', 'Discount Code', NULL, NULL, NULL, NULL, NULL),
(400, 'enter_your_coupon_code', 'Enter Your Coupon Code', NULL, NULL, NULL, NULL, NULL),
(401, 'apply_coupon', 'Apply Coupon', NULL, NULL, NULL, NULL, NULL),
(402, 'subtotal', 'Subtotal', NULL, NULL, NULL, NULL, NULL),
(403, 'coupon_discount', 'Coupon Discount', NULL, NULL, NULL, NULL, NULL),
(404, 'added', 'Added', NULL, NULL, NULL, NULL, NULL),
(405, 'pay_with_ibayad', 'Pay With Ibayad', NULL, NULL, NULL, NULL, NULL),
(406, 'oneSTore.ph_invoice_paper', 'OneSTore.ph Invoice Paper', NULL, NULL, NULL, NULL, NULL),
(407, 'manage_categories', 'Manage Categories', NULL, NULL, NULL, NULL, NULL),
(408, 'add_blog_category', 'Add Blog Category', NULL, NULL, NULL, NULL, NULL),
(409, 'successfully_added!', 'Successfully Added!', NULL, NULL, NULL, NULL, NULL),
(410, 'create_blog_category', 'Create Blog Category', NULL, NULL, NULL, NULL, NULL),
(411, 'no', 'No', NULL, NULL, NULL, NULL, NULL),
(412, 'edit_blog_category', 'Edit Blog Category', NULL, NULL, NULL, NULL, NULL),
(413, 'successfully_edited!', 'Successfully Edited!', NULL, NULL, NULL, NULL, NULL),
(414, 'edit', 'Edit', NULL, NULL, NULL, NULL, NULL),
(415, 'really_want_to_delete_this?', 'Really Want To Delete This?', NULL, NULL, NULL, NULL, NULL),
(416, 'delete', 'Delete', NULL, NULL, NULL, NULL, NULL),
(417, 'blog_category', 'Blog Category', NULL, NULL, NULL, NULL, NULL),
(418, 'manage_blog', 'Manage Blog', NULL, NULL, NULL, NULL, NULL),
(419, 'add_blog', 'Add Blog', NULL, NULL, NULL, NULL, NULL),
(420, 'create_blog', 'Create Blog', NULL, NULL, NULL, NULL, NULL),
(421, 'back_to_blog_list', 'Back To Blog List', NULL, NULL, NULL, NULL, NULL),
(422, 'title', 'Title', NULL, NULL, NULL, NULL, NULL),
(423, 'edit_blog', 'Edit Blog', NULL, NULL, NULL, NULL, NULL),
(424, 'blog_details', 'Blog Details', NULL, NULL, NULL, NULL, NULL),
(425, 'blog_title', 'Blog Title', NULL, NULL, NULL, NULL, NULL),
(426, 'choose_file', 'Choose File', NULL, NULL, NULL, NULL, NULL),
(427, 'summery', 'Summery', NULL, NULL, NULL, NULL, NULL),
(428, 'description', 'Description', NULL, NULL, NULL, NULL, NULL),
(429, 'author', 'Author', NULL, NULL, NULL, NULL, NULL),
(430, 'reset', 'Reset', NULL, NULL, NULL, NULL, NULL),
(431, 'blog_has_been_uploaded!', 'Blog Has Been Uploaded!', NULL, NULL, NULL, NULL, NULL),
(432, 'upload', 'Upload', NULL, NULL, NULL, NULL, NULL),
(433, 'field_name', 'Field Name', NULL, NULL, NULL, NULL, NULL),
(434, 'customer_input_title', 'Customer Input Title', NULL, NULL, NULL, NULL, NULL),
(435, 'add_options_for_choice', 'Add Options For Choice', NULL, NULL, NULL, NULL, NULL),
(436, 'option_name', 'Option Name', NULL, NULL, NULL, NULL, NULL),
(437, 'option', 'Option', NULL, NULL, NULL, NULL, NULL),
(438, 'HUB_products', 'HUB Products', NULL, NULL, NULL, NULL, NULL),
(439, 'brands', 'Brands', NULL, NULL, NULL, NULL, NULL),
(440, 'slider_settings', 'Slider Settings', NULL, NULL, NULL, NULL, NULL),
(441, 'layer_slider', 'Layer Slider', NULL, NULL, NULL, NULL, NULL),
(442, 'top_slides', 'Top Slides', NULL, NULL, NULL, NULL, NULL),
(443, 'banner_settings', 'Banner Settings', NULL, NULL, NULL, NULL, NULL),
(444, 'staff_permissions', 'Staff Permissions', NULL, NULL, NULL, NULL, NULL),
(445, 'Manage_roles', 'Manage Roles', NULL, NULL, NULL, NULL, NULL),
(446, 'add_role', 'Add Role', NULL, NULL, NULL, NULL, NULL),
(447, 'create_role', 'Create Role', NULL, NULL, NULL, NULL, NULL),
(448, 'back_to_role_list', 'Back To Role List', NULL, NULL, NULL, NULL, NULL),
(449, 'edit_role', 'Edit Role', NULL, NULL, NULL, NULL, NULL),
(450, 'permissions', 'Permissions', NULL, NULL, NULL, NULL, NULL),
(451, 'product_sale_comparison', 'Product Sale Comparison', NULL, NULL, NULL, NULL, NULL),
(452, 'product_sale_comparison_report', 'Product Sale Comparison Report', NULL, NULL, NULL, NULL, NULL),
(453, 'edit_category', 'Edit Category', NULL, NULL, NULL, NULL, NULL),
(454, 'manage_page', 'Manage Page', NULL, NULL, NULL, NULL, NULL),
(455, 'add_page', 'Add Page', NULL, NULL, NULL, NULL, NULL),
(456, 'create_page', 'Create Page', NULL, NULL, NULL, NULL, NULL),
(457, 'back_to_page_list', 'Back To Page List', NULL, NULL, NULL, NULL, NULL),
(458, 'page_name', 'Page Name', NULL, NULL, NULL, NULL, NULL),
(459, 'publish', 'Publish', NULL, NULL, NULL, NULL, NULL),
(460, 'page', 'Page', NULL, NULL, NULL, NULL, NULL),
(461, 'brand', 'Brand', NULL, NULL, NULL, NULL, NULL),
(462, 'sale_price', 'Sale Price', NULL, NULL, NULL, NULL, NULL),
(463, 'creation_date', 'Creation Date', NULL, NULL, NULL, NULL, NULL),
(464, 'page_title', 'Page Title', NULL, NULL, NULL, NULL, NULL),
(465, 'parmalink', 'Parmalink', NULL, NULL, NULL, NULL, NULL),
(466, 'tags', 'Tags', NULL, NULL, NULL, NULL, NULL),
(467, 'number_of_page_parts', 'Number Of Page Parts', NULL, NULL, NULL, NULL, NULL),
(468, 'lets_start_to_create_your_page', 'Lets Start To Create Your Page', NULL, NULL, NULL, NULL, NULL),
(469, 'parts', 'Parts', NULL, NULL, NULL, NULL, NULL),
(470, 'select_size', 'Select Size', NULL, NULL, NULL, NULL, NULL),
(471, 'one-fourth', 'One-fourth', NULL, NULL, NULL, NULL, NULL),
(472, 'one-third', 'One-third', NULL, NULL, NULL, NULL, NULL),
(473, 'half', 'Half', NULL, NULL, NULL, NULL, NULL),
(474, 'two-third', 'Two-third', NULL, NULL, NULL, NULL, NULL),
(475, 'three-fourth', 'Three-fourth', NULL, NULL, NULL, NULL, NULL),
(476, 'full', 'Full', NULL, NULL, NULL, NULL, NULL),
(477, 'select_type', 'Select Type', NULL, NULL, NULL, NULL, NULL),
(478, 'content', 'Content', NULL, NULL, NULL, NULL, NULL),
(479, 'widget', 'Widget', NULL, NULL, NULL, NULL, NULL),
(480, 'not_more_than_4_columns!', 'Not More Than 4 Columns!', NULL, NULL, NULL, NULL, NULL),
(481, 'manage_sale', 'Manage Sale', NULL, NULL, NULL, NULL, NULL),
(482, 'ID', 'ID', NULL, NULL, NULL, NULL, NULL),
(483, 'sale_code', 'Sale Code', NULL, NULL, NULL, NULL, NULL),
(484, 'buyer', 'Buyer', NULL, NULL, NULL, NULL, NULL),
(485, 'full_invoice', 'Full Invoice', NULL, NULL, NULL, NULL, NULL),
(486, 'delivery_payment', 'Delivery Payment', NULL, NULL, NULL, NULL, NULL),
(487, 'sales', 'Sales', NULL, NULL, NULL, NULL, NULL),
(488, 'manage_product', 'Manage Product', NULL, NULL, NULL, NULL, NULL),
(489, 'add_product', 'Add Product', NULL, NULL, NULL, NULL, NULL),
(490, 'create_product', 'Create Product', NULL, NULL, NULL, NULL, NULL),
(491, 'back_to_product_list', 'Back To Product List', NULL, NULL, NULL, NULL, NULL),
(492, 'current_quantity', 'Current Quantity', NULL, NULL, NULL, NULL, NULL),
(493, 'today''s_deal', 'Today''s Deal', NULL, NULL, NULL, NULL, NULL),
(494, 'view_product', 'View Product', NULL, NULL, NULL, NULL, NULL),
(495, 'successfully_viewed!', 'Successfully Viewed!', NULL, NULL, NULL, NULL, NULL),
(496, 'view_discount', 'View Discount', NULL, NULL, NULL, NULL, NULL),
(497, 'viewing_discount!', 'Viewing Discount!', NULL, NULL, NULL, NULL, NULL),
(498, 'discount', 'Discount', NULL, NULL, NULL, NULL, NULL),
(499, 'add_product_quantity', 'Add Product Quantity', NULL, NULL, NULL, NULL, NULL),
(500, 'quantity_added!', 'Quantity Added!', NULL, NULL, NULL, NULL, NULL),
(501, 'stock', 'Stock', NULL, NULL, NULL, NULL, NULL),
(502, 'reduce_product_quantity', 'Reduce Product Quantity', NULL, NULL, NULL, NULL, NULL),
(503, 'quantity_reduced!', 'Quantity Reduced!', NULL, NULL, NULL, NULL, NULL),
(504, 'destroy', 'Destroy', NULL, NULL, NULL, NULL, NULL),
(505, 'edit_product', 'Edit Product', NULL, NULL, NULL, NULL, NULL),
(506, 'product_details', 'Product Details', NULL, NULL, NULL, NULL, NULL),
(507, 'business_details', 'Business Details', NULL, NULL, NULL, NULL, NULL),
(508, 'customer_choice_options', 'Customer Choice Options', NULL, NULL, NULL, NULL, NULL),
(509, 'product_title', 'Product Title', NULL, NULL, NULL, NULL, NULL),
(510, 'unit', 'Unit', NULL, NULL, NULL, NULL, NULL),
(511, 'unit_(e.g._kg,_pc_etc.)', 'Unit (e.g. Kg, Pc Etc.)', NULL, NULL, NULL, NULL, NULL),
(512, 'images', 'Images', NULL, NULL, NULL, NULL, NULL),
(513, 'if_you_need_more_field_for_your_product_,_please_click_here_for_more...', 'If You Need More Field For Your Product , Please Click Here For More...', NULL, NULL, NULL, NULL, NULL),
(514, 'add_more_fields', 'Add More Fields', NULL, NULL, NULL, NULL, NULL),
(515, 'purchase_price', 'Purchase Price', NULL, NULL, NULL, NULL, NULL),
(516, 'shipping_cost', 'Shipping Cost', NULL, NULL, NULL, NULL, NULL),
(517, 'product_tax', 'Product Tax', NULL, NULL, NULL, NULL, NULL),
(518, 'product_discount', 'Product Discount', NULL, NULL, NULL, NULL, NULL),
(519, 'product_color_options', 'Product Color Options', NULL, NULL, NULL, NULL, NULL),
(520, 'add_colors', 'Add Colors', NULL, NULL, NULL, NULL, NULL),
(521, 'if_you_need_more_choice_options_for_customers_of_this_product_,please_click_here.', 'If You Need More Choice Options For Customers Of This Product ,please Click Here.', NULL, NULL, NULL, NULL, NULL),
(522, 'add_customer_input_options', 'Add Customer Input Options', NULL, NULL, NULL, NULL, NULL),
(523, 'next', 'Next', NULL, NULL, NULL, NULL, NULL),
(524, 'previous', 'Previous', NULL, NULL, NULL, NULL, NULL),
(525, 'Partner', 'Partner', NULL, NULL, NULL, NULL, NULL),
(526, 'log_in_form', 'Log In Form', NULL, NULL, NULL, NULL, NULL),
(527, 'lost_your_password?', 'Lost Your Password?', NULL, NULL, NULL, NULL, NULL),
(528, 'your_email_address', 'Your Email Address', NULL, NULL, NULL, NULL, NULL),
(529, 'ADMINPANEL', 'ADMINPANEL', NULL, NULL, NULL, NULL, NULL),
(530, 'ADMINPANEL:_lost_password', 'ADMINPANEL: Lost Password', NULL, NULL, NULL, NULL, NULL),
(531, 'lost_password', 'Lost Password', NULL, NULL, NULL, NULL, NULL),
(532, 'daily_stock', 'Daily Stock', NULL, NULL, NULL, NULL, NULL),
(533, 'daily_sale', 'Daily Sale', NULL, NULL, NULL, NULL, NULL),
(534, 'daily_destroy', 'Daily Destroy', NULL, NULL, NULL, NULL, NULL),
(535, 'total_products', 'Total Products', NULL, NULL, NULL, NULL, NULL),
(536, 'daily_txn', 'Daily Txn', NULL, NULL, NULL, NULL, NULL),
(537, 'sub_category', 'Sub Category', NULL, NULL, NULL, NULL, NULL),
(538, 'get_stock_report', 'Get Stock Report', NULL, NULL, NULL, NULL, NULL),
(539, 'montly_txn', 'Montly Txn', NULL, NULL, NULL, NULL, NULL),
(540, 'montly_sale', 'Montly Sale', NULL, NULL, NULL, NULL, NULL),
(541, 'montly_stock', 'Montly Stock', NULL, NULL, NULL, NULL, NULL),
(542, 'montly_destroy', 'Montly Destroy', NULL, NULL, NULL, NULL, NULL),
(543, 'total_txn', 'Total Txn', NULL, NULL, NULL, NULL, NULL),
(544, 'total_sale', 'Total Sale', NULL, NULL, NULL, NULL, NULL),
(545, 'total_stock', 'Total Stock', NULL, NULL, NULL, NULL, NULL),
(546, 'total_destroy', 'Total Destroy', NULL, NULL, NULL, NULL, NULL),
(547, 'daily_product', 'Daily Product', NULL, NULL, NULL, NULL, NULL),
(548, 'monthly_txn', 'Monthly Txn', NULL, NULL, NULL, NULL, NULL),
(549, 'add_category', 'Add Category', NULL, NULL, NULL, NULL, NULL),
(550, 'create_category', 'Create Category', NULL, NULL, NULL, NULL, NULL),
(551, 'manage_sub_categories', 'Manage Sub Categories', NULL, NULL, NULL, NULL, NULL),
(552, 'add_sub-category', 'Add Sub-category', NULL, NULL, NULL, NULL, NULL),
(553, 'create_sub_category', 'Create Sub Category', NULL, NULL, NULL, NULL, NULL),
(554, 'edit_sub-category', 'Edit Sub-category', NULL, NULL, NULL, NULL, NULL),
(555, 'manage_your_product_stock', 'Manage Your Product Stock', NULL, NULL, NULL, NULL, NULL),
(556, 'destroy_product_entry', 'Destroy Product Entry', NULL, NULL, NULL, NULL, NULL),
(557, 'add_stock_entry_taken!', 'Add Stock Entry Taken!', NULL, NULL, NULL, NULL, NULL),
(558, 'add_product_stock', 'Add Product Stock', NULL, NULL, NULL, NULL, NULL),
(559, 'destroy_entry_taken!', 'Destroy Entry Taken!', NULL, NULL, NULL, NULL, NULL),
(560, 'create_stock', 'Create Stock', NULL, NULL, NULL, NULL, NULL),
(561, 'entry_type', 'Entry Type', NULL, NULL, NULL, NULL, NULL),
(562, 'note', 'Note', NULL, NULL, NULL, NULL, NULL),
(563, 'reduced_quantity_will_be_added.', 'Reduced Quantity Will Be Added.', NULL, NULL, NULL, NULL, NULL),
(564, 'daily_transaction', 'Daily Transaction', NULL, NULL, NULL, NULL, NULL),
(565, 'monthly_transaction', 'Monthly Transaction', NULL, NULL, NULL, NULL, NULL),
(566, 'total_transaction', 'Total Transaction', NULL, NULL, NULL, NULL, NULL),
(567, 'manage_users', 'Manage Users', NULL, NULL, NULL, NULL, NULL),
(568, 'view_profile', 'View Profile', NULL, NULL, NULL, NULL, NULL),
(569, 'users', 'Users', NULL, NULL, NULL, NULL, NULL),
(570, 'e-mail', 'E-mail', NULL, NULL, NULL, NULL, NULL),
(571, 'manage_coupons', 'Manage Coupons', NULL, NULL, NULL, NULL, NULL),
(572, 'add_coupon', 'Add Coupon', NULL, NULL, NULL, NULL, NULL),
(573, 'create_coupon', 'Create Coupon', NULL, NULL, NULL, NULL, NULL),
(574, 'code', 'Code', NULL, NULL, NULL, NULL, NULL),
(575, 'added_by', 'Added By', NULL, NULL, NULL, NULL, NULL),
(576, 'coupon', 'Coupon', NULL, NULL, NULL, NULL, NULL),
(577, 'visit_my_homepage', 'Visit My Homepage', NULL, NULL, NULL, NULL, NULL),
(578, 'total_sold', 'Total Sold', NULL, NULL, NULL, NULL, NULL),
(579, 'paid_by_customers', 'Paid By Customers', NULL, NULL, NULL, NULL, NULL),
(580, 'due_from_admin', 'Due From Admin', NULL, NULL, NULL, NULL, NULL),
(581, 'uploaded_products', 'Uploaded Products', NULL, NULL, NULL, NULL, NULL),
(582, 'published_products', 'Published Products', NULL, NULL, NULL, NULL, NULL),
(583, 'membership_details', 'Membership Details', NULL, NULL, NULL, NULL, NULL),
(584, 'display_name', 'Display Name', NULL, NULL, NULL, NULL, NULL),
(585, 'membership_expiration', 'Membership Expiration', NULL, NULL, NULL, NULL, NULL),
(586, 'maximum_products', 'Maximum Products', NULL, NULL, NULL, NULL, NULL),
(587, 'my_products', 'My Products', NULL, NULL, NULL, NULL, NULL),
(588, 'product_list', 'Product List', NULL, NULL, NULL, NULL, NULL),
(589, 'settings', 'Settings', NULL, NULL, NULL, NULL, NULL),
(590, 'my_packages', 'My Packages', NULL, NULL, NULL, NULL, NULL),
(591, 'manage_vendor_profile', 'Manage Vendor Profile', NULL, NULL, NULL, NULL, NULL),
(592, 'dashboards', 'Dashboards', NULL, NULL, NULL, NULL, NULL),
(593, 'thisday_transaction', 'Thisday Transaction', NULL, NULL, NULL, NULL, NULL),
(594, 'thisday_sale', 'Thisday Sale', NULL, NULL, NULL, NULL, NULL),
(595, 'thisday_stock', 'Thisday Stock', NULL, NULL, NULL, NULL, NULL),
(596, 'thisday_destroy', 'Thisday Destroy', NULL, NULL, NULL, NULL, NULL),
(597, 'thismonth_transaction', 'Thismonth Transaction', NULL, NULL, NULL, NULL, NULL),
(598, 'thismonth_sale', 'Thismonth Sale', NULL, NULL, NULL, NULL, NULL),
(599, 'thismonth_stock', 'Thismonth Stock', NULL, NULL, NULL, NULL, NULL),
(600, 'thismonth_destroy', 'Thismonth Destroy', NULL, NULL, NULL, NULL, NULL),
(601, 'thisyear_transaction', 'Thisyear Transaction', NULL, NULL, NULL, NULL, NULL),
(602, 'thisyear_sale', 'Thisyear Sale', NULL, NULL, NULL, NULL, NULL),
(603, 'thisyear_stock', 'Thisyear Stock', NULL, NULL, NULL, NULL, NULL),
(604, 'thisyear_destroy', 'Thisyear Destroy', NULL, NULL, NULL, NULL, NULL),
(605, 'this_day_transaction', 'This Day Transaction', NULL, NULL, NULL, NULL, NULL),
(606, 'this_day_sale', 'This Day Sale', NULL, NULL, NULL, NULL, NULL),
(607, 'this_day_stock', 'This Day Stock', NULL, NULL, NULL, NULL, NULL),
(608, 'this_day_destroy', 'This Day Destroy', NULL, NULL, NULL, NULL, NULL),
(609, 'this_month_transaction', 'This Month Transaction', NULL, NULL, NULL, NULL, NULL),
(610, 'this_month_sale', 'This Month Sale', NULL, NULL, NULL, NULL, NULL),
(611, 'this_month_stock', 'This Month Stock', NULL, NULL, NULL, NULL, NULL),
(612, 'this_month_destroy', 'This Month Destroy', NULL, NULL, NULL, NULL, NULL),
(613, 'this_year_transaction', 'This Year Transaction', NULL, NULL, NULL, NULL, NULL),
(614, 'this_year_sale', 'This Year Sale', NULL, NULL, NULL, NULL, NULL),
(615, 'this_year_stock', 'This Year Stock', NULL, NULL, NULL, NULL, NULL),
(616, 'this_year_destroy', 'This Year Destroy', NULL, NULL, NULL, NULL, NULL),
(617, 'marker_location', 'Marker Location', NULL, NULL, NULL, NULL, NULL),
(618, 'this_day_sold', 'This Day Sold', NULL, NULL, NULL, NULL, NULL),
(619, 'this_month_sold', 'This Month Sold', NULL, NULL, NULL, NULL, NULL),
(620, 'this_year_sold', 'This Year Sold', NULL, NULL, NULL, NULL, NULL),
(621, 'total_sale-PAID', 'Total Sale-PAID', NULL, NULL, NULL, NULL, NULL),
(622, 'total_sale-PREPAID', 'Total Sale-PREPAID', NULL, NULL, NULL, NULL, NULL),
(623, 'this_month_paid_sale', 'This Month Paid Sale', NULL, NULL, NULL, NULL, NULL),
(624, 'this_year_paid_sale', 'This Year Paid Sale', NULL, NULL, NULL, NULL, NULL),
(625, 'total_paid_sale', 'Total Paid Sale', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
`logo_id` int(11) NOT NULL,
  `name` longtext
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `name`) VALUES
(3, ''),
(4, ''),
(5, '');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
`membership_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `timespan` varchar(50) DEFAULT NULL,
  `pay_interval` varchar(50) DEFAULT NULL,
  `product_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `title`, `price`, `timespan`, `pay_interval`, `product_limit`) VALUES
(1, 'Gold', '0', '365', '', 100),
(2, 'Platinum', '0', '365', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `membership_payment`
--

CREATE TABLE IF NOT EXISTS `membership_payment` (
`membership_payment_id` int(11) NOT NULL,
  `vendor` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `details` longtext,
  `membership` int(11) DEFAULT NULL,
  `method` varchar(30) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_payment`
--

INSERT INTO `membership_payment` (`membership_payment_id`, `vendor`, `timestamp`, `amount`, `details`, `membership`, `method`, `status`) VALUES
(1, 2, 1445431370, 300, '', 1, 'cash', 'paid'),
(2, 3, 1445436511, 300, '', 1, 'cash', 'paid'),
(3, 4, 1445442163, 300, '', 1, 'cash', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`page_id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `page_name` varchar(100) DEFAULT NULL,
  `parmalink` varchar(100) DEFAULT NULL,
  `content` longtext,
  `parts` longtext,
  `tag` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
`permission_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `codename` varchar(30) DEFAULT NULL,
  `parent_status` varchar(30) DEFAULT NULL,
  `description` longtext
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `name`, `codename`, `parent_status`, `description`) VALUES
(1, 'staff', 'admin', 'parent', ''),
(2, 'edit', 'admin_edit', '1', ''),
(3, 'view', 'admin_view', '1', ''),
(4, 'delete', 'admin_delete', '1', ''),
(5, 'banner', 'banner', 'parent', ''),
(6, 'edit', 'banner_edit', '5', ''),
(7, 'view', 'banner_view', '5', ''),
(8, 'delete', 'banner_delete', '5', ''),
(9, 'brand', 'brand', 'parent', ''),
(10, 'edit', 'brand_edit', '9', ''),
(11, 'view', 'brand_view', '9', ''),
(12, 'delete', 'brand_delete', '9', ''),
(13, 'business settings', 'business_settings', 'parent', ''),
(14, 'edit', 'business_settings_edit', '13', ''),
(15, 'view', 'business_settings_view', '13', ''),
(16, 'delete', 'business_settings_delete', '13', ''),
(17, 'category', 'category', 'parent', ''),
(18, 'edit', 'category_edit', '17', ''),
(19, 'view', 'category_view', '17', ''),
(20, 'delete', 'category_delete', '17', ''),
(21, 'contact message', 'contact_message', 'parent', ''),
(22, 'edit', 'contact_message_edit', '21', ''),
(23, 'view', 'contact_message_view', '21', ''),
(24, 'delete', 'contact_message_delete', '21', ''),
(25, 'site settings', 'site_settings', 'parent', ''),
(26, 'edit', 'site_settings_edit', '25', ''),
(27, 'view', 'site_settings_view', '25', ''),
(28, 'delete', 'site_settings_delete', '25', ''),
(29, 'product', 'product', 'parent', ''),
(30, 'edit', 'product_edit', '29', ''),
(31, 'view', 'product_view', '29', ''),
(32, 'delete', 'product_delete', '29', ''),
(33, 'report', 'report', 'parent', ''),
(34, 'edit', 'report_edit', '33', ''),
(35, 'view', 'report_view', '33', ''),
(36, 'delete', 'report_delete', '33', ''),
(37, 'role', 'role', 'parent', ''),
(38, 'edit', 'role_edit', '37', ''),
(39, 'view', 'role_view', '37', ''),
(40, 'delete', 'role_delete', '37', ''),
(41, 'sale', 'sale', 'parent', ''),
(42, 'edit', 'sale_edit', '41', ''),
(43, 'view', 'sale_view', '41', ''),
(44, 'delete', 'sale_delete', '41', ''),
(45, 'slider', 'slider', 'parent', ''),
(46, 'edit', 'slider_edit', '45', ''),
(47, 'view', 'slider_view', '45', ''),
(48, 'delete', 'slider_delete', '45', ''),
(49, 'stock', 'stock', 'parent', ''),
(50, 'edit', 'stock_edit', '49', ''),
(51, 'view', 'stock_view', '49', ''),
(52, 'delete', 'stock_delete', '49', ''),
(53, 'sub category', 'sub_category', 'parent', ''),
(54, 'edit', 'sub_category_edit', '53', ''),
(55, 'view', 'sub_category_view', '53', ''),
(56, 'delete', 'sub_category_delete', '53', ''),
(57, 'user', 'user', 'parent', ''),
(58, 'edit', 'user_edit', '57', ''),
(59, 'view', 'user_view', '57', ''),
(60, 'delete', 'user_delete', '57', ''),
(61, 'newsletter', 'newsletter', 'parent', ''),
(62, 'language', 'language', 'parent', ''),
(63, 'page', 'page', 'parent', ''),
(64, 'Discount Coupon', 'coupon', 'parent', ''),
(65, 'vendor', 'vendor', 'parent', ''),
(66, 'membership', 'membership', 'parent', ''),
(67, 'SEO', 'seo', 'parent', ''),
(68, 'Membership Payments', 'membership_payment', 'parent', ''),
(69, 'blog', 'blog', 'parent', NULL),
(70, 'slides', 'slides', 'parent', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `rating_num` int(11) NOT NULL DEFAULT '0',
  `rating_total` int(11) NOT NULL DEFAULT '0',
  `rating_user` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sub_category` int(11) NOT NULL,
  `num_of_imgs` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sale_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `purchase_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `shipping_cost` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `add_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `featured` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tag` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `front_image` longtext COLLATE utf8_unicode_ci,
  `brand` longtext COLLATE utf8_unicode_ci NOT NULL,
  `current_stock` int(11) DEFAULT '0',
  `unit` longtext COLLATE utf8_unicode_ci NOT NULL,
  `additional_fields` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_view` int(11) NOT NULL DEFAULT '0',
  `background` longtext COLLATE utf8_unicode_ci,
  `discount` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `discount_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tax` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `tax_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `color` longtext COLLATE utf8_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8_unicode_ci NOT NULL,
  `main_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `added_by` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `download` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `download_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deal` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `rating_num`, `rating_total`, `rating_user`, `title`, `category`, `description`, `sub_category`, `num_of_imgs`, `sale_price`, `purchase_price`, `shipping_cost`, `add_timestamp`, `featured`, `tag`, `status`, `front_image`, `brand`, `current_stock`, `unit`, `additional_fields`, `number_of_view`, `background`, `discount`, `discount_type`, `tax`, `tax_type`, `color`, `options`, `main_image`, `added_by`, `download`, `download_name`, `deal`) VALUES
(1, 1, 3, '["1"]', 'Crispy Garlic Bits in Oil', 1, '<span style="text-align: justify;">Ingredients:</span><br style="text-align: justify;"><span style="text-align: justify;">Vegetable palm oil and Garlic</span><br style="text-align: justify;"><br style="text-align: justify;"><span style="text-align: justify;">283.5 g (10 oz) per bottle</span><br style="text-align: justify;"><span style="text-align: justify;">24 bottles per box</span><strong [removed]="color: rgb(150, 151, 157); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.3333px; line-height: 20px; text-align: justify;"><strong [removed]="color: rgb(150, 151, 157); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.3333px; font-weight: normal; line-height: 20px; text-align: justify;"><br style="color: rgb(150, 151, 157); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.3333px; font-weight: normal; line-height: 20px; text-align: justify;"></strong></strong>', 5, '5', '169.00', '130.00', '', '1436646563', '0', 'cec', 'ok', NULL, '', 0, 'bottle', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12.00', 'percent', 'null', '[]', '', '{"type":"vendor","id":"1"}', NULL, NULL, NULL),
(2, 1, 4, '["1"]', 'Chili Garlic oil', 1, '                                                                                                                                                                                                        <span lang="EN-PH" [removed]="" rgb(150,="" 151,="" 157);="" font-family:="" ''helvetica="" neue'',="" helvetica,="" arial,="" sans-serif;="" font-size:="" 13.3333px;="" line-height:="" 20px;="" text-align:="" justify;"=""><span lang="EN-PH"><strong>Ingredients:</strong><br>Vegetable palm oil,&nbsp;Garlic,&nbsp;Chili<br><br>113g (4 oz) per bottle<br>24 bottles per box<br></span></span>                                                                                                                                                                                                                                                                                                                                                                        ', 5, '3', '117.00', '90.00', '0', '1436646639', '', 'cec', 'ok', NULL, '', 992, 'bottle', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12', 'percent', 'null', '[]', '', '{"type":"vendor","id":"1"}', NULL, NULL, NULL),
(5, 1, 4, '["1"]', 'Extra Hot Chili Oil', 1, '                                        <span lang="EN-PH" style="text-align: justify;">Ingredient:<br>Natural chili<br><br>113g (4 oz)</span><span style="text-align: justify;">&nbsp;per bottle.</span><br style="text-align: justify;"><span style="text-align: justify;">24 bottles per box</span><strong [removed]="color: rgb(150, 151, 157); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.3333px; line-height: 20px; text-align: justify;"><br><p></p></strong>', 5, '1', '117.00', '90.00', '0', '1444968117', 'ok', 'cec', 'ok', NULL, '', 996, 'bottle', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12', 'percent', 'null', '[]', '0', '{"type":"vendor","id":"1"}', NULL, NULL, NULL),
(6, 1, 5, '["1"]', 'Chicha-Rabao', 1, '                                                                                                                        <span style="text-align: justify;">Carabao Chicharon</span><br style="text-align: justify;"><br style="text-align: justify;"><span style="color: rgb(150, 151, 157); font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 13.3333px; line-height: 20px; text-align: justify;">Flavors:&nbsp;Onion vinegar, Garlic Flavor, Hot &amp; Spicy</span><br style="text-align: justify;"><br style="text-align: justify;"><span lang="EN-PH" style="text-align: justify;">80g&nbsp;</span><span style="text-align: justify;">per pack.</span><br style="text-align: justify;"><span style="text-align: justify;">60 packs per bale</span><br><br><span style="text-align: justify;">Ingredients:&nbsp;</span><br style="text-align: justify;"><span style="text-align: justify;">Processed Carabao Skin</span><br style="text-align: justify;"><span style="text-align: justify;">Seasoning &amp; Vegetable Oil</span>', 6, '5', '65.00', '50.00', '0', '1445431728', 'ok', 'chicharon', 'ok', NULL, '', 999, 'Pack', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12', 'percent', 'null', '[]', '0', '{"type":"vendor","id":"2"}', NULL, NULL, NULL),
(7, 0, 0, '[]', 'Rimo Instant Blends', 1, '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <p>This blend is processed by extrusion cooking method and is ready-to-eat by adding previously boiled water. It contains 120 kcal of energy and 4 grams of protein per 30 grams, enough to meet 16.7% of recommended energy and 28.6% of protein for 6 months to less than 23 months old children. </p><p>Quantity: 30g</p><p><span [removed]="" rgb(150,="" 151,="" 157);="" font-family:="" ''helvetica="" neue'',="" helvetica,="" arial,="" sans-serif;="" font-size:="" 13.3333px;="" line-height:="" 20px;"="">Ingredients:</span> Rice, Mongo Beans</p>', 6, '5', '9.75', '7.50', '0', '1445437430', 'ok', 'rimo', 'ok', NULL, '', 1000, 'sachet', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12', 'percent', 'null', '[]', '0', '{"type":"vendor","id":"3"}', NULL, NULL, NULL),
(8, 0, 0, '[]', 'Momsie - bottle', 1, '                                                                                <p>Generic Description (FNRI):</p><p>Momsie is specially designed to meet the nutritional requirements of children ages 6 months up to 3 years old. It is high in energy with a rich, nutty chocolate flavor that children will definitely love. It is specially processed using state-of-the-art equipment. One pack of 25 grams provides 578 calories, 40 g fat, and 12 g protein.&nbsp; It provides minerals &amp; vitamins such as folate, iron, calcium, zinc, vitamin A and vitamin C.</p><p>Price:&nbsp;150g jar(95.00) &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>Quantity:&nbsp;150g jar</p><p><span [removed]="" rgb(150,="" 151,="" 157);="" font-family:="" ''helvetica="" neue'',="" helvetica,="" arial,="" sans-serif;="" font-size:="" 13.3333px;="" line-height:="" 20px;"="">Ingredients:</span>&nbsp;Soybean, Peanuts, Sesame Seeds, Mongo Oil, Skim Milk, Margarine, Cocoa, Sugar, Salt and Emulsifier</p>', 5, '2', '143.00', '110.00', '0', '1445438385', 'ok', 'momsie', 'ok', NULL, '', 1000, 'bottle', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12', 'percent', 'null', '[]', '0', '{"type":"vendor","id":"3"}', NULL, NULL, NULL),
(9, 1, 4, '["1"]', 'Momsie - sachet', 1, '                                                                                <p>Generic Description (FNRI):</p><p>Momsie is specially designed to meet the nutritional requirements of children ages 6 months up to 3 years old. It is high in energy with a rich, nutty chocolate flavor that children will definitely love. It is specially processed using state-of-the-art equipment. One pack of 25 grams provides 578 calories, 40 g fat, and 12 g protein.&nbsp; It provides minerals &amp; vitamins such as folate, iron, calcium, zinc, vitamin A and vitamin C.&nbsp; &nbsp; &nbsp; &nbsp;</p><p>Quantity:&nbsp;25g paste</p><p><span [removed]="" rgb(150,="" 151,="" 157);="" font-family:="" ''helvetica="" neue'',="" helvetica,="" arial,="" sans-serif;="" font-size:="" 13.3333px;="" line-height:="" 20px;"="">Ingredients:</span>&nbsp;Soybean, Peanuts, Sesame Seeds, Mongo Oil, Skim Milk, Margarine, Cocoa, Sugar, Salt and Emulsifier</p>', 5, '2', '26.21', '20.16', '0', '1445439230', 'ok', 'momsie', 'ok', NULL, '', 990, 'sachet', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12', 'percent', 'null', '[]', '0', '{"type":"vendor","id":"3"}', NULL, NULL, NULL),
(10, 0, 0, '[]', 'Rimo Curls', 1, '                                                                                                                        <p>Flavor: Cheese</p><p>Quantity: 30g</p><p>Ingredients: Rice, Mongo Beans, Vegetable Oil, Cheese Powder</p><p>This is an extruded snack food made from a blend of rice flour and mongo flour. It contains 130 kcal of energy and 4 grams of protein per 30 grams, enough to meet 12.1% of recommended energy and 14.3% of recommended protein intake of 1 to 3 years old children. It is a nutritious snack food for children and adults as well.<br></p>', 6, '4', '13.00', '10.00', '0', '1445439593', '', 'rimo', 'ok', NULL, '', 999, 'pack', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12', 'percent', 'null', '[]', '0', '{"type":"vendor","id":"3"}', NULL, NULL, NULL),
(11, 1, 5, '["1"]', 'Eco Speaker', 3, '                                        Eco speaker is made of 1 foot long approximately 5 inches diameter bamboo plank. It is holed along the center as an entry for any music playing device especially cellphones. The Eco Speaker blocks the dispersal of sound waves across the axis of the bamboo due to confinement. Therefore there will now be a&nbsp;constructive amplification&nbsp;of sound waves along the mouthed end to end opening of the bamboo.', 7, '4', '436.80', '336.00', '0', '1445442494', '', 'speaker', 'ok', NULL, '', 479, 'piece', '{"name":"null","value":"null"}', 1, NULL, '30', 'percent', '12', 'percent', '["rgba(138,106,46,1)","rgba(89,137,209,1)","rgba(227,67,124,1)","rgba(250,142,63,1)"]', '[{"no":"1","title":"Flavor","name":"choice_1","type":"radio","option":["Chilli","Sweet","Garlic"]}]', '0', '{"type":"vendor","id":"4"}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`role_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `permission` varchar(100) DEFAULT NULL,
  `description` longtext
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `permission`, `description`) VALUES
(1, 'master', '', 'Master Admin. Adds Admin. Provides account roles.'),
(9, 'Super Admin', '["1","13","17","21","25","29","33","41","49","53","57","61","63","64","65","66","67","68","69"]', 'Super Administrator'),
(7, 'Regional Coordinators', 'null', 'Regional Coordinators'),
(8, 'Administrator', '["21","29","41","49","53","57","61","64","65","66","68","69"]', 'oneSTore Administrator'),
(10, 'Logistics', '["41"]', 'Logistics Role is monitor sales'),
(11, 'Blogger', '["69"]', 'Blogger');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
`sale_id` int(11) NOT NULL,
  `sale_code` longtext,
  `buyer` longtext,
  `product_details` longtext,
  `shipping_address` longtext,
  `vat` longtext,
  `vat_percent` varchar(10) DEFAULT NULL,
  `shipping` longtext,
  `payment_type` varchar(100) DEFAULT NULL,
  `payment_status` longtext,
  `payment_details` longtext,
  `payment_timestamp` longtext,
  `grand_total` longtext,
  `sale_datetime` longtext,
  `delivary_datetime` longtext,
  `delivery_status` longtext,
  `viewed` longtext
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `sale_code`, `buyer`, `product_details`, `shipping_address`, `vat`, `vat_percent`, `shipping`, `payment_type`, `payment_status`, `payment_details`, `payment_timestamp`, `grand_total`, `sale_datetime`, `delivary_datetime`, `delivery_status`, `viewed`) VALUES
(1, '2016071', '1', '{"d3d9446802a44259755d38e6d163e820":{"id":"10","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":8,"name":"Rimo-Curls","shipping":"0","tax":1.2,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_10_1_thumb.jpg","coupon":"","rowid":"d3d9446802a44259755d38e6d163e820","subtotal":8}}', '{"firstname":"Christopher Musni 2","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","address2":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.614239, 121.727096)","payment_type":"cash_on_delivery"}', '1.2', '', '0', 'cash_on_delivery', '[{"vendor":"3","status":"due"}]', '', NULL, '9.2', '1467797815', '', '[{"vendor":"3","status":"pending","delivery_time":""}]', 'ok'),
(2, '2016072', '1', '[]', '{"firstname":"Christopher Musni","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","address2":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.614239, 121.727096)","payment_type":"cash_on_delivery"}', '0', '', '0', 'cash_on_delivery', '[]', '', NULL, '0', '1467797897', '', '[]', 'ok'),
(3, '2016073', '1', '{"45c48cce2e2d7fbdea1afc51c7c6ad26":{"id":"9","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":17.34,"name":"Momsie-sachet","shipping":"0","tax":2.4192,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_9_1_thumb.jpg","coupon":"","rowid":"45c48cce2e2d7fbdea1afc51c7c6ad26","subtotal":17.34}}', '{"firstname":"Christopher Musni","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","address2":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.614239, 121.727096)","payment_type":"cash_on_delivery"}', '2.4192', '', '0', 'cash_on_delivery', '[{"vendor":"3","status":"due"}]', '', NULL, '19.7592', '1467797986', '', '[{"vendor":"3","status":"pending","delivery_time":""}]', 'ok'),
(4, '2016074', '1', '{"45c48cce2e2d7fbdea1afc51c7c6ad26":{"id":"9","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":17.34,"name":"Momsie-sachet","shipping":"0","tax":2.4192,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_9_1_thumb.jpg","coupon":"","rowid":"45c48cce2e2d7fbdea1afc51c7c6ad26","subtotal":17.34}}', '{"firstname":"Christopher Musni","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","address2":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.614239, 121.727096)","payment_type":"cash_on_delivery"}', '2.4192', '', '0', 'cash_on_delivery', '[{"vendor":"3","status":"due"}]', '', NULL, '19.7592', '1467869081', '', '[{"vendor":"3","status":"pending","delivery_time":""}]', 'ok'),
(5, '2016075', '1', '{"45c48cce2e2d7fbdea1afc51c7c6ad26":{"id":"9","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":17.34,"name":"Momsie-sachet","shipping":"0","tax":2.4192,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_9_1_thumb.jpg","coupon":"","rowid":"45c48cce2e2d7fbdea1afc51c7c6ad26","subtotal":17.34}}', '{"firstname":"Christopher Musni","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","address2":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.61312205598191, 121.72191739082336)","payment_type":"cash_on_delivery"}', '2.4192', '', '0', 'cash_on_delivery', '[{"vendor":"3","status":"due"}]', '', NULL, '19.7592', '1467869132', '', '[{"vendor":"3","status":"pending","delivery_time":""}]', 'ok'),
(6, '2016076', '1', '{"e4da3b7fbbce2345d7772b0674a318d5":{"id":"5","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":80.1,"name":"Extra-Hot-Chili-Oil","shipping":0,"tax":10.8,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_5_1_thumb.jpg","coupon":"","rowid":"e4da3b7fbbce2345d7772b0674a318d5","subtotal":80.1}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '10.8', '', '150', 'cash_on_delivery', '[{"vendor":"1","status":"due"}]', '', NULL, '240.9', '1468795998', '', '[{"vendor":"1","status":"pending","delivery_time":""}]', 'ok'),
(7, '2016077', '1', '{"45c48cce2e2d7fbdea1afc51c7c6ad26":{"id":"9","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":17.34,"name":"Momsie-sachet","shipping":0,"tax":2.4192,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_9_1_thumb.jpg","coupon":"","rowid":"45c48cce2e2d7fbdea1afc51c7c6ad26","subtotal":17.34}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '2.4192', '', '150', 'cash_on_delivery', '[{"vendor":"3","status":"due"}]', '', NULL, '169.7592', '1468802790', '', '[{"vendor":"3","status":"pending","delivery_time":""}]', 'ok'),
(8, '2016078', '1', '{"6512bd43d9caa6e02c990b0a82652dca":{"id":"11","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"},\\"choice_1\\":{\\"title\\":\\"Flavor\\",\\"value\\":null}}","price":336,"name":"Eco-Speaker","shipping":0,"tax":40.32,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_11_1_thumb.jpg","coupon":"","rowid":"6512bd43d9caa6e02c990b0a82652dca","subtotal":336}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '40.32', '', '150', 'cash_on_delivery', '[{"vendor":"4","status":"due"}]', '', NULL, '526.32', '1469315571', '', '[{"vendor":"4","status":"pending","delivery_time":""}]', NULL),
(9, '2016079', '1', '{"45c48cce2e2d7fbdea1afc51c7c6ad26":{"id":"9","qty":3,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":17.34,"name":"Momsie-sachet","shipping":0,"tax":2.4192,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_9_1_thumb.jpg","coupon":"","rowid":"45c48cce2e2d7fbdea1afc51c7c6ad26","subtotal":52.02}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '7.2576', '', '150', 'cash_on_delivery', '[{"vendor":"3","status":"due"}]', '', NULL, '209.2776', '1469316170', '', '[{"vendor":"3","status":"pending","delivery_time":""}]', NULL),
(10, '20160710', '1', '{"6512bd43d9caa6e02c990b0a82652dca":{"id":"11","qty":3,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"rgba(138,106,46,1)\\"},\\"choice_1\\":{\\"title\\":\\"Flavor\\",\\"value\\":\\"Garlic\\"}}","price":336,"name":"Eco-Speaker","shipping":0,"tax":40.32,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_11_1_thumb.jpg","coupon":"","rowid":"6512bd43d9caa6e02c990b0a82652dca","subtotal":1008}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '120.96', '', '150', 'cash_on_delivery', '[{"vendor":"4","status":"due"}]', '', NULL, '1278.96', '1469321051', '', '[{"vendor":"4","status":"pending","delivery_time":""}]', NULL),
(11, '20160711', '1', '{"6512bd43d9caa6e02c990b0a82652dca":{"id":"11","qty":3,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"rgba(89,137,209,1)\\"},\\"choice_1\\":{\\"title\\":\\"Flavor\\",\\"value\\":\\"Sweet\\"}}","price":336,"name":"Eco-Speaker","shipping":0,"tax":40.32,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_11_1_thumb.jpg","coupon":"","rowid":"6512bd43d9caa6e02c990b0a82652dca","subtotal":1008}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '120.96', '', '150', 'cash_on_delivery', '[{"vendor":"4","status":"due"}]', '', NULL, '1278.96', '1469321902', '', '[{"vendor":"4","status":"pending","delivery_time":""}]', NULL),
(12, '20160712', '1', '{"6512bd43d9caa6e02c990b0a82652dca":{"id":"11","qty":4,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"rgba(138,106,46,1)\\"},\\"choice_1\\":{\\"title\\":\\"Flavor\\",\\"value\\":null}}","price":336,"name":"Eco-Speaker","shipping":0,"tax":40.32,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_11_1_thumb.jpg","coupon":"","rowid":"6512bd43d9caa6e02c990b0a82652dca","subtotal":1344}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '161.28', '', '150', 'cash_on_delivery', '[{"vendor":"4","status":"due"}]', '', NULL, '1655.28', '1469322048', '', '[{"vendor":"4","status":"pending","delivery_time":""}]', NULL),
(13, '20160713', '1', '{"6512bd43d9caa6e02c990b0a82652dca":{"id":"11","qty":3,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"rgba(227,67,124,1)\\"},\\"choice_1\\":{\\"title\\":\\"Flavor\\",\\"value\\":\\"Garlic\\"}}","price":336,"name":"Eco-Speaker","shipping":0,"tax":40.32,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_11_1_thumb.jpg","coupon":"","rowid":"6512bd43d9caa6e02c990b0a82652dca","subtotal":1008}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '120.96', '', '150', 'cash_on_delivery', '[{"vendor":"4","status":"due"}]', '', NULL, '1278.96', '1469323219', '', '[{"vendor":"4","status":"pending","delivery_time":""}]', NULL),
(14, '20160714', '1', '{"45c48cce2e2d7fbdea1afc51c7c6ad26":{"id":"9","qty":2,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":17.34,"name":"Momsie-sachet","shipping":0,"tax":2.4192,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_9_1_thumb.jpg","coupon":"","rowid":"45c48cce2e2d7fbdea1afc51c7c6ad26","subtotal":34.68}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '4.8384', '', '150', 'cash_on_delivery', '[{"vendor":"3","status":"due"}]', '', NULL, '189.5184', '1469323291', '', '[{"vendor":"3","status":"pending","delivery_time":""}]', NULL),
(15, '20160715', '1', '[]', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '0', '', '150', 'cash_on_delivery', '[]', '', NULL, '150', '1469323314', '', '[]', NULL),
(16, '20160716', '1', '{"6512bd43d9caa6e02c990b0a82652dca":{"id":"11","qty":7,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"rgba(250,142,63,1)\\"},\\"choice_1\\":{\\"title\\":\\"Flavor\\",\\"value\\":\\"Sweet\\"}}","price":336,"name":"Eco-Speaker","shipping":0,"tax":40.32,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_11_1_thumb.jpg","coupon":"","rowid":"6512bd43d9caa6e02c990b0a82652dca","subtotal":2352}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '282.24', '', '150', 'cash_on_delivery', '[{"vendor":"4","status":"due"}]', '', NULL, '2784.24', '1469326652', '', '[{"vendor":"4","status":"pending","delivery_time":""}]', NULL),
(17, '20160717', '1', '{"45c48cce2e2d7fbdea1afc51c7c6ad26":{"id":"9","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":17.34,"name":"Momsie-sachet","shipping":0,"tax":2.4192,"image":"http:\\/\\/localhost\\/www\\/os_v25\\/uploads\\/product_image\\/product_9_1_thumb.jpg","coupon":"","rowid":"45c48cce2e2d7fbdea1afc51c7c6ad26","subtotal":17.34}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '2.4192', '', '150', 'cash_on_delivery', '[{"vendor":"3","status":"due"}]', '', NULL, '169.7592', '1469343303', '', '[{"vendor":"3","status":"pending","delivery_time":""}]', NULL),
(18, '20160718', '1', '{"c81e728d9d4c2f636f067f89cc14862c":{"id":"2","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":74.7,"name":"Chili-Garlic-oil","shipping":0,"tax":10.8,"image":"http:\\/\\/localhost\\/www\\/os_v25_20160724c\\/uploads\\/product_image\\/product_2_2_thumb.jpg","coupon":"","rowid":"c81e728d9d4c2f636f067f89cc14862c","subtotal":74.7}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '10.8', '', '150', 'cash_on_delivery', '[{"vendor":"1","status":"due"}]', '', NULL, '235.5', '1469359078', '', '[{"vendor":"1","status":"pending","delivery_time":""}]', NULL),
(19, '20170419', '1', '{"e4da3b7fbbce2345d7772b0674a318d5":{"id":"5","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":81.9,"name":"Extra-Hot-Chili-Oil","shipping":0,"tax":14.04,"image":"http:\\/\\/localhost\\/www\\/os_v27\\/uploads\\/product_image\\/product_5_1_thumb.jpg","coupon":"","rowid":"e4da3b7fbbce2345d7772b0674a318d5","subtotal":81.9}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '14.04', '', '150', 'cash_on_delivery', '[{"vendor":"1","status":"due"}]', '', NULL, '245.94', '1492226088', '', '[{"vendor":"1","status":"pending","delivery_time":""}]', NULL),
(20, '20170420', '1', '{"e4da3b7fbbce2345d7772b0674a318d5":{"id":"5","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":81.9,"name":"Extra-Hot-Chili-Oil","shipping":0,"tax":14.04,"image":"http:\\/\\/localhost\\/www\\/os_v27\\/uploads\\/product_image\\/product_5_1_thumb.jpg","coupon":"","rowid":"e4da3b7fbbce2345d7772b0674a318d5","subtotal":81.9}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '14.04', '', '150', 'cash_on_delivery', '[{"vendor":"1","status":"due"}]', '', NULL, '245.94', '1492241534', '', '[{"vendor":"1","status":"pending","delivery_time":""}]', NULL),
(21, '20170421', '1', '{"e4da3b7fbbce2345d7772b0674a318d5":{"id":"5","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":81.9,"name":"Extra-Hot-Chili-Oil","shipping":0,"tax":14.04,"image":"http:\\/\\/localhost\\/www\\/os_v27\\/uploads\\/product_image\\/product_5_1_thumb.jpg","coupon":"","rowid":"e4da3b7fbbce2345d7772b0674a318d5","subtotal":81.9}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '14.04', '', '150', 'cash_on_delivery', '[{"vendor":"1","status":"due"}]', '', NULL, '245.94', '1492242269', '', '[{"vendor":"1","status":"pending","delivery_time":""}]', 'ok'),
(22, '20170422', '1', '{"c81e728d9d4c2f636f067f89cc14862c":{"id":"2","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":81.9,"name":"Chili-Garlic-oil","shipping":0,"tax":14.04,"image":"http:\\/\\/localhost\\/www\\/os_v27\\/uploads\\/product_image\\/product_2_2_thumb.jpg","coupon":"","rowid":"c81e728d9d4c2f636f067f89cc14862c","subtotal":81.9},"1679091c5a880faf6fb5e6087eb1b2dc":{"id":"6","qty":1,"option":"{\\"color\\":{\\"title\\":\\"Color\\",\\"value\\":\\"\\"}}","price":45.5,"name":"Chicha-Rabao","shipping":0,"tax":7.8,"image":"http:\\/\\/localhost\\/www\\/os_v27\\/uploads\\/product_image\\/product_6_1_thumb.jpg","coupon":"","rowid":"1679091c5a880faf6fb5e6087eb1b2dc","subtotal":45.5}}', '{"firstname":"Christopher","email":"christopher.musni@gmail.com","lastname":"Musni","phone":"+639174842282","address1":"Tuguegarao City, Cagayan","city":"Tuguegarao City","zip":"3500","langlat":"(17.6131813, 121.72702060000006)","payment_type":"cash_on_delivery"}', '21.84', '', '150', 'cash_on_delivery', '[{"vendor":"1","status":"due"},{"vendor":"2","status":"due"}]', '', NULL, '299.24', '1492322120', '', '[{"vendor":"1","status":"pending","delivery_time":""},{"vendor":"2","status":"pending","delivery_time":""}]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`slider_id` int(11) NOT NULL,
  `elements` longtext,
  `status` longtext,
  `title` longtext,
  `style` varchar(20) DEFAULT NULL,
  `serial` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `elements`, `status`, `title`, `style`, `serial`) VALUES
(3, '{"images":["ase"],"texts":[{"name":"text_1","text":"Introducing","color":"rgba(96,109,100,1)","background":"rgba(1,1,1,0)"},{"name":"text_2","text":"oneSTore","color":"rgba(84,165,116,1)","background":"rgba(1,1,1,0)"},{"name":"text_3","text":"Bringing quality Products to your Doorsteps","color":"rgba(96,109,100,1)","background":"rgba(1,1,1,0)"}]}', '0', 'welcome_slider', '11', 0),
(4, '{"images":["ase"],"texts":[{"name":"text_1","text":"Welcome to","color":"rgba(255,255,255,1)","background":"rgba(96,109,100,1)"},{"name":"text_2","text":"oneSTore","color":"rgba(255,255,255,1)","background":"rgba(84,165,116,1)"}]}', '0', 'welcome_slider2', '2', 0),
(5, '{"images":[],"texts":[{"name":"text_1","text":"Welcome to","color":"rgba(96,109,100,1)","background":"rgba(0,0,0,0)"},{"name":"text_2","text":"oneSTore","color":"rgba(84,165,116,1)","background":"rgba(0,0,0,0)"},{"name":"text_3","text":"Bringing quality Products to your Doorsteps","color":"rgba(96,109,100,1)","background":"rgba(0,0,0,0)"}]}', '0', 'welcome_slider3', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_style`
--

CREATE TABLE IF NOT EXISTS `slider_style` (
`slider_style_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` longtext
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_style`
--

INSERT INTO `slider_style` (`slider_style_id`, `name`, `value`) VALUES
(1, 'WELCOME TYPE 1', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:6500;transition2d:all;transition3d:15;\\"",\r\n   "background":"bg",\r\n   "images":[\r\n\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h1",\r\n         "show_name":"WELCOME",\r\n         "name":"text_1",\r\n         "style":"top:30%;left:50%;text-shadow: 0px 0px 20px white;font-weight: 300;font-size:50px;",\r\n         "data_ls":"offsetxin:0;durationin:2500;offsetxout:0;durationout:2500;showuntil:1;",\r\n         "color":"#ffffff",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h1",\r\n         "show_name":"YOUR SHOP NAME",\r\n         "name":"text_2",\r\n         "style":"top:50%;left:50%;text-shadow: 0px 0px 20px white;font-weight: 300;font-size:100px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:2500;delayin:500;offsetxout:0;durationout:2500;showuntil:1;",\r\n         "color":"#ffffff",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h1",\r\n         "show_name":"SHOP TITLE",\r\n         "name":"text_3",\r\n         "style":"top:70%;left:50%;text-shadow: 0px 0px 20px white;font-weight: 300;font-size:40px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:2500;delayin:1200;offsetxout:0;durationout:2500;showuntil:1;",\r\n         "color":"#ffffff",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(2, 'WELCOME TYPE 2', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:4500;transition2d:24,25,27,28,34,35,37,38,110,113;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "show_name":"Image 1",\r\n         "name":"ase",\r\n         "style":"top:20px;left:50%;width:220px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;offsetyin:top;durationin:4600;easingin:easeOutQuad;fadein:false;rotatein:-10;offsetxout:0;durationout:1500;"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h5",\r\n         "show_name":"WELCOME TO",\r\n         "name":"text_1",\r\n         "style":"top:260px; left:50%; text-align: center; font-weight: 300;width:300px;height:60px;font-size:30px;line-height:60px;border-radius:5px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:top;durationout:750;durationin:1000;fadeout:false;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"YOUR SHOP NAME",\r\n         "name":"text_2",\r\n         "style":"top:340px;left:50%;text-align: center;font-weight: 300; width:500px; height:100px; font-size:40px; line-height:100px; border-radius:5px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:bottom;durationin:1000;durationout:750;fadeout:false;",\r\n         "color":"#ffffff",\r\n         "background":"#8D00B0"\r\n      }\r\n   ]\r\n}'),
(3, 'SLIDER TYPE 1', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7000;transition2d:76,77,78,79;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "show_name":"Product Image 1",\r\n         "name":"circle_1",\r\n         "style":"top:35%;left:60%;width:200px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;offsetyin:top;durationin:750;delayin:1500;easingin:easeOutQuart;fadein:false;offsetxout:right;durationout:1000;showuntil:1;easingout:easeInQuart;fadeout:false;"\r\n      },\r\n      {\r\n         "show_name":"Product Image 2",\r\n         "name":"circle_2",\r\n         "style":"top:35%;left:60%;width:200px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;offsetyin:top;durationin:750;delayin:3000;easingin:easeOutQuart;fadein:false;offsetxout:right;durationout:1000;showuntil:1;easingout:easeInQuart;fadeout:false;"\r\n      },\r\n      {\r\n         "show_name":"Product Image 3",\r\n         "name":"circle_3",\r\n         "style":"top:35%;left:60%;width:200px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;offsetyin:top;durationin:750;delayin:4500;easingin:easeOutQuart;fadein:false;offsetxout:right;durationout:1000;easingout:easeInQuart;fadeout:false;"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_1",\r\n         "style":"top:105px;left:30px;text-align: center;font-weight: 300;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;easingin:easeOutQuint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 1",\r\n         "name":"product_feature_1",\r\n         "style":"top:100px;left:85px;font-weight: 300;font-size:25px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:left;easingin:easeOutBack;fadein:false;scalexin:0.1;scaleyin:0.1;offsetxout:left;durationout:750;fadeout:false;scalexout:0.1;scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_2",\r\n         "style":"top:155px;left:30px;font-weight: 300;text-align: center;width:30px;height:30px;font-size:30px;line-height:30PX;border-radius:100px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:500;easingin:easeOutQuint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 2",\r\n         "name":"product_feature_2",\r\n         "style":"top:150px;left:85px;font-weight: 300;font-size:25px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:left;delayin:500;easingin:easeOutBack;fadein:false;scalexin:0.1;scaleyin:0.1;offsetxout:left;durationout:750;fadeout:false;scalexout:0.1;scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_3",\r\n         "style":"top:205px;left:30px;font-weight: 300;text-align: center;width:30px;height:30px;font-size:30px;line-height:30PX;border-radius:100px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:1000;easingin:easeOutQuint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 3",\r\n         "name":"product_feature_3",\r\n         "style":"top:200px;left:85px;font-weight: 300;font-size:25px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:left;delayin:1000;easingin:easeOutBack;fadein:false;scalexin:0.1;scaleyin:0.1;offsetxout:left;durationout:750;fadeout:false;scalexout:0.1;scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_4",\r\n         "style":"top:255px;left:30px;font-weight: 300;text-align: center;width:30px;height:30px;font-size:30px;line-height:30PX;border-radius:100px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:1500;easingin:easeOutQuint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 4",\r\n         "name":"product_feature_4",\r\n         "style":"top:250px;left:85px;font-weight: 300;font-size:25px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:left;delayin:1500;easingin:easeOutBack;fadein:false;scalexin:0.1;scaleyin:0.1;offsetxout:left;durationout:750;fadeout:false;scalexout:0.1;scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_5",\r\n         "style":"top:305px;left:30px;font-weight: 300;text-align: center;width:30px;height:30px;font-size:30px;line-height:30PX;border-radius:100px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:2000;easingin:easeOutQuint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 5",\r\n         "name":"product_feature_5",\r\n         "style":"top:300px;left:85px;font-weight: 300;font-size:25px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:left;delayin:2000;easingin:easeOutBack;fadein:false;scalexin:0.1;scaleyin:0.1;offsetxout:left;durationout:750;fadeout:false;scalexout:0.1;scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE 1",\r\n         "name":"product_title_1",\r\n         "style":"top:65%;left:60%;font-weight: 300;font-size:30px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:450;delayin:1750;easingin:easeOutQuart;scalexin:0;scaleyin:0;offsetxout:0;durationout:1000;showuntil:51;easingout:easeInQuart;scalexout:3;scaleyout:3;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE 2",\r\n         "name":"product_title_2",\r\n         "style":"top:65%;left:60%;font-weight: 300;font-size:30px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:450;delayin:3250;easingin:easeOutQuart;scalexin:0;scaleyin:0;offsetxout:0;durationout:1000;showuntil:51;easingout:easeInQuart;scalexout:3;scaleyout:3;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE 3",\r\n         "name":"product_title_3",\r\n         "style":"top:65%;left:60%;font-weight: 300;font-size:30px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:450;delayin:4750;easingin:easeOutQuart;scalexin:0;scaleyin:0;offsetxout:0;durationout:1000;easingout:easeInQuart;scalexout:3;scaleyout:3;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(4, 'SLIDER TYPE 2', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:4500;transition2d:105,106;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:100px;left:80px;white-space:nowrap;width:220px;",\r\n         "data_ls":"offsetxin:left;durationin:1500;delayin:1400;fadein:false;offsetxout:left;durationout:1000;fadeout:false;",\r\n         "name":"semi_long_1",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "style":"top:100px;left:180px;white-space:nowrap;width:220px;",\r\n         "data_ls":"offsetxin:left;durationin:1500;delayin:1200;fadein:false;offsetxout:left;durationout:1000;fadeout:false;",\r\n         "name":"semi_long_2",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      },\r\n      {\r\n         "style":"top:100px;left:280px;white-space:nowrap;width:220px;",\r\n         "data_ls":"offsetxin:left;durationin:1500;delayin:1000;fadein:false;offsetxout:left;durationout:1000;fadeout:false;",\r\n         "name":"semi_long_3",\r\n         "show_name":"PRODUCT IMAGE 3"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:20px;left:700px;font-weight:300;font-size:40px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:1000;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 1",\r\n         "name":"product_feature_1",\r\n         "style":"top:100px;left:761px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:800;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 2",\r\n         "name":"product_feature_2",\r\n         "style":"top:150px;left:761px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:1300;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURe 3",\r\n         "name":"product_feature_3",\r\n         "style":"top:200px;left:761px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:1800;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 4",\r\n         "name":"product_feature_4",\r\n         "style":"top:250px;left:761px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:2300;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 5",\r\n         "name":"product_feature_5",\r\n         "style":"top:300px;left:761px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:2800;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 6",\r\n         "name":"product_feature_6",\r\n         "style":"top:350px;left:761px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:3300;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_1",\r\n         "style":"top:107px;left:710px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:500;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_2",\r\n         "style":"top:157px;left:710px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:1000;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_3",\r\n         "style":"top:207px;left:710px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:1500;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_4",\r\n         "style":"top:257px;left:710px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:2000;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_5",\r\n         "style":"top:307px;left:710px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:2500;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_6",\r\n         "style":"top:357px;left:710px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:3000;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      }\r\n   ]\r\n}'),
(5, 'SLIDER TYPE 3', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:105,106;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:100px;left:580px;width:220px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:right;durationin:1500;delayin:1400;fadein:false;offsetxout:left;durationout:1000;fadeout:false;",\r\n         "name":"semi_long_1",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "style":"top:100px;left:680px;width:220px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:right;durationin:1500;delayin:1200;fadein:false;offsetxout:left;durationout:1000;fadeout:false;",\r\n         "name":"semi_long_2",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      },\r\n      {\r\n         "style":"top:100px;left:780px;width:220px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:right;durationin:1500;delayin:1000;fadein:false;offsetxout:left;durationout:1000;fadeout:false;",\r\n         "name":"semi_long_3",\r\n         "show_name":"PRODUCT IMAGE 3"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:20px;left:80px;font-weight:300;font-size:40px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:1000;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_1",\r\n         "style":"top:107px;left:71px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:500;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 1",\r\n         "name":"product_feature_1",\r\n         "style":"top:100px;left:116px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:800;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_2",\r\n         "style":"top:157px;left:71px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:1000;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 2",\r\n         "name":"product_feature_2",\r\n         "style":"top:150px;left:116px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:1300;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_3",\r\n         "style":"top:207px;left:71px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:1500;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 3",\r\n         "name":"product_feature_3",\r\n         "style":"top:200px;left:116px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:1800;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_4",\r\n         "style":"top:257px;left:71px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:2000;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 4",\r\n         "name":"product_feature_4",\r\n         "style":"top:250px;left:116px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:2300;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_5",\r\n         "style":"top:307px;left:71px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:2500;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 5",\r\n         "name":"product_feature_5",\r\n         "style":"top:300px;left:116px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:2800;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_6",\r\n         "style":"top:357px;left:71px;font-weight:300;text-align:center;width:30px;height:30px;font-size:30px;line-height:30px;border-radius:100px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:750;delayin:3000;easingin:easeoutquint;rotatein:90;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:750;rotateout:90;scalexout:0.5;scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 6",\r\n         "name":"product_feature_6",\r\n         "style":"top:350px;left:116px;font-weight:300;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:3300;easingin:easeoutquint;scalexin:0.8;scaleyin:0.8;offsetxout:0;durationout:750;scalexout:0.8;scaleyout:0.8;",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(6, 'SLIDER TYPE 4', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:105,106;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "name":"long_1",\r\n         "style":"top:60px;left:578px;width:200px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:4000;delayin:1500;easingin:easeinoutquad;scalexin:1.1;scaleyin:1.1;offsetxout:0;durationout:1000;scalexout:0.9;scaleyout:0.9;",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "name":"semi_long_1",\r\n         "style":"top:170px;left:800px;width:200px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:4000;delayin:1500;easingin:easeinoutquad;scalexin:1.1;scaleyin:1.1;offsetxout:0;durationout:1000;scalexout:0.9;scaleyout:0.9;",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      },\r\n      {\r\n         "name":"square_1",\r\n         "style":"top:265px;left:1020px;width:200px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:4000;delayin:1500;easingin:easeinoutquad;scalexin:1.1;scaleyin:1.1;offsetxout:0;durationout:1000;scalexout:0.9;scaleyout:0.9;",\r\n         "show_name":"PRODUCT IMAGE 3"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h1",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:20px;left:50px;font-size:50px;font-weight:300;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:3000;delayin:500;easingin:easeoutelastic;rotatexin:90;transformoriginin:50;bottom;0;offsetxout:0;rotatexout:90;transformoriginout:50;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 1",\r\n         "name":"product_feature_1",\r\n         "style":"top:100px;left:50px;text-align:justify;width:500px;font-size:20px;",\r\n         "data_ls":"offsetxin:-150;durationin:2000;delayin:500;easingin:easeinoutquart;rotateyin:-40;offsetxout:-150;durationout:1000;rotateyout:-40;",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 2",\r\n         "name":"product_feature_2",\r\n         "style":"top:150px;left:50px;text-align:justify;width:500px;font-size:20px;",\r\n         "data_ls":"offsetxin:-150;durationin:2000;delayin:1000;easingin:easeinoutquart;rotateyin:-40;offsetxout:-150;durationout:1000;rotateyout:-40;",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 3",\r\n         "name":"product_feature_3",\r\n         "style":"top:200px;left:50px;text-align:justify;width:500px;font-size:20px;",\r\n         "data_ls":"offsetxin:-150;durationin:2000;delayin:1500;easingin:easeinoutquart;rotateyin:-40;offsetxout:-150;durationout:1000;rotateyout:-40;",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 4",\r\n         "name":"product_feature_4",\r\n         "style":"top:250px;left:50px;text-align:justify;width:500px;font-size:20px;",\r\n         "data_ls":"offsetxin:-150;durationin:2000;delayin:2000;easingin:easeinoutquart;rotateyin:-40;offsetxout:-150;durationout:1000;rotateyout:-40;",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 5",\r\n         "name":"product_feature_5",\r\n         "style":"top:300px;left:50px;text-align:justify;width:500px;font-size:20px;",\r\n         "data_ls":"offsetxin:-150;durationin:2000;delayin:2500;easingin:easeinoutquart;rotateyin:-40;offsetxout:-150;durationout:1000;rotateyout:-40;",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 6",\r\n         "name":"product_feature_6",\r\n         "style":"top:350px;left:50px;text-align:justify;width:500px;font-size:20px;",\r\n         "data_ls":"offsetxin:-150;durationin:2000;delayin:3000;easingin:easeinoutquart;rotateyin:-40;offsetxout:-150;durationout:1000;rotateyout:-40;",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 7",\r\n         "name":"product_feature_7",\r\n         "style":"top:400px;left:50px;text-align:justify;width:500px;font-size:20px;",\r\n         "data_ls":"offsetxin:-150;durationin:2000;delayin:3500;easingin:easeinoutquart;rotateyin:-40;offsetxout:-150;durationout:1000;rotateyout:-40;",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(7, 'SLIDER TYPE 5', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:73,102;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "name":"long_1",\r\n         "style":"top:50%;left:50%;width:200px;white-space:nowrap;",\r\n         "data_ls" : "",\r\n         "show_name":"IMAGE"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h6",\r\n         "show_name":"PRICE",\r\n         "name":"price",\r\n         "style":"top:55%;left:39%;durationin:500;delayin:600;fadein:false;rotatein:30;durationout:500;fadeout:false;slidedirection:fade;slideoutdirection:fade;scalein:0.1;scaleout:0.1;font-weight:300;box-shadow:0px 2px 8px -2px black;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px;font-size:30px;color:#ffffff;background:#B816B2;border-radius:5px;white-space:nowrap;",\r\n         "data_ls" : "",\r\n         "color":"#ffffff",\r\n         "background":"#b816b2"\r\n      },\r\n      {\r\n         "element":"h6",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:45%;left:36%;durationin:500;delayin:500;fadein:false;rotatein:-30;durationout:500;fadeout:false;slidedirection:fade;slideoutdirection:fade;scalein:0.1;scaleout:0.1;font-weight:300;box-shadow:0px 2px 8px -2px black;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px;font-size:30px;color:#ffffff;background:#760093;border-radius:5px;white-space:nowrap;",\r\n         "data_ls" : "",\r\n         "color":"#ffffff",\r\n         "background":"#760093"\r\n      }\r\n   ]\r\n}'),
(8, 'SLIDER TYPE 6', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:73,102;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:100px;left:100px;width:250px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:3000;delayin:1500;rotateyin:90;transformoriginin:left;0;offsetxout:0;durationout:750;rotateyout:90;transformoriginout:left;",\r\n         "name":"semi_long_1",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "style":"top:100px;left:400px;width:250px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:3000;delayin:1500;rotateyin:-90;transformoriginin:right;0;offsetxout:0;durationout:750;rotateyout:90;transformoriginout:right;",\r\n         "name":"semi_long_2",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h1",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"font-family:Roboto;top:25px;left:192px;font-weight:100;text-align:center;width:340px;font-size:40px;border-radius:5px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:2500;delayin:2000;easingin:easeoutelastic;rotatexin:90;transformoriginin:50;bottom;0;offsetxout:0;rotateout:-90;transformoriginout:left;",\r\n         "color":"#34009d",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":" DUMMY TEXT 1",\r\n         "name":"dummy_text_1",\r\n         "style":"top:50px;left:800px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;border-radius:4px;white-space:nowrap;",\r\n         "data_ls":"durationin:1500;delayin:2300;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left;0;durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left;",\r\n         "color":"#ffffff",\r\n         "background":"#740091"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 2",\r\n         "name":"dummy_text_2",\r\n         "style":"top:90px;left:800px;font-weight:300;font-size:24px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:1500;delayin:2700;rotateyin:90;skewxin:60;transformoriginin:25;0;offsetxout:100;durationout:750;skewxout:60;",\r\n         "color":"#ff00f6",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 3",\r\n         "name":"dummy_text_3",\r\n         "style":"top:150px;left:800px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;border-radius:4px;white-space:nowrap;",\r\n         "data_ls":"durationin:1500;delayin:3000;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left;0;durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left;",\r\n         "color":"#ffffff",\r\n         "background":"#740091"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 4",\r\n         "name":"dummy_text_4",\r\n         "style":"top:190px;left:800px;font-weight:300;font-size:24px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:1500;delayin:3400;rotateyin:90;skewxin:60;transformoriginin:25;0;offsetxout:100;durationout:750;skewxout:60;",\r\n         "color":"#ff00f6",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 5",\r\n         "name":"dummy_text_5",\r\n         "style":"top:250px;left:800px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;border-radius:4px;white-space:nowrap;",\r\n         "data_ls":"durationin:1500;delayin:3700;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left;0;durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left;",\r\n         "color":"#ffffff",\r\n         "background":"#740091"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 6",\r\n         "name":"dummy_text_6",\r\n         "style":"top:290px;left:799px;font-weight:300;font-size:24px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:1500;delayin:4100;rotateyin:90;skewxin:60;transformoriginin:25;0;offsetxout:100;durationout:750;skewxout:60;",\r\n         "color":"#ff00f6",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 7",\r\n         "name":"dummy_text_7",\r\n         "style":"top:360px;left:800px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;border-radius:4px;white-space:nowrap;",\r\n         "data_ls":"durationin:1500;delayin:4400;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left;0;durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left;",\r\n         "color":"#ffffff",\r\n         "background":"#740091"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 8",\r\n         "name":"dummy_text_8",\r\n         "style":"top:400px;left:799px;font-weight:300;font-size:24px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:1500;delayin:4800;rotateyin:90;skewxin:60;transformoriginin:25;0;offsetxout:100;durationout:750;skewxout:60;",\r\n         "color":"#ff00f6",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(9, 'SLIDER TYPE 7', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:73,102;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:50px;left:50%;width:278px;white-space:nowrap;",\r\n         "data_ls":"durationin:1500;scalexin:0.8;scaleyin:0.8;scalexout:0.8;scaleyout:0.8;",\r\n         "name":"semi_long_1",\r\n         "show_name":"IMAGE"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 1",\r\n         "name":"dummy_text_1",\r\n         "style":"top:80px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:1000;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 2",\r\n         "name":"dummy_text_2",\r\n         "style":"top:140px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:1500;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 3",\r\n         "name":"dummy_text_3",\r\n         "style":"top:200px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:2000;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 4",\r\n         "name":"dummy_text_4",\r\n         "style":"top:260px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:2500;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 5",\r\n         "name":"dummy_text_5",\r\n         "style":"top:320px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:3000;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 6",\r\n         "name":"dummy_text_6",\r\n         "style":"top:380px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:3500;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:50%;left:900px;font-weight:100;text-align:right;padding:15px;font-size:40px;line-height:37px;font-family:roboto;border-radius:4px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:2500;delayin:3250;easingin:easeoutelastic;rotatexin:90;transformoriginin:50;top;0;offsetxout:0;durationout:1000;rotatexout:90;transformoriginout:50;bottom;",\r\n         "color":"#fff",\r\n         "background":"#11008b"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 6",\r\n         "name":"dummy_text_6",\r\n         "style":"top:505px;left:983px;font-family:;flower;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;delayin:3500;skewxin:60;scalexin:1.5;offsetxout:-50;durationout:1000;skewxout:60;scalexout:1.5;",\r\n         "color":"#d9482b",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(10, 'SLIDER TYPE 8', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7000;transition2d:76,77,78,79;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:120px;left:42%;width:180px;white-space:nowrap;",\r\n         "data_ls":"durationin:1500;scalexin:0.8;scaleyin:0.8;scalexout:0.8;scaleyout:0.8;",\r\n         "name":"semi_long_1",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "style":"top:120px;left:58%;width:180px;white-space:nowrap;",\r\n         "data_ls":"durationin:1500;scalexin:0.8;scaleyin:0.8;scalexout:0.8;scaleyout:0.8;",\r\n         "name":"semi_long_2",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      },\r\n      {\r\n         "style":"top:50px;left:50%;width:200px;white-space:nowrap;",\r\n         "data_ls":"durationin:1500;scalexin:0.8;scaleyin:0.8;scalexout:0.8;scaleyout:0.8;",\r\n         "name":"long_1",\r\n         "show_name":"PRODUCT IMAGE 3"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 1",\r\n         "name":"dummy_text_1",\r\n         "style":"top:80px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:1000;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 2",\r\n         "name":"dummy_text_2",\r\n         "style":"top:140px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:1500;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 3",\r\n         "name":"dummy_text_3",\r\n         "style":"top:200px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:2000;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 4",\r\n         "name":"dummy_text_4",\r\n         "style":"top:260px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:2500;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 5",\r\n         "name":"dummy_text_5",\r\n         "style":"top:320px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:3000;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 6",\r\n         "name":"dummy_text_6",\r\n         "style":"top:380px;left:20px;font-weight:300;height:40px;padding-right:10px;padding-left:10px;font-size:30px;line-height:37px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:2000;delayin:3500;offsetxout:-50;durationout:1000;",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:50%;left:900px;font-weight:100;text-align:right;padding:15px;font-size:40px;line-height:37px;font-family:roboto;border-radius:4px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:2500;delayin:3250;easingin:easeoutelastic;rotatexin:90;transformoriginin:50;top;0;offsetxout:0;durationout:1000;rotatexout:90;transformoriginout:50;bottom;",\r\n         "color":"#fff",\r\n         "background":"#11008b"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 7",\r\n         "name":"dummy_text_7",\r\n         "style":"top:505px;left:983px;font-family:;flower;font-size:30px;white-space:nowrap;",\r\n         "data_ls":"offsetxin:-50;delayin:3500;skewxin:60;scalexin:1.5;offsetxout:-50;durationout:1000;skewxout:60;scalexout:1.5;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(11, 'WELCOME TYPE 3', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:8000;transition2d:4;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "show_name":"Image 1",\r\n         "name":"ase",\r\n         "style":"top:45%;left:45%;width:200px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:1500;delayin:3000;rotateyin:90;transformoriginin:right 50% 0;offsetxout:0;durationout:1500;showuntil:1000;rotateyout:-90;transformoriginout:right 50% 0;"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"p",\r\n         "show_name":"Introducing",\r\n         "name":"text_1",\r\n         "style":"top:40%;left:50%;font-weight: 300;font-size:30px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:50;durationin:750;easingin:easeOutBack;skewxin:-50;offsetxout:-50;durationout:600;showuntil:1500;easingout:easeInBack;skewxout:50;",\r\n         "color":"#C505BD",\r\n         "background":"rgba(1,1,1,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"Your Shop Name",\r\n         "name":"text_2",\r\n         "style":"top:50%;left:50%;font-weight: 300;font-size:50px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:-100;durationin:750;delayin:250;easingin:easeOutBack;skewxin:-50;offsetxout:100;durationout:600;showuntil:1500;easingout:easeInBack;skewxout:50;",\r\n         "color":"#8D00AF",\r\n         "background":"rgba(1,1,1,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"your Shop Slogan",\r\n         "name":"text_3",\r\n         "style":"top:47%;left:690px;font-weight: 300;font-size:35px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:1500;delayin:3000;rotateyin:90;transformoriginin:left 50% 0;offsetxout:0;durationout:1500;showuntil:1500;rotateyout:-90;transformoriginout:left 50% 0;",\r\n         "color":"#8D00AF",\r\n         "background":"rgba(1,1,1,0)"\r\n      }\r\n   ]\r\n}');
INSERT INTO `slider_style` (`slider_style_id`, `name`, `value`) VALUES
(12, 'SLIDER TYPE 9', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:9500;transition2d:5;timeshift:-3000;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "show_name":"Image 1",\r\n         "name":"semi_long_1",\r\n         "style":"top:120px;left:300px;width:200px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;offsetyin:100;durationin:2000;delayin:1000;offsetxout:-100;offsetyout:50;durationout:2000;showuntil:2010;"\r\n      },\r\n      {\r\n         "show_name":"Image 2",\r\n         "name":"semi_long_2",\r\n         "style":"top:120px;left:200px;width:200px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;offsetyin:100;durationin:2000;delayin:2000;offsetxout:-100;offsetyout:50;durationout:2000;showuntil:2010;"\r\n      },\r\n      {\r\n         "show_name":"Image 3",\r\n         "name":"semi_long_3",\r\n         "style":"top:120px;left:100px;width:200px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;offsetyin:100;durationin:2000;delayin:3000;offsetxout:-100;offsetyout:50;durationout:2000;showuntil:2010;"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h1",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"text_1",\r\n         "style":"top:60px;left:800px;font-weight: 300;font-size:50px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:50;durationin:3000;rotateyin:60;transformoriginin:right 50% 0;offsetxout:-50;durationout:3000;rotateyout:-60;transformoriginout:left 50% 0;",\r\n         "color":"#730091",\r\n         "background":"rgba(1,1,1,0)"\r\n      },\r\n      {\r\n         "element":"h2",\r\n         "show_name":"BIG SALE",\r\n         "name":"text_2",\r\n         "style":"top:120px;left:801px;font-weight: 300;font-size:30px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:-50;durationin:3000;delayin:500;rotateyin:-60;transformoriginin:left 50% 0;offsetxout:50;durationout:3000;rotateyout:60;transformoriginout:right 50% 0;",\r\n         "color":"#FA6BF3",\r\n         "background":"rgba(1,1,1,0)"\r\n      },\r\n      {\r\n         "element":"h3",\r\n         "show_name":"$99",\r\n         "name":"text_3",\r\n         "style":"top:200px;left:850px;font-weight: 300;font-size:120px;white-space: nowrap;",\r\n         "data_ls":"offsetxin:0;durationin:4000;delayin:2000;rotateyin:450;transformoriginin:left 50% 0;offsetxout:0;durationout:500;easingout:easeInBack;rotateyout:90;transformoriginout:left 50% 0;",\r\n         "color":"#730091",\r\n         "background":"rgba(1,1,1,0)"\r\n      }\r\n   ]\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
`slides_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE IF NOT EXISTS `social_links` (
`social_links_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci,
  `value` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`social_links_id`, `type`, `value`) VALUES
(1, 'facebook', 'https://www.facebook.com/DOST-Onestoreph-102382003445291/'),
(2, 'google-plus', 'http://google.com/'),
(3, 'twitter', 'http://twitter.com/'),
(4, 'skype', 'active-classified'),
(5, 'pinterest', 'http://pinterest.com/'),
(6, 'youtube', 'http://youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`stock_id` int(11) NOT NULL,
  `type` longtext,
  `category` longtext,
  `sub_category` longtext,
  `product` longtext,
  `quantity` longtext,
  `rate` longtext,
  `total` longtext,
  `reason_note` longtext,
  `datetime` longtext,
  `sale_id` varchar(30) DEFAULT NULL,
  `added_by` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `type`, `category`, `sub_category`, `product`, `quantity`, `rate`, `total`, `reason_note`, `datetime`, `sale_id`, `added_by`) VALUES
(91, 'destroy', '3', '7', '11', '7', NULL, '0', 'sale', '1469326652', '16', NULL),
(90, 'destroy', '1', '5', '9', '2', NULL, '0', 'sale', '1469323291', '14', NULL),
(89, 'destroy', '3', '7', '11', '3', NULL, '0', 'sale', '1469323219', '13', NULL),
(88, 'destroy', '3', '7', '11', '4', NULL, '0', 'sale', '1469322048', '12', NULL),
(87, 'destroy', '3', '7', '11', '3', NULL, '0', 'sale', '1469321902', '11', NULL),
(86, 'destroy', '3', '7', '11', '3', NULL, '0', 'sale', '1469321051', '10', NULL),
(85, 'destroy', '1', '5', '9', '3', NULL, '0', 'sale', '1469316170', '9', NULL),
(84, 'destroy', '3', '7', '11', '1', NULL, '0', 'sale', '1469315571', '8', NULL),
(92, 'destroy', '1', '5', '9', '1', NULL, '0', 'sale', '1469343303', '17', NULL),
(93, 'destroy', '1', '5', '2', '1', NULL, '0', 'sale', '1469359078', '18', NULL),
(94, 'destroy', '1', '5', '5', '1', NULL, '0', 'sale', '1492226088', '19', NULL),
(95, 'destroy', '1', '5', '5', '1', NULL, '0', 'sale', '1492241534', '20', NULL),
(96, 'destroy', '1', '5', '5', '1', NULL, '0', 'sale', '1492242269', '21', NULL),
(97, 'destroy', '1', '5', '2', '1', NULL, '0', 'sale', '1492322120', '22', NULL),
(98, 'destroy', '1', '6', '6', '1', NULL, '0', 'sale', '1492322121', '22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
`subscribe_id` int(11) NOT NULL,
  `email` varchar(600) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`subscribe_id`, `email`) VALUES
(1, 'christopher.musni@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
`sub_category_id` int(11) NOT NULL,
  `sub_category_name` longtext,
  `category` longtext
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category`) VALUES
(5, 'Condiments', '1'),
(6, 'Dried foods', '1'),
(7, 'Bamboo', '3'),
(63, 'Charcoal Related Products', '6'),
(8, 'Rice', '2'),
(9, 'Corn', '2'),
(10, 'Home Fixtures', '3'),
(11, 'Home Decorations', '4'),
(12, 'Trophies & Plaques', '4'),
(13, 'Pastries', '1'),
(15, 'Fish-Based Products', '2'),
(16, 'Accessory', '4'),
(17, 'Beverages', '1'),
(18, 'Cereals', '1'),
(19, 'Dairies', '1'),
(20, 'Desserts', '1'),
(21, 'Fruit Juices', '1'),
(22, 'Legumes', '1'),
(23, 'Nuts and seeds', '1'),
(24, 'Sauces', '1'),
(25, 'Snacks', '1'),
(26, 'Confectionaries', '1'),
(27, 'Wood', '3'),
(28, 'Bamboo', '3'),
(29, 'Glass', '3'),
(30, 'Living', '3'),
(31, 'Concrete', '3'),
(32, 'Metal', '3'),
(33, 'Plastic', '3'),
(34, 'Cereals', '2'),
(35, 'Seeds', '2'),
(36, 'Toddler Food', '1'),
(37, 'Spices', '2'),
(38, 'Fruits', '1'),
(39, 'Vegetables', '2'),
(40, 'Dry Fruits', '2'),
(41, 'Edible oils', '2'),
(42, 'Essential oils', '2'),
(43, 'Flowers', '2'),
(44, 'Fertilizers', '2'),
(45, 'Animal feed', '2'),
(46, 'Aromatic plants ', '2'),
(47, 'Herbal', '2'),
(48, 'Poultry ', '2'),
(49, 'Meat', '2'),
(50, 'Coconut products', '2'),
(51, 'Marine food ', '2'),
(52, 'Pottery', '4'),
(53, 'Basket Weaving', '4'),
(54, 'Weaving', '4'),
(55, 'Crocheting', '4'),
(56, 'Tatting', '4'),
(57, 'Macramé', '4'),
(58, 'Tapestry', '4'),
(59, 'Rattan Craft', '4'),
(60, 'Bamboo Craft', '4'),
(61, 'Leather Craft', '4'),
(62, 'Coconut Shell Craft', '4'),
(64, 'Woodcraft', '4'),
(65, 'Bath Essentials', '6'),
(66, 'Muffler', '5'),
(67, 'Noodles', '1'),
(68, 'Medicinal Products', '6'),
(69, 'Thresher', '5'),
(70, 'Services', '6'),
(71, 'Processed Foods', '1'),
(72, 'Bags', '6'),
(73, 'apparel', '6'),
(74, 'Souvenirs', '6'),
(75, 'Military, Police and Organization Insignia', '6'),
(76, 'Personalized Gifts and Jewelry', '6'),
(77, 'Medals', '6'),
(79, 'Plaques', '6'),
(80, 'Nameplate', '6'),
(81, 'Religious Items', '6'),
(82, 'Schools & Universities Accessories', '6'),
(83, 'INTERNATIONAL EUCHARISTIC CONGRESS', '6'),
(84, 'Clothing', '4'),
(85, 'Detergent', '6'),
(86, 'Farm Machinery', '5'),
(87, 'Stationery', '4'),
(88, 'Herbal Supplement', '2'),
(89, 'Gardening Tools', '6'),
(90, 'Perfumes', '6'),
(91, 'Metals', '5'),
(92, 'Candle', '6'),
(93, 'Coconut Leaves', '4'),
(94, 'Wines', '1'),
(95, 'Seashells', '3'),
(96, 'Lamp', '6'),
(97, 'Handbag', '6'),
(98, 'Mirror', '6'),
(99, 'Dining', '3'),
(100, 'Wall Decoration', '6'),
(101, 'Bed', '3'),
(102, 'Cabinet/Drawer', '3'),
(103, 'Clock', '6');

-- --------------------------------------------------------

--
-- Table structure for table `ui_settings`
--

CREATE TABLE IF NOT EXISTS `ui_settings` (
`ui_settings_id` int(11) NOT NULL,
  `type` longtext,
  `value` longtext
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ui_settings`
--

INSERT INTO `ui_settings` (`ui_settings_id`, `type`, `value`) VALUES
(1, 'side_bar_pos', NULL),
(2, 'latest_item_div', NULL),
(3, 'most_popular_div', NULL),
(4, 'most_view_div', NULL),
(5, 'filter_div', 'on'),
(6, 'admin_login_logo', '4'),
(7, 'admin_nav_logo', '18'),
(8, 'home_top_logo', '5'),
(9, 'home_bottom_logo', '4'),
(10, 'home_category', '["1","2","3","4","5","6"]'),
(11, 'fav_ext', 'ico'),
(12, 'side_bar_pos_category', 'left'),
(13, 'home_brand', 'null'),
(14, 'footer_color', NULL),
(15, 'header_color', 'teal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `username` longtext,
  `surname` varchar(100) DEFAULT NULL,
  `email` longtext,
  `phone` longtext,
  `address1` longtext,
  `address2` longtext,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(30) DEFAULT NULL,
  `langlat` varchar(100) DEFAULT NULL,
  `password` longtext,
  `fb_id` longtext,
  `g_id` varchar(50) DEFAULT NULL,
  `g_photo` longtext,
  `creation_date` longtext,
  `google_plus` longtext,
  `skype` longtext,
  `facebook` longtext,
  `wishlist` longtext,
  `last_login` varchar(50) DEFAULT NULL,
  `downloads` longtext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `surname`, `email`, `phone`, `address1`, `address2`, `city`, `zip`, `langlat`, `password`, `fb_id`, `g_id`, `g_photo`, `creation_date`, `google_plus`, `skype`, `facebook`, `wishlist`, `last_login`, `downloads`) VALUES
(1, 'Christopher', 'Musni', 'christopher.musni@gmail.com', '+639174842282', 'Tuguegarao City, Cagayan', 'Tuguegarao City, Cagayan', 'Tuguegarao City', '3500', '(17.6131813, 121.72702060000006)', '541cbca20d0962e2d2ccd62c40935c602128e912', '', '', '', '1436652284', '', '', '', '["2","9","7","6","1","10","11"]', '1492322092', '[]'),
(2, 'christopher', 'musni', 'chrispmusni@gmail.com', '09272445964', 'Sta Maria Gattaran Cagayan', 'Sta Maria Gattaran Cagayan2', 'Tuguegarao City', '3508', '', '7d8f4b4b4613dc7e15333e6449692ad4af502d1d', NULL, NULL, NULL, '1466740587', NULL, NULL, NULL, '[]', '1466741103', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
`vendor_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `company` varchar(500) DEFAULT NULL,
  `display_name` varchar(500) DEFAULT NULL,
  `address1` longtext,
  `address2` longtext,
  `status` varchar(10) DEFAULT NULL,
  `membership` varchar(50) DEFAULT NULL,
  `create_timestamp` int(20) DEFAULT NULL,
  `approve_timestamp` int(20) DEFAULT NULL,
  `member_timestamp` int(20) DEFAULT NULL,
  `member_expire_timestamp` int(11) DEFAULT NULL,
  `details` longtext,
  `last_login` int(20) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `skype` varchar(300) DEFAULT NULL,
  `google_plus` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  `youtube` varchar(300) DEFAULT NULL,
  `pinterest` varchar(300) DEFAULT NULL,
  `stripe_details` varchar(500) DEFAULT NULL,
  `paypal_email` varchar(200) DEFAULT NULL,
  `preferred_payment` varchar(100) DEFAULT NULL,
  `cash_set` varchar(20) DEFAULT NULL,
  `stripe_set` varchar(20) DEFAULT NULL,
  `paypal_set` varchar(20) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `keywords` longtext,
  `description` longtext,
  `lat_lang` varchar(300) NOT NULL DEFAULT '(0,0)'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `name`, `email`, `password`, `company`, `display_name`, `address1`, `address2`, `status`, `membership`, `create_timestamp`, `approve_timestamp`, `member_timestamp`, `member_expire_timestamp`, `details`, `last_login`, `facebook`, `skype`, `google_plus`, `twitter`, `youtube`, `pinterest`, `stripe_details`, `paypal_email`, `preferred_payment`, `cash_set`, `stripe_set`, `paypal_set`, `phone`, `keywords`, `description`, `lat_lang`) VALUES
(1, 'Cesar Crisostomo', 'cec@gmail.com', '6f34a195f81f9358c170ca11c035c211ba2345b1', 'C.E.C. Food Ventures', 'C.E.C.', 'Tuguegarao City, Cagayan', 'Tuguegarao City, Cagayan', 'approved', '0', 1439049705, 0, 0, 1451606400, '', 0, 'https://www.facebook.com/cesarios.cecfoodventures', '', '', '', '', '', '{"publishable":"","secret":""}', '', '', 'no', '[]', '', '+639272445964', '', '', '(17.6131813, 121.72702060000006)'),
(2, 'Arthur  Tabbu', 'lighthouse.cooperative@yahoo.com', 'd5f12e53a182c062b6bf30c1445153faff12269a', 'LightHouse Cooperative', 'Carne Ybanag', 'Centro 2, Tuguegarao City, Cagayan', 'Centro 2, Tuguegarao City, Cagayan', 'approved', '0', 1445418535, 0, NULL, 1448023468, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ok', NULL, NULL, '+639175766252', NULL, NULL, '(0,0)'),
(3, 'Racky D. Doctor', 'nutridensefmc@yahoo.com.ph', 'fea7f657f56a2a448da7d4b535ee5e279caf3d9a', 'NutriDense Food Manufacturing Corporation', 'NutriDense', 'Malanay, Sta. Barbara, Pangasinan and at 2nd Floor UP-ISSI Bldg., E. Jacinto St., UP Diliman Compound, Quezon City', 'Malanay, Sta. Barbara, Pangasinan and at 2nd Floor UP-ISSI Bldg., E. Jacinto St., UP Diliman Compound, Quezon City', 'approved', '0', 1445436358, 0, NULL, 1448029133, '', NULL, 'https://www.facebook.com/Nutridense-Food-Manufacturing-Corporation-312004932317356/', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '+639166418611', NULL, NULL, '(0,0)'),
(4, 'Romeo Balbin', 'Balbinsfurniture@ymail.com', 'f56d6351aa71cff0debea014d13525e42036187a', 'Balbins Furniture', 'Balbin', 'Bacsil, Dangdangla, Bangued, Abra', 'Bacsil, Dangdangla, Bangued, Abra', 'approved', '0', 1445442065, 0, NULL, 1448034193, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+639179243946', NULL, NULL, '(0,0)');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_invoice`
--

CREATE TABLE IF NOT EXISTS `vendor_invoice` (
`vendor_invoice_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL,
  `payment_details` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
 ADD PRIMARY KEY (`blog_category_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
 ADD PRIMARY KEY (`business_settings_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
 ADD PRIMARY KEY (`contact_message_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
 ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
 ADD PRIMARY KEY (`general_settings_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
 ADD PRIMARY KEY (`word_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
 ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
 ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `membership_payment`
--
ALTER TABLE `membership_payment`
 ADD PRIMARY KEY (`membership_payment_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
 ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
 ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `slider_style`
--
ALTER TABLE `slider_style`
 ADD PRIMARY KEY (`slider_style_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
 ADD PRIMARY KEY (`slides_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
 ADD PRIMARY KEY (`social_links_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
 ADD PRIMARY KEY (`subscribe_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
 ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `ui_settings`
--
ALTER TABLE `ui_settings`
 ADD PRIMARY KEY (`ui_settings_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
 ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_invoice`
--
ALTER TABLE `vendor_invoice`
 ADD PRIMARY KEY (`vendor_invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
MODIFY `blog_category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
MODIFY `business_settings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
MODIFY `contact_message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
MODIFY `general_settings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
MODIFY `word_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=626;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `membership_payment`
--
ALTER TABLE `membership_payment`
MODIFY `membership_payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slider_style`
--
ALTER TABLE `slider_style`
MODIFY `slider_style_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
MODIFY `slides_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
MODIFY `social_links_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
MODIFY `subscribe_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `ui_settings`
--
ALTER TABLE `ui_settings`
MODIFY `ui_settings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vendor_invoice`
--
ALTER TABLE `vendor_invoice`
MODIFY `vendor_invoice_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
