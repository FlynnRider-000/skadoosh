-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1,	'Content Strategy',	1,	'2021-06-02 21:46:16',	'2021-06-02 21:46:17'),
(2,	'Content Design',	1,	'2021-06-02 21:46:28',	'2021-06-02 21:46:28'),
(5,	'Content Marketing',	1,	'2021-06-15 16:15:13',	'2021-06-15 16:15:13'),
(6,	'Content Management',	1,	'2021-06-15 16:15:29',	'2021-06-15 16:15:29'),
(10,	'Test Category',	1,	'2022-01-13 09:12:25',	'2022-01-17 18:56:13'),
(11,	'Digital Marketing',	1,	'2022-01-13 09:12:25',	'2022-01-17 18:56:13'),
(12,	'DevOPS',	1,	'2022-01-13 09:12:25',	'2022-01-17 18:56:13');

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `companies` (`id`, `name`, `statement`, `logo`, `email`, `website`, `twitter`, `location`, `description`, `created_at`, `updated_at`) VALUES
(7,	'Peel Insights',	'We’re looking for an SEO Content Writer who',	'1632509458.png',	'info@12sm.com',	'https://www.12sm.com',	'@newte',	'NY',	'<p>We&rsquo;re looking for an SEO Content Writer who</p>',	'2021-06-15 15:59:46',	'2021-09-24 18:50:58'),
(9,	'Sage',	'People make Sage great. From our colleagues delivering ground-breaking solutions to the customers who use them',	'1623777058.png',	'infoo@12sm.com',	'https://www.12sm.com',	'@12sm',	'NY',	'<p>People make Sage great. From our colleagues delivering ground-breaking solutions to the customers who use them</p>',	'2021-06-15 17:10:58',	'2021-06-15 17:10:58'),
(10,	'AS Printful Latvia',	'Printful helps artists and entrepreneurs transform their ideas into thriving ecommerce businesses.',	'1623777242.png',	'contact@12sm.com',	'https://www.12sm.com',	'@12sm',	'AL',	'<p>Printful helps artists and entrepreneurs transform their ideas into thriving ecommerce businesses.</p>',	'2021-06-15 17:14:02',	'2021-06-15 17:14:02'),
(16,	'Company Ltd again2',	NULL,	'1630478915.jpg',	'mycompanyagain2@gmail.com',	NULL,	NULL,	NULL,	NULL,	'2021-09-01 06:48:35',	'2021-09-01 06:48:35'),
(19,	'Syntellis Solitions',	'Syntellis Performance Solutions, previously Kaufman Hall Software, provides innovative enterprise performance management software, data and analytics',	'1632434135.png',	'ajjmair@hotmail.com',	'https://www.12sm.com',	'@12smm',	'New York',	'<p>Syntellis Performance Solutions, previously Kaufman Hall Software, provides innovative enterprise performance management software, data and analytics</p>',	'2021-09-23 21:55:35',	'2021-09-23 21:55:35'),
(20,	'Pickolab',	'Good Designer',	'1634704934.png',	'pickolab.team@gmail.com',	'https://www.pickolab.co',	'pickolab',	'New York',	'<p>UIUX Design</p>',	'2021-10-20 04:42:14',	'2021-10-20 04:42:14'),
(21,	'zamannetworks',	'Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description ',	'1640158810.jpg',	'livecoinmaize@gmail.com',	'https://cribmed.com/',	NULL,	NULL,	'<p><span class=\"sublabel\">Provide a longer description about your company to help a candidate understand what you do in more detail</span></p>\r\n<div class=\"tox tox-tinymce\" role=\"application\" aria-disabled=\"false\">\r\n<div class=\"tox-editor-container\">\r\n<div class=\"tox-editor-header\" data-alloy-vertical-dir=\"toptobottom\">\r\n<div class=\"tox-menubar\" role=\"menubar\" data-alloy-tabstop=\"true\"><span class=\"sublabel\">Provide a longer description about your company to help a candidate understand what you do in more detail</span>\r\n<div class=\"tox tox-tinymce\" role=\"application\" aria-disabled=\"false\">\r\n<div class=\"tox-editor-container\">\r\n<div class=\"tox-editor-header\" data-alloy-vertical-dir=\"toptobottom\">\r\n<div class=\"tox-menubar\" role=\"menubar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>',	'2021-12-22 07:38:05',	'2021-12-22 07:40:10'),
(22,	'Testing Company',	'Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description',	'1641322551.png',	'info@creatrhq.com',	'https://joeyspeakesfitness.com/',	'@creatrhq.com',	'Los Angeles',	'<p>Provide a longer description about your company to help a candidate understand what you do in more detail</p>',	'2021-12-23 19:43:30',	'2022-01-04 18:55:51'),
(23,	'qnbb',	'LATAM',	'1641202511.jpeg',	'nd_sohail@yahoo.com',	'https://www.fonts.google.com/specimen/Urbanist',	'qnbb',	'qnbb',	'<p>sdfsadasdas</p>',	'2022-01-03 09:35:11',	'2022-01-03 09:35:11'),
(25,	'Skadoosh LLC',	'Liaoning',	'1642720449.png',	'wangjian72223@gmail.com',	'https://jobfinder.com',	NULL,	NULL,	'<p>COmapp</p>',	'2022-01-20 23:14:09',	'2022-01-20 23:14:09'),
(26,	'22DOGS',	NULL,	'1643926364.png',	'info@22dogstudio.com',	'https://22dogstudio.com/',	NULL,	'Milan',	'<div>22DOGS is a boutique visual effects studio based in Milan and Los Angeles and with worldwide collaborations.</div>\r\n<div>Our family of international artists and supervisors are world-class and can collaborate remotely so that all your money goes into the quality of the shots.</div>\r\n<div>We take pride in crafting visual solutions and products that genuinely impress our clients.</div>\r\n<div>As we grow and expand, we vouch to never stop caring intensely for our work and to retain the personalized \"boutique\" approach that has gotten us this far.</div>\r\n<div>Thank you for believing in us.</div>',	'2022-02-03 22:12:44',	'2022-02-03 22:12:44'),
(27,	'asfdsfad',	'sfdfsadsdfa',	'1644318596.png',	'coronarider01@gmail.com',	NULL,	NULL,	NULL,	'<p>sfsfdadsfsdfasdfasdfa</p>',	'2022-02-03 22:17:21',	'2022-02-08 11:09:56');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_restriction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_premium` tinyint(1) NOT NULL,
  `is_pinned` tinyint(1) DEFAULT NULL,
  `creation_step` int(11) NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_category_id_foreign` (`category_id`),
  KEY `jobs_company_id_foreign` (`company_id`),
  CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `jobs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jobs` (`id`, `title`, `job_type`, `location`, `location_city`, `location_state`, `region_restriction`, `apply_link`, `description`, `is_premium`, `is_pinned`, `creation_step`, `category_id`, `company_id`, `created_at`, `updated_at`) VALUES
