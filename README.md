# rexello1
SQL 



-- Database: `rexello`
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_weight` varchar(50) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `height_with_blindhole` int(11) NOT NULL,
  `wheel_diameter` int(11) NOT NULL,
  `load_carrying_capacity` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_weight`, `product_code`, `height_with_blindhole`, `wheel_diameter`, `load_carrying_capacity`, `description`, `image`) VALUES
(1, '05-10', 'RD3/PT/PUN/125', 100, 500, 100, 'Swivel castor, housing made of Polyamide, stem with circlip. \nWheel centre made of Polyamide, plain bearing', 'up_images/123.png'),
(2, '10 to 20 kg', 'RD1/PT/P/38', 100, 200, 340, 'Wheel centre made of Polymer, plain bearing', 'up_images/123.png'),
(3, '10 to 20 kg', 'RD1/PT/P/38', 100, 200, 340, 'Wheel centre made of Polymer, plain bearing', 'up_images/123.png'),
(4, '10 to 20 kg', 'RD1/PT/P/36', 200, 200, 140, 'Wheel centre made of Polymer, plain bearing', 'up_images/123.png'),
(5, '10 to 20 kg', 'RD1/PT/P/37', 500, 300, 340, 'Wheel centre made of Polymer, plain bearing', 'up_images/123.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
