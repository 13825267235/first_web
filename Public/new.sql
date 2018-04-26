-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: new
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demo` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL COMMENT '姓名',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别，其中0为男，1为女',
  `job` char(10) DEFAULT NULL COMMENT '岗位',
  `join_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '入职时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demo`
--

LOCK TABLES `demo` WRITE;
/*!40000 ALTER TABLE `demo` DISABLE KEYS */;
/*!40000 ALTER TABLE `demo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_name` char(38) NOT NULL,
  `type_id` int(6) DEFAULT '0',
  `goods_price` float NOT NULL,
  `goods_picture` varchar(1000) DEFAULT NULL,
  `goods_attr` varchar(100) DEFAULT NULL,
  `goods_detail` text,
  `goods_brand` char(28) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_name_index` (`goods_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (6,'拍照手机',3,1999,'/images/2018-03-16/5aabd30bf13f9.jpg','128G、星耀红','拍照更清晰',NULL,NULL),(7,'真的无法添加新的信息么',1,333,'/images/2018-03-17/5aaca8602f34a.jpg','虚拟商品','测试测试',NULL,NULL),(8,'测试对多字段的排序',3,666,'/images/2018-03-17/5aaccd6e8516b.jpg','黑色','测试对多字段的排序测试对多字段的排序测试对多字段的排序测试对多字段的排序测试对多字段的排序测试对多字段的排序测试对多字段的排序',NULL,NULL),(9,'测试缓存',0,27777,'/images/2018-03-17/5aacdddf92abd.jpg','耐磨耐用','测试缓存测试缓存测试缓存测试缓存测试缓存测试缓存测试缓存',NULL,NULL),(10,'不能被插入的',0,3322,'','','不能被插入的不能被插入的',NULL,NULL),(11,'测试自动验证',0,3888,NULL,'大数据、人工智能','测试数据的自动验证、测试数据的自动完成',NULL,1521360374),(12,'自动验证以及自动完成已成功实现',0,2345,NULL,'AI、AR','成功实现创建数据对象的时候对数据的自动验证以及自动完成',NULL,1521360783);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_type`
--

DROP TABLE IF EXISTS `goods_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_type` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `type_name` char(30) NOT NULL,
  `pid` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_type`
--

LOCK TABLES `goods_type` WRITE;
/*!40000 ALTER TABLE `goods_type` DISABLE KEYS */;
INSERT INTO `goods_type` VALUES (1,'电脑数码',0),(2,'服装',0),(3,'笔记本',1),(4,'男装',2),(5,'超极本',3),(6,'游戏本',3),(7,'女装',2),(8,'照相机',1),(9,'儿童游戏机',6),(10,'背心',4),(11,'早教机',9),(12,'点读机',9),(13,'童装',2),(14,'音响',1),(15,'我的\'笔记本',0),(16,'I\'m fine',0);
/*!40000 ALTER TABLE `goods_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` char(28) NOT NULL,
  `source` char(18) NOT NULL,
  `type` char(10) NOT NULL,
  `cover` varchar(58) DEFAULT NULL,
  `content` text NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (5,'英语会话一本通之前言','小林子','1','','<p>&nbsp; 英语口语是一门相对较难掌握的技能，很多人都可能在英语考试中取得非常优秀的成绩，但却很难说出一口流利的英语。这是因为，要想说出一口流利的英语需要长期的训练和扎实的英语基础，更重要的是要有长期坚持不懈的实战训练，也就是必须经常说，在说的过程中犯错，在犯错的过程中纠正、提高，在提高的过程中逐渐变得流利自如。\r\n &nbsp; 在完全掌握英语口语后，你自然可以在特定的场合马上说出最适合的表达，这需要长期的积累、迅捷的反应。在没有练成出口成章的口语境界之前，大部分人都需要一些实例指导，让自己明白在什么场合说什么话、怎么说。\r\n &nbsp; 使用方法：\r\n第一种是背，从第一章开始，背诵每个相似例句，每段对话实例，完全熟读、背诵这些例句，让你在任何场合都不会找不到合适的表达方法。\r\n第二种是查，每次遇到相似情况时可以根据目录所列出的条目查询相关的表达法和相似例句、对话实例，让你随时参考，有求必应</p>',1510974063),(12,'第一章：史前时代','京东阅读','5','','<p>&nbsp; &nbsp;所谓史前历史，是指有确切文字记载以前的人类历史。我国的史前历史可以追溯到旧石器时代初期。\r\n &nbsp; &nbsp; 旧石器时代：\r\n &nbsp; &nbsp; &nbsp;北京人已经有了人的性质。北京人已会制造石器，考古学上称使用这种原始石器的时代为旧石器时代，北京人为旧石器时代的初期阶段。北京人已会使用火，火不仅能取暖，还能驱赶野兽，制成熟食。\r\n &nbsp; &nbsp;旧石器时代长达上百万年，人类使用的生产工具以打制石器为主，加工比较粗糙。\r\n &nbsp; &nbsp; 新石器时代：\r\n &nbsp;</p>',1510974054),(13,'第二章：夏与商','摘自《中国史纲要》','5','','<p>&nbsp; &nbsp;约在公元前21世纪左右，是中国历史上夏王朝的开始。\r\n &nbsp; &nbsp;夏禹传子，不再禅让，是“天下为家”的开始。从此以后，“大人世及以为礼“，就是说，父子、兄弟相传变成为制度了。\r\n &nbsp; &nbsp; 王位世袭制的确立，是一项中的历史变革。大同之世的特点就是”天下为公“，而小康之世是”天下为家“。贡赋的产生，是出现国家的一个重要标记。\r\n &nbsp; &nbsp;</p>',1510974048),(14,'英语口语之表达自我篇','摘自《英语会话通》','1','','<p>&nbsp; I&#39;m glad:我很高兴，I&#39;m happy:我很快乐，So am I(我也是）,I feel great:我感觉很棒，I feel excited:我很激动\r\n &nbsp; wonderful：极好的，令人愉悦的；\r\n &nbsp; Nothing could be more wonderful:妙极了,\r\n &nbsp; I couldn&#39;t agree more:我完全同意，\r\n &nbsp; It couldn&#39;t be better:这最好不过了。\r\n &nbsp; &nbsp;How wonderful!：好极了，\r\n &nbsp; I&#39;m delighted that you come to the party.：很高兴你能来参加派对\r\n &nbsp; I&#39;m very pleased!；我很满意\r\n &nbsp; I&#39;m pleased with what you told me.：我对你告诉我的事情很满意\r\n &nbsp; How nice!：太好了\r\n &nbsp; It&#39;s great to know that!：知道这消息真是太好了\r\n &nbsp;</p>',1510974039),(15,'百度编辑器重见天日','小林子','4','','<p>中国梦</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;辉煌中国</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你我共筑<br/></p><p style=\"text-align: center;\">&nbsp; &nbsp;没有什么能够难倒我</p><p><br/></p><p style=\"text-align: center;\"><strong>&nbsp;<span style=\"font-size: 24px;\"> 百度编辑器的js调用代码需写在jQuery内</span></strong></p><p><img src=\"/ueditor/php/upload/image/20171012/1507817409125958.jpg\" title=\"1507817409125958.jpg\"/></p><p><br/></p><p><img src=\"/ueditor/php/upload/image/20171012/1507817410490002.jpg\" title=\"1507817410490002.jpg\"/></p><p style=\"text-align: center;\"><br/></p>',1510974032),(16,'数据库系统概述','摘自《数据库本科教材》','6','','<p style=\"text-align: left;\">&nbsp; 数据处理是当前计算机的主要应用之一，数据库技术作为一门数据处理技术发展起来的。所研究的问题就是如何科学的组织和存储数据，如何高效的获取和处理数据。<br/></p><p style=\"text-align: left;\">&nbsp; 对信息的记录称之为数据。数据（Data）就是对客观事实的记录。它是可以鉴别的符号，这种符号可以是数字、文字、图形、图像、声音等多种表现形式。数据的形式越来越复杂。数据和其语义是不可分的，所谓数据的语义就是指对数据的解释，数据不是一个孤立的符号，伴随着数据的出现必须有对该数据含义的说明，也就是说，数据是要有语义的。</p><p style=\"text-align: left;\">&nbsp; 数据和信息的关系：数据与信息不同，数据是指用符号记录下来的可区别的一种事物的特征或事实，信息是反映现实世界的知识。信息以数据的形式展示，即数据是信息的载体；信息是抽象的，而数据是具体的，信息不随数据设备所决定的数据形式而改变，信息是经过对数据的加工，对客观世界产生影响的数据，信息是对数据的解释。而数据的表示方式可以是不同的，数据是对客观事实的记录，也是对信息的一种描述。</p><p style=\"text-align: left;\">&nbsp; 数据处理是指将数据向信息转换的过程，它包括对数据的收集、存储、传播、检索、分类、加工和输出等活动。</p><p style=\"text-align: left;\">&nbsp; 数据库管理系统（Database Management System,DBMS）是位于用户与操作系统之间的一款数据处理软件，为用户或应用程序提供访问数据库的方法，是用来管理数据库的计算</p><p style=\"text-align: left;\">机软件，可以让用户很方便的对数据库进行维护、排序、检索和统计等操作。数据库管理系统的主要目标就是使数据成为方便用户使用的资源，易于为各类用户所共享，他建立在操作系统的基础之上，对数据库进行统一的管理和控制。</p><p style=\"text-align: left;\">&nbsp; 数据库管理系统是用户与数据库的接口，应用程序只有通过数据库管理系统才能与数据库打交道。数据库管理系统的基本功能有：定义数据、组织和管理数据、数据库运行管理、数据库创建和维护等。</p><p style=\"text-align: left;\">&nbsp; 数据库系统与文件系统的主要区别在于：文件系统是操作系统的重要组成部分，而数据库管理系统是独立于操作系统、在操作系统之上实现的软件，数据库中数据的组织和存储是通过操作系统中的文件系统来实现的；文件系统中的文件是为某一特定应用服务的，文件的逻辑结构对该应用程序来说是优化的，但要想对现有的数据再增加一些应用会很困难，系统不容易扩充，而数据库系统面向现实世界，它共享性高、冗余度小、易扩充，具有较高的物理独立性和一定的逻辑独立性，整体数据结构化，用数据模型来描述，由数据库管理系统提供数据的安全性、完整性、并发控制能力和数据恢复能力。</p><p style=\"text-align: left;\">&nbsp; 使用数据库系统可以大大提高应用开发的效率。因为在数据库系统中，应用程序不必考虑数据的定义、存储和数据存取的具体路径，这些工作都由数据库管理系统来完成。</p><p style=\"text-align: left;\">&nbsp; 使用数据库系统可以减少开发人员的工作量。当因应用逻辑发生改变而需要改变数据的逻辑结构时，由于数据库系统提供了数据与程序之间的独立性，数据逻辑结构改变时开发人员不必修改应用程序，或者只需要很少的应用程序，从而既简化了应用程序的编制，又减少了应用程序的维护和修改。</p><p style=\"text-align: left;\">&nbsp; 使用数据库系统可以减轻数据库系统管理人员维护系统的负担。因为数据库管理系统在数据库的建立、运行和维护时对数据库系统进行统一的管理和控制，包括数据的完整性、安全性、多用户并发控制、故障恢复等。</p><p style=\"text-align: left;\">&nbsp; 使用数据库系统既便于数据的集中管理，控制数据冗余，提高数据的利用率和一致性，有有利于应用程序的开发和维护。</p><p style=\"text-align: left;\">&nbsp; 数据模型是数据库的核心概念。数据库中用数据模型来抽象、描述和处理现实世界的数据。数据库模型分为概念模型和结构模型。</p><p style=\"text-align: left;\">&nbsp; 数据结构模型的好坏直接影响数据库的性能，因此，设计数据库的一项的首要任务是选择数据的结构模型。</p><p style=\"text-align: left;\">&nbsp; 层次模型的主要有点是：层次模型的数据结构比较简单清晰，因此其查询效率高，层次数据模型提供了良好的完整性支持。</p><p style=\"text-align: left;\">&nbsp;&nbsp;</p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\">&nbsp;&nbsp;</p>',1510974020),(17,'CSS知识点','摘自《CSS和HTML》','7','','<p>&nbsp; 绝对定位元素的定位相对于最近的已定位祖先元素，如果没有，则相对于根元素。</p><p>&nbsp; 设计立体样式的技巧就是借助边框样式的变化（主要是颜色深浅的变化）来模拟一种凸凹变化的过程，即营造一种立体变化效果。使用CSS设计立体变化效果有如下三种方式：</p><p>&nbsp;1.利用边框线的颜色变化来制造视觉错觉。可以把右边框和底部边框结合，把左边框和上边框结合，利用明暗色彩的搭配来设计立体变化效果；</p><p>&nbsp;2.利用超链接背景色的变化来营造凸凹变化的效果。超链接的背景色可以设置相对深色效果，以营造突起效果，当鼠标经过时再设定浅色背景以营造凹下效果。</p><p>&nbsp;3.利用环境色、字体颜色来烘托这种立体变化效果。</p><p>&nbsp;&nbsp;</p><p>&nbsp;&nbsp;</p>',1510974006),(18,'网页排版和DIV+CSS布局','摘自名作','7','','<p><span style=\"font-size: 20px;\">&nbsp; 网页排版和DIV+CSS布局与设置样式是两个不同的思维过程，网页布局更多的是关注整个页面的呈现效果，而CSS样式更多的是实现各种具体效果。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 1.盒模型</span></p><p><span style=\"font-size: 20px;\">&nbsp; 盒模型是学习CSS网页布局的基础。盒模型是CSS布局最基本的组成部分，用于指定页面元素如何显示以及在某种方式上如何交互。页面上的每个元素都是以矩形的表现形式存在的，每个矩形都是由元素的内容、内边距（padding）、边框（border）和外边距（margin）组成的。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 一个元素的盒模型有多大，该元素在页面中所占用的空间就会有多大。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 内边距（padding）出现在内容区域的周围。如果给某元素加上背景色或者背景图片，那么该元素的背景色或者背景图片也将出现在内边距（padding）之中。为了避免视觉上的混淆，可以利用边框（border）和外边距（margin）在该元素的周围创建一条隔离带，避免该元素的背景色或者背景图片与其他元素混淆。这就是内边距（padding）、边框（border）和外边距（margin）这3个属性出现在内容周围，产生一个盒模型的基本作用。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 盒模型是CSS的基础，也是网页布局的根基。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 2.外边距</span></p><p><span style=\"font-size: 20px;\">&nbsp; 外边距如同页边距，是元素边框外边沿与相邻元素之间的距离，主要用来分割各种元素，设置元素之间的距离。没有设置外边距的网页，所有网页对象都被堆放在一起，无法进行布局。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 定义外边距可以使用margin属性，该属性可以取负值，正因为如此，你可以使用负值来设计各种复杂的网页布局。</span></p><p><span style=\"font-size: 20px;\">&nbsp; margin属性默认值为0。如果你没有定义元素的外边距属性，则浏览器会认为元素的外边距为0，或者说不存在外边距。换句话说，元素可以与其他元素零距离接触。网页正式借助外边距来调节网页布局的疏密和对齐。当然，这不是唯一的方法。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 当为行内元素定义外边距时，读者只能看到左右外边距对于版式的影响，但是上下外边距犹如不存在一般，不会对周围的元素产生影响。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 3.内边距</span></p><p><span style=\"font-size: 20px;\">&nbsp; 内边距就是元素所包含的内容与该元素边框内边沿之间的距离。盒模型内边距的主要功能就是用来调整元素所包含的内容在元素中的显示位置。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 4.边框</span></p><p><span style=\"font-size: 20px;\">&nbsp; 任何元素都可以定义边框，并都能很好的显示出来。边框在网页布局中的作用就是分隔模块。</span></p><p><span style=\"font-size: 20px;\">&nbsp;&nbsp;</span></p><p><span style=\"font-size: 20px;\">&nbsp;&nbsp;</span></p>',1510968834),(19,'吃对食物，美出新高度','摘自美国新研究观点','8','','<p>&nbsp; 1.蔬菜水果乃王道</p><p>&nbsp; 2.少吃肉类（尤其是红肉，最好只在晚餐的时候吃一点点，每周只吃两三次）</p><p>&nbsp; 3.尽量不要吃乳制品（包括脱脂奶、奶酪）</p><p>&nbsp; 4.少吃豆类</p><p>&nbsp; 5.坚果类（如花生，要控制在每天不超过90克的食用量），尤其是花生要尽量少吃；</p><p>&nbsp; &nbsp;坚果吃之前要先浸泡后再烹饪（有利于人体吸收营养），最好生吃</p><p><br/></p>',1510968824),(20,'关系数据库理论','摘自本科教材','6','','<p><span style=\"font-size: 20px;\">&nbsp; 关系型数据库是目前最常用的数据库。所谓关系型数据库，指的就是利用了关系模型的数据库管理系统，关系模型是建立在严格的数学概念的基础上的。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 关系模型是建立在集合代数的基础上的。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 1.基本概念</span></p><p><span style=\"font-size: 20px;\">&nbsp; 1.1 域（domain）</span></p><p><span style=\"font-size: 20px;\">&nbsp; 域是一组具有相同数据类型的值的集合。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 1.2 笛卡儿积</span></p><p><span style=\"font-size: 20px;\">&nbsp; 笛卡儿积可表示为一个二维表。表中的每行对应一个元组（tuple），表中的每列对应一个域（domain）。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 1.3 关系（relation）</span></p><p><span style=\"font-size: 20px;\">&nbsp; 关系是笛卡儿积的有限子集，所以关系也是一个二维表，表中行被称为元组（tuple）或记录（record），列称为属性（attribute）或字段（field），表的第一行是字段名的集合，被称为关系框架（或表结构），列中的元素为该字段（属性）的值，且值总限定在某个值域（domain）内。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 关系是元组的集合。关系的基本数据结构是二维表。每一张表称为一个具体的关系或简称为关系。二维表的表头也称为关系的型，二维表中的值（元组）也称为关系的值。</span></p><p><span style=\"font-size: 20px;\">&nbsp; 1.4 关系的性质</span></p><p><span style=\"font-size: 20px;\">&nbsp; 关系应具备一下6个性质：</span></p><p><span style=\"font-size: 20px;\">&nbsp; （1)列的同质性。即每一列中的分量是同一类型的数据，来自同一个域。</span></p><p><span style=\"font-size: 20px;\">&nbsp; （2）列名唯一性。不同的列可出自同一个域，称其中的每一列为一个属性，不同的属性要给予不同的属性名。</span></p><p><span style=\"font-size: 20px;\">&nbsp; （3）列序无关性。即列的顺序无所谓，可以任意交换。</span></p><p><span style=\"font-size: 20px;\">&nbsp; （4）元组相异性。即任意两个元组不能完全相同。</span></p><p><span style=\"font-size: 20px;\">&nbsp; （5）行序无关性。即行的顺序无所谓，可以任意交换。</span></p><p><span style=\"font-size: 20px;\">&nbsp; （6）分量原子性。即分量值是原子的，每一个分量都必须是不可分的数据项。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">&nbsp;2.关系可以有3种类型：基本关系（通常又称为基本表或基表）、查询表和视图表。</span></p><p><span style=\"font-size: 20px;\">&nbsp; （1）基本表是实际存在的表，它是实际存储数据的逻辑表示。</span></p><p><span style=\"font-size: 20px;\">&nbsp; （2）查询表是查询结果对应的表。</span></p><p><span style=\"font-size: 20px;\">&nbsp; （3）视图表是由基本表或其它视图表导出的表，是虚表，不对应实际存储的数据。</span></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><br/></p><p><span style=\"font-size: 20px;\">&nbsp;&nbsp;</span></p>',1510968805),(21,'设计模式','京东阅读','9',NULL,'<p>&nbsp; 设计模式（design pattern）是一套被反复使用、多数人知晓的、经过分类编目的、代码设计经验的总结。使用设计模式是为了可重用代码、让代码更容易被他人理解、保证代码可靠性。设计模式是软件开发人员在软件开发过程中面临的一般问题的解决方案。</p><p>&nbsp; 设计模式一般遵循一下6个原则：</p><p>&nbsp; 1.开闭原则（Open Close Principle）：</p><p>&nbsp; 开闭原则的意思是：对扩展开放，对修改关闭。在程序需要进行拓展的时候，不能去修改原有的代码，实现一个热插拔的效果。简言之，是为了程序的扩展性好，易于维护和升级。想要达到这样的效果，我们需要使用接口和抽象类。</p><p>&nbsp; 2.里氏代换原则（Liskov Substitution Principle）：</p><p>&nbsp; 里氏代换原则是面向对象设计的基本原则之一。里氏代换原则中说，任何基类可以出现的地方，子类一定可以出现。LSP是继承复用的基石，只有当派生类可以替换掉基类，且软件单位的功能不受到影响时，基类才能真正被复用，而派生类也能够在基类的基础上增加新的行为。里氏代换原则是对开闭原则的补充。实现开闭原则的关键步骤就是抽象化，而基类与子类的继承关系就是抽象化的具体实现，所以里氏代换原则是对实现抽象化的具体步骤的规范。</p><p>&nbsp; 3.依赖倒转原则（Dependence Inversion Principle）：</p><p>&nbsp; 依赖倒转原则是开闭原则的基础，具体内容是：针对接口编程，依赖于抽象，而不依赖于具体。</p><p>&nbsp; 4.接口隔离原则（Interface Segregation Principle）：</p><p>&nbsp; 这个原则的意思是：使用多个隔离的接口，比使用单个接口要好。它还有另外一个意思是：降低类之间的耦合度。由此可见，其实设计模式就是从大型软件架构出发、便于升级和维护的软件设计思想，强调降低依赖、降低耦合。</p><p>&nbsp; 5.迪米特法则，又称最少知道原则（Demeter Principle）：</p><p>&nbsp;最少知道原则是指：一个实体应尽量少地与其他实体之间发生相互作用，使得系统功能模块相对独立。<br/></p><p>&nbsp; 6.合成复用原则（Composite Reuse Principle）：</p><p>&nbsp; 合成复用原则是指：尽量使用合成/聚合的方式，而不是使用继承。</p><p>&nbsp;&nbsp;</p><p><br/></p>',1523101900),(22,'API','京东阅读','9',NULL,'<p>&nbsp; 1.构建一个API的世界：</p><p>&nbsp; &nbsp;应该写一个统一的Server端程序，你可以使用Java、Python或者PHP写，它的功能就是实现对数据库的操作，对数据库进行增删改查，客户端（我们这里将App和手机站点统称为客户端，当然也可能会有其他的终端）通过传递一定的参数调用不同的接口，完成交互。Server端程序可以使用流行的restful规范，可以抽象出一个基类，App和Pc需要的数据一样的话可以使用同一接口。需要用到不同的接口时，先在Server端封装一个基类，然后分别继承这个基类写两个接口，分别适用于App和PC。总体来说，要实现高内聚、低耦合，即业务逻辑在方法内部实现，对外提供完好的客户端需要的数据，各个方法之间依赖度低，有利于维护整合。能抽象出来的就单独拿出来，能封装的就封装，在开发中遵循Don&#39;t repeat yourself的法则。</p><p>&nbsp; 2.API接口签名验证：</p><p>&nbsp; 客户端在向服务端请求数据的时候，服务端需要对请求进行验证，确保请求来源是合法的，否则会导致网站数据泄露。</p><p>&nbsp; 一般是客户端和服务端使用相同的签名实现算法，客户端在向服务端发起请求的时候携带参与签名计算的参数和计算后的签名字符串（一般称作signature），服务端接收到这些参数后，按照相同的算法加密这些参数，生成自己的signature，将这个signature和接收到的signature进行比较，若相等则验证通过。</p><p>&nbsp; 3.传输信息的加解密：</p><p>&nbsp; 3.1单向散列加密：</p><p>&nbsp; 单向散列加密是对不同输入长度的信息进行散列计算，得到固定长度的散列计算值。输入信息的任何微小变化都会导致散列的很大不同，并且这种计算是不可逆的，即无法根据散列值得到明文信息。这种单向散列加密可用于用户密码的保存，即不将用户输入的密码直接存入数据库，而是将密码进行单向散列加密，将密文存入数据库。用户登录时进行密码验证，同样对输入的密码进行散列加密与数据库中的密码密文进行比对，若一致则验证成功。</p><p>&nbsp; 虽然不能通过算法从散列密文解出明文，但是由于人们设置的密码具有一定的模式（如使用生日或名字作为密码），因此通过彩虹表（密码和对应的密文关系表）等手段都可以进行猜测式的破解。为了增加单项散列被破解的难度，还可以给散列算法加盐值（salt），salt相当于加密时的密钥，增加破解的难度。常用的散列算法有MD5、SHA等。</p><p>&nbsp; 3.2对称加密</p><p>&nbsp; 3.3非对称加密</p><p>&nbsp;<br/></p><p>&nbsp; 4.使用Ajax进行交互</p><p>&nbsp; 4.1 Ajax的介绍：</p><p>&nbsp; Ajax是一种在无须重新加载整个网页的情况下可以更新部分网页的技术。Ajax通过在后台与服务器进行少量数据交换可以使网页实现异步更新。这意味着可以在不重新加载整个网页的情况下对网页的某部分进行更新。现代浏览器都内置了可以创建Ajax的对象XMLHttpRequest（IE5 和 IE6使用ActiveX对象），这样使得我们可以很方便的创建一个Ajax对象，通过浏览器发起请求来与服务端交互。</p><p>&nbsp; 使用post方式可向服务器传送较大量的数据，并且POST比GET更稳定可靠，但是GET方式比POST简单快捷。</p><p>&nbsp; Ajax指的是异步Javascript和XML。</p><p>&nbsp; open()函数的标准语法是：open（method,URL,async)，其规定了请求的类型method（get或post）、URL和是否异步处理（ture异步，false同步）。send（）包含一个参数，仅用于使用POST方式向服务端发送数据。</p><p>&nbsp; XMLHttpRequest对象如果要用于Ajax，那么open（）方法的的async参数就必须设置为true。通过Ajax、JavaScript无须等待服务器的相应，而是等待服务器响应时执行其他脚本，当响应就绪后再对响应进行处理。当async=true时，可以规定在响应结束后执行onreadystatechange事件中的函数。responseText存储从服务端取到的数据。</p><p>&nbsp; 4.2 Ajax的使用：</p><p>&nbsp; 在实际项目中使用Ajax与服务端交互，首先要约定传输数据使用的格式和规范。其中json格式是使用最为广泛的数据传输格式。一般的传输数据规范包含至少3个字段，即消息状态码（一般设置为status或code）、提示信息（msg)、消息体（data）。&nbsp;&nbsp;&nbsp;</p><p>&nbsp;&nbsp;</p><p><br/></p><p><br/></p><p>&nbsp;&nbsp;</p>',1523162976),(23,'Ping++支付','Ping++官网','9',NULL,'<p>&nbsp; 1.介绍：</p><p>&nbsp; Ping++是为移动端应用以及PC网页量身打造的下一代支付系统，通过一个SDK就可以同时支持移动端以及PC端网页的多种主流支付频道，你只需要一次介入即可完成多个渠道的接入。Ping++SDK包括Client SDK和Server SDK两部分。</p><p>&nbsp; 2.开发配置</p><p>&nbsp; 2.1工作模式选择：</p><p>&nbsp; 调用Test环境只需要注册Ping++账户，Test账户便于商户在没有申请下来渠道参数时先跑通支付流程，Test开发中支付页面是由Ping++提供的模拟页面，不需要支付密码，直接点击支付即完成模拟付款。</p><p style=\"text-align: center;\">&nbsp;&nbsp;<img width=\"530\" height=\"340\" src=\"http://api.map.baidu.com/staticimage?center=114.042972,22.669757&zoom=18&width=530&height=340&markers=114.042972,22.669757\"/></p>',1523336704);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_class`
--

DROP TABLE IF EXISTS `news_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_class` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `classname` char(18) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_class`
--

LOCK TABLES `news_class` WRITE;
/*!40000 ALTER TABLE `news_class` DISABLE KEYS */;
INSERT INTO `news_class` VALUES (1,'英语频道'),(3,'财经频道'),(4,'时政要闻'),(5,'历史频道'),(6,'数据库频道'),(7,'CSS及HTML知识'),(8,'健康知识'),(9,'PHP知识');
/*!40000 ALTER TABLE `news_class` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-26 13:38:03
