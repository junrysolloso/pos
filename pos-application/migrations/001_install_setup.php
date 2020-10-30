<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_Setup extends CI_Migration 
{
	/**
	 * Upgrade database
	 */
	public function up() {
		$attributes = array( 'ENGINE' => 'MyISAM', 'DEFAULT CHARSET' => 'utf8' );
		$tables = array(
			'category' => array(
				"`category_id` smallint(6) NOT NULL PRIMARY KEY AUTO_INCREMENT",
  			"`category_name` varchar(25) DEFAULT NULL",
			),

			'companyinfo'  => array(
				"`com_id` tinyint(4) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`com_name` varchar(30) DEFAULT NULL",
				"`com_proprietor` varchar(30) DEFAULT NULL",
				"`com_tin` varchar(20) DEFAULT NULL",
				"`com_address` varchar(255) DEFAULT NULL",
			),

			'customer' =>  array(
				"`cust_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`cust_name` varchar(25) DEFAULT NULL",
				"`cust_address` varchar(100) DEFAULT NULL",
			),

			'damagestocks' => array(
				"`ds_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`item_id` varchar(20) DEFAULT NULL",
				"`ds_quantity` int(11) DEFAULT NULL",
				"`ds_remarks` varchar(50) DEFAULT NULL",
			),

			'inventory' => array(
				"`inv_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`item_id` varchar(20) DEFAULT NULL",
				"`inv_rem_stocks` int(11) DEFAULT NULL",
				"`inv_item_srp` decimal(7,2) DEFAULT NULL",
			),

			'items' => array(
				"`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`item_id` varchar(20) DEFAULT NULL",
				"`subcat_id` smallint(6) DEFAULT NULL",
				"`item_name` varchar(50) DEFAULT NULL",
				"`item_description` varchar(100) DEFAULT NULL",
				"`item_critlimit` smallint(6) DEFAULT NULL",
				"`unit_id` tinyint(4) DEFAULT NULL",
			),

			'log' => array(
				"`log_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`log_date` date DEFAULT NULL",
				"`log_time` time DEFAULT NULL",
				"`log_task` varchar(255) DEFAULT NULL",
			),

			'orderdetails' => array(
				"`oderdetails_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`order_id` int(11) DEFAULT NULL",
				"`item_id` varchar(20) DEFAULT NULL",
				"`unit_id` tinyint(4) DEFAULT NULL",
				"`orderdetails_quantity` int(11) DEFAULT NULL",
				"`price_per_unit` decimal(9,2) DEFAULT NULL",
			),

			'orderinventory' => array(
				"`ordinv_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`orderdetails_id` int(11) DEFAULT NULL",
				"`ordinv_unit_price` decimal(7,2) DEFAULT NULL",
				"`no_of_stocks` int(11) DEFAULT NULL",
				"`inv_item_srp` decimal(7,2) DEFAULT NULL",
			),

			'orders' => array(
				"`order_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`order_total` decimal(10,2) DEFAULT NULL",
				"`order_date` date DEFAULT NULL",
			),

			'sales' => array(
				"`sales_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`cust_id` int(11) DEFAULT NULL",
				"`sales_date` date DEFAULT NULL",
				"`sales_total` decimal(9,2) DEFAULT NULL",
				"`sales_or` varchar(20) DEFAULT NULL",
				"`sales_tellerid` tinyint(4) DEFAULT NULL",
				"`sales_discount` decimal(7,2) DEFAULT NULL",
			),

			'salesinfo' => array(
				"`salesinfo_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`sales_id` int(11) DEFAULT NULL",
				"`item_id` varchar(20) DEFAULT NULL",
				"`unit_price` decimal(7,2) DEFAULT NULL",
				"`no_of_items` smallint(6) DEFAULT NULL",
			),

			'subcategory' => array(
				"`subcat_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`subcat_name` varchar(20) DEFAULT NULL",
				"`category_id` smallint(6) DEFAULT NULL",
			),

			'ucjunc' => array(
				"`ucjunc_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`uc_id` int(11) DEFAULT NULL",
				"`item_id` varchar(20) DEFAULT NULL",
			),

			'unit' => array(
				"`unit_id` tinyint(4) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`unit_desc` varchar(15) DEFAULT NULL",
				"`unit_sh` varchar(5) DEFAULT NULL",
			),

			'unitconvert' => array(
				"`uc_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`unit_id1` tinyint(4) DEFAULT NULL",
				"`unit_id2` tinyint(4) DEFAULT NULL",
				"`uc_number` int(11) DEFAULT NULL",
			),

			'userinfo' => array(
				"`userinfo_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`userinfo_name` varchar(25) DEFAULT NULL",
				"`userinfo_address` varchar(255) DEFAULT NULL",
				"`userinfo_nickname` varchar(20) DEFAULT NULL",
			),

			'users' => array(
				"`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`username` varchar(20) DEFAULT NULL",
				"`user_pass` char(32) DEFAULT NULL",
				"`user_level` varchar(20) DEFAULT NULL",
				"`user_id` tinyint(4) DEFAULT NULL",
			),

			'auth_attempts' => array(
				"`auth_id` smallint(6) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`auth_attempts` tinyint(1) NOT NULL",
				"`auth_blocked` datetime NOT NULL",
				"`auth_user` char(10) DEFAULT NULL",
			),

			'sessions' => array(
				"`id` varchar(128) NOT NULL",
				"`ip_address` varchar(45) NOT NULL",
				"`timestamp` int(10) unsigned DEFAULT 0 NOT NULL",
				"`data` blob NOT NULL",
				"PRIMARY KEY (id)",
				"KEY `ci_sessions_timestamp` (`timestamp`)",
			),
		);

		foreach ( $tables as $table => $fields ) {
			$this->dbforge->add_field( $fields );
			$this->dbforge->create_table( $table, TRUE, $attributes );
		}

		$this->db->simple_query( 'INSERT INTO `tbl_users` (`username`, `user_pass`, `user_level`, `user_id`) VALUES ("admin", "21232f297a57a5a743894a0e4a801fc3", "Administrator", 1)' );
		$this->db->simple_query( 'INSERT INTO `tbl_userinfo` (`userinfo_id`, `userinfo_name`, `userinfo_address`, `userinfo_nickname`) VALUES (1, "System Admin", "Dinagat Islands", "Admin")' );
	}

	/**
	 * Donwgrade database
	 */
	public function down() {
		$tables = array('auth_attempts', 'sessions', 'category', 'companyinfo', 'customer', 'damagestocks', 'inventory', 'items', 'log', 'orderdetails', 'orderinventory', 'orders', 'sales', 'salesinfo', 'subcategory', 'ucjunc', 'unit', 'unitconvert', 'userinfo', 'users');
		foreach ( $tables as $table ) {
			$this->dbforge->drop_table( $table );
		}
  }
  
}

/* End of file 001_install_setup.php */
/* Location: ./application/migrations/001_install_setup.php */