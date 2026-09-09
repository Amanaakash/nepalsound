-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 05:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `namastesound`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `post_id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '23', 'Sonam Lhochhar', '/upload_file/albums/1727250827_936420819_1.JPG', 1, '2024-09-22 11:02:18', '2024-09-25 07:45:03'),
(2, '4', 'Nepali Congress Party', '/upload_file/albums/1727113295_274876753_3-scaled.jpg', 1, '2024-09-23 10:34:22', '2024-09-25 08:01:27'),
(3, '7', 'Damphu Sajha', '/upload_file/albums/1727250865_1484664444_2.JPG', 1, '2024-09-23 12:24:10', '2024-09-25 02:10:05'),
(4, '2', 'Re-Opening Of Boudhanath Stupa', '/upload_file/albums/1727250948_2129111743_4.JPG', 1, '2024-09-25 02:10:49', '2024-09-25 08:03:04'),
(5, '28', 'Test', '/upload_file/albums/1740145316_1640169248_1-1536x1152.jpg', 1, '2025-02-21 07:56:57', '2025-02-21 08:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_second` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `title_second`, `description`, `url`, `image`, `order`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'I love you the more in that I believe', 'But man is not made for defeat', '<p>I have not failed. I&#39;ve just</p>', 'https://www.youtube.com/watch?v=dbV_1OsepVE', '/upload_file/banner/1727021406_1725432880_blog4.jpg', NULL, 1, NULL, '2024-09-22 10:25:07', '2024-09-22 10:25:07'),
(2, 'Hello WOrld', 'Hello WOrld', '<p>Hello WOrld</p>', 'https://www.youtube.com/watch?v=D7Q_5pf-qrE&list=WL&index=1&pp=gAQBiAQB8AUB', '/upload_file/banner/1740144665_11179397_mahila le goru jottai.JPG', NULL, 1, NULL, '2025-02-21 07:46:05', '2025-02-21 07:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbs_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `featured` tinyint(1) DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `visit_no` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `type`, `category_id`, `user_id`, `title`, `post_unique_id`, `slug`, `thumbs`, `publish_date`, `thumbs_2`, `url`, `short_description`, `status`, `featured`, `order`, `visit_no`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'post', 1, NULL, 'Sound Solutions for Every Occasion Exploring Namaste Sound’s Services', '1_66f0482ab22c6', 'sound-solutions-for-every-occasion-exploring-namaste-sounds-services', '/upload_file/blog/1727241822_955036441_1 Sound Solutions for Every Occasion Exploring Namaste Sound’s Services-(MARCH 27, 2024 BLOG).gif', NULL, NULL, NULL, '<p><span style=\"font-size:16px\">In event planning and execution, one element stands out as a crucial factor in creating unforgettable experiences: sound. Whether it&rsquo;s a lively festival, a corporate seminar, an art exhibition, or a product launch event, the quality of sound can make or break the overall impact. At Namaste Sound, we pride ourselves on offering sound solutions tailored to suit every occasion, ensuring that each event is a harmonious success.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>The Power of Sound in Events</strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\">Sound is not just about amplifying music; it&rsquo;s about creating an immersive environment that engages the audience&rsquo;s senses. In festivals, the right sound setup can elevate the energy of performances, bringing music to life and leaving attendees with lasting memories. For live programs, seminars, and conferences, clear and crisp audio is essential for effective communication and participant engagement. Namaste Sound understands the diverse needs of different events and crafts sound solutions that enhance the overall experience.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Tailored Sound Solutions</strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\">One of the hallmarks of Namaste Sound&rsquo;s services is our ability to tailor sound solutions to meet specific event requirements. Whether it&rsquo;s providing high-quality equipment for a music festival, setting up audiovisual systems for a product launch event, or ensuring seamless communication during corporate meetings, we approach each project with precision and expertise. Our team works closely with event organizers to understand their vision and deliver soundscapes that align perfectly with the event&rsquo;s theme and objectives.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Comprehensive Services Across Various Occasions</strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\">Let&rsquo;s take a closer look at how Namaste Sound caters to different occasions:</span></p>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:16px\"><strong>Festivals:</strong>&nbsp;We provide sound setups that enhance the live music experience, creating an electrifying atmosphere for festival-goers to enjoy.</span></li>\r\n	<li><span style=\"font-size:16px\"><strong>Live Programs:</strong>&nbsp;Our professional sound systems and skilled engineers ensure dynamic and impactful performances, whether it&rsquo;s a concert, theater show, or cultural event.</span></li>\r\n	<li><span style=\"font-size:16px\"><strong>Seminars and Conferences:</strong>&nbsp;Clear and intelligible sound is paramount in these settings, and we deliver audio solutions that facilitate effective communication and knowledge sharing.</span></li>\r\n	<li><span style=\"font-size:16px\"><strong>Exhibitions:</strong>&nbsp;From art exhibitions to trade shows, we enhance the visitor experience with immersive soundscapes that complement visual displays.</span></li>\r\n	<li><span style=\"font-size:16px\"><strong>Product Launch Events:</strong>&nbsp;We help brands make a memorable impact by providing audiovisual setups that highlight product features and messaging.</span></li>\r\n	<li><span style=\"font-size:16px\"><strong>Meetings and Incentives:</strong>&nbsp;Our sound solutions contribute to productive meetings, incentive programs, and team-building activities, fostering engagement and collaboration.</span></li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\">At Namaste Sound, our mission is to elevate every occasion through exceptional sound solutions. By exploring the diverse range of events we cater to and the customized services we offer, it&rsquo;s clear that sound plays a pivotal role in shaping memorable experiences. Whether you&rsquo;re planning a festival, organizing a conference, or hosting a special event, let Namaste Sound be your trusted partner in creating sonic experiences that leave a lasting impression. Let&rsquo;s harmonize your next event together!</span></p>', 1, NULL, '1', 41, NULL, '2024-09-22 10:54:06', '2025-02-21 08:25:56'),
(2, 'post', 1, NULL, 'Namaste Sound At the summit of Everest', '1_66f04964a9794', 'namaste-sound-at-the-summit-of-everest', '/upload_file/blog/1727248103_351481592_13.JPG', NULL, NULL, NULL, '<p>On the 21st May, 2024,at 4:47 AM, the brand name Namaste Sound achieved a remarkable milestone by reaching the summit of Mount Everest, standing tall at 8,848.86 meters. Our brand name has become the very first brand to reach on the top of the world within our industry. This historic ascent was part of an ambitious awareness program titled &ldquo;Stop Global Warming, Save Himalayas,&rdquo; aimed at drawing global attention to the urgent need for climate action to preserve the fragile ecosystems of the Himalayan region.</p>\r\n\r\n<p>Namaste Sound, a pioneer in the audio-visual service industry, has now become the first ever service provider in this sector to reach and rendered its services at the world&rsquo;s highest altitude party (6400 meters). We would like to express our heartful gratitude to our representative DJ Tenzing Sherpa for this remarkable support and achievement. This extraordinary feat underscores our commitment not only to excellence in our field but also to social and environmental responsibility.</p>\r\n\r\n<p>Namaste Sound&rsquo;s journey to the top of Mount Everest serves as an inspirational story of innovation and advocacy. Our pioneering spirit in the audio-visual service industry now resonates with a powerful environmental cause, emphasizing the critical need to &ldquo;Stop Global Warming, Save Himalayas.&rdquo; Through this initiative, we, not only showcased our technical expertise but also our unwavering dedication to making a positive impact on the world.</p>\r\n\r\n<p>Before this successful journey, on 17th May, 2024,at 10:11 AM, the event &ldquo;DJ Tenzing Everest Expedition 2024 MUSIC FOR CAUSE: for the climate change awareness with the world&rsquo;s highest altitude party on land&rdquo; was organized and enjoyed at Camp 2 (6,400 meters) along with everyone there backed by our professional sound services. This event has become first event for successful DJ Party Event at the highest altitude of 6400 meters. We, Namaste Sound team, are very gratified to be part of this event.</p>\r\n\r\n<p>This historic event marks a significant chapter in Namaste Sound&rsquo;s legacy, setting a new benchmark for corporate social responsibility within the industry. As they stood atop the world, they reminded us all that every step we take towards preserving our planet is a step towards a brighter, more sustainable future.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>', 1, NULL, '1', 37, NULL, '2024-09-22 10:59:20', '2025-02-20 06:47:35'),
(3, 'post', 2, NULL, 'सामाजिक सञ्जाल: तपाईंको साथी कि तपाईंलाई नियन्त्रण गर्ने शक्ति ?', '1_66f0498bb0bc5', 'samajaka-saniajal-tapaiika-satha-ka-tapaiilii-nayanataranae-garana-shakata', '/upload_file/blog/1727023499_1201319425_Sapeksha-writeup_WJOI6Dn7OB.jpg', NULL, NULL, NULL, '<p style=\"text-align:justify\">तपाईंलाई केही वर्षअघि फर्कनु अनुरोध गरेँ ।</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">सम्झनुस् त, भर्खर फेसबुक खोल्दाको माहोल । पहिलो पटक गुगल सर्च गर्दाको क्षण । ती क्षण साँच्चै रमाइला थिए । गुगल सर्च गर्दा फुत्त फुत्त नतिजा आउँदा कम्ता रमाइलो हुँदैन थियो । अनि फेसबुकको त्यो सामान्य लेआउटमा आउने न्युज फिड ।</p>', 1, NULL, '1', 7, '2024-09-25 00:52:55', '2024-09-22 10:59:59', '2024-09-25 00:52:55'),
(4, 'post', 1, NULL, 'विद्यार्थी नआएपछि पश्चिमाञ्चल क्याम्पसमा अटोमोबाइल इन्जिनियरिङको भर्ना रोकियो', '1_66f049aebe6a2', 'vathayaratha-naaaepachha-pashacamaniacal-kayamapasama-atamabil-inajanayaranaka-bharana-rakaya', '/upload_file/blog/1727023534_330145119_ioe_pulchok_techpana_VRM3HeG6nc.jpg', NULL, NULL, NULL, '<p style=\"text-align:justify\">काठमाडौं । त्रिभुवन विश्वविद्यालय इन्जिनियरिङ अध्ययन संस्थान (आईओई) अन्तर्गतको पश्चिमाञ्चल क्याम्पसले विद्यार्थी संख्या अपुग भएपछि स्नातक तहको अटोमोबाइल इन्जिनियरिङमा भर्ना रोकेको हो ।</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">क्याम्पसका उपप्रशासक खेम पुराणेका अनुसार भर्नाका लागि प्रथम सूचीमा पर्याप्त विद्यार्थी नआएपछि आईओईको भर्ना निर्देशिका २०८१ अनुसार यस्तो कदम चालिएको हो ।</p>', 1, NULL, '1', 12, NULL, '2024-09-22 11:00:34', '2025-02-21 08:03:01'),
(5, 'page', NULL, NULL, 'Welcome to Namaste Sound', '1_66f04aeb511b4', 'welcome-to-namaste-sound', '/upload_file/blog/1727023851_1951102337_samaste1.jpg', NULL, NULL, NULL, '<p style=\"text-align:justify\">At Namaste Sound, we bring your events to life with our professional rental services for sound, lighting, screens, and stages. With years of experience in the industry, we are proud to be Nepal&rsquo;s leading provider for all your event needs, ensuring every celebration, concert, seminar, and program is a memorable success.</p>', 1, 1, '1', 1, NULL, '2024-09-22 11:05:51', '2025-02-21 08:09:43'),
(6, 'page', NULL, NULL, 'Installation', '1_66f04b051edbb', 'installation', '/upload_file/blog/1727175868_834314400_i5.JPG', NULL, '/upload_file/blog/1727273877_1144963545_1711949002_1167325993_1536148958_384808185_logo.png', NULL, '<p style=\"text-align:justify\">At Namaste Sound, we bring your events to life with our professional rental services for sound, lighting, screens, and stages. With years of experience in the industry, we are proud to be Nepal&rsquo;s leading provider for all your event needs, ensuring every celebration, concert, seminar, and program is a memorable success.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"./installation-details.html\">Why Namaste Sound?</a></p>', 1, 1, '3', 41, NULL, '2024-09-22 11:06:17', '2025-02-21 07:54:49'),
(7, 'page', NULL, NULL, 'Projects', '1_66f04b180c650', 'projects', '/upload_file/blog/1727168081_333803840_P12.jpg', NULL, '/upload_file/blog/1727274025_1959433975_Dar-Teej.jpg', NULL, '<p style=\"text-align:justify\">At Namaste Sound, we bring your events to life with our professional rental services for sound, lighting, screens, and stages. With years of experience in the industry, we are proud to be Nepal&rsquo;s leading provider for all your event needs, ensuring every celebration, concert, seminar, and program is a memorable success.</p>\r\n\r\n<p>&nbsp;</p>', 1, 1, '2', 10, NULL, '2024-09-22 11:06:36', '2025-02-21 07:55:07'),
(9, 'page', NULL, NULL, 'Work Activities', '1_66f04b380ab82', 'work-activities', '/upload_file/blog/1727168190_1853747474_W4.JPG', NULL, NULL, NULL, '<p>At Namaste Sound, we bring your events to life with our professional rental services for sound, lighting, screens, and stages. With years of experience in the industry, we are proud to be Nepal&rsquo;s leading provider for all your event needs, ensuring every celebration, concert, seminar, and program is a memorable success.</p>', 1, 1, '4', 11, NULL, '2024-09-22 11:07:08', '2024-09-25 00:47:40'),
(17, 'page', NULL, NULL, 'dxxdsxv', '1_66f2101a07cf9', 'dxxdsxv', NULL, NULL, NULL, NULL, '<p>dxvdsxv</p>', 1, 0, '6', 0, '2024-09-23 20:37:39', '2024-09-23 19:19:26', '2024-09-23 20:37:39'),
(18, 'page', NULL, NULL, 'test test', '1_66f210965847b', 'test-test', '/upload_file/blog/1727139990_304875309_1711949002_1167325993_1536148958_384808185_logo.png', NULL, NULL, NULL, '<p>test test</p>', 1, 0, '7', 0, '2024-09-23 20:37:42', '2024-09-23 19:21:30', '2024-09-23 20:37:42'),
(19, 'page', NULL, NULL, 'About Us', '1_66f21f531839a', 'about-us', '/upload_file/blog/1727143763_1529357639_1711949002_1167325993_1536148958_384808185_logo.png', NULL, NULL, NULL, '<p>Excitement of Bringing Music to Life with professional and quality services has resulted in the establishment of Namaste Sound in 2016 A.D. (2073 B.S.) by Bijay Lama. Namaste Sound is a lawfully registered company with many years of experience in providing its professional rental services. We prioritize quality and professionalism while rendering our services over anything else.</p>\r\n\r\n<p>&nbsp;</p>', 1, 1, '5', 0, NULL, '2024-09-23 20:24:23', '2024-09-23 20:40:48'),
(20, 'post', 2, NULL, 'thaman', '1_66f2b9e8ccf13', 'thaman', '/upload_file/blog/1727183336_2049443233_3-scaled.jpg', NULL, NULL, NULL, '<p>thaman</p>', 1, NULL, '1', 4, '2024-09-25 01:22:47', '2024-09-24 07:23:57', '2024-09-25 01:22:47'),
(21, 'post', 2, NULL, 'Namaste Sound On the top of Mount Everest', '1_66f3af78a5f9f', 'namaste-sound-on-the-top-of-mount-everest', '/upload_file/blog/1727246200_1553770677_1.jpg', NULL, '/upload_file/blog/1727246203_611344375_5.png', NULL, NULL, 1, NULL, '1', 8, NULL, '2024-09-25 00:51:44', '2025-02-20 06:47:57'),
(23, 'post', 2, NULL, 'Sonam Loshar with Namaste Sound', '1_66f3b044253e8', 'sonam-loshar-with-namaste-sound', '/upload_file/blog/1727246404_15250697_2.JPG', NULL, '/upload_file/blog/1727246409_2057022053_19.JPG', NULL, '<p>Sonam Losar is a significant festival celebrated in Nepal, particularly in the Tamang Buddhist communities. The festival marks the beginning of the new year in the Tibetan lunar calendar and is also known as Losar. Since 2048 B.S., Nepal Tamang Ghedung has been organizing Sonam Loshar Festival Celebration Event on the occasion of Sonam Loshar to celebrate with great joy and huge presence of people representing Tamang Community having honorable Prime Minister as chief guest at Tudhikhel, Kathmandu in order to protect, preserve and promote their art &amp; culture along with tourism promotion in the nation where the event has been managed by Namaste Sound.</p>\r\n\r\n<p>Sonam Losar marks the beginning of a new year and is a time for renewal, purification, and spiritual growth. It is believed to be a period of good fortune, prosperity, and happiness. It is based on mathematical calculation and observed by recognizing each new year named after 12 different birds &amp; animals in cycle of 12 years where repetition is made after a cycle (12 years). Sonam Loshar is culturally celebrated in following ways:</p>\r\n\r\n<p>Monks and devotees gather for chanting, meditation, and prayer sessions to purify the mind and soul.<br />\r\nOfferings of sacred ritualistic food are made to the gods and spirits to ensure peace, harmony, and good luck.<br />\r\nSpecial dishes are prepared and enjoyed such as roasted barley flour and cyhang.<br />\r\nTraditional Tamang music and dance performances are held to entertain and bring joy to the community.<br />\r\nHomes and monasteries are decorated with colorful flags, streamers, and traditional Tibetan ornaments.<br />\r\nSonam Losar is a vibrant and meaningful festival that celebrates new beginnings, renewal, and spiritual growth.</p>\r\n\r\n<p>Although Sonam Loshar is 15 days long celebrated festival, at Kathmandu people have been celebrating it for 3 days (starting from 2 days prior to the actual date of festival). Namaste Sound has been managing the event for 3 days along with pre-set ups and post celebration aspects at Tudikhel, Kathmandu. Namaste Sound has given its all to make the event grand, successful, and enjoyable in best possible way and had made the organizers as well as the audience very satisfied with its services.</p>\r\n\r\n<p>Day 1: All set ups and checking are made in order to deliver quality services. Every aspects of management are handled by Namaste Sound to ensure smooth operation during the event.</p>\r\n\r\n<p>Day 2: This day is celebrated as eve with various performances by renowned artists to attract the attention of people. Number of stalls, for the ease of audiences are made and assigned to vendors and their shops so that it is easier for the preparation of the event day.</p>\r\n\r\n<p>Day 3: On Sonam Losar, from the early morning a rally is initiated, rituals are performed by monks, bonbos and the day is started for celebrations. Chantings, Prays, Pujas are performed for renewal, purification, and spiritual growth followed with blessings to everyone. Political presence in there representing Tamang Community along with honorable Prime Minister for presentation and upliftment of the community. Well-known artists performed their talents including Traditional songs and dances, Selo performances, Modern arts, Comedies, and many more young/ new/ modern talents.</p>\r\n\r\n<p>At Tudhikhel, Kathmandu, the festival is celebrated for 3 days where Namaste Sound has delivered its services by providing best quality sound system, light system, stage, screen along with the event management. The huge audience has always loved the event as a whole, particularly its sound system. Namaste Sound has become an iconic aspect of Sonam Loshar celebration in Nepal. Namaste Sound has created a history on its long journey by providing its services to thousands of audiences with satisfaction.</p>\r\n\r\n<p style=\"text-align:justify\">Hence, Namaste Sound is always remembered whenever Sonam Loshar in mentioned. The dedication, hard work and professional-quality services of Namaste Sound is noticeable and appreciable by whole nation.</p>', 1, NULL, '1', 32, NULL, '2024-09-25 00:55:13', '2025-02-20 06:48:06'),
(27, 'post', 2, NULL, 'Namaste Sound: Atop Mount Everest', '1_66f3e24fc1a66', 'namaste-sound-atop-mount-everest', '/upload_file/blog/1727259215_1347410274_1.jpg', NULL, '/upload_file/blog/1727259216_1225677925_1.jpg', NULL, '<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">On the 21st May, 2024, at 4:47 AM, the brand name <strong>Namaste Sound</strong> achieved a remarkable milestone by reaching the summit of Mount Everest, standing tall at 8,848.86 meters. Our brand name has become the very first brand to reach on the top of the world within our industry. This historic ascent was part of an ambitious awareness program titled &ldquo;Stop Global Warming, Save Himalayas,&rdquo; aimed at drawing global attention to the urgent need for climate action to preserve the fragile ecosystems of the Himalayan region.</span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Namaste Sound, a pioneer in the audio-visual service industry, has now become <strong>the first ever service provider in this sector to reach and rendered its services at the world&rsquo;s highest altitude party (6400 meters).</strong> We would like to express our heartful gratitude to our representative <strong>DJ Tenzing Sherpa</strong> for this remarkable support and achievement. This extraordinary feat underscores our commitment not only to excellence in our field but also to social and environmental responsibility.</span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Namaste Sound&rsquo;s journey to the top of Mount Everest serves as an inspirational story of innovation and advocacy. Our pioneering spirit in the audio-visual service industry now resonates with a powerful environmental cause, emphasizing the critical need to &ldquo;Stop Global Warming, Save Himalayas.&rdquo; Through this initiative, we, not only showcased our technical expertise but also our unwavering dedication to making a positive impact on the world.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Before this successful journey, on 17th May, 2024, at 10:11 AM, the event &ldquo;DJ Tenzing Everest Expedition 2024 MUSIC FOR CAUSE: for the climate change awareness with the world&rsquo;s highest altitude party on land&rdquo; was organized and enjoyed at Camp 2 (6,400 meters) along with everyone there backed by our professional sound services. <strong>This event has become first event for successful DJ Party Event at the highest altitude of 6400 meters</strong>. We, Namaste Sound team, are very gratified to be part of this event</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">This historic event marks a significant chapter in Namaste Sound&rsquo;s legacy, setting a new benchmark for corporate social responsibility within the industry. As they stood atop the world, they reminded us all that every step we take towards preserving our planet is a step towards a brighter, more sustainable future.</span></span></p>', 1, NULL, '1', 16, NULL, '2024-09-25 04:28:38', '2024-09-25 08:27:05'),
(28, 'post', 2, NULL, 'ग्रामीण भेगका विद्यार्थीलाई निःशुल्क शिक्षामा जोड्ने श्रीरामको डिजिटल अभियान', '1_67b883c1ccaa8', 'garamanae-bhagaka-vathayarathalii-nashalka-shakashhama-jadana-shararamaka-dajatal-abhayana', '/upload_file/blog/1740145601_377488922_shreeram-lamichhane_hnl9PTRpzm.jpg', NULL, NULL, NULL, '<p style=\"text-align:justify\"><strong>काठमाडौं </strong>। बागलुङस्थित बागलुङ नगरपालिका वडा नं १३ नयाँपुल घर भएका श्रीराम लामिछानेले गाउँबाट एसईई पूरा गरे । एसईईमा कोरोना महामारीको मारमा परेका उनको कक्षा ११ पनि कोरोना कालमा नै सुरु भएको थियो । बागलुङकै निजी विद्यालयमा विज्ञान अध्ययन सुरु गरेका उनको अधिकांश कक्षा अनलाइनमार्फत नै सञ्चालन भएको थियो&nbsp; ।&nbsp;&nbsp;</p>', 1, NULL, '1', 3, NULL, '2025-02-21 08:01:41', '2025-02-21 08:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_post_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `parent_id`, `title`, `unique_id`, `slug`, `thumbs`, `description`, `category_post_count`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Blog', '2081221528286389', 'blog', '/upload_file/blogcategory/1727168431_1276809240_W2.JPG', NULL, 0, 2, 1, NULL, '2024-09-24 03:15:36'),
(2, NULL, 'News', '208122152828891', 'news', NULL, NULL, 0, 1, 1, NULL, '2024-09-22 10:50:20'),
(3, NULL, 'Articles', '2081221528288907', 'articles', NULL, NULL, 0, 3, 1, NULL, '2024-09-22 10:50:04'),
(4, NULL, 'Poem', '2081221528282403', 'poem', NULL, NULL, 0, 4, 1, NULL, '2024-09-22 10:50:04'),
(5, NULL, 'Book', '2081221528288293', 'book', NULL, NULL, 0, 5, 1, NULL, '2024-09-22 10:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `visit_no` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_covers`
--

CREATE TABLE `book_covers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_categories`
--

CREATE TABLE `career_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commons`
--

CREATE TABLE `commons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_first_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_third_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_fourth_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_first_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_first_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_second_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_third_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_third_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_fourth_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_fourth_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commons`
--

INSERT INTO `commons` (`id`, `header_first_title`, `header_second_title`, `header_third_title`, `header_fourth_title`, `footer_first_title`, `footer_first_description`, `footer_second_title`, `footer_second_description`, `footer_third_title`, `footer_third_description`, `footer_fourth_title`, `footer_fourth_description`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'PECM.', '<p>Namaste Sound operates within a professional setting, emphasizing quality equipment, extensive experience, and fostering a pleasant and welcoming atmosphere.</p>\r\n\r\n<p>&nbsp;</p>', 'PECM', '<p><a href=\"#\">Live Event Management</a></p>\r\n\r\n<p><a href=\"http://127.0.0.1:8000/#\">Award Ceremonies</a></p>\r\n\r\n<p><a href=\"http://127.0.0.1:8000/#\">Stage Set Design</a></p>\r\n\r\n<p><a href=\"http://127.0.0.1:8000/#\">Conference Production</a></p>\r\n\r\n<p><a href=\"http://127.0.0.1:8000/#\">Video Projection</a></p>\r\n\r\n<p><a href=\"http://127.0.0.1:8000/#\">Professional Audio</a></p>\r\n\r\n<p><a href=\"http://127.0.0.1:8000/#\">Audio Visual Hire</a></p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;</p>\r\n</p>', 'CONTACT INFO', '<p>PECM</p>', 'PECM', '<p>PECM</p>', NULL, '2025-02-21 08:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `district_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL,
  `download_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `service_id`, `rental_unique_id`, `post_unique_id`, `title`, `file`, `size`, `type`, `order`, `download_count`, `created_at`, `updated_at`) VALUES
(27, NULL, NULL, '1_66f210965847b', 'test test', '/upload_file/blog/images/1727139990_2066926788_1726296051_383654934_e4b751b3-a88e-4f59-b154-1be6cf358cb5-1_all_9858.png', NULL, NULL, NULL, 0, '2024-09-23 19:21:30', '2024-09-23 19:21:30'),
(28, NULL, NULL, '1_66f210965847b', 'test test', '/upload_file/blog/images/1727139990_1479761197_1721230903_1274906141_vecteezy_green-colored-background-green-screen-background-green_21091714.jpg', NULL, NULL, NULL, 0, '2024-09-23 19:21:30', '2024-09-23 19:21:30'),
(38, NULL, NULL, '1_66f04aeb511b4', 'Welcome to Namaste Sound', '/upload_file/blog/images/1727140463_511607281_1-1536x1152.jpg', NULL, NULL, NULL, 0, '2024-09-23 19:29:23', '2024-09-23 19:29:23'),
(39, NULL, NULL, '1_66f04aeb511b4', 'Welcome to Namaste Sound', '/upload_file/blog/images/1727140463_1380949515_3-scaled.jpg', NULL, NULL, NULL, 0, '2024-09-23 19:29:23', '2024-09-23 19:29:23'),
(40, NULL, NULL, '1_66f04aeb511b4', 'Welcome to Namaste Sound', '/upload_file/blog/images/1727140463_1280295744_samaste1.jpg', NULL, NULL, NULL, 0, '2024-09-23 19:29:23', '2024-09-23 19:29:23'),
(52, NULL, NULL, '1_66f21f531839a', 'About Us', '/upload_file/blog/images/1727144703_1935991613_1711949002_1167325993_1536148958_384808185_logo.png', NULL, NULL, NULL, 0, '2024-09-23 20:40:03', '2024-09-23 20:40:03'),
(54, NULL, '1_66f26d9e354b6', NULL, '५ दलको न्यूनतम नीतिगत प्राथमिकता र साझा सङ्कल्पमा के छ ? (पूर्णपाठसहित)', '/upload_file/rental/file/1727163807_1629006437_LED-Screen-3.webp', NULL, NULL, NULL, 0, '2024-09-24 01:58:27', '2024-09-24 01:58:27'),
(58, NULL, '1_66f16d161a508', NULL, 'Midas M32 Live', '/upload_file/rental/file/1727166630_1140516701_1.  Midas M32 Live.png', NULL, NULL, NULL, 0, '2024-09-24 02:45:30', '2024-09-24 02:45:30'),
(59, NULL, '1_66f16d161a508', NULL, 'Midas DL 32', '/upload_file/rental/file/1727166677_1833925204_2.   Midas DL 32.png', NULL, NULL, NULL, 0, '2024-09-24 02:46:17', '2024-09-24 02:46:17'),
(60, NULL, NULL, '1_66f04b380ab82', 'Work Activities', '/upload_file/blog/images/1727175160_2040210369_W2.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:07:40', '2024-09-24 05:07:40'),
(61, NULL, NULL, '1_66f04b380ab82', 'Work Activities', '/upload_file/blog/images/1727175160_1785683051_W3.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:07:40', '2024-09-24 05:07:40'),
(62, NULL, NULL, '1_66f04b380ab82', 'Work Activities', '/upload_file/blog/images/1727175160_437716374_W4.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:07:40', '2024-09-24 05:07:40'),
(63, NULL, NULL, '1_66f04b380ab82', 'Work Activities', '/upload_file/blog/images/1727175160_1386676940_W5.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:07:40', '2024-09-24 05:07:40'),
(64, NULL, NULL, '1_66f04b380ab82', 'Work Activities', '/upload_file/blog/images/1727175160_198909338_W6.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:07:40', '2024-09-24 05:07:40'),
(65, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1419585709_i1.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(66, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1418485398_i2.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(67, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_399193451_i3.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(68, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1883937716_i4.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(69, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_991431715_i5.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(70, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_382988522_i6.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(71, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1573569219_i7.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(72, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_439685711_i8.png', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(73, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1619101186_i9.png', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(74, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_502964585_i10.png', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(75, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_334708824_i11.png', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(76, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1498361106_i12.png', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(77, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_917154832_i13.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(78, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1700893217_i14.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(79, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1257351881_i15.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(80, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1928945901_i16.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(81, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_749144897_i17.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(82, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_1650664123_i19.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(83, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_676359181_i20.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(84, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175400_2080212472_i22.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:11:40', '2024-09-24 05:11:40'),
(85, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_1996004187_i25.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(86, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_327650105_i26.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(87, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_1765851762_i27.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(88, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_508403446_i28.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(89, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_2077725897_i30.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(90, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_612266836_i33.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(91, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_633616398_i34.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(92, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_715253093_i35.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(93, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_200825801_i36.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(94, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_401432715_i37.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(95, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_742843721_i39.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(96, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_555489601_i40.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(97, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_1235920002_i45.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(98, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_1790892685_i46.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(99, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_2116692768_i47.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(100, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175557_137939341_i48.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:14:17', '2024-09-24 05:14:17'),
(101, NULL, NULL, '1_66f04b051edbb', 'Installation', '/upload_file/blog/images/1727175714_653833464_40.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:16:54', '2024-09-24 05:16:54'),
(102, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176898_1370451300_P1.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:36:38', '2024-09-24 05:36:38'),
(103, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176898_1706824486_P2.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:36:38', '2024-09-24 05:36:38'),
(104, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176898_1303693027_P3.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:36:38', '2024-09-24 05:36:38'),
(105, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176898_1627170893_P4.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:36:38', '2024-09-24 05:36:38'),
(106, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176898_883635551_P5.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:36:38', '2024-09-24 05:36:38'),
(107, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176898_1322298947_P6.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:36:38', '2024-09-24 05:36:38'),
(108, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176898_2029073223_P7.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:36:39', '2024-09-24 05:36:39'),
(109, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_796860631_P10.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(110, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1022374707_P11.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(111, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_483224251_P12.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(112, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1218226152_P13.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(113, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_926427402_P14.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(114, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1544214017_P15.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(115, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1911280971_P16.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(116, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1022156093_P17.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(117, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1996798666_P23.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(118, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1557478207_P24.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(119, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_272961449_P25.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(120, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1875954248_P26.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(121, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_1814313877_P27.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(122, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176955_461651726_P28.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:37:35', '2024-09-24 05:37:35'),
(123, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176982_417125901_P29.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:38:02', '2024-09-24 05:38:02'),
(124, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176982_942130415_P34.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:38:02', '2024-09-24 05:38:02'),
(125, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176982_1266206323_P43.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:38:02', '2024-09-24 05:38:02'),
(126, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176982_1540152413_P44.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:38:02', '2024-09-24 05:38:02'),
(127, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176982_1083972219_P45.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:38:02', '2024-09-24 05:38:02'),
(128, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176982_2112850075_P51.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:38:02', '2024-09-24 05:38:02'),
(129, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727176982_230933625_P52.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:38:02', '2024-09-24 05:38:02'),
(130, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177030_1760193097_P53.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:38:50', '2024-09-24 05:38:50'),
(131, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177030_597165839_P54.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:38:50', '2024-09-24 05:38:50'),
(132, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177030_1015704832_P55.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:38:50', '2024-09-24 05:38:50'),
(133, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177030_186559866_P56.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:38:50', '2024-09-24 05:38:50'),
(134, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177030_586511139_P57.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:38:50', '2024-09-24 05:38:50'),
(135, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177030_2029889462_P58.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:38:50', '2024-09-24 05:38:50'),
(136, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177030_1637109093_P59.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:38:50', '2024-09-24 05:38:50'),
(137, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177084_1113727132_P60.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:39:44', '2024-09-24 05:39:44'),
(138, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177084_890718173_P61.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:39:44', '2024-09-24 05:39:44'),
(139, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177084_1148365561_P62.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:39:44', '2024-09-24 05:39:44'),
(140, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177084_1723077639_P63.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:39:44', '2024-09-24 05:39:44'),
(141, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177084_687959021_P64.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:39:44', '2024-09-24 05:39:44'),
(142, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177084_848490498_P65.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:39:44', '2024-09-24 05:39:44'),
(143, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177084_602011336_P66.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:39:44', '2024-09-24 05:39:44'),
(144, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177131_1776785051_P67.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:40:31', '2024-09-24 05:40:31'),
(145, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177131_1061413621_P68.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:40:31', '2024-09-24 05:40:31'),
(146, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177131_413542886_P69.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:40:31', '2024-09-24 05:40:31'),
(147, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177131_275402896_P70.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:40:31', '2024-09-24 05:40:31'),
(148, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177131_1525748149_P71.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:40:31', '2024-09-24 05:40:31'),
(149, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177131_478759571_P72.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:40:31', '2024-09-24 05:40:31'),
(150, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177131_1316013835_P73.jpeg', NULL, NULL, NULL, 0, '2024-09-24 05:40:31', '2024-09-24 05:40:31'),
(151, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177195_252964950_P74.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:41:35', '2024-09-24 05:41:35'),
(152, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177195_1364156072_P75.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:41:35', '2024-09-24 05:41:35'),
(153, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177195_395902138_P76.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:41:35', '2024-09-24 05:41:35'),
(154, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177195_199883670_P77.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:41:35', '2024-09-24 05:41:35'),
(155, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177195_1156249720_P78.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:41:35', '2024-09-24 05:41:35'),
(156, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177195_1275504016_P79.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:41:35', '2024-09-24 05:41:35'),
(157, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177195_2018129752_P80.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:41:35', '2024-09-24 05:41:35'),
(158, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_1813151169_P81.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(159, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_1675229199_P82.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(160, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_368201977_P83.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(161, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_1791433954_P93.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(162, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_1252674165_P94.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(163, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_494504996_P95.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(164, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_230224378_P96.JPG', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(165, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_895196914_P98.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(166, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177233_816892826_P103.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:42:13', '2024-09-24 05:42:13'),
(167, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177268_500448199_P110.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:42:48', '2024-09-24 05:42:48'),
(168, NULL, NULL, '1_66f04b180c650', 'Projects', '/upload_file/blog/images/1727177268_1581658089_P114.jpg', NULL, NULL, NULL, 0, '2024-09-24 05:42:48', '2024-09-24 05:42:48'),
(169, NULL, '1_66f2b2be1b895', NULL, 'विज्ञप्ति', '/upload_file/rental/file/1727181502_1257607848_3-scaled.jpg', NULL, NULL, NULL, 0, '2024-09-24 06:53:22', '2024-09-24 06:53:22'),
(170, NULL, '1_66f2b5719d3e2', NULL, '५ दलको न्यूनतम नीतिगत प्राथमिकता र साझा सङ्कल्प', '/upload_file/rental/file/1727182194_424530413_1.-MA-Lighting-grandMA3-Light-Lighting-Console.webp', NULL, NULL, NULL, 0, '2024-09-24 07:04:54', '2024-09-24 07:04:54'),
(171, NULL, '1_66f2b5a3c9708', NULL, 'Midas DL 32', '/upload_file/rental/file/1727182243_321566742_2.-Midas-DL-32-1 (1).webp', NULL, NULL, NULL, 0, '2024-09-24 07:05:43', '2024-09-24 07:05:43'),
(172, NULL, '1_66f2b9082cd42', NULL, '५ दलको न्यूनतम नीतिगत प्राथमिकता र साझा सङ्कल्पमा के छ ? (पूर्णपाठसहित)', '/upload_file/rental/file/1727183112_1870013438_pager-explosiontechpana-news_ACwAISSNuZ (1).jpg', NULL, NULL, NULL, 0, '2024-09-24 07:20:12', '2024-09-24 07:20:12'),
(179, '7', NULL, NULL, '2. AWARD CEREMONIES', '/upload_file/services/images/1727231644_1024834218_A1.JPG', NULL, NULL, NULL, 0, '2024-09-24 20:49:04', '2024-09-24 20:49:04'),
(180, '7', NULL, NULL, '2. AWARD CEREMONIES', '/upload_file/services/images/1727231644_1537558962_A2.JPG', NULL, NULL, NULL, 0, '2024-09-24 20:49:05', '2024-09-24 20:49:05'),
(181, '7', NULL, NULL, '2. AWARD CEREMONIES', '/upload_file/services/images/1727231644_669104994_A3.jpg', NULL, NULL, NULL, 0, '2024-09-24 20:49:05', '2024-09-24 20:49:05'),
(182, '7', NULL, NULL, '2. AWARD CEREMONIES', '/upload_file/services/images/1727231644_1023642094_A4.jpg', NULL, NULL, NULL, 0, '2024-09-24 20:49:05', '2024-09-24 20:49:05'),
(183, '7', NULL, NULL, '2. AWARD CEREMONIES', '/upload_file/services/images/1727231644_406473516_A5.jpg', NULL, NULL, NULL, 0, '2024-09-24 20:49:05', '2024-09-24 20:49:05'),
(184, '7', NULL, NULL, '2. AWARD CEREMONIES', '/upload_file/services/images/1727231644_516946722_A6.jpg', NULL, NULL, NULL, 0, '2024-09-24 20:49:05', '2024-09-24 20:49:05'),
(192, '3', NULL, NULL, '6. PROFESSIONAL AUDIO', '/upload_file/services/images/1727231827_309586599_P6.JPG', NULL, NULL, NULL, 0, '2024-09-24 20:52:07', '2024-09-24 20:52:07'),
(193, '3', NULL, NULL, '6. PROFESSIONAL AUDIO', '/upload_file/services/images/1727231827_704474738_P7.JPG', NULL, NULL, NULL, 0, '2024-09-24 20:52:07', '2024-09-24 20:52:07'),
(194, NULL, '1_66f38c550ba65', NULL, 'Midas M32 Live', '/upload_file/rental/file/1727237205_1468725296_1.  Midas M32 Live.png', NULL, NULL, NULL, 0, '2024-09-24 22:21:45', '2024-09-24 22:21:45'),
(196, NULL, '1_66f38c550ba65', NULL, 'Midas DL 32', '/upload_file/rental/file/1727237254_1322351557_2.   Midas DL 32.png', NULL, NULL, NULL, 0, '2024-09-24 22:22:34', '2024-09-24 22:22:34'),
(197, NULL, '1_66f38d6599433', NULL, 'RCF TTS 56 A -Sub Woofer', '/upload_file/rental/file/1727237479_1707043185_4.  RCF TTS 56  A -Sub Woofer.png', NULL, NULL, NULL, 0, '2024-09-24 22:26:19', '2024-09-24 22:26:19'),
(198, NULL, '1_66f38d6599433', NULL, 'RCF HDL 20 A Line Array Speaker', '/upload_file/rental/file/1727237479_420726551_5.  RCF HDL 20 A- Line Array Speaker.png', NULL, NULL, NULL, 0, '2024-09-24 22:26:20', '2024-09-24 22:26:20'),
(199, NULL, '1_66f38d6599433', NULL, 'RCF 712-MK4 Active Speaker', '/upload_file/rental/file/1727237479_6881515_6.  RCF 712-MK4 Active Speaker.png', NULL, NULL, NULL, 0, '2024-09-24 22:26:20', '2024-09-24 22:26:20'),
(201, NULL, '1_66f38dee3e460', NULL, 'JBL PRX 915', '/upload_file/rental/file/1727237654_1692789513_7.  JBL PRX 915.png', NULL, NULL, NULL, 0, '2024-09-24 22:29:14', '2024-09-24 22:29:14'),
(202, NULL, '1_66f38e7a5bf3e', NULL, 'Mackie 1232', '/upload_file/rental/file/1727237754_1337669419_8.  Mackie 1232.png', NULL, NULL, NULL, 0, '2024-09-24 22:30:54', '2024-09-24 22:30:54'),
(203, NULL, '1_66f38f449ff95', NULL, 'Pearl Drum Set', '/upload_file/rental/file/1727237956_2026337906_9.  Pearl Drum Set.png', NULL, NULL, NULL, 0, '2024-09-24 22:34:16', '2024-09-24 22:34:16'),
(204, NULL, '1_66f38f449ff95', NULL, 'Pearl Decade Maple DMP925SPC 5-piece Shell Pack with Snare Drum - Gloss Deep Red Burst', '/upload_file/rental/file/1727237956_469929840_10. Pearl Decade Maple DMP925SPC 5-piece Shell Pack with Snare Drum - Gloss Deep Red Burst.png', NULL, NULL, NULL, 0, '2024-09-24 22:34:16', '2024-09-24 22:34:16'),
(205, NULL, '1_66f390118f981', NULL, 'Orange Base amp', '/upload_file/rental/file/1727238161_1057817968_11.  Orange Base amp.png', NULL, NULL, NULL, 0, '2024-09-24 22:37:41', '2024-09-24 22:37:41'),
(206, NULL, '1_66f390118f981', NULL, 'Orange AD200B', '/upload_file/rental/file/1727238161_1779453390_12.  Orange AD200B.png', NULL, NULL, NULL, 0, '2024-09-24 22:37:41', '2024-09-24 22:37:41'),
(207, NULL, '1_66f390118f981', NULL, 'Orange OB1-300', '/upload_file/rental/file/1727238161_2107662554_13.  Orange OB1-300.png', NULL, NULL, NULL, 0, '2024-09-24 22:37:41', '2024-09-24 22:37:41'),
(208, NULL, '1_66f390118f981', NULL, 'Orange Crush Pro 120', '/upload_file/rental/file/1727238161_1908303351_14.  Orange Crush Pro 120.png', NULL, NULL, NULL, 0, '2024-09-24 22:37:41', '2024-09-24 22:37:41'),
(209, NULL, '1_66f39073dee83', NULL, 'Ampeg SVT7PRO 1000W Class D Bass Amp Head & SVT-410HLF Classic Bass Cabinet', '/upload_file/rental/file/1727238260_1350018078_15.  Ampeg SVT7PRO 1000W Class D Bass Amp Head & SVT-410HLF Classic Bass Cabinet.png', NULL, NULL, NULL, 0, '2024-09-24 22:39:20', '2024-09-24 22:39:20'),
(210, NULL, '1_66f390ab6388e', NULL, 'Fender -Guitar Amplifier Tone Master Twin Reverb', '/upload_file/rental/file/1727238315_999829048_16.  Fender -Guitar Amplifier Tone Master Twin Reverb.png', NULL, NULL, NULL, 0, '2024-09-24 22:40:15', '2024-09-24 22:40:15'),
(211, NULL, '1_66f390dc9eae8', NULL, 'Roland KC-600 200-Watt Keyboard Amplifier', '/upload_file/rental/file/1727238364_1583746669_17 Roland KC-600 200-Watt Keyboard Amplifier.png', NULL, NULL, NULL, 0, '2024-09-24 22:41:04', '2024-09-24 22:41:04'),
(212, NULL, '1_66f39101e28ef', NULL, 'BSS AR-133 Active DI Box', '/upload_file/rental/file/1727238401_126994052_18.  BSS AR-133 Active DI Box.png', NULL, NULL, NULL, 0, '2024-09-24 22:41:41', '2024-09-24 22:41:41'),
(213, NULL, '1_66f3912f79d62', NULL, 'Behringer P1 In Ear Monitor', '/upload_file/rental/file/1727238447_1010946965_19.  Behringer P1 In Ear Monitor.webp', NULL, NULL, NULL, 0, '2024-09-24 22:42:27', '2024-09-24 22:42:27'),
(214, NULL, '1_66f391588e86f', NULL, 'Pioneer CDJ-3000 X DJM-A9', '/upload_file/rental/file/1727238488_684464720_20.  Pioneer CDJ-3000 X DJM-A9.png', NULL, NULL, NULL, 0, '2024-09-24 22:43:08', '2024-09-24 22:43:08'),
(215, NULL, '1_66f39182d7084', NULL, 'dbx DriveRack VENU 360-B', '/upload_file/rental/file/1727238531_1959083407_21.  dbx DriveRack VENU 360-B.png', NULL, NULL, NULL, 0, '2024-09-24 22:43:51', '2024-09-24 22:43:51'),
(216, NULL, '1_66f392cc2d606', NULL, 'Shure-ULXD24 With B58-G50', '/upload_file/rental/file/1727238861_1763628955_22. Shure AD24D Axient Dual Channel Handheld Wireless Bundle with 2 SM58 Mics, 2 Batteries, Charger, in G57 Band-Photoroom.png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(217, NULL, '1_66f392cc2d606', NULL, 'SHURE ULXS4 Wireless MIcrophone', '/upload_file/rental/file/1727238861_353058685_23. Shure ULXD24Q  Quad Channel Handheld Wireless Bundle with 4 SM58 Mics, 4 Batteries, 2 Chargers, in G50 Band-Photoroom.png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(218, NULL, '1_66f392cc2d606', NULL, 'Shure SLX4 With Beta SM 58 Wireless Microphone System', '/upload_file/rental/file/1727238861_1512627286_25. SHURE-QLXD24_Wireless System with SM58 Handheld Transmitter-Photoroom.png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(219, NULL, '1_66f392cc2d606', NULL, 'SHURE PGX4 X SM58 Wireless Microphone', '/upload_file/rental/file/1727238861_800443977_25. SHURE-QLXD24_Wireless System with SM58 Handheld Transmitter-Photoroom.png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(220, NULL, '1_66f392cc2d606', NULL, 'SHURE PGX4 X SM58 Wireless Microphone', '/upload_file/rental/file/1727238861_531383597_26.  SHURE ULXS4 Wireless MIcrophone.png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(221, NULL, '1_66f392cc2d606', NULL, 'SHURE SM 81-Condenser Instrument Microphone', '/upload_file/rental/file/1727238861_1313803104_27. Shure SLX4 With Beta SM 58 Wireless Microphone System.png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(222, NULL, '1_66f392cc2d606', NULL, 'Shure BETA 91A Kick Drum Microphone', '/upload_file/rental/file/1727238861_1979547735_28.  SHURE PGX4 X SM58 Wireless Microphone.png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(223, NULL, '1_66f392cc2d606', NULL, 'Shure PSM1000- Personal Monitor System (G10 470 to 542 MHz)', '/upload_file/rental/file/1727238861_832538470_31.  SHURE SM 81-Condenser Instrument Microphone.png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(224, NULL, '1_66f392cc2d606', NULL, 'Shure BETA 52A Kick Drum Microphone - Supercardioid Dynamic Mic with High Output Neodymium Element', '/upload_file/rental/file/1727238861_1934140741_29.  Shure PSM1000- Personal Monitor System (G10 470 to 542 MHz).png', NULL, NULL, NULL, 0, '2024-09-24 22:49:21', '2024-09-24 22:49:21'),
(225, NULL, '1_66f39421339a6', NULL, 'PEAVY-CM1 HANDHELD CONDENSER MICROPHONE', '/upload_file/rental/file/1727239201_728866125_42. PEAVY-CM1 HANDHELD CONDENSER MICROPHONE.png', NULL, NULL, NULL, 0, '2024-09-24 22:55:01', '2024-09-24 22:55:01'),
(226, NULL, '1_66f39454e1085', NULL, 'JTS NX-2 -Super Cardioid Dynamic Bass Instrument Kick Drum Cajon Microphone', '/upload_file/rental/file/1727239253_1603913740_43.  JTS NX-2 -Super Cardioid Dynamic Bass Instrument Kick Drum Cajon Microphone.png', NULL, NULL, NULL, 0, '2024-09-24 22:55:53', '2024-09-24 22:55:53'),
(227, NULL, '1_66f394d2aa129', NULL, 'EV-ND68 -Supercardioid Dynamic Bass Drum Microphone', '/upload_file/rental/file/1727239378_912866698_44.  EV-ND68 -Supercardioid Dynamic Bass Drum Microphone.png', NULL, NULL, NULL, 0, '2024-09-24 22:57:58', '2024-09-24 22:57:58'),
(228, NULL, '1_66f394d2aa129', NULL, 'EV-ND44- Dynamic Tight Cardioid Instrument Microphone', '/upload_file/rental/file/1727239378_338877655_45.  EV-ND44- Dynamic Tight Cardioid Instrument Microphone.png', NULL, NULL, NULL, 0, '2024-09-24 22:57:58', '2024-09-24 22:57:58'),
(229, NULL, '1_66f394d2aa129', NULL, 'V ND66 Condenser Cardioid Instrument Microphone', '/upload_file/rental/file/1727239378_588049728_46.  EV ND66 Condenser Cardioid Instrument Microphone.png', NULL, NULL, NULL, 0, '2024-09-24 22:57:58', '2024-09-24 22:57:58'),
(230, NULL, '1_66f3951c27dd9', NULL, 'C-Mark MK75 T Podium Mic', '/upload_file/rental/file/1727239452_678988570_47.  C-Mark MK75 T Podium Mic.png', NULL, NULL, NULL, 0, '2024-09-24 22:59:12', '2024-09-24 22:59:12'),
(231, NULL, '1_66f3955a65cdb', NULL, 'POWER DYNAMICS – PD504B QUAD 4X LAPEL UHF 50 CHANNEL MICROPHONE SYSTEM', '/upload_file/rental/file/1727239514_1274134664_48.  POWER DYNAMICS – PD504B QUAD 4X LAPEL UHF 50 CHANNEL MICROPHONE SYSTEM.png', NULL, NULL, NULL, 0, '2024-09-24 23:00:14', '2024-09-24 23:00:14'),
(232, NULL, '1_66f395ea5b357', NULL, 'MA Lighting grandMA3 Light Lighting Console', '/upload_file/rental/file/1727239658_558012097_1.   MA Lighting grandMA3 Light Lighting Console.png', NULL, NULL, NULL, 0, '2024-09-24 23:02:38', '2024-09-24 23:02:38'),
(233, NULL, '1_66f3982cd2d5c', NULL, 'MA Lighting grandMA3 Light Lighting Console', '/upload_file/rental/file/1727240236_1370702611_2.  AVOLITES TIGER TOUCH PRO.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(234, NULL, '1_66f3982cd2d5c', NULL, 'Kingkong 1024 -Lighting Controller DMX console', '/upload_file/rental/file/1727240236_107928675_3.  Kingkong 1024 -Lighting Controller  DMX console.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(235, NULL, '1_66f3982cd2d5c', NULL, '600W Bi-Color DMX Zoom LED Fresnel Spot Effect PAR Light', '/upload_file/rental/file/1727240236_1696555466_4.  600W Bi-Color DMX Zoom LED Fresnel Spot Effect PAR Light.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(236, NULL, '1_66f3982cd2d5c', NULL, '54 LED Light Par RGB', '/upload_file/rental/file/1727240236_643263695_5. 54 LED Light Par RGB.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(237, NULL, '1_66f3982cd2d5c', NULL, '7R 230W Beam Moving Head Light', '/upload_file/rental/file/1727240236_998301935_6.  7R 230W Beam Moving Head Light.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(238, NULL, '1_66f3982cd2d5c', NULL, '20r 440W Sharpy Spot Beam Wash Moving Head Light', '/upload_file/rental/file/1727240236_1004875438_7.  20r 440W Sharpy Spot Beam Wash Moving Head Light.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(239, NULL, '1_66f3982cd2d5c', NULL, '400w LED Blinder Light Warm White Color Audience Light', '/upload_file/rental/file/1727240236_2076649781_8.  400w LED Blinder Light Warm White Color Audience Light.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(240, NULL, '1_66f3982cd2d5c', NULL, '200W 2 Eye COB LED Blinder Light', '/upload_file/rental/file/1727240236_934424002_9,  200W 2 Eye COB LED Blinder Light.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(241, NULL, '1_66f3982cd2d5c', NULL, 'Kvant ClubMax 3000 Laser', '/upload_file/rental/file/1727240236_954912059_10,  Kvant ClubMax 3000 Laser.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(242, NULL, '1_66f3982cd2d5c', NULL, 'Stairville M-Fog 2500 DMX Fog Machine', '/upload_file/rental/file/1727240236_310110960_11.  Stairville M-Fog 2500 DMX Fog Machine.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(243, NULL, '1_66f3982cd2d5c', NULL, 'VEVOR 500W- Cold Spark Firework Machine DMX', '/upload_file/rental/file/1727240236_555443095_12.  VEVOR 500W- Cold Spark Firework Machine DMX.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(244, NULL, '1_66f3982cd2d5c', NULL, 'SPARK FABRICA JET PRO SF-05 SPARK MACHINE', '/upload_file/rental/file/1727240236_1758685811_1500W-Water-Base-Haze-Machine-with-DMX512-Fog-Machine.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(245, NULL, '1_66f3982cd2d5c', NULL, 'CO2 Jet Smoke Machine', '/upload_file/rental/file/1727240236_712519886_CO2 Jet Smoke Machine.png', NULL, NULL, NULL, 0, '2024-09-24 23:12:16', '2024-09-24 23:12:16'),
(246, '2', NULL, NULL, '7. AUDIO VISUAL HIRE', '/upload_file/services/images/1727248326_634339356_A1.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:27:06', '2024-09-25 01:27:06'),
(247, '2', NULL, NULL, '7. AUDIO VISUAL HIRE', '/upload_file/services/images/1727248326_99738726_A2.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:27:06', '2024-09-25 01:27:06'),
(248, '2', NULL, NULL, '7. AUDIO VISUAL HIRE', '/upload_file/services/images/1727248326_151937963_A3.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:27:06', '2024-09-25 01:27:06'),
(249, '2', NULL, NULL, '7. AUDIO VISUAL HIRE', '/upload_file/services/images/1727248326_186741808_A4.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:27:06', '2024-09-25 01:27:06'),
(250, '2', NULL, NULL, '7. AUDIO VISUAL HIRE', '/upload_file/services/images/1727248326_1888821314_A5.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:27:06', '2024-09-25 01:27:06'),
(251, '2', NULL, NULL, '7. AUDIO VISUAL HIRE', '/upload_file/services/images/1727248326_2077722636_A6.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:27:06', '2024-09-25 01:27:06'),
(265, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_1989995359_L1.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(266, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_642844673_L2.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(267, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_1789291524_L3.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(268, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_739320403_L5.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(269, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_507431295_L7.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(270, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_1884374588_L10.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(271, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_636323855_L11.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(272, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_1279909019_L12.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(273, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_516954631_L27.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(274, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_1086441005_L28.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(275, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_1373334413_L29.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(276, '8', NULL, NULL, '1. LIVE EVENT MANAGEMENT', '/upload_file/services/images/1727248653_1299041873_L34.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:32:33', '2024-09-25 01:32:33'),
(278, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_587622346_S1.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(279, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_2134885190_S2.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(280, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_1670672920_S3.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(281, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_435382833_S4.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(282, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_1460761740_S5.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(283, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_1909229602_S6.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(284, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_969269728_S7.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(285, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_799560972_S8.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(286, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_1890468630_S9.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(287, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_693781043_S10.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(288, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_240980973_S11.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(289, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_46606423_S12.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(290, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_669520248_S13.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(291, '6', NULL, NULL, '3. STAGE SET DESIGN', '/upload_file/services/images/1727248771_1064029426_S14.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:34:31', '2024-09-25 01:34:31'),
(292, '4', NULL, NULL, '5. VIDEO PROJECTION', '/upload_file/services/images/1727248889_1202886544_V1.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:36:29', '2024-09-25 01:36:29'),
(293, '4', NULL, NULL, '5. VIDEO PROJECTION', '/upload_file/services/images/1727248889_1587436893_V4.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:36:29', '2024-09-25 01:36:29'),
(294, '4', NULL, NULL, '5. VIDEO PROJECTION', '/upload_file/services/images/1727248889_42828143_V5.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:36:29', '2024-09-25 01:36:29'),
(295, '4', NULL, NULL, '5. VIDEO PROJECTION', '/upload_file/services/images/1727248889_261569848_V8.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:36:29', '2024-09-25 01:36:29'),
(296, '4', NULL, NULL, '5. VIDEO PROJECTION', '/upload_file/services/images/1727248889_1763232256_V13.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:36:29', '2024-09-25 01:36:29'),
(297, '4', NULL, NULL, '5. VIDEO PROJECTION', '/upload_file/services/images/1727248889_1488242517_V17.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:36:29', '2024-09-25 01:36:29'),
(298, '1', NULL, NULL, '8. AUDIO VISUAL INSTALLAIONS', '/upload_file/services/images/1727248966_444322669_A1.png', NULL, NULL, NULL, 0, '2024-09-25 01:37:46', '2024-09-25 01:37:46'),
(299, '1', NULL, NULL, '8. AUDIO VISUAL INSTALLAIONS', '/upload_file/services/images/1727248966_256172729_A3.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:37:46', '2024-09-25 01:37:46'),
(300, '1', NULL, NULL, '8. AUDIO VISUAL INSTALLAIONS', '/upload_file/services/images/1727248966_24021085_A5.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:37:46', '2024-09-25 01:37:46'),
(301, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_1974797557_S1.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(302, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_787600263_S2.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(303, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_2023787925_S3.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(304, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_1918936547_S4.JPG', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(305, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_1973517058_S5.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(306, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_961213621_S6.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(307, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_155688519_S7.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(308, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_1956901208_S8.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(309, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_1913758558_S9.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(310, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_593528417_S10.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(311, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_1224273863_S11.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(312, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_670223474_S12.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(313, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_1288711269_S13.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(314, '5', NULL, NULL, '4. CONFERENCE PRODUCTION', '/upload_file/services/images/1727249860_143154214_S14.jpg', NULL, NULL, NULL, 0, '2024-09-25 01:52:40', '2024-09-25 01:52:40'),
(315, NULL, '1_66f3d99741c9c', NULL, '0iolefje', '/upload_file/rental/file/1727256985_646995059_3.JPG', NULL, NULL, NULL, 0, '2024-09-25 03:51:25', '2024-09-25 03:51:25'),
(317, NULL, '1_66f4027fbaccf', NULL, 'Midas DL 32', '/upload_file/rental/file/1727267455_1198282213_2.-Midas-DL-32-1.webp', NULL, NULL, NULL, 0, '2024-09-25 06:45:55', '2024-09-25 06:45:55'),
(318, NULL, '1_66f402f3783d0', NULL, 'RCF TTS 56 A -Sub Woofer', '/upload_file/rental/file/1727267571_289077467_4.  RCF TTS 56  A -Sub Woofer.png', NULL, NULL, NULL, 0, '2024-09-25 06:47:51', '2024-09-25 06:47:51'),
(321, NULL, '1_66f402f3783d0', NULL, 'RCF 712-MK4 Active Speaker', '/upload_file/rental/file/1727267690_1756921824_a.webp', NULL, NULL, NULL, 0, '2024-09-25 06:49:50', '2024-09-25 06:49:50'),
(322, NULL, '1_66f402f3783d0', NULL, 'RCF 712-MK4 Active Speaker', '/upload_file/rental/file/1727267726_610428226_2.webp', NULL, NULL, NULL, 0, '2024-09-25 06:50:26', '2024-09-25 06:50:26'),
(323, NULL, '1_66f4042ba3b8d', NULL, 'JBL PRX 915', '/upload_file/rental/file/1727267884_971001207_jbl.webp', NULL, NULL, NULL, 0, '2024-09-25 06:53:04', '2024-09-25 06:53:04'),
(324, NULL, '1_66f4045adeb1b', NULL, 'Mackie 1232', '/upload_file/rental/file/1727267931_1567308755_7.-Mackie-1232.webp', NULL, NULL, NULL, 0, '2024-09-25 06:53:51', '2024-09-25 06:53:51'),
(326, NULL, '1_66f4051164ed2', NULL, 'stage', '/upload_file/rental/file/1727268182_1317639497_Stage-1.webp', NULL, NULL, NULL, 0, '2024-09-25 06:58:02', '2024-09-25 06:58:02'),
(327, NULL, '1_66f4051164ed2', NULL, 'stage', '/upload_file/rental/file/1727268182_1522611142_Stage-2.png', NULL, NULL, NULL, 0, '2024-09-25 06:58:02', '2024-09-25 06:58:02'),
(328, NULL, '1_66f4051164ed2', NULL, 'stage', '/upload_file/rental/file/1727268251_1687189981_Stage-3.webp', NULL, NULL, NULL, 0, '2024-09-25 06:59:11', '2024-09-25 06:59:11'),
(329, NULL, '1_66f4051164ed2', NULL, 'stage', '/upload_file/rental/file/1727268251_1637102044_Stage-4.webp', NULL, NULL, NULL, 0, '2024-09-25 06:59:11', '2024-09-25 06:59:11'),
(330, NULL, '1_66f406d204711', NULL, 'LED Video -1', '/upload_file/rental/file/1727268562_1588770261_LED-Screen-3.webp', NULL, NULL, NULL, 0, '2024-09-25 07:04:22', '2024-09-25 07:04:22'),
(331, NULL, '1_66f406d204711', NULL, 'LED Video -2', '/upload_file/rental/file/1727268562_495454594_LED-Screen-2.png', NULL, NULL, NULL, 0, '2024-09-25 07:04:22', '2024-09-25 07:04:22'),
(332, NULL, '1_66f406d204711', NULL, 'LED Video -3', '/upload_file/rental/file/1727268562_1611382601_LED-Screen-1.webp', NULL, NULL, NULL, 0, '2024-09-25 07:04:22', '2024-09-25 07:04:22'),
(333, NULL, '1_66f4078c486c8', NULL, 'MA Lighting grandMA3 Light Lighting Console', '/upload_file/rental/file/1727268748_1828337284_1.-MA-Lighting-grandMA3-Light-Lighting-Console.webp', NULL, NULL, NULL, 0, '2024-09-25 07:07:28', '2024-09-25 07:07:28'),
(334, NULL, '1_66f4078c486c8', NULL, 'MA Lighting grandMA3 Light Lighting Console', '/upload_file/rental/file/1727268748_1502773238_2.-AVOLITES-TIGER-TOUCH-PRO-1.webp', NULL, NULL, NULL, 0, '2024-09-25 07:07:28', '2024-09-25 07:07:28'),
(335, NULL, '1_66f4078c486c8', NULL, 'Kingkong 1024 -Lighting Controller DMX console', '/upload_file/rental/file/1727268748_1417918949_3.-Kingkong-1024-Lighting-Controller-DMX-console.webp', NULL, NULL, NULL, 0, '2024-09-25 07:07:28', '2024-09-25 07:07:28'),
(336, NULL, '1_66f4084e2ed5a', NULL, 'Orange Base amp', '/upload_file/rental/file/1727268942_77269865_9.-Orange-Base-amp.webp', NULL, NULL, NULL, 0, '2024-09-25 07:10:42', '2024-09-25 07:10:42'),
(337, NULL, '1_66f4084e2ed5a', NULL, 'Orange AD200B', '/upload_file/rental/file/1727268942_28030864_9.-Orange-Base-amp.webp', NULL, NULL, NULL, 0, '2024-09-25 07:10:42', '2024-09-25 07:10:42'),
(338, NULL, '1_66f4084ec4a42', NULL, 'Orange Base amp', '/upload_file/rental/file/1727268943_1047079499_9.-Orange-Base-amp.webp', NULL, NULL, NULL, 0, '2024-09-25 07:10:43', '2024-09-25 07:10:43'),
(339, NULL, '1_66f4084ec4a42', NULL, 'Orange AD200B', '/upload_file/rental/file/1727268943_1477675783_9.-Orange-Base-amp.webp', NULL, NULL, NULL, 0, '2024-09-25 07:10:43', '2024-09-25 07:10:43'),
(340, NULL, '1_66f4084e2ed5a', NULL, 'Orange OB1-300', '/upload_file/rental/file/1727269219_1198116785_11.-Orange-OB1-300.webp', NULL, NULL, NULL, 0, '2024-09-25 07:15:19', '2024-09-25 07:15:19'),
(341, NULL, '1_66f4084e2ed5a', NULL, 'Orange Crush Pro 120', '/upload_file/rental/file/1727269219_1691311793_12.-Orange-Crush-Pro-120.webp', NULL, NULL, NULL, 0, '2024-09-25 07:15:19', '2024-09-25 07:15:19'),
(343, NULL, NULL, '1_66f04aeb511b4', 'Welcome to Namaste Sound', '/upload_file/blog/images/1740144993_557816014_pp.jfif', NULL, NULL, NULL, 0, '2025-02-21 07:51:33', '2025-02-21 07:51:33');
INSERT INTO `files` (`id`, `service_id`, `rental_unique_id`, `post_unique_id`, `title`, `file`, `size`, `type`, `order`, `download_count`, `created_at`, `updated_at`) VALUES
(344, NULL, '1_66f4027fbaccf', NULL, 'test', '/upload_file/rental/file/1740146683_1121162056_2.png', NULL, NULL, NULL, 0, '2025-02-21 08:19:43', '2025-02-21 08:19:43'),
(345, NULL, '1_66f4027fbaccf', NULL, 'Midas M32 Live', '/upload_file/rental/file/1740146765_119523893_1.-MA-Lighting-grandMA3-Light-Lighting-Console.webp', NULL, NULL, NULL, 0, '2025-02-21 08:21:05', '2025-02-21 08:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Photo title goes here', '/upload_file/galleries/1727023574_1864792953_ioe_pulchok_techpana_VRM3HeG6nc.jpg', 1, '2024-09-22 11:01:14', '2024-09-22 11:01:14'),
(2, 'Photo title goes here', '/upload_file/galleries/1727023574_2063440055_Sapeksha-writeup_WJOI6Dn7OB.jpg', 1, '2024-09-22 11:01:15', '2024-09-22 11:01:15'),
(3, 'Photo title goes here', '/upload_file/galleries/1727023575_254676564_android-phone-mobile-circle-to-search-audio-google_iDK6OT6row.jpg', 1, '2024-09-22 11:01:15', '2024-09-22 11:01:15'),
(4, 'Photo title goes here', '/upload_file/galleries/1727023576_351454389_pager-explosiontechpana-news_ACwAISSNuZ (1).jpg', 1, '2024-09-22 11:01:16', '2024-09-22 11:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `default` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `status`, `sort_order`, `default`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `location`, `type`, `order`, `parent_id`, `url`, `parameter`, `target`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, 'Custom Link', 1, NULL, 'http://127.0.0.1:8000/', NULL, '_self', 1, '2024-09-22 09:44:26', '2025-02-21 08:09:38'),
(2, 'About Us', NULL, 'Custom', 2, NULL, 'http://127.0.0.1:8000/about-us', NULL, '_self', 1, '2024-09-22 09:44:53', '2025-02-21 08:09:39'),
(3, 'Contact', NULL, 'Custom Link', 9, NULL, 'http://127.0.0.1:8000/contact', NULL, '_self', 1, '2024-09-22 11:21:17', '2025-02-21 08:09:57'),
(4, 'Services', NULL, 'Custom Link', 3, NULL, 'http://127.0.0.1:8000/services', NULL, '_self', 1, '2024-09-22 13:22:41', '2025-02-21 08:09:39'),
(5, 'News', NULL, 'Category', 5, NULL, '/category/2', '2', '_self', 1, '2024-09-22 13:23:08', '2025-02-21 08:09:39'),
(6, 'Blog', NULL, 'Category', 6, NULL, '/category/1', '1', '_self', 1, '2024-09-22 13:29:31', '2025-02-21 08:09:39'),
(7, 'Rental', NULL, 'Custom', 4, NULL, 'http://127.0.0.1:8000/rentals', NULL, '_self', 1, '2024-09-22 14:18:03', '2025-02-21 08:09:39'),
(8, 'Event Gallery', NULL, 'Custom', 7, NULL, 'http://127.0.0.1:8000/albums', NULL, '_self', 1, '2024-09-23 09:28:39', '2025-02-21 08:09:39'),
(9, 'Online Payment', NULL, 'Custom Link', 8, NULL, 'http://127.0.0.1:8000/online-payment', NULL, '_self', 1, '2024-09-25 08:37:55', '2025-02-21 08:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `menus_name`
--

CREATE TABLE `menus_name` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus_name`
--

INSERT INTO `menus_name` (`id`, `menu_id`, `lang_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Home', NULL, NULL),
(2, 2, 1, 'About Us', NULL, NULL),
(3, 3, 1, 'Contact', NULL, NULL),
(4, 4, 1, 'Services', NULL, NULL),
(5, 5, 1, 'News', NULL, NULL),
(6, 6, 1, 'Blog', NULL, NULL),
(7, 7, 1, 'Rental', NULL, NULL),
(8, 8, 1, 'Event Gallery', NULL, NULL),
(9, 9, 1, 'Online Payment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_011_05_020322_create_book_covers_table', 1),
(7, '2022_06_02_110352_create_permission_tables', 1),
(8, '2022_08_10_111341_create_provinces_table', 1),
(9, '2022_08_10_113258_create_districts_table', 1),
(10, '2022_08_11_072916_create_palikas_table', 1),
(11, '2022_08_16_051100_create_settings_table', 1),
(12, '2022_09_08_111850_create_notifications_table', 1),
(13, '2022_10_30_121906_create_categories_table', 1),
(14, '2022_11_02_115645_create_blog_categories_table', 1),
(15, '2022_11_04_070942_create_blogs_table', 1),
(16, '2022_11_05_094227_create_books_table', 1),
(17, '2022_11_17_054358_create_banners_table', 1),
(19, '2022_12_07_064401_create_clients_table', 1),
(20, '2023_02_02_135128_create_videos_table', 1),
(21, '2023_02_13_063219_create_career_categories_table', 1),
(22, '2023_02_13_063342_create_careers_table', 1),
(23, '2023_02_26_113705_create_testimonials_table', 1),
(24, '2023_02_27_102522_create_galleries_table', 1),
(25, '2023_02_28_121742_create_contacts_table', 1),
(26, '2023_03_08_072629_create_offers_table', 1),
(27, '2023_03_11_134048_create_services_table', 1),
(28, '2023_03_12_073524_create_staff_table', 1),
(29, '2023_03_13_061857_create_services_covers_table', 1),
(30, '2023_03_13_080028_create_commons_table', 1),
(31, '2023_03_13_110819_create_languages_table', 1),
(32, '2023_03_13_160515_create_albums_table', 1),
(33, '2024_07_29_171323_create_photos_table', 1),
(34, '2024_08_03_183059_create_rental_categories_table', 1),
(35, '2024_08_04_173346_create_rentals_table', 1),
(36, '2022_12_05_105826_create_files_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `palikas`
--

CREATE TABLE `palikas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `palika_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palika_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28'),
(2, 'role-create', 'web', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28'),
(3, 'role-edit', 'web', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28'),
(4, 'role-delete', 'web', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28'),
(5, 'product-list', 'web', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28'),
(6, 'product-create', 'web', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28'),
(7, 'product-edit', 'web', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28'),
(8, 'product-delete', 'web', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `album_id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '/upload_file/photos/1727023645_861177560_ioe_pulchok_techpana_VRM3HeG6nc.jpg', 1, '2024-09-22 11:02:25', '2024-09-22 11:02:25'),
(2, 1, NULL, '/upload_file/photos/1727023646_418900127_Sapeksha-writeup_WJOI6Dn7OB.jpg', 1, '2024-09-22 11:02:26', '2024-09-22 11:02:26'),
(3, 1, NULL, '/upload_file/photos/1727023646_718734717_android-phone-mobile-circle-to-search-audio-google_iDK6OT6row.jpg', 1, '2024-09-22 11:02:26', '2024-09-22 11:02:26'),
(4, 1, NULL, '/upload_file/photos/1727023646_845819175_pager-explosiontechpana-news_ACwAISSNuZ (1).jpg', 1, '2024-09-22 11:02:26', '2024-09-22 11:02:26'),
(5, 1, NULL, '/upload_file/photos/1727108128_1052108444_Sapeksha-writeup_WJOI6Dn7OB.jpg', 1, '2024-09-23 10:30:28', '2024-09-23 10:30:28'),
(6, 1, NULL, '/upload_file/photos/1727108128_45135082_android-phone-mobile-circle-to-search-audio-google_iDK6OT6row.jpg', 1, '2024-09-23 10:30:28', '2024-09-23 10:30:28'),
(7, 1, NULL, '/upload_file/photos/1727108128_957903358_pager-explosiontechpana-news_ACwAISSNuZ (1).jpg', 1, '2024-09-23 10:30:28', '2024-09-23 10:30:28'),
(8, 2, NULL, '/upload_file/photos/1727108834_631325641_ioe_pulchok_techpana_VRM3HeG6nc.jpg', 1, '2024-09-23 10:42:14', '2024-09-23 10:42:14'),
(9, 2, NULL, '/upload_file/photos/1727108835_549515646_samaste1.jpg', 1, '2024-09-23 10:42:15', '2024-09-23 10:42:15'),
(10, 2, NULL, '/upload_file/photos/1727108835_1970673650_Sapeksha-writeup_WJOI6Dn7OB.jpg', 1, '2024-09-23 10:42:15', '2024-09-23 10:42:15'),
(11, 2, NULL, '/upload_file/photos/1727108836_1599708772_android-phone-mobile-circle-to-search-audio-google_iDK6OT6row.jpg', 1, '2024-09-23 10:42:16', '2024-09-23 10:42:16'),
(12, 2, NULL, '/upload_file/photos/1727108836_841830194_pager-explosiontechpana-news_ACwAISSNuZ (1).jpg', 1, '2024-09-23 10:42:16', '2024-09-23 10:42:16'),
(13, 3, NULL, '/upload_file/photos/1727114964_1257243431_samaste1.jpg', 1, '2024-09-23 12:24:25', '2024-09-23 12:24:25'),
(14, 3, NULL, '/upload_file/photos/1727114965_245680703_ioe_pulchok_techpana_VRM3HeG6nc.jpg', 1, '2024-09-23 12:24:25', '2024-09-23 12:24:25'),
(15, 3, NULL, '/upload_file/photos/1727114966_1881925267_Sapeksha-writeup_WJOI6Dn7OB.jpg', 1, '2024-09-23 12:24:26', '2024-09-23 12:24:26'),
(16, 3, NULL, '/upload_file/photos/1727114966_1049118644_android-phone-mobile-circle-to-search-audio-google_iDK6OT6row.jpg', 1, '2024-09-23 12:24:26', '2024-09-23 12:24:26'),
(17, 3, NULL, '/upload_file/photos/1727114967_1503133313_pager-explosiontechpana-news_ACwAISSNuZ (1).jpg', 1, '2024-09-23 12:24:27', '2024-09-23 12:24:27'),
(18, 1, NULL, '/upload_file/photos/1727250719_1598643653_1.JPG', 1, '2024-09-25 02:07:00', '2024-09-25 02:07:00'),
(19, 1, NULL, '/upload_file/photos/1727250721_1285702859_2.JPG', 1, '2024-09-25 02:07:03', '2024-09-25 02:07:03'),
(20, 1, NULL, '/upload_file/photos/1727250723_4663431_3.JPG', 1, '2024-09-25 02:07:05', '2024-09-25 02:07:05'),
(21, 1, NULL, '/upload_file/photos/1727250725_466791314_4.JPG', 1, '2024-09-25 02:07:07', '2024-09-25 02:07:07'),
(22, 4, NULL, '/upload_file/photos/1727272121_1223438763_LED-Screen-2.png', 1, '2024-09-25 08:03:41', '2024-09-25 08:03:41'),
(23, 4, NULL, '/upload_file/photos/1727272121_2117492981_mixer.jpg', 1, '2024-09-25 08:03:42', '2024-09-25 08:03:42'),
(24, 5, NULL, '/upload_file/photos/1740145383_1113163224_Pushpa-Kamal-Dahal-Prachanda.jpg', 1, '2025-02-21 07:58:03', '2025-02-21 07:58:03'),
(25, 5, NULL, '/upload_file/photos/1740145384_1578562599_ram.JPG', 1, '2025-02-21 07:58:04', '2025-02-21 07:58:04'),
(26, 5, NULL, '/upload_file/photos/1740145384_622511813_u1.jpg', 1, '2025-02-21 07:58:04', '2025-02-21 07:58:04'),
(27, 5, NULL, '/upload_file/photos/1740145385_434010750_u2.jpg', 1, '2025-02-21 07:58:05', '2025-02-21 07:58:05'),
(28, 5, NULL, '/upload_file/photos/1740145385_884941599_u3.jpg', 1, '2025-02-21 07:58:06', '2025-02-21 07:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `category_id`, `title`, `rental_unique_id`, `thumbs`, `status`, `created_at`, `updated_at`) VALUES
(38, 1, 'Midas', '1_66f4027fbaccf', '/upload_file/rental/1727267598_351231304_Logo (1).webp', 1, '2024-09-25 06:45:55', '2025-02-21 08:21:05'),
(39, 1, 'RCF', '1_66f402f3783d0', '/upload_file/rental/1727267571_363997422_RCF-Logo.png', 1, '2024-09-25 06:47:51', '2024-09-25 06:50:26'),
(40, 1, 'JBL PRX 915', '1_66f4042ba3b8d', '/upload_file/rental/1727267883_1309438200_3.webp', 1, '2024-09-25 06:53:04', NULL),
(41, 1, 'Mackie 1232', '1_66f4045adeb1b', '/upload_file/rental/1727267930_267140060_6.webp', 1, '2024-09-25 06:53:51', NULL),
(42, 4, 'Stage', '1_66f4051164ed2', '/upload_file/rental/1727268113_71329546_Stage-1.webp', 1, '2024-09-25 06:56:53', '2024-09-25 06:59:11'),
(43, 3, 'LED Video', '1_66f406d204711', '', 1, '2024-09-25 07:04:22', NULL),
(44, 2, 'Light', '1_66f4078c486c8', '', 1, '2024-09-25 07:07:28', NULL),
(45, 1, 'Orange', '1_66f4084e2ed5a', '/upload_file/rental/1727268942_825342219_012-Photoroom.png-Photoroom.webp', 1, '2024-09-25 07:10:42', '2024-09-25 07:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `rental_categories`
--

CREATE TABLE `rental_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_post_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental_categories`
--

INSERT INTO `rental_categories` (`id`, `title`, `thumbs`, `description`, `category_post_count`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sounds', '/upload_file/rentalcategory/1727097754_1176561237_1.png', 'Experience crystal-clear audio with our top-tier sound systems. Whether it\'s a small gathering or a large-scale event, our sound solutions ensure perfect acoustics and an immersive auditory experience.', 0, NULL, 1, '2024-09-23 07:37:35', '2024-09-23 07:42:08'),
(2, 'Lights', '/upload_file/rentalcategory/1727097770_1166205736_2.png', 'Lights', 0, NULL, 1, '2024-09-23 07:37:50', '2024-09-23 07:37:50'),
(3, 'LED Video Wall', '/upload_file/rentalcategory/1727097795_832442875_3.png', 'LED Video Wall', 0, NULL, 1, '2024-09-23 07:38:15', '2024-09-23 07:38:15'),
(4, 'Stage', '/upload_file/rentalcategory/1727097814_852781664_4.png', 'Stage', 0, NULL, 1, '2024-09-23 07:38:34', '2024-09-23 07:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-09-22 09:43:28', '2024-09-22 09:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '8. AUDIO VISUAL INSTALLAIONS', '1. LIVE EVENT MANAGEMENT', '/upload_file/services/1727169958_1759715953_Screenshot 2024-05-13 175829.png', 1, '2024-09-22 11:54:06', '2024-09-24 03:40:58'),
(2, '7. AUDIO VISUAL HIRE', 'TEST TWO', '/upload_file/services/1727241699_552645134_A1.png', 1, '2024-09-22 12:01:07', '2024-09-24 23:36:40'),
(3, '6. PROFESSIONAL AUDIO', 'TEST THREE', '/upload_file/services/1727169858_961694228_M32_P0B3I_Left_L_1024x1024.png', 1, '2024-09-22 12:45:57', '2024-09-24 03:39:18'),
(4, '5. VIDEO PROJECTION', 'fgfdgfdg', '/upload_file/services/1727169801_1796100229_unnamed.jpg', 1, '2024-09-22 20:29:35', '2024-09-24 03:38:21'),
(5, '4. CONFERENCE PRODUCTION', 'kjv', '/upload_file/services/1727169768_200709072_one-1-.png', 1, '2024-09-23 04:06:32', '2024-09-24 03:37:49'),
(6, '3. STAGE SET DESIGN', '3. STAGE SET DESIGN', '/upload_file/services/1727169697_693131670_IMG_1280.jpg', 1, '2024-09-23 10:18:48', '2024-09-24 03:36:38'),
(7, '2. AWARD CEREMONIES', '2. AWARD CEREMONIES', '/upload_file/services/1727169653_1090437259_WP_20140804_00_46_21_Pro-22.jpg', 1, '2024-09-23 10:20:00', '2024-09-24 03:35:54'),
(8, '1. LIVE EVENT MANAGEMENT', '1. LIVE EVENT MANAGEMENT', '/upload_file/services/1727169542_390123459_IX0A7566.JPG', 1, '2024-09-23 10:20:45', '2025-02-21 07:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `services_covers`
--

CREATE TABLE `services_covers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cms_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_first_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_second_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nepal_office_contact_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nepal_office_contact_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `india_office_contact_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `india_office_contact_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_facebooK_page` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_Instagram_page` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `cms_title`, `site_name`, `first_title`, `second_title`, `site_email`, `site_phone`, `site_mobile`, `site_first_address`, `site_second_address`, `site_description`, `map`, `nepal_office_contact_one`, `nepal_office_contact_two`, `india_office_contact_one`, `india_office_contact_two`, `site_url`, `logo`, `favicon`, `social_profile_fb`, `social_profile_twitter`, `social_profile_insta`, `social_profile_youtube`, `social_profile_linkedin`, `social_profile_tiktok`, `social_profile_facebooK_page`, `social_profile_Instagram_page`, `created_at`, `updated_at`) VALUES
(1, 'Namste Sound System', 'Namste Sound System', 'AI Soft Nepal', 'AI Soft Nepal', 'namastesound123@gmail.com', '9803827775', '9849448466', 'Lalitpur Imadol', NULL, 'Namaste Sound operates within a professional setting, emphasizing quality equipment, extensive experience, and fostering a pleasant and welcoming atmosphere.Namaste Sound operates within a professional setting, emphasizing quality equipment, extensive experience, and fostering a pleasant and welcoming atmosphere.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.8338038179513!2d85.34916237613992!3d27.660613227549923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a0891c72fb%3A0xd3b49e040ccfd77c!2sNamaste%20Sound!5e0!3m2!1sen!2snp!4v1740146160918!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL, NULL, 'http://127.0.0.1:8000/', 'upload_file/setting/1727020291_205584249_LOGO.jpg', NULL, 'https://www.facebook.com/TechPanaNews', 'https://www.facebook.com/profile.php?id=100011152358048', 'https://www.facebook.com/profile.php?id=100011152358048', 'https://www.facebook.com/profile.php?id=100011152358048', 'https://www.facebook.com/profile.php?id=100011152358048', 'https://www.facebook.com/profile.php?id=100011152358048', 'https://www.facebook.com/profile.php?id=100011152358048', 'https://www.facebook.com/profile.php?id=100011152358048', NULL, '2025-02-21 08:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `featured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `description`, `image`, `alt_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nepal Tamang Ghedung', NULL, 'Namaste Sound exceeded my expectations! Their professional service and high-quality equipment made our event a huge success. I highly recommend them for any music, theatre, or corporate event needs. Five stars!', '/upload_file/testimonial/1727022392_788504373_team1.jpg', 'Nepal Tamang Ghedung', 1, '2024-09-22 10:41:32', '2024-09-22 10:41:32'),
(4, 'Nepal Tamang Artist Association', NULL, 'From setting up the equipment to operating it flawlessly, their specialist engineers did an excellent job. Thank you for making our event unforgettable!', '/upload_file/testimonial/1727250359_101628343_2-2048x2048.jpg', 'Nepal Tamang Artist Association', 1, '2024-09-25 02:01:01', '2024-09-25 02:01:55'),
(5, 'Damphu Sajha', NULL, 'Namaste Sound is my go-to company for all audio equipment needs. Their team is experienced, reliable, and always delivers top-notch service. I\'m a satisfied customer and will continue to work with them in the future.', '/upload_file/testimonial/1727250468_518431106_3 Damphu-Sajha-01-2048x1366.jpg', 'Damphu Sajha', 1, '2024-09-25 02:02:49', '2024-09-25 02:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` enum('superadmin','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `avatar`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Namaste Sound', 'namastesound123@gmail.com', '9803827775', NULL, '2024-09-22 09:43:28', '$2y$10$lxXPNfj51VfQvQPrzlFkC.rqd3nSK2i9fjnPeXj5B13fskW0QzIfq', NULL, NULL, NULL, 'admin', 'active', NULL, '2024-09-22 09:43:28', '2025-02-21 07:43:44'),
(2, 'trc chaudhary', 'trc@gmail.com', NULL, NULL, NULL, '$2y$10$lpCopHOtjtsX8NIK6d7hkeT.zS0YeZr15rA2PlBZtewIjE0XqcYy.', NULL, NULL, NULL, 'admin', 'active', NULL, '2024-09-22 09:43:28', '2024-09-22 09:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_slug_unique` (`slug`);

--
-- Indexes for table `book_covers`
--
ALTER TABLE `book_covers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `careers_slug_unique` (`slug`),
  ADD KEY `careers_category_id_foreign` (`category_id`);

--
-- Indexes for table `career_categories`
--
ALTER TABLE `career_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD UNIQUE KEY `categories_unique_id_unique` (`unique_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commons`
--
ALTER TABLE `commons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `menus_name`
--
ALTER TABLE `menus_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_name_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `palikas`
--
ALTER TABLE `palikas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `palikas_district_id_foreign` (`district_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_album_id_foreign` (`album_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_category_id_foreign` (`category_id`);

--
-- Indexes for table `rental_categories`
--
ALTER TABLE `rental_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_covers`
--
ALTER TABLE `services_covers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_covers`
--
ALTER TABLE `book_covers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_categories`
--
ALTER TABLE `career_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commons`
--
ALTER TABLE `commons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menus_name`
--
ALTER TABLE `menus_name`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `palikas`
--
ALTER TABLE `palikas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `rental_categories`
--
ALTER TABLE `rental_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services_covers`
--
ALTER TABLE `services_covers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `career_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus_name`
--
ALTER TABLE `menus_name`
  ADD CONSTRAINT `menus_name_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `palikas`
--
ALTER TABLE `palikas`
  ADD CONSTRAINT `palikas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `rental_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
