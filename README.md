# CI_Ajax_File_Upload_And_Delete
CodeIgniter  Ajax File Upload And Delete From Database Table And Folder

//////////////////////////////////////////////////////////////////////////////////////////
--
-- Table structure for table `ci_files`
--

CREATE TABLE IF NOT EXISTS `ci_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
