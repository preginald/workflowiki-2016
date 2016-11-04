-- MySQL dump 10.16  Distrib 10.1.18-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: workflowiki_dev
-- ------------------------------------------------------
-- Server version	10.1.18-MariaDB

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_10_05_105706_create_workflows_table',1),('2016_10_07_013617_create_steps_table',1),('2016_10_07_065428_create_tasks_table',1),('2016_10_13_032602_create_variables_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `steps`
--

DROP TABLE IF EXISTS `steps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `steps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workflow_id` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `steps_workflow_id_foreign` (`workflow_id`),
  CONSTRAINT `steps_workflow_id_foreign` FOREIGN KEY (`workflow_id`) REFERENCES `workflows` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `steps`
--

LOCK TABLES `steps` WRITE;
/*!40000 ALTER TABLE `steps` DISABLE KEYS */;
INSERT INTO `steps` VALUES (1,2,1,'Download WordPress Package','Download with shell access to my web server and unzip the WordPress package.','2016-10-15 18:57:28','2016-10-15 18:57:28'),(2,1,1,'Make bed','Making the bed kick starts your body.','2016-10-15 19:11:20','2016-10-15 19:11:20'),(3,3,1,'Create new workflow ','Follow these steps.','2016-10-15 23:25:18','2016-10-15 23:25:18'),(4,3,2,'Create all the steps','A workflow is consisted of steps and each step is consisted of tasks. Create all the steps first and then later create the relevant tasks for each step.','2016-10-16 00:00:53','2016-10-17 16:06:20'),(5,3,3,'Add tasks to step','Add tasks to each step in the workflow.','2016-10-17 16:12:46','2016-10-17 16:13:33'),(6,2,2,'Extract WordPress Package','','2016-10-17 16:30:54','2016-10-17 16:30:54'),(7,2,3,'Create the Database and a User','You can create MySQL/MariaDB users and databases quickly and easily by running mysql from the shell.\r\n\r\n','2016-10-17 16:30:59','2016-10-17 16:31:56'),(8,2,4,'Set up wp-config.php','Create and edit the wp-config.php file.\r\n\r\n','2016-10-17 16:31:05','2016-10-17 16:31:43'),(9,2,5,'Upload WordPress files','Copy the files into the new WordPress folder.\r\n\r\n','2016-10-17 16:31:11','2016-10-17 16:31:32'),(10,2,6,'Point a web browser to start the installation script.','','2016-10-17 16:31:19','2016-10-17 16:31:19'),(11,4,1,'Initial step ','This step is where I\'ll create a bunch of tasks. Then later I\'ll create a function to move tasks from this step to other steps.','2016-10-22 15:18:04','2016-10-22 15:18:04'),(12,4,2,'Get suited up.','','2016-10-22 15:26:04','2016-10-25 19:50:24'),(13,4,3,'Make sure I\'ve grabbed my things.','','2016-10-25 19:54:39','2016-10-25 19:54:39'),(14,5,1,'Add the font-awesome on package.json dependencies','','2016-10-26 12:34:15','2016-10-26 12:34:15'),(15,5,2,'Use npm package manager to pull font-awesome','','2016-10-26 12:35:15','2016-10-26 12:35:15'),(16,5,3,'Edit app.scss','','2016-10-26 12:35:43','2016-10-26 12:35:43'),(17,5,4,'Update project assets','','2016-10-26 12:36:42','2016-10-26 12:36:42'),(18,6,1,'Routes','','2016-10-26 13:55:00','2016-10-27 13:30:23'),(19,6,2,'Controller and CRUD methods','Here we\'ll create a new controller and add various CRUD methods.','2016-10-26 14:11:38','2016-10-27 13:30:09'),(20,6,3,'Views','','2016-10-26 14:43:29','2016-10-27 13:30:57'),(21,6,4,'Model and database migration','','2016-10-26 15:17:18','2016-10-27 13:29:41'),(22,7,1,'Backup mysql database','','2016-10-26 16:17:36','2016-10-26 16:17:36');
/*!40000 ALTER TABLE `steps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `step_id` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_step_id_foreign` (`step_id`),
  CONSTRAINT `tasks_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,3,1,'','Click the \"New\" button in the workflow list view to see the workflow creation form.','2016-10-15 23:32:44','2016-10-15 23:36:32'),(2,3,2,'','Enter the name of your Workflow','2016-10-15 23:58:38','2016-10-15 23:58:38'),(3,3,3,'','Enter the description of your workflow.','2016-10-15 23:58:56','2016-10-15 23:58:56'),(4,3,4,'','Click the \"Create\" button','2016-10-15 23:59:11','2016-10-15 23:59:11'),(5,4,1,'','Enter your step name.','2016-10-16 00:06:40','2016-10-16 00:06:40'),(6,4,2,'','Enter the step description.','2016-10-16 00:07:21','2016-10-16 00:07:21'),(7,4,3,'','Click the \"Save\" button to save this step.','2016-10-16 00:07:49','2016-10-17 16:22:49'),(8,5,1,'','In the workflow view click on the step you want to add tasks to.','2016-10-17 16:16:36','2016-10-17 16:16:36'),(9,5,2,'','Click the \"Add Task\" button.','2016-10-17 16:17:02','2016-10-17 16:17:02'),(10,5,3,'','Enter the description of the task.','2016-10-17 16:17:25','2016-10-17 16:17:25'),(11,5,4,'','Optionally if your task includes code then enter this in the \"Body\" text input box.','2016-10-17 16:18:36','2016-10-17 16:18:36'),(12,5,5,'','Click the \"Save\" button to save this task.','2016-10-17 16:19:33','2016-10-17 16:19:33'),(13,1,1,'cd ~','Change to your home directory.','2016-10-17 16:32:23','2016-10-17 16:32:23'),(14,1,2,'rm latest.tar.gz*\r\n','Remove previously downloaded archive.','2016-10-17 16:32:36','2016-10-17 16:32:36'),(15,1,3,'rm -rf wordpress','Remove previously extracted WordPress files.','2016-10-17 16:32:52','2016-10-17 16:32:52'),(16,1,4,'wget http://wordpress.org/latest.tar.gz','Use wget to download latest wordpress package','2016-10-17 16:33:29','2016-10-17 16:33:29'),(17,6,1,'tar xzvf latest.tar.gz','','2016-10-17 16:34:02','2016-10-17 16:34:02'),(42,7,1,'mysql -u root -p','','2016-10-17 17:21:36','2016-10-17 17:21:36'),(43,7,2,'CREATE DATABASE <variable:database_name>;','','2016-10-17 17:21:48','2016-10-17 17:21:48'),(44,7,3,'CREATE USER \'<variable:database_user_name>\'@\'localhost\' IDENTIFIED BY \'<variable:database_user_password>\';','','2016-10-17 17:21:59','2016-10-17 17:21:59'),(45,7,4,'GRANT ALL PRIVILEGES ON <variable:database_name>.* TO \'<variable:database_user_name>\'@\'localhost\';','','2016-10-17 17:23:30','2016-10-17 17:23:30'),(46,7,5,'FLUSH PRIVILEGES;','','2016-10-17 17:23:44','2016-10-17 17:23:44'),(47,7,6,'exit','','2016-10-17 17:23:48','2016-10-17 17:23:48'),(48,8,1,'cd ~/wordpress','','2016-10-17 17:24:31','2016-10-17 17:24:31'),(49,8,2,'cp wp-config-sample.php wp-config.php\r\n','','2016-10-17 17:24:34','2016-10-17 17:24:34'),(50,8,3,'vim wp-config.php','','2016-10-17 17:24:39','2016-10-17 17:25:13'),(51,8,4,'/** The name of the database for WordPress */\r\ndefine(\'DB_NAME\', \'<variable:database_name>\');\r\n\r\n/** MySQL database username */\r\ndefine(\'DB_USER\', \'<variable:database_user_name>\');\r\n\r\n/** MySQL database password */\r\ndefine(\'DB_PASSWORD\', \'<variable:database_user_password>\');','','2016-10-17 17:24:40','2016-10-17 17:26:15'),(52,8,5,'/** Sets up \'direct\' method for wordpress, auto update without FTP */\r\ndefine(\'FS_METHOD\',\'direct\');','','2016-10-17 17:28:30','2016-10-17 17:28:30'),(53,11,1,'','Have shower','2016-10-22 15:22:49','2016-10-22 15:22:49'),(54,11,2,'','Brush teeth','2016-10-22 15:23:08','2016-10-22 15:23:08'),(55,11,3,'','Shave','2016-10-22 15:23:27','2016-10-22 15:23:27'),(56,12,1,'','Put on underwear','2016-10-22 15:24:08','2016-10-25 19:51:06'),(57,13,1,'','Take wallet','2016-10-22 15:25:01','2016-10-25 19:59:43'),(58,11,4,'','Take keys','2016-10-22 15:25:12','2016-10-25 19:59:43'),(59,11,4,'','Take bag','2016-10-22 15:25:24','2016-10-25 23:37:19'),(60,11,4,'','Check calendar','2016-10-22 15:25:33','2016-10-25 23:37:31'),(61,12,2,'','Put on shirt','2016-10-25 19:52:00','2016-10-25 19:52:00'),(62,12,3,'','Put on pants','2016-10-25 19:52:17','2016-10-25 19:52:17'),(63,12,4,'','Put on socks','2016-10-25 19:52:41','2016-10-25 19:52:41'),(64,12,5,'','Put on shoes','2016-10-25 19:52:57','2016-10-25 19:52:57'),(65,11,5,'','Take phone','2016-10-25 23:37:00','2016-10-25 23:37:31'),(66,14,1,'\"devDependencies\": {\r\n    \"font-awesome\": \"*\"\r\n}','Add font-awesome dependencies','2016-10-26 12:39:42','2016-10-26 12:39:42'),(67,15,1,'npm update','Update the package.','2016-10-26 12:41:07','2016-10-26 12:44:16'),(68,16,1,'// Font-Awesome\r\n@import \"node_modules/font-awesome/scss/font-awesome\";','Import the font-awesome.scss to app.scss.','2016-10-26 12:42:14','2016-10-26 12:45:33'),(69,16,2,'mix.sass(\'app.scss\')\r\n   .copy(\'node_modules/font-awesome/fonts\',\'public/build/fonts\')','Copy the fonts to builds folder','2016-10-26 12:47:21','2016-10-26 12:47:37'),(70,17,1,'gulp','Run gulp.','2016-10-26 12:49:04','2016-10-26 12:49:04'),(71,18,1,'Route::resource(\'<variable:route_name>\', \'<variable:controller_name>Controller\');','Add a resourceful route','2016-10-26 14:08:58','2016-10-26 14:08:58'),(72,19,1,'php artisan make:controller <variable:controller_name>Controller --resource','This command will generate a resourceful controller that will contain a method for each of the available resource operations.','2016-10-26 14:32:28','2016-10-26 14:32:28'),(73,19,2,'return view(\'<variable:route_name>.index\');','Edit the index view to return to the index view.','2016-10-26 14:40:34','2016-10-26 14:42:10'),(74,20,1,'mkdir -p resources/views/<variable:route_name>','Create the view folder','2016-10-26 14:49:22','2016-10-26 14:49:22'),(75,21,1,'php artisan make:model -m <variable:controller_name>','Artisan command to create the model and migration.','2016-10-26 15:18:33','2016-10-27 13:24:26'),(76,22,1,'mysqldump -u <variable:database_user_name> -p<variable:database_password> <variable:database_name> > <variable:backupfile>_(date  +\"%H-%M-%S_%d-%m-%Y\").sql','','2016-10-26 16:20:49','2016-10-27 14:13:22'),(77,21,2,'protected $fillable = [\'user_id\', \'name\', \'description\'];','Add fillable fields to model.','2016-10-27 13:35:53','2016-10-27 13:35:53'),(78,21,3,'/** \r\n* Get the user for the process \r\n*/\r\npublic function user()\r\n{\r\n    return $this->belongsTo(\'App\\User\');\r\n}','Add eloquent relationships to this model.','2016-10-27 13:41:37','2016-10-27 13:46:26');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Peter Reginald','peter@reginald.com.au','$2y$10$E0akuZkDW41.E7ODmdI76ujpSWdW0qtX4U9ioJfW6zwAuuTi2DOR6','NBoEoOwnyFlrQWKOghmmHhjVJSMzBzdNV9DXXZZI5toKaWC04thqkWS0DRPp',NULL,'2016-10-26 12:56:19'),(2,'James Dean','james@dean.com','$2y$10$CY5ixU9RjsI.Lt8dpcMsd.oatyOfyyfYAA9EwjizL04Pdrfm/NMQ6','FlDtapTsok17sHZSlQNzeqhxkyJU4bmDXa2YMptDlnV1dVJn0bQ6LbuJu6CJ',NULL,'2016-10-17 16:04:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variables`
--

DROP TABLE IF EXISTS `variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workflow_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variables`
--

LOCK TABLES `variables` WRITE;
/*!40000 ALTER TABLE `variables` DISABLE KEYS */;
INSERT INTO `variables` VALUES (1,2,'database_name','2016-10-17 17:14:46','2016-10-17 17:14:46'),(2,2,'database_user_password','2016-10-17 17:17:31','2016-10-17 17:17:31'),(3,2,'database_user_name','2016-10-17 17:18:49','2016-10-17 17:18:49'),(4,6,'route_name','2016-10-26 14:08:58','2016-10-26 14:08:58'),(5,6,'controller_name','2016-10-26 14:08:58','2016-10-26 14:08:58'),(6,7,'database_user_name','2016-10-26 16:20:49','2016-10-26 16:20:49'),(7,7,'database_password','2016-10-26 16:20:49','2016-10-26 16:20:49'),(8,7,'database_name','2016-10-26 16:20:49','2016-10-26 16:20:49'),(9,7,'backupfile','2016-10-26 16:20:49','2016-10-26 16:20:49');
/*!40000 ALTER TABLE `variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workflows`
--

DROP TABLE IF EXISTS `workflows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workflows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workflows`
--

LOCK TABLES `workflows` WRITE;
/*!40000 ALTER TABLE `workflows` DISABLE KEYS */;
INSERT INTO `workflows` VALUES (1,2,'My Sunday morning workflow','This is something I do every morning.','2016-10-15 18:39:28','2016-10-21 17:04:11'),(2,1,'How to install Wordpress','My workflow to install Wordpress in a Digital Ocean LAMP server','2016-10-15 18:40:47','2016-10-15 18:40:47'),(3,1,'How to create a workflow on WorkfloWiki','This is how I create a new workflow.','2016-10-15 23:18:54','2016-10-15 23:18:54'),(4,1,'Test workflow move tasks to other step','In this workflow I will test creating a single step first. Then I\'ll create a whole bunch of tasks under the first step. Next I\'ll create a couple more steps and then move tasks from the first step to the other tasks. Have to make sure that the task\'s position number is correct as well.','2016-10-22 15:16:57','2016-10-22 15:16:57'),(5,1,'Laravel Elixer and Font-Awesome','Using npm, elixer and gulp to use font-awesome in my laravel project.','2016-10-26 12:33:20','2016-10-26 12:33:20'),(6,1,'Laravel app development ','This workflow is to record the steps required to create a laravel project.','2016-10-26 13:54:48','2016-10-27 13:13:28'),(7,1,'Backup and restore a mysql database','From command line. ','2016-10-26 16:17:03','2016-10-26 16:17:03');
/*!40000 ALTER TABLE `workflows` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-28 12:17:37
