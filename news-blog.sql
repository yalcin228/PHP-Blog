-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Hazırlanma Vaxtı: 14 İyun, 2021 saat 15:55
-- Server versiyası: 10.4.11-MariaDB
-- PHP Versiyası: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `news-blog`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(500) NOT NULL,
  `admin_parol` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_parol`) VALUES
(1, 'Admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(5) NOT NULL,
  `ayar_title` varchar(200) NOT NULL,
  `ayar_keyw` varchar(200) NOT NULL,
  `ayar_desc` varchar(200) NOT NULL,
  `ayar_favicon` varchar(200) NOT NULL,
  `ayar_mail` varchar(200) NOT NULL,
  `ayar_nom` varchar(200) NOT NULL,
  `ayar_logo` varchar(200) NOT NULL,
  `ayar_link` varchar(300) NOT NULL,
  `ayar_reklam` varchar(200) NOT NULL,
  `ayar_author` varchar(200) NOT NULL,
  `ayar_twitter` varchar(200) NOT NULL,
  `ayar_facebook` varchar(200) NOT NULL,
  `ayar_linkedin` varchar(200) NOT NULL,
  `ayar_instagram` varchar(200) NOT NULL,
  `ayar_youtube` varchar(200) NOT NULL,
  `ayar_unvan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `ayar_title`, `ayar_keyw`, `ayar_desc`, `ayar_favicon`, `ayar_mail`, `ayar_nom`, `ayar_logo`, `ayar_link`, `ayar_reklam`, `ayar_author`, `ayar_twitter`, `ayar_facebook`, `ayar_linkedin`, `ayar_instagram`, `ayar_youtube`, `ayar_unvan`) VALUES
(1, 'Ən Son Xəbərlər...', 'Ən Son Xəbərlər,Maqazin Xəbərləri,İdman Xəbərləri,Siyasi Xəbərlər...', 'Ən Son Xəbərlər,Maqazin Xəbərləri,İdman Xəbərləri,Siyasi Xəbərlər...', '3605387.png', 'yalcingulmemmedov@gmail.com', '070-310-71-63', 'XeberlerBlog', 'http://localhost/new-blog/frontend/', 'million.jpg', 'Yalçın Gülməmmədov', 'https://www.twitter.com', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'https://www.youtube.com', 'İ.İsmayilov küç. 8, Xətai ray. , Bakı, Azərbaycan');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `haqqimizda`
--

