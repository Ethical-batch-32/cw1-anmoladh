-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 05:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `a_photo` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `name`, `email`, `password`, `a_photo`, `address`, `contact`) VALUES
(1, 'Bhuwan Nepali', 'bhuwanpariyarr@gmail.com', '513a7ee491f7dad27c560c19471ea528', 'Bhuwan.jpg', 'kupondole', '9811111111');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `boo_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `blocation` varchar(30) NOT NULL,
  `arrival_date` date NOT NULL,
  `leaving_date` date NOT NULL,
  `b_cost` int(11) NOT NULL,
  `b_type` varchar(30) NOT NULL,
  `otp_code` int(11) NOT NULL,
  `b_status` varchar(30) NOT NULL,
  `payment-status` varchar(30) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `no_of_member` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`boo_id`, `cid`, `blocation`, `arrival_date`, `leaving_date`, `b_cost`, `b_type`, `otp_code`, `b_status`, `payment-status`, `u_email`, `no_of_member`, `total`) VALUES
(1, 2, 'Lumbini', '2022-01-12', '2022-01-14', 20, 'Group', 0, 'verified', 'completed', 'bhuwanepali77@gmail.com', 2, 80);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`) VALUES
(1, 'Bhuwan Pariyar', 'bhuwanpariyar@gmail.com', 'hye'),
(2, 'Bhuwan Pariyar', 'bhuwanepali77@gmail.com', 'Thank you....');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `pro_key` int(11) NOT NULL,
  `images` text NOT NULL,
  `placename` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `pro_key`, `images`, `placename`, `name`) VALUES
(1, 5, 'lumbini.jpg', 'lumbini', 'lumbini'),
(2, 2, 'janakpur.jpg', 'janakpur', 'janakpur'),
(3, 4, 'pokhara.jpg', 'Pokhara', 'Pokhara'),
(4, 4, 'mustang.jpg', 'mustang', 'mustang'),
(5, 3, 'chitwan.jpg', 'Chitwan', 'Chitwan'),
(6, 1, 'biratnagar.jpg', 'Biratnagar', 'Jhapa'),
(7, 1, 'jhapa.jpg', 'Jhapa', 'jhapa'),
(8, 6, 'Dolpa.jpg', 'Dolpa', 'Dolpa'),
(10, 3, 'ktm.jpg', 'kathmandu', 'kathmandu'),
(11, 4, 'Lamjung.jpg', 'Lamjung', 'Lamjung'),
(12, 3, 'lalitpur.jpg', 'Lalitpur', 'Lalitpur'),
(13, 3, 'bkt.jpg', 'Bhaktapur', 'Bhaktapur'),
(14, 7, 'bajura.jpg', 'Bajura', 'Badimalika');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pid` int(11) NOT NULL,
  `ptype` varchar(30) NOT NULL,
  `pcost` int(11) NOT NULL,
  `pdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pid`, `ptype`, `pcost`, `pdesc`) VALUES
(1, 'Individual', 25, 'A Individual package tour, package vacation, or package holiday comprises transport and accommodation are arranged by tour operator. Other services may be provided such a rental car, activities or outings during the holiday. '),
(2, 'Group', 20, 'if you are looking for Group tour packages, than search and book Group tickets online from our site at great deals and discounts on various vacations ...'),
(3, 'Family', 20, 'Best of family tour packages guarantee relaxation and activities for the complete family. Right from adults and kids to elderly, family packages include a vast range of sightseeing trips, historical tours, fun activities, a little bit of adventure and a lot of relaxing time.'),
(4, 'Couple', 25, 'If you are planning your first romantic vacation, then we have couple packages on offer. No country gives you options of more places and ways to spend your first few days together, than Nepal.');

-- --------------------------------------------------------

--
-- Table structure for table `place_details`
--

CREATE TABLE `place_details` (
  `p_id` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pdesc` text NOT NULL,
  `pimages` text NOT NULL,
  `province_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place_details`
--

