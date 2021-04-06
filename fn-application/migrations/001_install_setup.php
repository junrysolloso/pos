<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_Setup extends CI_Migration 
{
	/**
	 * Upgrade database
	 */
	public function up() {

		// Attributes
		$attributes = [ 'ENGINE' => 'InnoDB', 'DEFAULT CHARSET' => 'utf8' ];

		// Tables
		$tables = [
			'category' => [
				"`category_id` smallint(6) NOT NULL PRIMARY KEY AUTO_INCREMENT",
  			"`category_name` varchar(25) DEFAULT NULL",
			],

			'companyinfo'  => [
				"`com_id` tinyint(4) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`com_name` varchar(30) DEFAULT NULL",
				"`com_proprietor` varchar(30) DEFAULT NULL",
				"`com_tin` varchar(20) DEFAULT NULL",
				"`com_address` varchar(255) DEFAULT NULL",
			],

			'customer' =>  [
				"`cust_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`cust_name` varchar(25) DEFAULT NULL",
				"`cust_address` varchar(100) DEFAULT NULL",
			],

			'damagestocks' => [
				"`ds_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`item_id` varchar(20) DEFAULT NULL",
				"`ds_quantity` int(11) DEFAULT NULL",
				"`ds_remarks` varchar(50) DEFAULT NULL",
				"`ds_date` date DEFAULT NULL",
			],

			'inventory' => [
				"`inv_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`item_id` varchar(20) DEFAULT NULL",
				"`inv_rem_stocks` int(11) DEFAULT NULL",
				"`inv_item_srp` decimal(7,2) DEFAULT NULL",
			],

			'items' => [
				"`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`item_id` varchar(20) DEFAULT NULL",
				"`subcat_id` smallint(6) DEFAULT NULL",
				"`item_name` varchar(50) DEFAULT NULL",
				"`generic_name` varchar(100) NOT NULL",
				"`brand_name` varchar(100) NOT NULL",
				"`item_description` varchar(100) DEFAULT NULL",
				"`item_critlimit` smallint(6) DEFAULT NULL",
				"`unit_id` tinyint(4) DEFAULT NULL",
			],

			'orderdetails' => [
				"`orderdetails_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`order_id` int(11) DEFAULT NULL",
				"`item_id` varchar(20) DEFAULT NULL",
				"`unit_id` tinyint(4) DEFAULT NULL",
				"`orderdetails_quantity` int(11) DEFAULT NULL",
				"`price_per_unit` decimal(9,2) DEFAULT NULL",
			],

			'orderdetails_expiry' => [
				"`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY",
				"`orderdetails_id` int(10) NULL",
				"`expiry_date` date NOT NULL",
				"`rem_stocks` int(10) NOT NULL",
			],
			
			'orderinventory' => [
				"`ordinv_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`orderdetails_id` int(11) DEFAULT NULL",
				"`ordinv_unit_price` decimal(7,2) DEFAULT NULL",
				"`no_of_stocks` int(11) DEFAULT NULL",
				"`inv_item_srp` decimal(7,2) DEFAULT NULL",
			],

			'orders' => [
				"`order_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`order_total` decimal(10,2) DEFAULT NULL",
				"`order_date` date DEFAULT NULL",
			],

			'sales' => [
				"`sales_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`cust_id` int(11) DEFAULT NULL",
				"`sales_date` date DEFAULT NULL",
				"`sales_total` decimal(9,2) DEFAULT NULL",
				"`sales_or` varchar(20) DEFAULT NULL",
				"`sales_tellerid` tinyint(4) DEFAULT NULL",
				"`sales_discount` decimal(7,2) DEFAULT NULL",
			],

			'salesinfo' => [
				"`salesinfo_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`sales_id` int(11) DEFAULT NULL",
				"`item_id` varchar(20) DEFAULT NULL",
				"`unit_price` decimal(7,2) DEFAULT NULL",
				"`no_of_items` smallint(6) DEFAULT NULL",
			],

			'subcategory' => [
				"`subcat_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`subcat_name` varchar(20) DEFAULT NULL",
				"`category_id` smallint(6) DEFAULT NULL",
			],

			'ucjunc' => [
				"`ucjunc_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`uc_id` int(11) DEFAULT NULL",
				"`item_id` varchar(20) DEFAULT NULL",
			],

			'unit' => [
				"`unit_id` tinyint(4) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`unit_desc` varchar(15) DEFAULT NULL",
				"`unit_sh` varchar(5) DEFAULT NULL",
			],

			'unitconvert' => [
				"`uc_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`unit_id1` tinyint(4) DEFAULT NULL",
				"`unit_id2` tinyint(4) DEFAULT NULL",
				"`uc_number` int(11) DEFAULT NULL",
			],

			'user_meta' => [
				"`user_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`user_fname` VARCHAR(60) NOT NULL",
				"`user_phone` VARCHAR(30) NOT NULL",
				"`user_email` VARCHAR(30) NOT NULL",
				"`user_address` VARCHAR(255) NOT NULL",
				"`user_photo` VARCHAR(100) NOT NULL",
				"`user_bio` TEXT NOT NULL",
				"`user_status` CHAR(15) NOT NULL",
				"`member_id` INT(11) NOT NULL",
			],
			
			'user_login' => [
				"`login_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`login_name` VARCHAR(20) NOT NULL",
				"`login_pass` CHAR(32) NOT NULL",
				"`login_level` VARCHAR(25) NOT NULL",
				"`user_id` INT(11) NOT NULL",
			],
			
			'logs' => [
				"`log_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`log_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP",
				"`log_task` VARCHAR(60) NOT NULL",
				"`user_id` INT(11) NOT NULL",
			],

			'auth_attempts' => [
				"`auth_id` smallint(6) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`auth_attempts` tinyint(1) NOT NULL",
				"`auth_blocked` datetime NOT NULL",
				"`auth_user` char(10) DEFAULT NULL",
			],

			'sessions' => [
				"`id` varchar(128) NOT NULL",
				"`ip_address` varchar(45) NOT NULL",
				"`timestamp` int(10) unsigned DEFAULT 0 NOT NULL",
				"`data` blob NOT NULL",
				"PRIMARY KEY (id)",
				"KEY `ci_sessions_timestamp` (`timestamp`)",
			],

			'temp_orderdetails' => [
				"`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`tmp_barcode` varchar(20) DEFAULT NULL",
				"`tmp_date` date DEFAULT NULL",
				"`tmp_quantity` int(11) DEFAULT NULL",
				"`tmp_price` decimal(9,2) DEFAULT NULL",
				"`tmp_srp` decimal(7,2) DEFAULT NULL",
				"`tmp_expiry` date NOT NULL",
			]
		];

		// Create tables
		foreach ( $tables as $table => $fields ) {
			$this->dbforge->add_field( $fields );
			$this->dbforge->create_table( $table, TRUE, $attributes );
		}

		// Pre-insert data
		$this->db->simple_query( 'INSERT INTO `tbl_user_login` (`login_name`, `login_pass`, `login_level`, `user_id`) VALUES ("admin", "21232f297a57a5a743894a0e4a801fc3", "administrator", 1)' );
		$this->db->simple_query( 'INSERT INTO `tbl_user_meta` (`user_fname`, `user_phone`, `user_email`, `user_address`, `user_photo`, `user_bio`, `user_status`, `member_id`) VALUES ("system admin", "+639108973533", "junry.s.solloso@gmail.com", "san jose, dinagat islands", "avatar.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "active", 0)' );
	}

	/**
	 * Donwgrade database
	 */
	public function down() {
		$tables = [ 'auth_attempts', 'sessions', 'category', 'companyinfo', 'customer', 'damagestocks', 'inventory', 'items', 'logs', 'orderdetails', 'orderinventory', 'orders', 'sales', 'salesinfo', 'subcategory', 'ucjunc', 'unit', 'unitconvert', 'user_meta', 'user_login' ];
		foreach ( $tables as $table ) {
			$this->dbforge->drop_table( $table );
		}
  }
  
}
