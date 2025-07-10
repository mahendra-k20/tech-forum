-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2025 at 05:26 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language and core technology of the World Wide Web, alongside HTML and CSS.', '2025-07-01 15:33:01'),
(2, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.', '2025-07-01 15:33:48'),
(3, 'PHP', 'PHP is a general-purpose scripting language geared towards web development.', '2025-07-01 15:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment_content` text NOT NULL,
  `thread_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `created_at`, `created_by`) VALUES
(1, 'Use requests.get(url, stream=True, timeout=(5, 30)) where the second value enforces a per-chunk read timeout. Download in chunks using iter_content() with a progress bar (tqdm) to avoid memory issues and detect stalls reliably. Use HTTPAdapter with retries to handle transient connection drops gracefully.', 3, '2025-07-03 16:41:45', 1),
(2, 'Promise.all rejects immediately if any promise rejects, discarding other successful results. To handle individual fetch errors while retaining successful responses, wrap each fetch in a .catch to convert failures into resolved values (e.g., { error: true }). This way, Promise.all will resolve with an array of results and error objects for failed requests, allowing you to filter and handle each response cleanly.', 5, '2025-07-03 17:12:22', 4),
(3, 'Composer autoload may not detect new classes if they aren’t placed in the correct PSR-4 namespace or folder structure defined in composer.json, causing “class not found” errors. Running composer dump-autoload regenerates the autoload files, temporarily fixing the mismatch. Ensure your class namespace matches the folder path and follow PSR-4 strictly to avoid manual rebuilds.', 12, '2025-07-03 17:16:25', 2),
(4, 'This happens due to how Composer’s autoload system and classmap generation work:\r\n\r\nPSR-4 Autoloading vs. Classmap\r\nLaravel uses PSR-4 autoloading defined in your composer.json. If you place your new class under a PSR-4 compliant namespace and directory structure, Composer should detect it automatically without regenerating the autoload files.\r\nHowever, if:\r\n\r\nYou add classes in directories registered in the classmap section (autoload > classmap in composer.json).\r\n\r\nYou place files in non-PSR-4 compliant folders.\r\nThen Composer needs to regenerate the classmap using composer dump-autoload to detect these classes.', 12, '2025-07-04 15:23:26', 1),
(5, 'PHP’s mail() returning true only means the mail was handed to the server, not that it was delivered. Check your server’s mail logs (e.g., /var/log/mail.log on Linux) for delivery errors. Ensure your server IP isn’t blacklisted and set proper From, Reply-To, and Return-Path headers with a domain-aligned email. Use SMTP libraries like PHPMailer or Symfony Mailer for better reliability and debugging (PHPMailer GitHub). Consider configuring SPF, DKIM, and DMARC for your sending domain to improve deliverability (Google Postmaster Guide).', 2, '2025-07-07 18:32:38', 5),
(6, 'PHP’s mail() returning true only confirms it handed the email to the local mail transfer agent, not actual delivery. Your server may lack proper mail configuration, causing silent failures. Check your server’s mail logs (e.g., /var/log/maillog or /var/log/mail.log) to trace what happens after calling mail(). Use a valid From address matching your domain with SPF/DKIM configured to avoid rejection by recipient servers. For reliable delivery, consider switching to PHPMailer or Symfony Mailer with authenticated SMTP instead of relying on mail().', 2, '2025-07-07 18:43:28', 2),
(7, 'The reason your debounce isn’t preventing multiple API calls is likely because the timer used for debouncing is not persisting between rapid clicks, causing a new timer to start each time without clearing the previous one. To fix this, ensure the timeout identifier is stored in a scope that persists across calls, allowing it to clear the existing timer before setting a new one. Debounce ensures that only the **last action in a burst of rapid events triggers the API call** after the specified delay. If the scope or clearing logic is incorrect, each click starts its own independent timer, leading to multiple calls. Also, confirm you are attaching the debounced function (not the original) to your button’s event listener to control call frequency effectively.', 1, '2025-07-07 18:48:22', 5),
(8, 'requests.get(stream=True) may hang on large downloads if the server stops responding after the connection is established, as timeout only applies to connection and first byte by default. To handle this, set both timeout=(connect_timeout, read_timeout) and use iter_content(chunk_size) to process the download in chunks while tracking progress. This ensures the read operation times out if the server becomes unresponsive mid-download. Additionally, consider using requests.adapters.HTTPAdapter with retries to handle intermittent connection issues during large file downloads.', 8, '2025-07-07 18:50:29', 6),
(11, 'This warning occurs when your PHP script sends output (even a space or newline) before calling header(\"Location: ...\"), which prevents modifying HTTP headers. To fix it, ensure there is no whitespace or echo before the header() call, including in included files. Place header() immediately after verifying login success and use exit; after it to stop further output. For systematic prevention, enable output buffering using ob_start(); at the top of your script.', 17, '2025-07-08 11:32:38', 6),
(12, 'PHP strtotime returns false for some date formats\r\nI’m using strtotime() to convert user input dates, but it returns false for formats like date/month/year. I need to handle various user input formats without forcing them to use a specific one. What is the best approach to parse different date formats reliably in PHP?', 4, '2025-07-08 11:37:42', 6),
(13, 'forEach does not wait for async/await and runs all iterations in parallel. To handle async calls sequentially, use a for...of loop instead, which properly respects await and waits for each promise to resolve before moving to the next item. This ensures API requests or async operations execute one after another rather than simultaneously.', 9, '2025-07-08 11:48:08', 8),
(14, 'This happens because the delay you set resets incorrectly each time someone types, so it still sends requests every time. To fix it, you need to make sure the waiting time restarts properly with each new key press, and only after the person has stopped typing for a moment should the request be sent. This will prevent unnecessary requests while someone is still typing.\r\n', 19, '2025-07-08 13:46:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `thread_id` int NOT NULL AUTO_INCREMENT,
  `thread_title` varchar(255) NOT NULL,
  `thread_description` text NOT NULL,
  `thread_cat_id` int NOT NULL,
  `thread_user_id` int NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`thread_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Debounce not preventing multiple API calls on button click in JS', 'I implemented a debounce function using setTimeout to prevent multiple API calls when a user repeatedly clicks a button, but it still sends multiple requests quickly if clicked fast. I suspect I am not clearing or scoping the timeout correctly. How should I structure my debounce to ensure only one API call is made during rapid clicks?', 1, 5, '2025-07-02 17:12:43'),
(2, 'PHP mail() returning true but email not delivered', 'Using PHP’s mail() function to send contact form submissions, and it returns true, but no emails are received in my inbox or spam folder. I checked headers and SMTP server settings but can’t identify why it is silently failing. How can I debug and ensure mail delivery with mail()?', 3, 2, '2025-07-02 17:13:30'),
(3, 'Python requests get stuck on large file download', 'Using requests.get() with stream=True to download large files (~1GB), but sometimes the download hangs indefinitely without timing out. I have tried setting a timeout but it still hangs on large downloads. How can I ensure requests reliably handles large downloads with proper timeout and progress tracking?', 2, 1, '2025-07-02 17:14:30'),
(4, 'PHP strtotime returns false for some date formats', 'I’m using strtotime() to convert user input dates, but it returns false for formats like dd/mm/yyyy while working fine with yyyy-mm-dd. I need to handle various user input formats without forcing them to use a specific one. What is the best approach to parse different date formats reliably in PHP?', 3, 2, '2025-07-02 17:14:30'),
(5, 'Why does Promise.all fail if one fetch fails?', 'Using Promise.all to fetch multiple URLs, but if one fetch fails, the entire Promise.all rejects, and I lose the successful results from other calls. I want to handle individual fetch errors while still getting successful responses for others in the array. How can I modify my Promise handling to achieve this?', 1, 1, '2025-07-02 17:15:01'),
(8, 'TypeError: object is not iterable when using zip()', 'Using requests.get() with stream=True to download large files (~1GB), but sometimes the download hangs indefinitely without timing out. I have tried setting a timeout but it still hangs on large downloads. How can I ensure requests reliably handles large downloads with proper timeout and progress tracking?', 2, 4, '2025-07-03 15:31:49'),
(9, 'Async/Await inside forEach not working', 'I am using async/await inside a forEach loop to call API requests sequentially, but it does not wait, and all requests fire in parallel. How can I properly handle async calls sequentially while iterating over an array?', 1, 2, '2025-07-03 15:56:18'),
(12, 'Composer autoload not detecting new classes', 'After adding new PHP classes in my Laravel app, Composer’s autoload does not detect them, resulting in “class not found” errors. Running composer dump-autoload temporarily fixes it. Why does autoloading fail intermittently?', 3, 5, '2025-07-03 17:15:31'),
(17, 'Warning: Cannot modify header information - headers already sent', 'Using header(\"Location: ...\") in my PHP login system to redirect users after successful login, but I get a \"headers already sent\" warning, and the redirect does not work. I checked for whitespace but still cannot identify why this happens. How can I ensure proper redirection without triggering this warning during user authentication flow?\r\n', 3, 5, '2025-07-08 11:19:19'),
(18, 'Warning: Undefined array key \"username\"', 'I am trying to show the logged-in user’s name on different pages, but instead of showing the name, I get a warning message, and nothing is displayed. I have already added the session start at the top and saved the user’s name during login. Why is this happening, and how can I fix it so the name shows correctly without giving a warning?', 3, 8, '2025-07-08 12:38:06'),
(19, 'Debounce not working correctly with input field in JS', 'I added a debounce function to an input field to delay API calls while the user is typing, using setTimeout, but the API still gets called on every keystroke instead of waiting until the user stops typing. I think I might not be clearing or managing the timeout properly. How can I correctly structure my debounce so that the API call only triggers after the user has finished typing?', 1, 8, '2025-07-08 13:43:48'),
(21, 'Asyncio tasks not cancelling properly during API polling', 'I am using asyncio with aiohttp to poll an API repeatedly, but when I try to cancel the tasks using task.cancel(), they sometimes hang and do not stop immediately, especially if the request is in progress. I have tried using asyncio.wait_for with a timeout, but it still leaves tasks hanging in some cases. How can I ensure my asyncio tasks cancel cleanly while polling APIs without leaving dangling tasks or blocking shutdown?', 2, 8, '2025-07-09 15:08:11'),
(22, 'PHP cURL file upload timing out on large files', 'I am using PHP cURL to upload large files (~500MB) to a remote server, but the upload often times out or fails without clear errors, even after setting CURLOPT_TIMEOUT to a higher value. I have also tried adjusting max_execution_time and post_max_size in php.ini but the issue persists inconsistently. How can I ensure reliable large file uploads using cURL in PHP without timeouts or incomplete uploads?', 3, 8, '2025-07-09 15:11:21'),
(24, 'LocalStorage data not updating across tabs in JavaScript', 'I am using localStorage to store user preferences in my web app, but when I update the data in one browser tab, other open tabs do not reflect the changes immediately. I have tried manually reloading, but it only updates after a refresh. How can I ensure localStorage changes are detected and updated across all open tabs in real time for a consistent user experience?', 1, 5, '2025-07-09 15:32:18'),
(25, 'Python subprocess hangs when capturing large stdout', 'I am using Python’s subprocess module to run external commands and capture their stdout using subprocess.PIPE, but when the command produces a lot of output, the script hangs indefinitely. I tried using communicate() to read the output, but it still gets stuck with large outputs. How can I reliably capture large stdout from subprocess calls in Python without hanging?', 2, 6, '2025-07-09 15:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(24) NOT NULL,
  `user_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `created`, `user_name`) VALUES
(1, 'mahendra@air.in', '$2y$10$TUUs7nW.3aDzqu16g/Sep.bEOiTFQ56BhEAcl94OKdR', '2025-07-04 17:32:51', 'Mahendra K'),
(2, 'john@doe.in', '$2y$10$0TlnaESmSdq5zad3lqdc8uaQOJJmchMi8e8SXJp8mkk', '2025-07-04 18:31:13', 'John Doe'),
(3, 'jack@s.com', '$2y$10$jxiaqg4/P6DrzJQPzFu20.amK3M/wy.uCDp2hehTgeLQ8oGVFjfrS', '2025-07-08 11:28:06', 'Jack Sparrow'),
(4, 'tony@stark.in', '$2y$10$ze0SiI.0171FCJF7Ul07v.NRS8s79k994DEK3mcYSD3', '2025-07-07 12:46:24', 'tony stark'),
(5, 'thor@odin.in', '$2y$10$6knzm2CNpKHF09G6DF/aDOAFUlcZgnoXrb7.NfW.nopvnlPS0YDIi', '2025-07-07 13:08:15', 'thor odinson'),
(6, 'tech@gig.in', '$2y$10$XATKCLaaggoAv9cF6ioxCuKzGkVpMsXOY/P1TZA6EE2.D1.sHEw8C', '2025-07-07 18:49:34', 'Tech Gig'),
(8, 'forbidden@fist.com', '$2y$10$HnBUF3P.Qic.9hW6ieO2yOkO.gjvhgxWAV4KmiEvNszrrQflC3V9u', '2025-07-08 11:46:47', 'Forbidden Fist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `threads`
--
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_description`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