CREATE TABLE `haqqimizda` (
  `haqq_id` int(11) NOT NULL,
  `haqq_basliq` varchar(300) NOT NULL,
  `haqq_icerik` text NOT NULL,
  `haqq_tarix` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `haqqimizda`
--

INSERT INTO `haqqimizda` (`haqq_id`, `haqq_basliq`, `haqq_icerik`, `haqq_tarix`) VALUES
(1, 'Haqqımızda və göstərdiyimiz xidmətlər ...', 'Yalçın Group olaraq əsas məqsədimiz\r\nsizin ən son məlumatlardan və yeniliklərdən xəbardar olmağınızdır.\r\nYalçın Group olaraq bu məqsədimizə çatmaq üçün çox calışırıq.\r\nCompany 2021.', '2021-06-02 12:30:43');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `kateqoriler`
--

CREATE TABLE `kateqoriler` (
  `kateqori_id` int(5) NOT NULL,
  `kateqori_title` varchar(300) NOT NULL,
  `kateqori_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `kateqoriler`
--

INSERT INTO `kateqoriler` (`kateqori_id`, `kateqori_title`, `kateqori_date`) VALUES
(1, 'İdman', '2021-05-25 10:11:34'),
(2, 'Texnoloji', '2021-05-25 10:11:34'),
(3, 'Biznes', '2021-05-25 10:11:34'),
(4, 'Əyləncə', '2021-05-25 10:11:34');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_gonderen` varchar(300) NOT NULL,
  `mesaj_gonderen_email` varchar(300) NOT NULL,
  `mesaj_basliq` varchar(300) NOT NULL,
  `mesaj_icerik` text NOT NULL,
  `mesaj_tarix` timestamp NOT NULL DEFAULT current_timestamp(),
  `mesaj_oxuma` varchar(300) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `mesajlar`
--

INSERT INTO `mesajlar` (`mesaj_id`, `mesaj_gonderen`, `mesaj_gonderen_email`, `mesaj_basliq`, `mesaj_icerik`, `mesaj_tarix`, `mesaj_oxuma`) VALUES
(4, 'Elcin', 'yalcin.09700@gmail.com', 'ILk blog saytimiz', 'Blog saytiniz cox xosuma geldi en son melumatlari burdan rahatliqla izeye bilirem,bunun ucun tesekkur edirem.', '2021-06-13 11:29:21', '1'),
(5, 'xeyal', 'resulzde.xeyal@gmail.com', 'Ikinci mail ', '2ci yoxlamani eliyrem', '2021-06-13 12:50:17', '0');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_foto_file` varchar(300) NOT NULL,
  `slider_foto` varchar(300) NOT NULL,
  `slider_tarix` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_foto_file`, `slider_foto`, `slider_tarix`) VALUES
(1, '../frontend/images/slide1.jpg', 'slide1.jpg', '2021-05-25 15:15:28'),
(2, '../frontend/images/slide2.jpg', 'slide2.jpg', '2021-05-25 15:15:28'),
(3, '../frontend/images/slide3.jpg', 'slide3.jpg', '2021-05-25 15:15:28'),
(11, '../frontend/images/4527.jpg', '4527.jpg', '2021-06-02 23:07:38');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `yazilar`
--

CREATE TABLE `yazilar` (
  `yazi_id` int(11) NOT NULL,
  `yazi_sekil` varchar(300) NOT NULL,
  `yazi_basliq` varchar(300) NOT NULL,
  `yazi_icerik` text NOT NULL,
  `yazi_oxunma_sayi` varchar(500) CHARACTER SET tis620 COLLATE tis620_bin NOT NULL DEFAULT '0',
  `yazi_tarix` timestamp NOT NULL DEFAULT current_timestamp(),
  `yazi_kateqori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `yazilar`
--

INSERT INTO `yazilar` (`yazi_id`, `yazi_sekil`, `yazi_basliq`, `yazi_icerik`, `yazi_oxunma_sayi`, `yazi_tarix`, `yazi_kateqori_id`) VALUES
(2, '5267345.jpg', '\"Qarabağ\" kapitanı ilə müqaviləni uzatdı', '<p>&quot;Qarabağ&quot; kapitanı Maksim Medvedevlə yeni m&uuml;qavilə bağlayıb. &quot;Report&quot; klubun rəsmi saytına istinadən xəbər verir ki, 32 yaşlı m&uuml;dafiə&ccedil;i ilə imzalanmış s&ouml;zləşmənin m&uuml;ddəti 2 ildir. Qeyd edək ki, Medvedev &quot;Qarabağ&quot;ın heyətində 7 dəfə Azərbaycan &ccedil;empionu olub, 3 dəfə &ouml;lkə kubokunu qazanıb.</p>\r\n', '222', '2021-06-12 10:55:54', 1),
(3, 'ab.jpg', 'Azərbaycan Kuboku: \"İkinci\"lərlə əlamətdar final', 'Azərbaycan Kubokunun tarixində ikinci dəfə finalda əzmkar nəticə qeydə alınıb.\r\n\r\n\"Report\" PFL-in saytına istinadən xəbər verir ki, “Sumqayıt”la qarşılaşan “Keşlə” məğlub duruma düşsə də, iki qol vuraraq oyunda dönüş yaradıb. 1992-ci ildən keçirilən turnirin əvvəlki 26 finalından yalnız birində hesabı açan komanda uduzub. Bu, 2005/06 mövsümünə təsadüf edib. “Karvan” “Qarabağ”la görüşdə ilk qolu vursa da, kuboku Ağdam təmsilçisi qazanıb – 2:1. Digər hallarda isə hesabı açan komandalar hətta qarşılaşmanın taleyi penaltilər seriyasına qədər uzansa da, sonda qalib tərəf olub.\r\n\r\n“Keşlə” – “Sumqayıt” görüşündə vurulan erkən qol da Azərbaycan kubokunun finallarında 2-ci ən tez vurulan topdur. Miyusko Boyoviçin 3-cü dəqiqədəki avtoqolu iki il öncə Stiven Monrozun (“Qəbələ”) “Sumqayıt”ın qapısına vurulduğu topla eyni vaxta təsadüf edib. Mütləq rekord isə Roman Axalkatsiyə (“Karvan”) məxsusdur. O, 2005/06 mövsümündə “Qarabağ”la finalın ilk dəqiqəsində qol vurub.\r\n\r\nBoyoviç Azərbaycan kubokunun finalında avtoqol edən ikinci futbolçu olub. Əvvəlki 26 finalda yalnız bir belə hadisə yaşanıb. 2016/17 mövsümündə Urfan Abbasov (“Qəbələ”) “Qarabağ”la görüşdə avtoqola imza atıb. Amma Abbasovdan fərqli Boyoviç sonradan rəqib qapısına da yol tapmaqla finalda hər iki tərəfə qol vuran ilk oyunçu olub.', '456', '2021-06-12 12:55:54', 1),
(4, 'ac.jpg', 'Amerikalı alimlər Morpheus adlı hack edilməsi mümkün olmayan prosessor yaradıblar', '   Mühəndislər yeni kompüter prosessoru yaradıblar və həmin prosessor hər bir neçə millisaniyə ərzində öz mikroarxitekturasını təsadüfi şəkildə dəyişir. Morpheus adı ilə tanınan bu prosessor yüzlərlə professional hackerin kiberhücumlarından yan keçərək DARPA-nın (ABŞ Müdafiə Nazirliyinin perspektivli layihələri araşdırma idarəsi) ilk ciddi testlərini geridə qoyub. 2017-ci ildə DARPA Miçiqan Universitetinin Morpheus adlı layihəsini dəstəkləmişdi və bu layihəyə 3.6 milyon dollar vəsait ayrılmışdı. Beləliklə 4 ildən sonra bu prosessor artıq hazırdır və aktiv şəkildə testlərdən keçir.\r\n\r\n    2020-ci ilin 4 ayı çərçivəsində DARPA Finding Exploits to Thwart Tampering (FETT) adlı proqramı işə salmışdı. Təhlükəsizliik sahəsində fəaliyyət göstərən 525 nəfər professional mütəxəssis bu proqram çərçivəsində Morpheus və digər prosessorlara qarşı mübarizə aparmalı idilər. Proqramın əsas məqsədi isə yeni təhlükəsizlik sistemlərinin test olunması idi. Yeni təhlükəsizlik sistemləri elə təchizatlara quraşdırılmışdı ki, onların əsasında olan proqram təminatlarının kiberhücumlara nə dərəcədə həssas olmalarından asılı olmayaraq həmin təchizatlar məlumatların qorunmasını təmin edə bilsinlər.', '76', '2021-05-25 10:55:54', 2),
(5, 'aq.jpg', 'Google şirkəti kommersiya məqsədli kvant kompüterlərinin yaradılması ilə məşğul olacaq', '\r\n    Google şirkəti kommersiya məqsədli kvant kompüterlərini yaratmaq və onların 2029-cu ilə kimi satışlarını reallaşdırmaq planlarını elan edib. Bu barədə The Wall Street Journal xəbər verib. Sözügedən layihənin reallaşdırılması üçün şirkət Kaliforniyada ayrıca kampusu da istifadəyə verib. Hesablama texnologiyaları bazarında bu cür təklifləri edən təmsilçi hələki yoxdur. Qeyd etmək lazımdır ki, Google öz müştərilərinə təcrübə çərçivəsində kvant kompüterləri xidmətini artıq təklif edir.\r\n\r\n    Şirkət bu layihəyə bir neçə milyard dollar investisiya yatırmağı hədəfləyib. İdeyanın reallaşdırılması üçün Kaliforniyada artıq xüsusi kampus da istifadəyə verilib. Həmin kampus özündə tədqiqat laboratoriyalarını və mikrosxem istehsalı sexini birləşdirir. Tədqiqatçlar əmindirlər ki, kommersiya məqsədli kvant kompüterlərinin istifadəyə verilməsi öz növbəsində mövcud olan kompüter güclərindən fərqli olaraq biznesə tapşırıqların milyon dəfə daha sürətli yerinə yetirilməsi imkanını verəcək.', '555', '2021-05-25 10:55:54', 2),
(6, 'aq.jpg', 'Proqramlaşdırma dilləri üçün nəzərdə tutulmuş süni zəka əsaslı tərcüməçi yaradılıb', 'Think 2021 adlı konfrans çərçivəsində IBM şirkəti süni zəka əsasında yaradılmış CodeNet adlı yeni alqoritmi təqdim edib. Yaradılmış bu yeni alqoritm tərcüməçi rolunda çıxış edərək proqramlaşdırma dilləri arasındakı uyğunsuzluq problemini aradan qaldırmaq üçün nəzərdə tutulub. CodeNet adlı qəliz generativ sistemin əsas özəlliyi ondadır ki, o, bir proqramlaşdırma dilindəki məlumatları digər proqramlaşdırma dilinə tərcümə edərək kodun ayrı-ayrı hissələrini və hətta bütöv layihələri yarada bilir. Məsələn proqramçı çox spesifik sahələrdə işlədilən bir neçə köhnə proqramlaşdırma dilini bilir.\r\n\r\n    Həmin proqramlaşdırma dillərindəki lazımi məlumatların yeni proqramlaşdırma dillərinə tərcümə üçün istifdəçi heç bir tədris prosesindən keçməyəcək. Belə ki, onun yerinə tərcüməni məhz sözügedən alqoritm reallaşdıracaq. IBM təmsilçiləri bildiriblər ki, onlar bu alqoritmi 14 milyon kod fraqmenti və 500 milyon sətr kod vasitəsilə təlimatlandırıblar. Alqoritm 55 köhnə və yeni proqramlaşdırma dilində tərcüməni reallaşdıra bilir. Bura COBOL və FORTRAN kimi köhnə proqramlaşdırma dillərindən tutmuş Java, C++ və Python kimi yeniləri daxildirlər. Alqoritmin nə dərəcədə effektiv çalışdığı barədə IBM bir məlumat verməyib.', '816', '2021-05-25 10:55:54', 2),
(7, 'aa.jpg', 'Azərbaycan şirkəti nizamnamə kapitalını 30% azaldır', '“Gedik Carçı KaynaK” MMC nizamnamə kapitalını 1 300 030 və yaxud 30% azaldaraq 4 333 433 manatdan 3 033 403 manata endirdiyini elan edib.\r\n\r\n“Report” bu barədə İqtisadiyyat Nazirliyi yanında Dövlət Vergi Xidmətinin \"Vergilər\" qəzetinə istinadən xəbər verir.\r\n\r\nMəlumata görə, azalmaya səbəb \"Carçıoğlu Group\" MMC-nin şirkətin təsisçiliyindən çıxmasıdır. Buna görə də, ona məxsus, Qazax rayonunun Xanlıqlar kəndində yerləşən əmlak kompleksi geri qaytarılır.', '89', '2021-05-25 10:55:54', 3),
(8, 'aaa.jpg', 'Azərbaycan və Böyük Britaniya Qarabağda görülən işləri müzakirə edib', 'İqtisadiyyat naziri Mikayıl Cabbarov Böyük Britaniyanın İxracat naziri Qraham Styuart ilə görüşüb.\r\n\r\n\"Report\" xəbər verir ki, bu barədə İqtisadiyyat Nazirliyi məlumat yayıb.\r\n\r\nMəlumata görə, M.Cabbarov Azərbaycan-Böyük Britaniya əlaqələrinin genişləndiyini qeyd edib, iqtisadiyyatın müxtəlif sahələrində əməkdaşlığın uğurla inkişaf etdiyini vurğulayıb. Onun sözlərinə görə, ölkələrimiz arasında digər sahələrlə yanaşı, uğurlu ticarət və investisiya əməkdaşlığı həyata keçirilir. Böyük Brianiya Azərbaycana ən çox investisiya yatıran ölkədir. 4-cü iclası keçirilən Azərbaycan və Böyük Britaniya arasında iqtisadi əməkdaşlıq üzrə Hökumətlərarası Komissiya ikitərəfli əlaqələrin inkişafında önəmli platformadır.\r\n\r\nGörüşdə ölkəmizdə həyata keçirilən islahatlar, 2030-cu ilə qədər Azərbaycanın sosial-iqtisadi inkişafına dair Milli Prioritetləri və qarşıya qoyulan hədəflər diqqətə çatdırılıb. İqtisadiyyat naziri Azərbaycanda dayanıqlı artan rəqabətqabiliyyətli iqtisadiyyatın, rəqəmsal ekosistemin inkişafı, kiçik və orta biznesin iqtisadiyyatda rolunun artırılması, nəqliyyat-tranzit potensialının gücləndirilməsi istiqamətində həyata keçirilən ardıcıl və sistemli tədbirlər barədə danışıb, Böyük Britaniya ilə iqtisadiyyatın müxtəlif sahələri, xüsusilə “yaşıl iqtisadiyyat” və bərpa olunan enerji üzrə əlaqələrin genişləndirilməsi potensialının böyük olduğunu qeyd edib.\r\n\r\nGörüşdə azad edilmiş ərazilərimizdə nəzərdə tutulan işlər barədə məlumat verilib. Böyük Britaniyanın İxracat naziri bu işlərdə ölkəsinin şirkətlərinin iştirak etməkdə maraqlı olduqlarını vurğulayıb.', '654', '2021-05-25 10:55:54', 3),
(9, 'ab.jpg', '“Tesla” MDB bazarına çıxacaq', 'ABŞ elektrikli avtomobil istehsalçısı “Tesla” şirkəti tezliklə Rusiya da daxil olmaqla MDB ölkələrinin bazarlarına çıxacaq.\r\n\r\n“Report” xarici mətbuata istinadən xəbər verir ki, bunu şirkətin baş meneceri (CEO) Elon Musk Moskvada videokonfrans formatında təşkil edilmiş forumda bildirib.\r\n\r\nÇindəki zavodlarının artıq fəaliyyətə başladığını, ABŞ və Almaniyada isə zavodlar inşa etdiklərini qeyd edən E.Musk deyib ki, başqa ölkələrdəki, o cümlədən Rusiyadakı potensial nəzərdən keçirilir.\r\n\r\n\"“Tesla\" avtomobillərinin satışı üçün Rusiya və ətraf bölgələri də araşdırırıq. Qısa müddətdə Rusiya da daxil olmaqla MDB ölkələrinin bazarına girəcəyik\", - deyə o, qeyd edib.', '946', '2021-05-25 10:55:54', 3),
(12, 'aq.jpg', 'Avtomobili normadan artıq yükləyən şəxslərlə bağlı yoxlamalar aparılır', 'Son illər ölkədə avtomobil yollarının müasirləşdirilməsi, respublika və yerli əhəmiyyətli yolların yenidən qurulması və tikilməsi layihələri ilə bağlı mühüm tədbirlər həyata keçirilir və bu sahədə Azərbaycan Avtomobil Yolları Dövlət Agentliyi davamlı və irihəcimli işlər görməkdədir.\r\n\r\n\"Report\" xəbər verir ki, bu barədə Agentliyin açıqlamasında bildirilir.\r\n\r\nMəlumatda həmçinin deyilir ki, müşahidələrə əsasən, bəzi fiziki və hüquqi şəxslər yük avtomobillərini oxa düşən kütlə parametrlərinə dair tələbi pozmaqla normadan artıq yükləyir və bu formada ümumi istifadədə olan avtomobil yollarında idarə edir. Belə hallar inzibati xəta tərkibi yaratmaqla yanaşı nəqliyyat vasitələrinin hərəkəti zamanı avtomobil yoluna və yol qurğularına zərər dəyməsinə, yol örtüyünün və yolun mühəndis konstruksiyasının zədələnməsinə səbəb olur, həmçinin bəzən digər hərəkət iştirakçıları üçün də təhlükəli vəziyyət yaradır.\r\n\r\nBunun qarşısını almaq məqsədilə magistral və respublika əhəmiyyətli avtomobil yollarında təşkil edilmiş tərəzi nəzarət məntəqələrində Agentliyə məxsus “Avtomobil Yollarının Mühafizə Xidməti” MMC-nin və Daxili İşlər Nazirliyinin Baş Dövlət Yol Polisi İdarəsinin əməkdaşlarının birgə xidmətinin təşkili üzrə tərtib edilmiş tədbirlər planına əsasən yoxlama tədbirləri davam etdirilir.\r\n\r\nYoxlama tədbirləri zamanı iriqabaritli və ağırçəkili nəqliyyat vasitələri icazə verilən çəki və kütlə parametrlərinə dair tələbləri pozan sürücülərin aşkarlanması, icazə verilən həddən artıq yükü olan nəqliyyat vasitələrinin agentliyin səlahiyyətləri daxilində yol hərəkətindən kənarlaşdırılması, artıq yükün boşaldılması və sürücülərə inzibati məsuliyyət daşıdıqları barədə xəbərdarlıqların edilməsi həyata keçirilir.\r\n\r\nƏgər yuxarıda qeyd olunan hal təkrarlanarsa, həmin sürücülər barəsində Daxili İşlər Nazirliyinin Baş Dövlət Yol Polisi İdarəsinin əməkdaşları inzibati xəta haqqında protokol tərtib edir. Bu çərçivədə son günlər iriqabaritli və ya ağırçəkili nəqliyyat vasitələrinin icazə verilən çəki və yüklə birlikdə oxa düşən kütlə parametrlərini aşmaqla ümumi istifadədə olan avtomobil yollarında idarə edilməsinə görə 30-dan çox sürücü 600 manat məbləğində cərimə olunub.\r\n\r\n\"Ağırçəkili nəqliyyat vasitələrinin avtomobil yollarına vurduqları ziyanın hesablanması qaydalarının, yol ötürücülərinin yük götürmə qabiliyyətinin müəyyən edilməsi, habelə həmin zərərin ödənilməsi və aradan qaldırılması, ən əsası isə qəza təhlükələrinin nəzarət altına alınması məqsədi ilə tədbirlərin görülməsi istiqamətində müvafiq addımların atılması davam etdiriləcək\", - agentlik bəyan edib.\r\n\r\n', '356', '2021-05-25 10:55:54', 4),
(16, 'aa.jpg', '\"Qarabağ\" kapitanı ilə müqaviləni uzatdı', '\"Qarabağ\" kapitanı Maksim Medvedevlə yeni müqavilə bağlayıb. \"Report\" klubun rəsmi saytına istinadən xəbər verir ki, 32 yaşlı müdafiəçi ilə imzalanmış sözləşmənin müddəti 2 ildir. Qeyd edək ki, Medvedev \"Qarabağ\"ın heyətində 7 dəfə Azərbaycan çempionu olub, 3 dəfə ölkə kubokunu qazanıb.', '224', '2021-06-12 16:14:18', 1),
(19, '5086634.jpg', 'Danimarka - Finlandiya matçı dayandırıldı !!!', '<p><strong>Avro-2020-nin B qrupunun&nbsp;<a href=\"https://metbuat.az/news/search?q=danimarka\" target=\"_blank\">Danimarka</a>&nbsp;-&nbsp;<a href=\"https://metbuat.az/news/search?q=finlandiya\" target=\"_blank\">Finlandiya</a>&nbsp;mat&ccedil;ı dayandırılıb.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><ins><ins><a href=\"https://code.ainsyndication.com/v2/click.php?k=eNq9Vt-P2zYM_lcEP7XA4lj-becpvRbr0PUwXFxuLdCXgLaYRDtbNiQ517uh__sox84Oh21v3ptEiqT46RNJKMOk_NOUWemZprN7KbyNLKOM840pk9IDMYl4WsQhycLSk71HC06rPPR5Efth5MeZk-Wld5b4CFWD3qYqAxKlpVwnuhakGm2C0mvRVgNYH56dJC69Ho7olhlZn6ztTble_31orfDRrHkcFEkarwUo2YJ-gNVqdZCqASXkE6xasLVcXAl4cnstGyH9k22bOWTdDcrqpzGTMYPtN7eISu-InbeBMowcBrlL7XZoK9SzJY_yPE54GnFcJyncgS-ojeyUwySeZVshNBrzb7BQoLauxxxpeX-ShvWggZJEzWgzKDiDbBxsTCpmsMHaomD-u19umVwwC-wgG_TZbw2CQTb0Rw0C_dm1WsY1XCdOtF1F6hvQWqK-JbfLRFwi5B8R7An1zoIldP_HUDedWCYUwVwnhVjMPSUCGmFJ_w0BZIeF_NPHaTp1XFwuXDDn158_08l96e0z6grkH6BeHZqRvNYHuuFgqDjdP_WLQUCnzyMNl3pDhXbXI4ql_FvZ4rdOLfaFnmW_GMUdHS7NabF6Q_6k6ZcCv5b2ym3qpO_gYZjz0nh8UUcvSultflxcOtTcEevXnH-pVP_5ay4BroeuEUZau4u9Ug2TShBhlJkYTyo1NM0c-aqbho5pgDh0mjr8q_O0PIE5jSCTaRHmHCAI8iA85JUoeBaKnKdpLTDFXCJK52vvPtx9-XC3375_fzeKEtfkE5_n3A-DzA_D5MUg8_FFgLjOA4iL7BDxjGOWIMZVEB0KKERWIAfvMjB1Zrp7GE754lnWeJ2i5rqCek_Ty3GyQrX6fTcxXuNhP-gLJsU_jkTzo4xeqEApe8mOHH3unmXTwDrxA_bmq1SiezTs9p7xwA82jARpvGHf0_gt2_Z9g1-x-iTtOokyP0rZm08f7z__-hNr5AOyn7F-6N6ym5PuWlxcF9wP_DjOaLIJONvBAbSczLzLI0mzrzo7v5rL6TxdzBG1aymaJTr8-At5W2Bx\" target=\"_blank\">ƏTRAFLI</a></ins></ins></p>\r\n\r\n<p><ins><ins>Snickers</ins></ins></p>\r\n\r\n<p><a href=\"https://metbuat.az/\" target=\"_blank\">Metbuat.az</a>&nbsp;xəbər verir ki, buna Danimarka millisinin futbol&ccedil;usu Kristian Eriksenin 45-ci dəqiqədə huşunu itirməsi səbəb olub. Meydana təcili həkimlər daxil olub və ona &uuml;rək masajı ediblər. 29 yaşlı h&uuml;cumameyilli yarımm&uuml;dafiə&ccedil;i xərəkdə meydan&ccedil;adan &ccedil;ıxarılıb, ancaq onun durumu barədə məlumat verilməyib.</p>\r\n\r\n<p>Yığmaların oyun&ccedil;uları da meydanı tərk ediblər.</p>\r\n', '2', '2021-06-12 23:40:51', 1);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_yazan` varchar(300) NOT NULL,
  `yorum_email` varchar(300) NOT NULL,
  `yorum_icerik` text NOT NULL,
  `yorum_yazan_sayt` varchar(300) NOT NULL,
  `yorum_tarix` timestamp NOT NULL DEFAULT current_timestamp(),
  `yorum_yazi_id` int(11) NOT NULL,
  `yorum_durum` int(11) NOT NULL DEFAULT 0,
  `yorum_ust` int(11) NOT NULL,
  `yorum_cavab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_yazan`, `yorum_email`, `yorum_icerik`, `yorum_yazan_sayt`, `yorum_tarix`, `yorum_yazi_id`, `yorum_durum`, `yorum_ust`, `yorum_cavab`) VALUES
(1, 'Yalcin', 'Yalcin@mail.ru', 'dsadsa', 'google.com', '2021-05-27 15:01:13', 5, 0, 0, 0),
(2, 'Yalcin', 'Yalcin@mail.ru', 'dsadsa', 'google.com', '2021-05-27 15:01:13', 5, 0, 0, 0),
(3, 'Yalcin', 'Yalcin@mail.ru', 'dsadsa', 'google.com', '2021-05-27 15:01:14', 5, 0, 0, 0),
(4, 'Yalcin', 'Yalcin@mail.ru', 'dsadsa', 'google.com', '2021-05-27 15:01:14', 5, 0, 0, 0),
(5, 'Yalcin', 'Yalcin@mail.ru', 'salam', 'google.com', '2021-05-27 15:01:59', 5, 0, 0, 0),
(6, 'dsa', 'dsa', 'salam', 'dsa', '2021-05-27 15:08:06', 5, 0, 0, 0),
(7, 'dsa', 'dsa@mail.ru', 'salam', 'dsa', '2021-05-27 15:08:14', 5, 0, 0, 0),
(8, 'ewq', 'ewq@mail.ru', 'ewq', 'ewq', '2021-05-27 15:10:01', 5, 0, 0, 0),
(9, 'ewq', 'ewq@mail.ru', 'ewq', 'ewq', '2021-05-27 15:10:06', 5, 0, 0, 0),
(10, 'ewq', 'ewq@mail.ru', 'ewq', 'ewq', '2021-05-27 15:10:07', 5, 0, 0, 0),
(11, 'ewq', 'ewq@mail.ru', 'ewq', 'ewq', '2021-05-27 15:10:07', 5, 0, 0, 0),
(12, 'Yalcin', 'Yalcin@mail.ru', 'qwe', 'google.com', '2021-05-27 15:19:20', 5, 0, 0, 0),
(13, 'dwq', 'ewq@mail.ru', 'fdwf', 'ewq', '2021-05-27 15:21:08', 5, 0, 0, 0),
(14, 'Yalcin', 'Yalcin@mail.ru', 'hgf', 'google.com', '2021-05-27 15:29:34', 10, 0, 0, 0),
(15, 'Yalcin', 'Yalcin@mail.ru', 'hgf', 'google.com', '2021-05-27 15:29:35', 10, 0, 0, 0),
(16, 'Yalcin', 'Yalcin@mail.ru', 'hgf', 'google.com', '2021-05-27 15:29:35', 10, 0, 0, 0),
(17, 'Yalcin', 'Yalcin@mail.ru', 'hgf', 'google.com', '2021-05-27 15:29:36', 10, 0, 0, 0),
(18, 'Yalcin', 'Yalcin@mail.ru', 'rew', 'orxan', '2021-05-27 15:31:06', 10, 0, 0, 0),
(19, 'Yalcin', 'Yalcin@mail.ru', 'rewrw', 'google.com', '2021-05-27 15:32:03', 10, 0, 0, 0),
(20, 'Yalcin', 'orxan@mail.ru', 'ewq', 'google.com', '2021-05-27 15:36:53', 8, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Cədvəl üçün indekslər `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Cədvəl üçün indekslər `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Cədvəl üçün indekslər `haqqimizda`
--
ALTER TABLE `haqqimizda`
  ADD PRIMARY KEY (`haqq_id`);

--
-- Cədvəl üçün indekslər `kateqoriler`
--
ALTER TABLE `kateqoriler`
  ADD PRIMARY KEY (`kateqori_id`);

--
-- Cədvəl üçün indekslər `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Cədvəl üçün indekslər `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Cədvəl üçün indekslər `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`yazi_id`);

--
-- Cədvəl üçün indekslər `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Cədvəl üçün AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `ayar_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `haqqimizda`
--
ALTER TABLE `haqqimizda`
  MODIFY `haqq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `kateqoriler`
--
ALTER TABLE `kateqoriler`
  MODIFY `kateqori_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Cədvəl üçün AUTO_INCREMENT `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Cədvəl üçün AUTO_INCREMENT `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Cədvəl üçün AUTO_INCREMENT `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Cədvəl üçün AUTO_INCREMENT `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