(23,	'Senior Content Strategist',	'full_time',	'office',	'New York',	'NY',	NULL,	'https://www.domain.com',	'<p><strong>Senior Content Strategist&nbsp;</strong></p>\r\n<p><strong>The Company:</strong></p>\r\n<p>Launch is an agency that creates digital products and experiences. But that doesn&rsquo;t tell the full story of how we apply strategy and creative thinking. We solve complex problems through research, analysis, and firsthand conversations with clients &amp; customers. Our multidisciplinary team brings research and strategy together, building user-friendly designs that engage and inspire.</p>\r\n<p><strong>The Role:</strong>&nbsp;</p>\r\n<p>The Senior Content Strategist we seek must be passionate about the process of transforming business goals and objectives into a plan that uses content as the primary means of achieving those goals. This person is a strategic thinker and someone who believes the entire customer journey is powered by engaging content that connects with its audience on a human level.&nbsp;</p>\r\n<p>This person enjoys the challenge of developing roadmaps for how content can support a brand and they are constantly studying and exploring new verticals and industries. They will use research, insights and creativity to develop strategy, messaging and content for the agency and a variety of our clients. This role sits within our growing Brand &amp; Marketing Strategy practice and will be critical to the mentoring of other members of the team.</p>\r\n<p><strong>The Requirements:</strong></p>\r\n<p>This person will bring empathy and inquisitiveness to bear with innovative approaches to work that spans brand positioning, marketing campaigns, product messaging, website development, social media, email, SEO, SEM and any new opportunities come our way.&nbsp;</p>\r\n<ul>\r\n<li>5+ years professional experience</li>\r\n<li>Agency experience is a must</li>\r\n<li>Ability to work within a collaborative environment to uncover insights and opportunities</li>\r\n<li>Comfortable working on multiple projects simultaneously - both as a collaborator and individual contributor</li>\r\n<li>Ability to create interpersonal relationships with both clients and the internal team</li>\r\n<li>Excellent in facilitating and managing client / stakeholder discussions</li>\r\n<li>Ability to conduct market/industry research and trend analysis</li>\r\n<li>Solid understanding of SEO/SEM protocols and procedures</li>\r\n<li>Deep experience in the creation of key content deliverables such as content audit, personas, content gap analysis, editorial calendar, content model, journey mapping, style guide, etc.&nbsp;</li>\r\n<li>Proven ability to work as an effective team member and ability to motivate others</li>\r\n<li>Exceptional presentation, communication, and organizational skills</li>\r\n<li>Problem solver and effective negotiator</li>\r\n</ul>\r\n<p><strong>The Responsibilities:</strong></p>\r\n<p><em>Research, Analysis &amp; Strategy - 60%</em></p>\r\n<ul>\r\n<li>Analyzing industry and market research</li>\r\n<li>Conducting stakeholder interviews and client workshops</li>\r\n<li>Creating actionable deliverables for clients and internal teams</li>\r\n<li>Building personas and documenting the customer journey&nbsp;</li>\r\n<li>Collaboratively generating ideas and providing feedback to team members across all disciplines including creative, UX, technology, etc.&nbsp;</li>\r\n<li>Building roadmaps that inform the client and teams of the content needed&nbsp;</li>\r\n<li>Performing content audits/analysis in order to inform project needs</li>\r\n<li>Working with the Executive Director of Brand &amp; Marketing Strategy to manage deliverables and timeline</li>\r\n<li>Keeping up-to-date on trends and education</li>\r\n</ul>\r\n<p><em>Agency Brand &amp; Content Strategy Support - 30%</em></p>\r\n<ul>\r\n<li>Supporting agency brand and marketing efforts by creating engaging content</li>\r\n<li>Leveraging SEO skills to create content that drives organic traffic for the agency and our clients</li>\r\n<li>Building standards and services for our content strategy practice&nbsp;</li>\r\n<li>Helping mentor team members on principles of content strategy</li>\r\n<li>Acting as an advocate for Content Strategy within the organization</li>\r\n</ul>\r\n<p><em>Client Management - 10%</em></p>\r\n<ul>\r\n<li>Acting as a trusted advisor to clients&nbsp;&nbsp;</li>\r\n</ul>\r\n<p>Launch is an equal opportunity employer. We celebrate diversity and are committed to creating an inclusive environment for all employees.</p>\r\n<p><strong>Reporting Structure</strong></p>\r\n<p>Reports to Shannon Delaney, Executive Director of Brand &amp; Marketing Strategy.&nbsp;</p>\r\n<p><em>Expected % of time spent traveling: 10%</em></p>\r\n<p>&nbsp;</p>',	1,	1,	2,	1,	7,	'2022-01-21 00:21:26',	'2021-06-15 16:00:32'),
(25,	'Senior Content Designer',	'full_time',	'office',	'Miami',	'FL',	NULL,	'https://www.domain.com',	'<p>People make Sage great. From our colleagues delivering ground-breaking solutions to the customers who use them: people have helped us grow for more than thirty years, and people are driving our future as a great SaaS company. We&rsquo;re writing our next chapter. Be part of it!</p>\r\n<p>Experience has taught us that when our customers thrive, we thrive. As a team, we always start with what customers need. Through the good&hellip; and more challenging times. Innovating at pace so customers can manage their finances, operations and people. Every one of us shapes our culture at Sage - doing what&rsquo;s right and succeeding together, united by our commitment to each other. We encourage each other to grow in our roles, in our careers and as individuals.</p>\r\n<p>Follow us on our social media sites below to join in conversations about career tips, open positions and company news! #lifeatsage #sagecareers. If you would like support with your application (or require any adjustments) please contact us at&nbsp;<a href=\"mailto:careers@sage.com\" target=\"_blank\" rel=\"nofollow noopener\">careers@sage.com</a>&nbsp;for assistance. All qualified applicants will be thoughtfully considered and never discriminated against based on their race, color, age, religion, sexual orientation, gender identity, national origin, disability or veteran status.</p>\r\n<p>Want to join a small content design team, dedicated to furthering our mission to use the right words, at the right time, in the right place?</p>\r\n<p>At Sage, Content Designers play a critical role in delivering compelling digital content for defined target audiences, supporting digital experiences, and providing help and product guidance. We engage across the XD community, product management, product marketing, engineering, customer support and learning teams.</p>\r\n<p>For this role, you will be working primarily within the Small Business segment, focusing on our cloud-native products.</p>\r\n<p>As a Senior Content Designer you will be working with a small team of other content designers, within a larger multi-disciplinary team across various locations. You will produce content across our cloud-native small business portfolio for our customers and Business Partners, as well as microcopy within the application. As these are global products, all content is translated and localised. Ideally you will be based in our Newcastle office.</p>\r\n<p>Content Designers combine language and authoring best practices with analysis and tools expertise.<strong>&nbsp;They:</strong></p>\r\n<ul>\r\n<li>Possess a combination of UX writing and technical writing skills, and an understanding of user-centered design.</li>\r\n<li>Guide the user to success, helping to design solutions that are easy to learn, and efficient to use, meeting the exact needs of the user with simplicity and elegance.</li>\r\n<li>Understand globalization and localization, crafting engaging and culturally-relevant copy that shape the local experiences of our mobile, web, and desktop solutions.</li>\r\n<li>Are inspired by user engagement and immersed in user context and the problem domain.</li>\r\n<li>Deliver just the right amount of intelligent content in context&mdash;providing users with the information they need when they need it, on the platform and device of their choosing.</li>\r\n<li>Have a broad range of experience with authoring tools for digital content experiences, and advanced knowledge of reuse and single-sourcing strategies.</li>\r\n</ul>\r\n<p><strong>Responsibilities</strong></p>\r\n<ul>\r\n<li>Craft micro-copy and compelling user-centered content for Sage solutions.</li>\r\n<li>Provide accessible assistance in- app and online, guiding first-time and expert users to success.</li>\r\n<li>Define the content strategy, information model, and delivery channels and outputs for the product.</li>\r\n<li>Develop templates, process, and style guidelines.</li>\r\n<li>Develop search strategies and optimization.</li>\r\n<li>Measure content effectiveness and iterate based on data.</li>\r\n<li>Support the coaching, mentoring, and training of juniors.</li>\r\n<li>Plan and lead larger projects with phased delivery, designing scalable solutions.</li>\r\n</ul>',	2,	1,	2,	2,	9,	'2022-01-19 17:10:58',	'2021-06-15 17:11:42'),
(26,	'German Content Marketing Specialist',	'contract',	'office',	'Coastal',	'AL',	NULL,	'https://www.domain.com',	'<p>Printful helps artists and entrepreneurs transform their ideas into thriving ecommerce businesses. With 300K+ customers using our services, we&rsquo;re one of the world&rsquo;s leading printing, warehousing, and fulfillment companies.</p>\r\n<p>Since opening in 2013, we&rsquo;ve been trusted to print 30M+ items and have grown into a team of 1,800+ employees worldwide. After seeing explosive growth in 2020, we&rsquo;re proud to have become the first privately owned company with Latvian roots&nbsp;<a href=\"https://www.printful.com/news/printful-valued-at-1-billion-and-raises-130-million-from-investors\" target=\"_blank\" rel=\"nofollow noopener\">to achieve unicorn status</a>&nbsp;(valued at over $1 billion).</p>\r\n<p>We want to make sure Printful speaks to everyone. Using services in your native language is easy, convenient, and personal. The main goal of our International Content Marketing Team is to help Printful be all three.&nbsp;</p>\r\n<p>We\'re looking for a&nbsp;<strong>German Content Marketing Specialist</strong>&nbsp;to join our team of content creators. We want to make sure our German-speaking customers have a pleasant experience with Printful. You\'ll have to find the right words to tell them how we can help grow their business and turn their ideas into reality.</p>\r\n<h3>Your daily tasks will entail:&nbsp;</h3>\r\n<ul>\r\n<li>following the most recent news and developments in the world of marketing, especially German-speaking markets</li>\r\n<li>creating and promoting content in German: blog posts, emails, social media posts, etc.</li>\r\n<li>coming up with new content ideas and putting them into action</li>\r\n<li>starting and maintaining discussions in forums and comment sections of posts</li>\r\n<li>localizing existing Printful content for the German-speaking audience</li>\r\n<li>proofreading, editing, and repurposing existing German content&nbsp;</li>\r\n</ul>\r\n<h3>What we expect from you:&nbsp;</h3>\r\n<ul>\r\n<li>excellent German skills and strong English skills</li>\r\n<li>a genuine interest in blogs</li>\r\n<li>a way with words, an ear for language</li>\r\n<li>experience writing different types of text</li>\r\n<li>a desire and readiness to learn</li>\r\n</ul>\r\n<h3>We offer:&nbsp;</h3>\r\n<ul>\r\n<li>monthly salary 1,200&ndash;2,000 EUR gross, depending on work experience, education, and other skills</li>\r\n<li>flexible working hours (start your day as late as 11 a.m.)</li>\r\n<li>opportunity to work remotely</li>\r\n<li>health insurance</li>\r\n<li>room for professional growth (conferences, books, workshops, mentoring, and coaching sessions)</li>\r\n<li>partially paid gym membership</li>\r\n<li>a day off on your birthday</li>\r\n<li>employee discounts</li>\r\n<li>other Printful employee benefits</li>\r\n</ul>\r\n<p>Printful is an&nbsp;<strong>equal opportunity workplace</strong>. We&rsquo;re committed to diversity and inclusion in the workplace, and make our hiring decisions based solely on qualifications, merit, and work experience.</p>\r\n<p>If you think you&rsquo;d excel in this role,&nbsp;<strong>send us your resume and a cover letter in English and German</strong>, showing why you&rsquo;re the right person for the job!</p>\r\n<p>Interested, but don&rsquo;t think this is the right fit for you? Feel free to share it with friends and check out other&nbsp;<a href=\"https://www.printful.com/jobs\" target=\"_blank\" rel=\"nofollow noopener\">open positions at Printful</a>. We&rsquo;re always looking for creative and driven minds to join our ever-growing team!</p>\r\n<p>AS Printful Latvia (Registration No. 40203050078)</p>',	1,	NULL,	2,	5,	10,	'2021-06-15 17:14:02',	'2021-06-15 17:14:35'),
(34,	'Senior Content Designer',	'full_time',	'office',	'Los Angels',	'CA',	NULL,	'https://www.company.com/careers/apply',	'<p>Syntellis Performance Solutions, previously Kaufman Hall Software, provides innovative enterprise performance management software, data and analytics solutions for healthcare, higher education and financial institutions. Syntellis&rsquo; solutions include Axiom and Connected Analytics software, which help finance professionals elevate performance by acquiring insights, accelerating decisions and advancing their business plans. With over 2,800 organizations and 450,000 users relying on our solutions, we have proven industry expertise in helping organizations transform their vision into reality. For more information, please visit</p>',	1,	NULL,	2,	1,	19,	'2021-09-23 21:55:35',	'2021-09-23 21:56:06'),
(35,	'Content Editor (Medical)',	'part_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'https://www.company.com/careers/apply',	'<p>Kaia is a mission-focused health technology company.</p>\r\n<p>Our story began in 2016, when our founders, Konstantin Mehl and Manuel Thurner, created a mission to bring affordable and accessible relief to millions of people with chronic conditions.&nbsp;No strangers to chronic pain themselves, they decided to innovate ways to remove the obstacles many people experience in getting the leading-edge care they need.</p>',	1,	NULL,	2,	1,	7,	'2021-09-24 18:48:19',	'2021-09-24 18:48:42'),
(36,	'Content Marketing Manager',	'full_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'https://www.company.com/careers/apply',	'<p class=\"job-title\">We&rsquo;re looking for an SEO Content Writer who is able and excited to help us continue to grow traffic to the Peel website &amp; blog. As a historical optimization writer, your efforts will have a direct impact on our organic traffic goals. You don&rsquo;t need to have a background in data software and analytics,</p>',	1,	NULL,	2,	1,	7,	'2021-09-24 18:50:58',	'2021-09-24 18:51:32'),
(37,	'Content Strategy',	'full_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'https://www.pickolab.co/applyjob',	'<p>Hiring Designer</p>',	0,	NULL,	1,	1,	20,	'2021-10-20 04:42:14',	'2021-10-20 04:42:14'),
(38,	'Developer',	'full_time',	'remote_region',	'',	NULL,	'Lazio',	'https://cribmed.com/',	'<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description&nbsp;</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description&nbsp;</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description&nbsp;</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description&nbsp;</p>',	1,	NULL,	1,	1,	21,	'2021-01-19 07:38:05',	'2021-12-22 07:38:05'),
(39,	'Developer',	'full_time',	'remote_region',	'',	NULL,	'Lazio',	'https://cribmed.com/',	'<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description&nbsp;</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description&nbsp;</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description&nbsp;</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description&nbsp;</p>',	0,	NULL,	1,	1,	21,	'2021-12-22 07:40:10',	'2021-12-22 07:40:10'),
(40,	'Test',	'part_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'http://phplaravel-612123-1984208.cloudwaysapps.com/index.php/post-a-job',	'<p>Testing please ignore.</p>',	0,	NULL,	1,	1,	22,	'2021-12-23 19:43:30',	'2021-12-23 19:43:30'),
(41,	'Fullstack Developer',	'part_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'http://phplaravel-612123-1984208.cloudwaysapps.com/index.php/post-a-job',	'<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description.</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description</p>\r\n<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description</p>',	0,	NULL,	2,	6,	22,	'2021-12-30 22:34:28',	'2021-12-30 22:41:48'),
(42,	'Fullstack Developer',	'part_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'http://phplaravel-612123-1984208.cloudwaysapps.com/index.php/post-a-job',	'<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description.</p>',	0,	NULL,	2,	1,	22,	'2022-01-02 07:10:49',	'2022-01-02 07:19:48'),
(43,	'Content Writer',	'part_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'https://fonts.google.com/specimen/Urbanist',	'<p>asdasd</p>',	0,	NULL,	1,	2,	23,	'2022-01-03 09:35:11',	'2022-01-03 09:35:11'),
(44,	'Fullstack Developer',	'full_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'http://phplaravel-612123-1984208.cloudwaysapps.com/index.php/post-a-job',	'<p>Well formatted and easy to read job descriptions will drive more applicants. If you\'re pasting from another system, please check the formatting of your job description</p>',	0,	NULL,	2,	1,	22,	'2022-01-03 19:06:46',	'2022-01-03 19:07:34'),
(45,	'Fullstack Developer',	'part_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'http://phplaravel-612123-1984208.cloudwaysapps.com/index.php/post-a-job',	'<p>Well formatted and easy to read j</p>',	0,	NULL,	2,	2,	22,	'2022-01-04 18:55:51',	'2022-01-04 18:56:13'),
(47,	'Full stack Laravel engineer',	'part_time',	'remote_anywhere',	NULL,	NULL,	NULL,	'https://jobfinder.com/career',	'<p>ssssssssssaaaaaaaaaaaaaaa</p>',	1,	NULL,	2,	2,	25,	'2022-01-20 23:14:09',	'2022-01-20 23:14:59');

DROP TABLE IF EXISTS `job_payment_logs`;
CREATE TABLE `job_payment_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `job_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_payment_logs_job_id_foreign` (`job_id`),
  CONSTRAINT `job_payment_logs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `job_payment_logs` (`id`, `currency`, `price`, `payment_id`, `status`, `job_id`, `created_at`, `updated_at`) VALUES
(6,	'usd',	'39600',	'pi_1J2egNCuvL5maNGuxcWbHV3D',	1,	23,	'2021-06-15 16:00:07',	'2021-06-15 16:00:32'),
(7,	'usd',	'39600',	'pi_1J2fnACuvL5maNGuOkFL0k5F',	1,	25,	'2021-06-15 17:11:12',	'2021-06-15 17:11:42'),
(8,	'usd',	'39600',	'pi_1J2fpyCuvL5maNGuOGBk8eu2',	1,	26,	'2021-06-15 17:14:06',	'2021-06-15 17:14:35'),
(14,	'usd',	'39600',	'pi_3JcztOCuvL5maNGu0n2dDOhE',	1,	34,	'2021-09-23 21:55:45',	'2021-09-23 21:56:06'),
(15,	'usd',	'39600',	'pi_3JdJRdCuvL5maNGu0bvX1MJv',	1,	35,	'2021-09-24 18:48:24',	'2021-09-24 18:48:42'),
(16,	'usd',	'39600',	'pi_3JdJUQCuvL5maNGu0sM9TJl4',	1,	36,	'2021-09-24 18:51:16',	'2021-09-24 18:51:32'),
(17,	'usd',	'29900',	'pi_3JmaRVCuvL5maNGu0c9bWg3V',	0,	37,	'2021-10-20 06:09:53',	'2021-10-20 08:46:38'),
(18,	'usd',	'29900',	'pi_3K9xDuCuvL5maNGu07J55pRj',	0,	40,	'2021-12-23 19:45:10',	'2021-12-23 19:45:10'),
(19,	'usd',	'29900',	'pi_3KCXDGCuvL5maNGu18XTm2D0',	1,	41,	'2021-12-30 22:35:10',	'2021-12-30 22:41:48'),
(20,	'usd',	'29900',	'pi_3KDOKICuvL5maNGu0BClQ3Ej',	1,	42,	'2022-01-02 07:17:58',	'2022-01-02 07:19:48'),
(21,	'usd',	'29900',	'pi_3KDmwjCuvL5maNGu0MPuI1CO',	0,	43,	'2022-01-03 09:35:17',	'2022-01-03 09:35:17'),
(22,	'usd',	'29900',	'pi_3KDvrzCuvL5maNGu1RGggqho',	1,	44,	'2022-01-03 19:06:59',	'2022-01-03 19:07:34'),
(23,	'usd',	'29900',	'pi_3KEIArCuvL5maNGu09L4xBtI',	1,	45,	'2022-01-04 18:55:57',	'2022-01-04 18:56:13'),
(25,	'usd',	'1000',	'pi_3KK9pbCuvL5maNGu0nMirVTw',	1,	47,	'2022-01-20 23:14:15',	'2022-01-20 23:14:59');

DROP TABLE IF EXISTS `job_salary`;
CREATE TABLE `job_salary` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `currency_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `range_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `range_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_salary_job_id_foreign` (`job_id`),
  CONSTRAINT `job_salary_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `job_salary` (`id`, `currency_type`, `range_from`, `range_to`, `rate`, `job_id`, `created_at`, `updated_at`) VALUES
(7,	'USD',	'20000',	'50000',	'annual',	23,	'2021-06-15 15:59:46',	'2021-06-15 15:59:46'),
(9,	'USD',	'20000',	'50000',	'annual',	25,	'2021-06-15 17:10:58',	'2021-06-15 17:10:58'),
(10,	'USD',	'10000',	'30000',	'annual',	26,	'2021-06-15 17:14:02',	'2021-06-15 17:14:02'),
(17,	'USD',	'10000',	'100000',	'annual',	34,	'2021-09-23 21:55:35',	'2021-09-23 21:55:35'),
(18,	'USD',	'10000',	'30000',	'annual',	35,	'2021-09-24 18:48:19',	'2021-09-24 18:48:19'),
(19,	'USD',	'10000',	'50000',	'annual',	36,	'2021-09-24 18:50:58',	'2021-09-24 18:50:58'),
(20,	'USD',	'200',	'300',	'annual',	37,	'2021-10-20 04:42:14',	'2021-10-20 04:42:14'),
(21,	'USD',	'1000',	'100000',	'annual',	40,	'2021-12-23 19:43:30',	'2021-12-23 19:43:30'),
(22,	'USD',	'1000',	'100000',	'annual',	41,	'2021-12-30 22:34:28',	'2021-12-30 22:34:28'),
(23,	'USD',	'1000',	'100000',	'annual',	42,	'2022-01-02 07:10:49',	'2022-01-02 07:10:49'),
(24,	'USD',	'1000',	'2000',	'annual',	43,	'2022-01-03 09:35:11',	'2022-01-03 09:35:11'),
(25,	'USD',	'1000',	'100000',	'annual',	44,	'2022-01-03 19:06:46',	'2022-01-03 19:06:46'),
(26,	'USD',	'1000',	'100000',	'annual',	45,	'2022-01-04 18:55:51',	'2022-01-04 18:55:51'),
(28,	'USD',	'2000',	'3000',	'annual',	47,	'2022-01-20 23:14:09',	'2022-01-20 23:14:09');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2021_05_24_151438_create_company_table',	1),
(5,	'2021_05_24_151853_create_category__table',	1),
(6,	'2021_05_24_151923_create_jobs_table',	1),
(7,	'2021_05_24_155102_create_job_salary_table',	1),
(8,	'2021_06_08_164337_create_job_payment_logs_table',	2);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'reference user id',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'subscriber email',
  `frequency` int(11) NOT NULL COMMENT 'decide if it is daily or weekly notification',
  `created_at` timestamp NULL DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `tocken` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'check if subscription is valid or not',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `subscriptions` (`id`, `user_id`, `email`, `frequency`, `created_at`, `verified_at`, `tocken`, `active`, `updated_at`) VALUES
(2,	NULL,	'vince@metaphix.com',	1,	'2022-01-14 21:11:52',	'2022-01-21 01:08:33',	'vince@metaphix.com',	1,	'2022-01-14 21:11:52'),
(3,	NULL,	'wangjian72223@gmail.com',	1,	'2022-01-13 09:12:25',	'2022-01-21 00:26:36',	'wangjian72223@gmail.com',	1,	'2022-01-21 00:26:36'),
(6,	NULL,	'gotodev7@gmail.com',	1,	'2022-01-21 02:29:39',	'2022-01-21 02:29:54',	'$2y$10$GSw5ebx94y9EIxOC9XPRJezQYSFY08YX0v0MFxEhIIldj2Jdzyo2y',	1,	'2022-01-21 02:29:54'),
(7,	NULL,	'toddschram411@gmail.com',	1,	'2022-01-21 02:50:53',	NULL,	'$2y$10$MWlgqGKetB.Z5okvfp7wEePgvWRlBOVqGZnHHjTMJYWPozd0M0MuC',	1,	'2022-01-21 02:50:53');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Hassan Mehmood',	'admin@admin.com',	'2021-06-22 20:45:52',	'$2y$10$jXXMjKF1sV5dBfKUIsqvyO6KkpHc0oByyR5ta2tLtaTEPiJ4/l44i',	'Q0BqY58yzOkobuhgWZAsTM6MUzOgOM69V7MH7k66gjNmDjHruoIIoXoeEely',	NULL,	NULL);

-- 2022-02-09 06:12:08
