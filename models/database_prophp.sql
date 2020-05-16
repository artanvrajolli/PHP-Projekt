-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 01:15 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_prophp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `uid`, `title`, `description`, `post_tags`, `date_created`) VALUES
(3, 39, 'HTML Example', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;title&gt;HTML Tutorial&lt;/title&gt;\r\n&lt;body&gt;\r\n\r\n&lt;h1&gt;This is a heading&lt;/h1&gt;\r\n&lt;p&gt;This is a paragraph.&lt;/p&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, '2020-05-07 01:32:07'),
(4, 39, 'SQL is a standard language for storing, manipulating and retrieving data in databases.', 'What is SQL?\r\nSQL stands for Structured Query Language\r\nSQL lets you access and manipulate databases\r\nSQL became a standard of the American National Standards Institute (ANSI) in 1986, and of the International Organization for Standardization (ISO) in 1987\r\nWhat Can SQL do?\r\nSQL can execute queries against a database\r\nSQL can retrieve data from a database\r\nSQL can insert records in a database\r\nSQL can update records in a database\r\nSQL can delete records from a database\r\nSQL can create new databases\r\nSQL can create new tables in a database\r\nSQL can create stored procedures in a database\r\nSQL can create views in a database\r\nSQL can set permissions on tables, procedures, and views', NULL, '2020-05-07 01:33:30'),
(5, 39, 'Bootstrap', 'Build responsive, mobile-first projects on the web with the world&rsquo;s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.\r\n[code]&lt;link rel=&quot;stylesheet&quot; href=&quot;https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css&quot; integrity=&quot;sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh&quot; crossorigin=&quot;anonymous&quot;&gt;[/code]\r\n[size=20]Starter template[/size]\r\n[code]\r\n&lt;!doctype html&gt;\r\n&lt;html lang=&quot;en&quot;&gt;\r\n  &lt;head&gt;\r\n    &lt;!-- Required meta tags --&gt;\r\n    &lt;meta charset=&quot;utf-8&quot;&gt;\r\n    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;\r\n\r\n    &lt;!-- Bootstrap CSS --&gt;\r\n    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css&quot; integrity=&quot;sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh&quot; crossorigin=&quot;anonymous&quot;&gt;\r\n\r\n    &lt;title&gt;Hello, world!&lt;/title&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n    &lt;h1&gt;Hello, world!&lt;/h1&gt;\r\n\r\n    &lt;!-- Optional JavaScript --&gt;\r\n    &lt;!-- jQuery first, then Popper.js, then Bootstrap JS --&gt;\r\n    &lt;script src=&quot;https://code.jquery.com/jquery-3.4.1.slim.min.js&quot; integrity=&quot;sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n    &lt;script src=&quot;https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js&quot; integrity=&quot;sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n    &lt;script src=&quot;https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js&quot; integrity=&quot;sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n  &lt;/body&gt;\r\n&lt;/html&gt;\r\n[/code]', NULL, '2020-05-07 01:59:29'),
(6, 42, 'How to make fadeOut effect with pure JavaScript', '//Imagine I want to fadeOut an element with id = &quot;target&quot;\r\nfunction fadeOutEffect()\r\n{\r\n var fadeTarget = document.getElementById(&quot;target&quot;);\r\n var fadeEffect = setInterval(function() {\r\n  if (fadeTarget.style.opacity &lt; 0.1)\r\n  {\r\n   clearInterval(fadeEffect);\r\n  }\r\n  else\r\n  {\r\n   fadeTarget.style.opacity -= 0.1;\r\n  }\r\n }, 200);\r\n}', NULL, '2020-05-07 21:36:09'),
(7, 42, 'Programming languages', '[table]\r\n[tr][td]#1[/td][td]#2[/td][/tr]\r\n[tr][td]Python[/td][td]HTML[/td][/tr]\r\n[tr][td]PHP[/td][td]c[/td][/tr]\r\n[/table]\r\n\r\n', NULL, '2020-05-07 21:53:22'),
(8, 42, 'Best memes 2020', '[img]https://i.pinimg.com/236x/7e/83/67/7e8367881d66d738743babfed6007ee3.jpg[/img][img]https://i.kym-cdn.com/photos/images/newsfeed/001/504/739/5c0.jpg[/img][img]https://inteng-storage.s3.amazonaws.com/img/iea/yrwQvLJbON/sizes/programmer-memes_resize_md.jpg[/img][img]https://i.imgflip.com/1xvnfi.jpg[/img]', NULL, '2020-05-07 22:05:05'),
(9, 39, 'Google meet', '[b]Google LLC[/b] is an [u]American[/u] multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, a search engine, cloud computing, software, and hardware. It is considered one of the Big Four technology companies, alongside Amazon, Apple, and Microsoft.\r\n[center]Google Center[/center]\r\n[img]https://sites.google.com/site/dekchysite95/_/rsrc/1480944463347/extra-credit/google.png[/img]\r\nGoogle was founded in September 1998 by Larry Page and Sergey Brin while they were Ph.D. students at Stanford University in California. Together they own about 14 percent of its shares and control 56 percent of the stockholder voting power through supervoting stock. They incorporated Google as a California privately held company on September 4, 1998, in California. Google was then reincorporated in Delaware on October 22, 2002.[13] An initial public offering (IPO) took place on August 19, 2004, and Google moved to its headquarters in Mountain View, California, nicknamed the Googleplex. In August 2015, Google announced plans to reorganize its various interests as a conglomerate called Alphabet Inc. Google is Alphabet\'s leading subsidiary and will continue to be the umbrella company for Alphabet\'s Internet interests. Sundar Pichai was appointed CEO of Google, replacing Larry Page who became the CEO of Alphabet.\r\n[size=40] CEO of google[/size]\r\nThe company\'s rapid growth since incorporation has triggered a chain of products, acquisitions, and partnerships beyond Google\'s core search engine (Google Search). It offers services designed for work and productivity (Google Docs, Google Sheets, and Google Slides), email (Gmail), scheduling and time management (Google Calendar), cloud storage (Google Drive), instant messaging and video chat (Duo, Hangouts), language translation (Google Translate), mapping and navigation (Google Maps, Waze, Google Earth, Street View), video sharing (YouTube), note-taking (Google Keep), and photo organizing and editing (Google Photos). The company leads the development of the Android mobile operating system, the Google Chrome web browser, and Chrome OS, a lightweight operating system based on the Chrome browser. Google has moved increasingly into hardware; from 2010 to 2015, it partnered with major electronics manufacturers in the production of its Nexus devices, and it released multiple hardware products in October 2016, including the Google Pixel smartphone, Google Home smart speaker, Google Wifi mesh wireless router, and Google Daydream virtual reality headset. Google has also experimented with becoming an Internet carrier (Google Fiber, Google Fi, and Google Station).[url=http://google.com/]Google[/url]', NULL, '2020-05-08 01:59:37'),
(11, 43, 'How to add \'ON DELETE CASCADE\' in ALTER TABLE statement', 'Command is:\r\n[code]\r\nALTER TABLE child_table_name \r\n  ADD CONSTRAINT fk_name \r\n  FOREIGN KEY (child_column_name) \r\n  REFERENCES parent_table_name(parent_column_name) \r\n  ON DELETE CASCADE;\r\n[/code]\r\n[table]\r\n[tr][td]col1[/td][td]col2[/td][/tr]\r\n[tr][td]data1[/td][td]data2[/td][/tr]\r\n[/table]', NULL, '2020-05-09 08:04:41'),
(12, 39, 'Diode', 'A diode is a two-terminal electronic component that conducts current primarily in one direction (asymmetric conductance); it has low (ideally zero) resistance in one direction, and high (ideally infinite) resistance in the other. A diode vacuum tube or thermionic diode is a vacuum tube with two electrodes, a heated cathode and a plate, in which electrons can flow in only one direction, from cathode to plate. A semiconductor diode, the most commonly used type today, is a crystalline piece of semiconductor material with a p&ndash;n junction connected to two electrical terminals.[4] Semiconductor diodes were the first semiconductor electronic devices. The discovery of asymmetric electrical conduction across the contact between a crystalline mineral and a metal was made by German physicist Ferdinand Braun in 1874. Today, most diodes are made of silicon, but other materials such as gallium arsenide and germanium are also used.\r\n[img]https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Diode-closeup.jpg/1280px-Diode-closeup.jpg[/img]\r\n\r\n[size=20][b]Main functions[/b][/size]\r\nThe most common function of a diode is to allow an electric current to pass in one direction (called the diode\'s forward direction), while blocking it in the opposite direction (the reverse direction). As such, the diode can be viewed as an electronic version of a check valve. This unidirectional behavior is called rectification, and is used to convert alternating current (ac) to direct current (dc). Forms of rectifiers, diodes can be used for such tasks as extracting modulation from radio signals in radio receivers.\r\n\r\nHowever, diodes can have more complicated behavior than this simple on&ndash;off action, because of their nonlinear current-voltage characteristics.[6] Semiconductor diodes begin conducting electricity only if a certain threshold voltage or cut-in voltage is present in the forward direction (a state in which the diode is said to be forward-biased). The voltage drop across a forward-biased diode varies only a little with the current, and is a function of temperature; this effect can be used as a temperature sensor or as a voltage reference. Also, diodes\' high resistance to current flowing in the reverse direction suddenly drops to a low resistance when the reverse voltage across the diode reaches a value called the breakdown voltage.\r\n\r\nA semiconductor diode\'s current&ndash;voltage characteristic can be tailored by selecting the semiconductor materials and the doping impurities introduced into the materials during manufacture. These techniques are used to create special-purpose diodes that perform many different functions.[6] For example, diodes are used to regulate voltage (Zener diodes), to protect circuits from high voltage surges (avalanche diodes), to electronically tune radio and TV receivers (varactor diodes), to generate radio-frequency oscillations (tunnel diodes, Gunn diodes, IMPATT diodes), and to produce light (light-emitting diodes). Tunnel, Gunn and IMPATT diodes exhibit negative resistance, which is useful in microwave and switching circuits.\r\n\r\nDiodes, both vacuum and semiconductor, can be used as shot-noise generators.', NULL, '2020-05-09 10:27:57'),
(13, 46, 'PHP - AJAX and MySQL', '&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;script&gt;\r\nfunction showUser(str) {\r\n  if (str == &quot;&quot;) {\r\n    document.getElementById(&quot;txtHint&quot;).innerHTML = &quot;&quot;;\r\n    return;\r\n  } else {\r\n    var xmlhttp = new [b]XMLHttpRequest();[/b]\r\n    xmlhttp.onreadystatechange = function() {\r\n      if (this.readyState == 4 &amp;&amp; this.status == 200) {\r\n        document.getElementById(&quot;txtHint&quot;).innerHTML = this.responseText;\r\n      }\r\n    };\r\n    xmlhttp.open(&quot;GET&quot;,&quot;getuser.php?q=&quot;+str,true);\r\n    xmlhttp.send();\r\n  }\r\n}\r\n&lt;/script&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n\r\n&lt;form&gt;\r\n&lt;select name=&quot;users&quot; onchange=&quot;showUser(this.value)&quot;&gt;\r\n  &lt;option value=&quot;&quot;&gt;Select a person:&lt;/option&gt;\r\n  &lt;option value=&quot;1&quot;&gt;Peter Griffin&lt;/option&gt;\r\n  &lt;option value=&quot;2&quot;&gt;Lois Griffin&lt;/option&gt;\r\n  &lt;option value=&quot;3&quot;&gt;Joseph Swanson&lt;/option&gt;\r\n  &lt;option value=&quot;4&quot;&gt;Glenn Quagmire&lt;/option&gt;\r\n  &lt;/select&gt;\r\n&lt;/form&gt;\r\n&lt;br&gt;\r\n&lt;div id=&quot;txtHint&quot;&gt;&lt;b&gt;Person info will be listed here...&lt;/b&gt;&lt;/div&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, '2020-05-10 09:01:36'),
(14, 22, 'Spotify Technology S.A.', '\r\nFounded in 2006, the company\'s primary business is providing an audio streaming platform, the &quot;Spotify&quot; platform, that provides DRM-restricted music, videos and podcasts from record labels and media companies. As a freemium service, basic features are free with advertisements or automatic music videos, while additional features, such as offline listening and commercial-free listening, are offered via paid subscriptions.\r\n[img]https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Spotify_logo_with_text.svg/1920px-Spotify_logo_with_text.svg.png[/img]\r\nLaunched on October 2008, the Spotify platform provides access to over [u]50 million tracks.[/u] Users can browse by parameters such as artist, album, or genre, and can create, edit, and share playlists. Spotify is available in most of Europe and the Americas, Australia, New Zealand, and parts of Africa and Asia, and on most modern devices, including Windows, macOS, and Linux computers, and iOS, and Android smartphones and tablets. As of April 2020, the company had 286 million monthly active users, including 130 million paying subscribers.\r\n\r\nUnlike physical or download sales, which pay artists a fixed price per song or album sold, Spotify pays royalties based on the number of artist streams as a proportion of total songs streamed. It distributes approximately 70% of its total revenue[11] to rights holders, who then pay artists based on their individual agreements. Spotify has faced criticism from artists and producers including Taylor Swift and Thom Yorke, who have argued that it does not fairly compensate musicians. In 2017, as part of its efforts to renegotiate license deals for an interest in going public, Spotify announced that artists would be able to make albums temporarily exclusive to paid subscribers if the albums are part of Universal Music Group or the Merlin Network.\r\n\r\nSpotify\'s international headquarters are in Stockholm, Sweden, though each region has its own headquarters. Since February 2018, it has been listed on the New York Stock Exchange and in September 2018, the company relocated its New York City offices to 4 [b]World Trade Center[/b].', NULL, '2020-05-10 11:15:29'),
(15, 47, 'Rick and Morty', '[center][img]https://upload.wikimedia.org/wikipedia/en/3/32/Rick_and_Morty_opening_credits.jpeg[/img][/center]\r\n[b]Rick and Morty[/b] is an American adult animated science fiction sitcom created by Justin Roiland and Dan Harmon for Cartoon Network\'s late-night programming block Adult Swim. The series follows the misadventures of cynical mad scientist Rick Sanchez and his good-hearted but fretful grandson Morty Smith, who split their time between domestic life and interdimensional adventures.\r\n\r\nRoiland voices the eponymous characters, with Chris Parnell, Spencer Grammer and Sarah Chalke voicing the rest of the family. The series originated from an animated short parody film of Back to the Future, created by Roiland for Channel 101, a short film festival co-founded by Harmon. The series has been acclaimed by critics for its originality, creativity and humor.\r\n\r\nThe series has been picked up for an additional seventy episodes over an unspecified number of seasons, beginning with season 4. The fourth season premiered on November 10, 2019, and consists of ten episodes.\r\n\r\n[table]\r\n[tr][td][b]First aired[/b][/td][td][b]Last aired[/b][/td][/tr]\r\n[tr][td]December 2, 2013[/td][td]April 14, 2014[/td][/tr]\r\n[tr][td]July 26, 2015[/td][td]October 4, 2015[/td][/tr]\r\n[tr][td]July 30, 2017[/td][td]October 1, 2017[/td][/tr]\r\n[tr][td]May 3, 2020[/td][td]May 31, 2020[/td][/tr]\r\n[/table][img]https://upload.wikimedia.org/wikipedia/en/b/b0/Rick_and_Morty_characters.jpg[/img]', NULL, '2020-05-10 23:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `post_liked`
--

CREATE TABLE `post_liked` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_liked`
--

INSERT INTO `post_liked` (`pid`, `uid`) VALUES
(3, 39),
(4, 39),
(5, 39),
(5, 42),
(6, 42),
(7, 39),
(7, 42),
(8, 39),
(8, 42),
(9, 39),
(9, 42),
(9, 43),
(11, 43),
(12, 39),
(13, 22),
(13, 39),
(13, 46),
(13, 48),
(14, 22),
(14, 39),
(15, 39),
(15, 47),
(15, 48);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT current_timestamp(),
  `last_online` datetime DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `is_verified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `register_date`, `last_online`, `is_admin`, `is_verified`) VALUES
(18, 'WangCore', 'WangCore@msn.com', '$2y$10$peCGrAK3Gt7mZndrv6jiDecDaV16G8FzbqVm0Hm4h/CqxX0gYYHZm', '2020-05-04 07:18:16', '0000-00-00 00:00:00', 0, 0),
(19, 'nonamestand1', 'nonamestand1@nonamestand1.com', 'nonamestand1', '2020-05-18 07:18:00', '0000-00-00 00:00:00', 0, 0),
(20, 'UserMaster41', 'UserMaster41@lahos.com', 'ggamenew41241', '2020-05-04 07:18:00', '0000-00-00 00:00:00', 0, 0),
(21, 'PeterGriffin', 'PeterGriffin@yahoo.com', 'dfgdfgdfg', '2020-05-13 07:18:00', '0000-00-00 00:00:00', 0, 0),
(22, 'Stefan_john', 'Stefan_john442@msg.com', '$2y$10$6iNfGqpiHzprzsp/xEXpzO8jbG7iqywYrhOEb6Fn21pQ.wz5ob70q', '2020-05-04 07:18:00', '2020-05-10 11:15:06', 0, 0),
(23, 'Jonthan_brain', 'Jonthan_brain@Jonthanbrain.com', '$2y$10$wHWB1/O3zRktgRNrzwik6uFxTiREHZkxUj5i9LheOZhN3Np7u202C', '2020-05-21 07:18:00', '0000-00-00 00:00:00', 1, 0),
(24, 'Daradan', 'Daradan@Testemail.com', '$2y$10$Etd2HmlUInqS/Q8Us5LuvuFeP7SgXfdS6tqb3QNVEOZXgHiUNLVeG', '2020-05-12 07:18:00', '0000-00-00 00:00:00', 0, 0),
(26, 'Valon', 'Valon@Testemail.com', '$2y$10$oXHl4fKFvVXGsZnNq7BQH.1aUwPJQ0sQaStX1x7QoAGfMV9DT3Ch2', '2020-05-06 07:18:00', '0000-00-00 00:00:00', 1, 0),
(27, 'Vlera', 'Vlera@Testemail.com', '$2y$10$JniJViAKsRKZJ63ZVVgBn.Qi/BAOGG4BV.e0bp5LnwxUNOYYz7Xza', '2020-04-15 07:18:00', '0000-00-00 00:00:00', 1, 0),
(28, 'loaderest4', 'loaderest4@loaderest4.loaderest4', '$2y$10$Rzgg2RM8X5DM.xDKny5q0uCtD9n.5bgdmXa78UgMjePLRU/OZVc3S', '2020-05-06 07:18:00', '2020-05-10 08:31:07', 0, 0),
(30, 'loadetest98', 'loadetest98@test.com', '$2y$10$eHWvNPsrQHoMXUM.m5P36.vXPCvOoU7lnUAdmIz6F3x1CT9h3C1IS', '2020-05-06 07:18:00', '0000-00-00 00:00:00', 0, 0),
(31, 'loaderest', 'loadertest@test.com', '$2y$10$RYGm43H94qedChCVuziyXOaXJTtK8cRm4c8rSI.TimyG3.LgWQWWK', '2020-05-06 07:18:00', '0000-00-00 00:00:00', 0, 0),
(32, 'test', 'Test@test.com', 'taseasda', '2020-05-03 15:11:04', '0000-00-00 00:00:00', 0, 0),
(33, 'Jolly2', 'Jolly2000@hotmail.com', '$2y$10$nHgUCNeX53rYGtpCCQN2Me7AVQeFHMbE/4.Zt0jVMbDCHUQa5WyGu', '2020-05-03 15:14:48', NULL, 0, 0),
(34, 'loaderest', 'loadertest@test.com', '$2y$10$HH0G2643DDjg2btxyyJ52.wghoHGVUWha/rbcuceGgcJpKdprlz4G', '2020-05-03 15:15:26', NULL, 0, 0),
(35, 'sequeluid', 'sequeluid@hotmail.com', '$2y$10$/q.1ck/6VdAaofX4FdmKIOjkvx3hSzNQ1/AU6QbBme0I3x6SwnzTy', '2020-05-03 15:15:45', NULL, 0, 0),
(36, 'ggamenewggamenew', 'ggamenewggamenew@asd.com', '$2y$10$ZDygEJdW5JceuZ8Vt3Ljjey4ovl2XJGQepa1ETOgDBvqrJYCNyMAK', '2020-05-03 15:15:48', NULL, 0, 0),
(37, 'nonamestand1', 'nonamestand1@nonamestand1.com', '$2y$10$arJj3XzDmoak41fkCcIReuXiiudwTt8zc5MKaTcz.KFrlzR9m4rzy', '2020-05-03 17:34:58', NULL, 0, 0),
(38, 'nonamestand2', 'nonamestand2@nonamestand2.com', '$2y$10$tlQNof28r6jopx5ptYA2d.yJbM16hNe3wzbdebiBG.AIGGlwxB92m', '2020-05-03 17:35:45', NULL, 0, 0),
(39, 'artanvrajolli', 'artanvrajolli@gmail.com', '$2y$10$lhtGDv9OlOcyndHGNSLhmeMucjyqNPg147AgNeXVtCGMHqG2nDrvm', '2020-05-03 17:49:12', '2020-05-11 12:59:35', 1, 0),
(40, 'ggamenew123', 'ggamenew123@ggamenew123.com', '$2y$10$YEZfm1dN9UPBAA6yGRrsy.rPEAgyXD4xnPT/0yg4Hhvvc3xfXQhta', '2020-05-03 19:21:31', NULL, 0, 0),
(41, 'ggamenew123', 'ggamenew123@ggamenew123.com', '$2y$10$fvu4EZFEyLGvDAu2TrnMq.pfNJ0T1x6nsYSiFKPfyrlTlVdU1uBXO', '2020-05-03 19:22:54', NULL, 0, 0),
(42, 'loader', 'loader@loader.com', '$2y$10$K.FXPmN7lRmYGP1jBgUGXuCHlA3CpsQyB9kJqTbrV8b0AxdfXH0/G', '2020-05-07 21:27:45', '2020-05-10 08:16:58', 1, 0),
(43, 'nonamestand3', 'nonamestand3@nonamestand3.com', '$2y$10$DCeHHhLtZM2ecY2Q6moRGOqEmlj.zUC.a0b6Mw7PLRDImG.J1tYfy', '2020-05-08 19:43:30', '2020-05-09 08:13:51', 0, 0),
(44, 'nonamestand4', 'nonamestand4@nonamestand4.com', '$2y$10$WWkQiz/1CzfuR.wedcJXaefPqJKjBgxvRwoVQ0v6o6ZOQhApVxXDm', '2020-05-08 19:44:24', NULL, 0, 0),
(45, 'arianit_halimi', 'arianit_halimi@hotmail.com', '$2y$10$ZdgJPOzJilT8UVRSmdCWye27z3heQk/4cnp05c/lHt6Djl1922qBG', '2020-05-10 08:36:11', NULL, 1, 0),
(46, 'Loman', 'Loman1999@msn.com', '$2y$10$Vuj82b7GnOaJJMNtekIjpexdDuy38VWgPUazFql3iZTrNmC1SQQIC', '2020-05-10 08:58:51', '2020-05-10 09:03:00', 0, 0),
(47, 'RickAndMorty', 'RickAndMorty@gmail.com', '$2y$10$m1AB/gb6mrqvc9UEGy1CjukmlBXqniC3MpHw7s74xVia0u4uE91q6', '2020-05-10 23:25:44', '2020-05-10 23:29:41', 0, 0),
(48, 'admin', 'admin@admin123.com', '$2y$10$dgrukEH9xkWUsHYd4DoSw.jRmmyjqB0e0Dqx80R.LH/SSCaWZsp6u', '2020-05-11 13:00:07', '2020-05-11 13:12:27', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `post_liked`
--
ALTER TABLE `post_liked`
  ADD PRIMARY KEY (`pid`,`uid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_liked`
--
ALTER TABLE `post_liked`
  ADD CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_liked_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`),
  ADD CONSTRAINT `post_liked_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `uid` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