INSERT INTO `place_details` (`p_id`, `pname`, `pdesc`, `pimages`, `province_key`) VALUES
(1, 'Pokhara', 'Pokhara is Nepal\'s number 1 adventure and leisure destination, a gateway to treks in the Annapurna region with plenty of entertainment for individual travellers and their families. \n\nIn Pokhara you can experience the excitement of adventure: boating, hiking, pony rides, paragliding, bungee, zipline or simply relaxing at one of the several lakes in the valley. \n\nRelax at the shores of Fewa lake in Pokhara\n\nPokhara will overwhelm you with its natural beauty and great photo ops. Walk along the shores of the Fewa Lake, enjoy the greenery surrounding you and gaze at the spectacular panoramic view of the Himalayan peaks of the Annapurna Massif. Brightly painted wooden boats add vibrant colors to the greenery, while paragliders float down slowly from above. Flying over the lake is probably going to be one of the highlights of your travel experience in Nepal.', 'pokhara.jpg', 4),
(2, 'Kathmandu', 'Kathmandu, which is also known as the city of temples, is the capital city of Nepal. it is also known as one of the largest cities in Nepal with high population density. This city is an amazing place for it is filled with heritages and temples and all those cultural related stuff which is sure to make any travelers jealous with its tempting beauty. This place is rich in culture and the lifestyle of indigenous people that have been residing there will give you a different sightseeing experience when you are actually inside the city.\nPeople here believe in different gods and as a result, you will get to see different festivals celebrated here every day. You will get to encounter with chariots in every street of Kathmandu. The city is the first step for all travelers because it has the only international airport in Nepal.\nKathmandu, which is also known as the city of temples, is the capital city of Nepal. it is also known as one of the largest cities in Nepal with high population density. This city is an amazing place for it is filled with heritages and temples and all those cultural related stuff which is sure to make any travelers jealous with its tempting beauty. This place is rich in culture and the lifestyle of indigenous people that have been residing there will give you a different sightseeing experience when you are actually inside the city.\nPeople here believe in different gods and as a result, you will get to see different festivals celebrated here every day. You will get to encounter with chariots in every street of Kathmandu. The city is the first step for all travelers because it has the only international airport in Nepal.\n', 'ktm.jpg', 3),
(3, 'Janakpur', 'Located in south-central Nepal on the Terai plains, Janakpur was once the capital of a millennia-old Indian kingdom known as Mithila, and the Maithili culture still thrives here. The city is located in the Terai region of Nepal and is the administrative headquarters of Dhanusa district. The Ram Janaki Temple is the main attraction in Janakpur. The centre of Mithila culture, Janakpurdham is also one of the revered sites on the holy Parikrama (route undertaken by devout Hindus) along with Ayodhya, Kashi and Brij in India. Hindus believe Janakpur is the place where Lord Ram wed Sita, also known as Janaki, and thousands of Hindus from all over the world flock to the temple of Janaki Mandir each year to celebrate the anniversary of their marriage.\nWith its three-story construction and 60 rooms, the massive 19th-century marble structure is the largest temple in Nepal. Janakpur is known for the more than 100 sacred pools and ponds scattered around the tranquil city as well.\n', 'janakpur.jpg', 2),
(4, 'Mustang', 'Upper Mustang is a restricted site of Nepal that had its own royal kingdom within the territory of Nepal until recently in 1950. This place remained untouched from the globalizing world for centuries; as a result, the authentic taste of ancient culture still lingers in the air of the upper Mustang.\nThere are beautiful palaces, and labyrinth-like tall caves to join and spend your time in. Otherwise, there is nothing to see except a far-stretching deserted plain. Exploring the upper mustang is analogous is visiting Tibet as the upper mustang is a part of a Tibetan plateau. It is a unique experience to be there.\nUpper Mustang is the choice of braves as the trail is very difficult to pass through and the air is mostly dusty by the winds. Only if you have the gut to challenge yourself in every step can you attempt this trek.\n', 'mustang.jpg', 4),
(5, 'Lumbini', 'Lumbini, the birthplace of Lord Buddha, is among the famous Nepal tourist spots. The peaceful ambiance of the city located in the Kapilavasta region is perfect for meditation. The temples and monuments built in accordance with the Buddhist architecture are highly admired. Lord Shiva is known to born in the year 623 BC in Lumbini which is basically in the southern part of Nepal. A lot of people visit Nepal only to see Lumbini. It is said that Lumbini is one of the holiest places in all over the world for the people who follow Buddhism.\nAccording to the people who have authenticated this place as the birthplace of Buddha all the boundaries of the wall of the garden in Lumbini proves that this is the place where Buddha was born. This place is now protected by the Ancient Monument Preservation Act which was passed in the year 1956. Lumbini has a huge historical significance for a lot of people. All the people who follow Buddhism have a goal to visit Lumbini where Buddha was born. The popularity of Lumbini is increasing day by day because a number of people are converting into Buddhism and planning to visit here. There has been a lot of hotels set up around Lumbini so that the tourists are able to enjoy Nepal sightseeing.\nLumbini has no magical monuments to leave you jaw-dropping, but if you are a peace-seeker or monastery explorer, then Lumbini can give you all that you want.\n', 'lumbini.jpg', 5),
(6, 'Lamjung', 'Lamjung District (Nepali: lamjung District (About this soundlisten)), a part of Gandaki Province, is one of the 77 districts of Nepal. The district, with Besisahar as its district headquarters, covers an area of 1,692 square kilometres (653 sq mi) and as of 2011 had a population of 167,724. Lamjung lies in the mid-hills of Nepal spanning tropical to trans-Himalayan geo-ecological belts, including the geographical midpoint of the country (i.e., Duipipal). It has mixed habitation of casts and ethnicities. It is host to probably the highest density of the Gurung ethnic population in the country. ', 'Lamjung.jpg', 4),
(7, 'Lalitpur', 'Situated across the Bagmati River from Kathmandu, Patan is as well known for its artisans as for its stunning display of Newari architecture. Built in the 17th century, the palaces, courtyards and temples of the Patan Durbar are the city’s star attractions.\nWith its multi-columned façade and gilded spires, the recently restored stone Krishna Temple is particularly striking, as is the recently restored Sundari Chowk, a courtyard with an elaborately carved sunken bath as its centerpiece. Patan is one of the best places in Nepal to buy the gorgeous handmade silk saris that once were the garment of choice for the country’s royalty and aristocracy.\n', 'lalitpur.jpg', 3),
(8, 'Jhapa', 'Jhapa District Coordination Committee (DCC), formerly called Jhapa District is located in Province 1 of the eastern region of Nepal. It borders with West Bengal (India) to the East, Morang to the West, Illam to the North and Bihar (India) to the South. Jhapa has 8 municipalities and 7 rural municipalities. The total area of Jhapa is 1,606 km2. The lowest elevation point is 58 meter which is the lowest point of Nepal and highest elevation point is 500 meter above sea level. The current population of Jhapa is 647,492 and the average population density is around 400 people per square km. The headquarter of Jhapa is connected by feeder road to the East-West Highway at Birtamod, and is also connected to the Hill parts of the eastern region of Nepal. Jhapa is the gateway to India for the eastern region of Nepal.', 'jhapa.jpg', 1),
(9, 'Biratnagar', 'Biratnagar (Nepali:Biratnagar is a metropolitan city in Nepal, which serves as the capital of Province No. 1 With a population of 242,548 as per the 2011 census, it is the largest city in the province and also the headquarters of Morang district. Biratnagar is located 399 km (248 mi) east of the capital, Kathmandu, and 6 km (3.7 mi) north of the bordering town of Jogbani in the Indian state of Bihar. The highest peak in the world, Mount Everest, is situated 174 km (108 mi) north of the city.\r\n\r\nBiratnagar was declared a metropolitan city on 22 May 2017,thus pushing the total population to over 240,000. This made it the fourth-most populated city in the country following the urban agglomeration of Kathmandu and Lalitpur, Pokhara, and Bharatpur.\r\n\r\nThe city is home to the Biratnagar Jute Mills, the first large-scale industry of Nepal. Besides being considered as the industrial capital of Nepal, the city has contributed actively to the Nepalese democracy movement by being the birthplace of five prime ministers of democratic Nepal. The latter claim is also evident from the fact that the first labor strike leading to the anti-Rana movement started from Biratnagar.\r\n\r\nModern-day Biratnagar serves as an entry point to eastern Nepal as well as north-eastern India. It is the second Nepalese city, after Janakpur, to have a connection with the Indian Railways and the only city other than Birgunj to operate an integrated check post (ICP) on the Indian border.', 'biratnagar.png', 1),
(10, 'Bhaktapur', 'Bhaktapur is the best among the Nepal tourist attractions for shopping for terracotta and handicraft products. Clothes and souvenirs also available. The history of Bhaktapur goes back to about the 8th century. This place was the capital of Nepal from the 12th century to about the 15th century. In the 18th century, this place became a country on its own with boundary walls and gates to the city. The citizen of Bhaktapur are mostly peasants, public employees, handicraft manufacturers or businessman. Shopping at this vibrant destination is certainly one of the top things to do in Nepal.\nA lot of tourists visit this city every year which helps in the economy of the city. The city is filled with red bricks which makes it look very beautiful. People will also be able to find a lot of animals present in this area who are kept as a pet, something that makes it one of the best tourist places in Nepal.\nBhaktapur is the best among the Nepal tourist attractions for shopping for terracotta and handicraft products. Clothes and souvenirs also available. The history of Bhaktapur goes back to about the 8th century. This place was the capital of Nepal from the 12th century to about the 15th century. In the 18th century, this place became a country on its own with boundary walls and gates to the city. The citizen of Bhaktapur are mostly peasants, public employees, handicraft manufacturers or businessman. Shopping at this vibrant destination is certainly one of the top things to do in Nepal.\nA lot of tourists visit this city every year which helps in the economy of the city. The city is filled with red bricks which makes it look very beautiful. People will also be able to find a lot of animals present in this area who are kept as a pet, something that makes it one of the best tourist places in Nepal.\n', 'bkt.jpg', 3),
(11, 'Chitwan', 'Established in 1973, Chitwan National Park soon got listed in the book of World Heritage Sites (1984) because of its wilderness. It is the home for over 650 species of birds, a countless variety of mammals (Royal Bengal Tiger, one-horned rhinoceros, Deer, etc.), and reptiles (python, crocodiles, etc.) that make Chitwan the top destination among nature lovers.\nThe Rapti river, flowing through the woods of this National Park, shelters two species of crocodiles- Gharials and Muggers- and a Gangetic Dolphin which is rarely sighted jumping in the water of the Rapti.\nChitwan is best for Photography. Also, exploring the wilderness of Chitwan is full of fun. This trip can be best for the family.\n', 'chitwan.jpg', 3),
(12, 'Dolpa', 'Dolpo is a culturally rich remote region of far-western Nepal. This place is isolated from the rest of the world, and the people living here are nomadic traders. During the summer, they grow millet, barley, and other commodities in the soil and when the winter approaches, they travel across the Himalayas for trading purposes.\nIn the meantime, the Dolpo becomes vacant. The lifestyles of these people greatly correspond with the ancestral way of living such as the firewood, they use yak dung, etc. To explore these unique vivacities of Nepal is in itself an adventure. Let us venture together. Dolpo is only for the daredevils. Dolpo is understandably a region of high passes, rare and diverse flora and fauna, and sweeping views of the high Himalaya. This trek is for those who want to experience a combination of rare nature enriched with traditional Tibetan culture and heritage.Protected by Shey-Phoksundo National Park, the largest national park in Nepal, Dolpo is a well-preserved eco-system providing majestic views of Kanjiroba Peak, Phoksundo Lake, and the Dhaulagiri massif.  A visit to Phoksundo Gompa, which is dedicated to the ancient Bonpo religion, local to Dolpo and Tibet, is an experience that will make this a journey of a lifetime.\n', 'Dolpa.jpg', 6),
(14, 'Bajura', 'Badimalika is an important tourist destination and an important religious site in Far Western Nepal. It has mesmerizing scenarios. It looks similar to the old windows screen. It is 4200m above from sea level. The trek gets harder as it has got lots of steep trails. There are two rivers called Ganga and Jamuna. High hills of neighboring districts can also be seen from here. This region is rich in medicinal herbs as well. The weather is cold and trekkers need to assemble all the needed stuff by themselves. Badimalika can be a paradise for hiking and trek lovers.', 'bajura.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `pro_name`) VALUES
(1, 'Province-1'),
(2, 'Province-2'),
(3, 'Bagmati'),
(4, 'Gandaki'),
(5, 'Lumbini'),
(6, 'Karnali'),
(7, 'Sudurpaschim');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `rdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `name`, `email_id`, `review`, `rating`, `rdate`) VALUES
(1, 'Muskan', 'muskan@gmail.com', 'cool', 4, '2021-08-17 06:15:42'),
(2, 'Mukesh', 'Mukesh@gmail.com', 'awesome', 5, '2021-08-17 06:15:42'),
(3, 'Samip', 'samip@gmail.com', 'wonderful', 5, '2021-08-17 06:15:42'),
(4, 'Bhuwan', 'bhuwan@gmail.com', 'great', 4, '2021-08-17 06:15:42'),
(5, 'Bhuwan Pariyar', 'bhuwanepali77@gmail.com', 'well experience', 5, '2021-08-17 13:41:00'),
(6, 'Bhuwan Pariyar', 'bhuwanepali77@gmail.com', 'intermediate', 3, '2021-08-18 11:47:00'),
(7, 'samip pokharel', 'samip@gmail.com', 'nice', 5, '2022-01-10 09:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `sid` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `sphoto` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`sid`, `sname`, `designation`, `sphoto`, `phone`, `address`, `email`) VALUES
(1, 'Bhuwan Pariyar', 'Administrator', 'Bhuwan.jpg', 1000000000, 'sarlahi', 'bhuwan@gmail.com'),
(2, 'Mukesh Kumar mahato', 'Accountant', 'mukesh.jpg', 1111111111, 'Siraha', 'mukesh@gmail.com'),
(3, 'Samip Pokharel', 'field incharge', 'samip.jpg', 222222222, 'Bhaktapur', 'samip@gmail.com'),
(4, 'Muskan Manandhar', 'Receptionist', 'muskan.jpg', 333333333, 'Bafal', 'muskan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'bhuwanepali77@gmail.com'),
(2, 'bhuwanepali77@gmail.com'),
(3, 'bhuwanepali77@gmail.com'),
(4, 'bhuwanepali77@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `c_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `c_photo` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `c_pswd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`c_id`, `username`, `c_email`, `pswd`, `c_address`, `c_mobile`, `c_photo`, `fname`, `lname`, `city`, `c_pswd`) VALUES
(2, 'Bhuwan', 'bhuwanepali77@gmail.com', '33d46152b091974f201d1db69fda4222', 'kupondole', '9813246534', 'Bhuwan.jpg', 'Bhuwan', 'Nepali', 'lalitpur', '33d46152b091974f201d1db69fda4222');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `vid` int(11) NOT NULL,
  `vname` varchar(30) NOT NULL,
  `video` text NOT NULL,
  `pcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`vid`, `vname`, `video`, `pcode`) VALUES
(1, 'Pokhara', 'Pokhara.mp4', 4),
(2, 'Kathmandu', 'kathmandu.mp4', 3),
(3, 'Janakpur', 'janakpur.mp4', 2),
(4, 'Mustang', 'Mustang.mp4', 4),
(5, 'Lumbini', 'Lumbini.mp4', 5),
(6, 'Lamjung', 'Lamjung.mp4', 4),
(7, 'Lalipur', 'Lalitpur.mp4', 3),
(8, 'Jhapa', 'jhapa.mp4', 1),
(9, 'Biratnagar', 'biratnagar.mp4', 1),
(10, 'Bhaktapur', 'bhaktapur.mp4', 3),
(11, 'Chitwan', 'Chitwan.mp4', 3),
(12, 'Dolpa', 'dolpa.mp4', 6),
(14, 'Bajura', 'video-61dd5dba3dacb0.82685957.mp4', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`boo_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `place_details`
--
ALTER TABLE `place_details`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `boo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `place_details`
--
ALTER TABLE `place_details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
