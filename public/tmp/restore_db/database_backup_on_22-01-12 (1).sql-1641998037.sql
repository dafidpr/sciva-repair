

CREATE TABLE `cashes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `cash_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` enum('income','expenditure') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cashes_user_id_foreign` (`user_id`),
  CONSTRAINT `cashes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `commisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `servis_id` bigint(20) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commisions_user_id_foreign` (`user_id`),
  KEY `commisions_servis_id_foreign` (`servis_id`),
  CONSTRAINT `commisions_servis_id_foreign` FOREIGN KEY (`servis_id`) REFERENCES `transaction_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `commisions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `company_profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO company_profiles (id, name, address, telephone, fax, email, instagram, logo, created_at, updated_at) VALUES ('1','SCIVA REPAIRE CENTER','JL.OKE','081123123','(0333) 000','SCIVA@GMAIL.COM','@SCIVA','84140967-simple-repair-service-logo-like-clock-vector-illustration-.jpg-1638213108.jpg','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('umum','member') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_telephone_unique` (`telephone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO customers (id, name, telephone, address, password, type, created_at, updated_at) VALUES ('1','umum','00','umum','$2y$10$pkVCY5QSSXFrmNsBdQJ0wu1eFTcsrRVjC2scfzUZ3Od4U2OWmGnk6','umum','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO customers (id, name, telephone, address, password, type, created_at, updated_at) VALUES ('2','pelanggan','080123456789','Jawa Timur','$2y$10$MZkbhaIBIBYsHC2PDQ6kvOSMOUd3cehQk8G8zHX3d.n9GJjYcxg2m','member','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO customers (id, name, telephone, address, password, type, created_at, updated_at) VALUES ('3','pelanggan2','082123456789','Jawa Barat','$2y$10$CyQTXDn60F0nwNCcGd3VY.khH0LMBajOmnhORVEVRw1iJqPK.TNsG','umum','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO customers (id, name, telephone, address, password, type, created_at, updated_at) VALUES ('4','pelanggan','083123456789','Jawa Tengah','$2y$10$8d8t7r7TcXgKmZBbHat3ru9meFVT4badrqlm/bJbwkvkjNzv6H.q6','umum','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `debt_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `debt_id` bigint(20) unsigned NOT NULL,
  `payment_date` date DEFAULT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `debt_details_debt_id_foreign` (`debt_id`),
  KEY `debt_details_user_id_foreign` (`user_id`),
  CONSTRAINT `debt_details_debt_id_foreign` FOREIGN KEY (`debt_id`) REFERENCES `debts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `debt_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `debts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint(20) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `remainder` decimal(10,2) NOT NULL,
  `debt_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('paid_off','not yet paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `debts_purchase_id_foreign` (`purchase_id`),
  CONSTRAINT `debts_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations (id, migration, batch) VALUES ('1','2014_10_12_000000_create_users_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('2','2014_10_12_100000_create_password_resets_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('3','2018_09_12_99999_create_backupverify_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('4','2019_08_19_000000_create_failed_jobs_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('5','2019_12_14_000001_create_personal_access_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('6','2021_11_03_001318_create_customers_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('7','2021_11_03_002320_create_products_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('8','2021_11_03_002406_create_suppliers_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('9','2021_11_03_002456_create_purchases_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('10','2021_11_03_002701_create_repaire_services_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('11','2021_11_03_002752_create_stocks_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('12','2021_11_03_011021_create_sales_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('13','2021_11_03_011511_create_receivables_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('14','2021_11_03_112022_create_receivable_details_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('15','2021_11_03_112208_create_sale_details_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('16','2021_11_03_112309_create_purchase_details_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('17','2021_11_03_112351_create_debts_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('18','2021_11_03_112418_create_debt_details_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('19','2021_11_03_112530_create_stock_opnames_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('20','2021_11_03_112608_create_transaction_services_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('21','2021_11_03_112659_create_transaction_service_details_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('22','2021_11_03_112739_create_vat_taxes_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('23','2021_11_03_112814_create_company_profiles_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('24','2021_11_03_112844_create_settings_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('25','2021_11_03_115021_create_cashes_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('26','2021_11_04_162150_add_supplier_id_to_products','1');

INSERT INTO migrations (id, migration, batch) VALUES ('27','2021_11_06_062432_create_permission_tables','1');

INSERT INTO migrations (id, migration, batch) VALUES ('28','2021_12_15_150724_add_service_id_to_receivables','1');

INSERT INTO migrations (id, migration, batch) VALUES ('29','2021_12_24_013604_create_commisions_table','1');


CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO model_has_roles (role_id, model_type, model_id) VALUES ('1','App\Models\User','1');

INSERT INTO model_has_roles (role_id, model_type, model_id) VALUES ('2','App\Models\User','2');

INSERT INTO model_has_roles (role_id, model_type, model_id) VALUES ('3','App\Models\User','3');


CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('1','read-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('2','create-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('3','update-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('4','delete-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('5','detail-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('6','restore-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('7','print-nota-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('8','take-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('9','call-services','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('10','read-products','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('11','create-products','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('12','update-products','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('13','delete-products','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('14','read-users','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('15','create-users','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('16','update-users','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('17','delete-users','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('18','read-roles','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('19','create-roles','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('20','update-roles','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('21','delete-roles','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('22','change-permissions','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('23','read-repaire','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('24','create-repaire','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('25','update-repaire','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('26','delete-repaire','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('27','read-customers','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('28','create-customers','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('29','update-customers','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('30','delete-customers','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('31','read-suppliers','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('32','create-suppliers','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('33','update-suppliers','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('34','delete-suppliers','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('35','read-opnames','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('36','create-opnames','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('37','update-opnames','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('38','delete-opnames','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('39','read-stocks','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('40','create-stocks','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('41','delete-stocks','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('42','read-sales','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('43','create-sales','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('44','detail-sales','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('45','print-sales','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('46','read-purchases','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('47','create-purchases','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('48','detail-purchases','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('49','read-debt','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('50','payment-debt','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('51','detail-debt','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('52','delete-debt','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('53','read-receivable','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('54','payment-receivable','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('55','detail-receivable','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('56','delete-receivable','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('57','read-cash','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('58','create-cash','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('59','delete-cash','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('60','read-ppn','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('61','create-ppn','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('62','delete-ppn','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('63','report-daily-journal','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('64','report-sales','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('65','report-purchases','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('66','report-opnames','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('67','report-stock-in-out','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('68','report-cash','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('69','report-debts-receivables','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('70','report-profit','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('71','read-grafik','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('72','commission-users','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('73','generate-barcode-tools','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('74','backup-tools','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('75','delete-servis-tools','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('76','delete-transaction-tools','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('77','footerNota-settings','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('78','formatWA-settings','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('79','formatSMS-settings','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('80','daylimit-settings','web','','');

INSERT INTO permissions (id, name, guard_name, created_at, updated_at) VALUES ('81','profile-settings','web','','');


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
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` decimal(8,2) NOT NULL,
  `purchase_price` decimal(8,2) NOT NULL,
  `member_price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `limit` int(11) NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO products (id, barcode, name, selling_price, purchase_price, member_price, stock, limit, supplier_id, created_at, updated_at) VALUES ('1','0000123456','battery','50000.00','45000.00','43000.00','10','5','1','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO products (id, barcode, name, selling_price, purchase_price, member_price, stock, limit, supplier_id, created_at, updated_at) VALUES ('2','000021234','case A','50000.00','45000.00','43000.00','10','5','2','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO products (id, barcode, name, selling_price, purchase_price, member_price, stock, limit, supplier_id, created_at, updated_at) VALUES ('3','0000312345','case B','50000.00','45000.00','43000.00','10','5','1','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO products (id, barcode, name, selling_price, purchase_price, member_price, stock, limit, supplier_id, created_at, updated_at) VALUES ('4','0000412345','TouchScreen','150000.00','100000.00','130000.00','10','5','1','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO products (id, barcode, name, selling_price, purchase_price, member_price, stock, limit, supplier_id, created_at, updated_at) VALUES ('5','00005123456','earphone','40000.00','30000.00','35000.00','10','5','1','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO products (id, barcode, name, selling_price, purchase_price, member_price, stock, limit, supplier_id, created_at, updated_at) VALUES ('6','00006123456','Charger','30000.00','25000.00','27000.00','5','5','1','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `purchase_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_details_purchase_id_foreign` (`purchase_id`),
  KEY `purchase_details_product_id_foreign` (`product_id`),
  CONSTRAINT `purchase_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `method` enum('cash','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `cashback` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchases_supplier_id_foreign` (`supplier_id`),
  KEY `purchases_user_id_foreign` (`user_id`),
  CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO purchases (id, invoice, supplier_id, user_id, discount, total, method, payment, cashback, created_at, updated_at, deleted_at) VALUES ('1','PB202010210001','1','2','0.00','100000.00','cash','100000.00','0.00','2022-01-12 21:13:33','2022-01-12 21:13:33','');

INSERT INTO purchases (id, invoice, supplier_id, user_id, discount, total, method, payment, cashback, created_at, updated_at, deleted_at) VALUES ('2','PB202010210002','2','2','0.00','100000.00','cash','100000.00','0.00','2022-01-12 21:13:33','2022-01-12 21:13:33','');

INSERT INTO purchases (id, invoice, supplier_id, user_id, discount, total, method, payment, cashback, created_at, updated_at, deleted_at) VALUES ('3','PB202010210003','1','3','0.00','100000.00','cash','100000.00','0.00','2022-01-12 21:13:33','2022-01-12 21:13:33','');


CREATE TABLE `receivable_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `receivable_id` bigint(20) unsigned NOT NULL,
  `payment_date` date DEFAULT NULL,
  `nominal` decimal(8,2) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receivable_details_receivable_id_foreign` (`receivable_id`),
  KEY `receivable_details_user_id_foreign` (`user_id`),
  CONSTRAINT `receivable_details_receivable_id_foreign` FOREIGN KEY (`receivable_id`) REFERENCES `receivables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `receivable_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `receivables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` bigint(20) unsigned DEFAULT NULL,
  `service_id` bigint(20) unsigned DEFAULT NULL,
  `receivable_date` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `remainder` decimal(8,2) NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('paid off','not yet paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receivables_sale_id_foreign` (`sale_id`),
  KEY `receivables_service_id_foreign` (`service_id`),
  CONSTRAINT `receivables_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `receivables_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `transaction_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `repaire_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `repaire_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO repaire_services (id, repaire_code, name, price, created_at, updated_at) VALUES ('1','JS00001','service 10K','10000.00','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO repaire_services (id, repaire_code, name, price, created_at, updated_at) VALUES ('2','JS00002','service 15K','15000.00','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO repaire_services (id, repaire_code, name, price, created_at, updated_at) VALUES ('3','JS00003','service 20K','20000.00','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('1','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('1','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('2','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('2','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('3','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('3','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('4','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('4','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('5','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('5','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('6','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('6','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('7','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('7','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('8','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('8','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('9','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('9','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('10','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('10','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('10','3');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('11','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('11','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('12','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('12','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('13','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('13','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('14','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('14','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('15','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('15','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('16','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('16','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('17','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('17','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('18','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('18','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('19','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('19','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('20','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('20','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('21','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('21','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('22','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('22','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('23','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('23','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('24','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('24','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('25','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('25','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('26','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('26','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('27','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('27','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('28','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('28','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('29','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('29','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('30','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('30','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('31','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('31','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('32','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('32','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('33','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('33','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('34','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('34','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('35','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('35','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('36','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('36','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('37','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('37','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('38','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('38','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('39','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('39','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('40','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('40','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('41','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('41','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('42','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('42','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('43','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('43','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('44','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('44','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('45','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('45','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('46','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('46','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('47','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('47','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('48','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('48','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('49','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('49','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('50','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('50','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('51','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('51','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('52','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('52','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('53','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('53','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('54','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('54','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('55','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('55','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('56','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('56','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('57','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('57','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('58','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('58','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('59','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('59','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('60','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('60','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('61','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('61','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('62','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('62','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('63','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('63','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('64','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('64','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('65','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('65','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('66','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('66','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('67','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('67','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('68','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('68','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('69','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('69','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('70','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('70','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('71','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('71','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('72','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('72','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('73','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('73','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('74','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('74','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('75','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('75','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('76','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('76','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('77','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('77','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('78','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('78','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('79','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('79','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('80','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('80','2');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('81','1');

INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('81','2');


CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO roles (id, name, guard_name, created_at, updated_at) VALUES ('1','developer','web','2022-01-12 21:13:31','2022-01-12 21:13:31');

INSERT INTO roles (id, name, guard_name, created_at, updated_at) VALUES ('2','admin','web','2022-01-12 21:13:31','2022-01-12 21:13:31');

INSERT INTO roles (id, name, guard_name, created_at, updated_at) VALUES ('3','kasir','web','2022-01-12 21:13:31','2022-01-12 21:13:31');


CREATE TABLE `sale_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_details_sale_id_foreign` (`sale_id`),
  KEY `sale_details_product_id_foreign` (`product_id`),
  CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` enum('cash','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `cashback` decimal(10,2) DEFAULT NULL,
  `vat_tax` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_user_id_foreign` (`user_id`),
  KEY `sales_customer_id_foreign` (`customer_id`),
  CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO sales (id, user_id, customer_id, invoice, method, total, payment, cashback, vat_tax, discount, date, created_at, updated_at, deleted_at) VALUES ('1','2','1','POS202002110001','cash','10000.00','10000.00','0.00','0.00','0.00','2022-01-12','2022-01-12 21:13:33','2022-01-12 21:13:33','');

INSERT INTO sales (id, user_id, customer_id, invoice, method, total, payment, cashback, vat_tax, discount, date, created_at, updated_at, deleted_at) VALUES ('2','2','2','POS202002110002','cash','10000.00','10000.00','0.00','0.00','0.00','2022-01-12','2022-01-12 21:13:33','2022-01-12 21:13:33','');

INSERT INTO sales (id, user_id, customer_id, invoice, method, total, payment, cashback, vat_tax, discount, date, created_at, updated_at, deleted_at) VALUES ('3','3','3','POS202002110003','cash','10000.00','10000.00','0.00','0.00','0.00','2022-01-12','2022-01-12 21:13:33','2022-01-12 21:13:33','');


CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO settings (id, groups, options, label, value, created_at, updated_at) VALUES ('1','footer','footer_nota_sale','footer_nota','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO settings (id, groups, options, label, value, created_at, updated_at) VALUES ('2','footer','footer_nota_servis','footer_nota','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO settings (id, groups, options, label, value, created_at, updated_at) VALUES ('3','footer','footer_nota_servis_take','footer_nota','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO settings (id, groups, options, label, value, created_at, updated_at) VALUES ('4','format','format_sms','format_text','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO settings (id, groups, options, label, value, created_at, updated_at) VALUES ('5','format','format_wa','footer_text','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO settings (id, groups, options, label, value, created_at, updated_at) VALUES ('6','batas','batas_servis','servis','10','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO settings (id, groups, options, label, value, created_at, updated_at) VALUES ('7','batas','batas_servis_type','servis','Hari','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `stock_opnames` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `stock` int(11) NOT NULL,
  `real_stock` int(11) NOT NULL,
  `difference_stock` int(11) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_opnames_product_id_foreign` (`product_id`),
  CONSTRAINT `stock_opnames_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO stock_opnames (id, product_id, stock, real_stock, difference_stock, value, description, created_at, updated_at) VALUES ('1','1','5','5','0','1.00','oke','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO stock_opnames (id, product_id, stock, real_stock, difference_stock, value, description, created_at, updated_at) VALUES ('2','2','5','5','0','1.00','oke','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO stock_opnames (id, product_id, stock, real_stock, difference_stock, value, description, created_at, updated_at) VALUES ('3','1','15','5','0','1.00','oke','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `total` int(11) NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stocks_product_id_foreign` (`product_id`),
  CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO stocks (id, product_id, total, value, type, description, created_at, updated_at) VALUES ('1','3','5','100000.00','in','oke','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO stocks (id, product_id, total, value, type, description, created_at, updated_at) VALUES ('2','1','5','100000.00','in','oke','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO stocks (id, product_id, total, value, type, description, created_at, updated_at) VALUES ('3','2','5','100000.00','in','oke','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO suppliers (id, supplier_code, name, telephone, bank, account_number, bank_account_name, address, created_at, updated_at) VALUES ('1','SPL00001','CV Putra Mas','0851234567892','bni','123443000','Putra mas','Kitabalu','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO suppliers (id, supplier_code, name, telephone, bank, account_number, bank_account_name, address, created_at, updated_at) VALUES ('2','SPL00002','CV Angkasa Mas','0851234567891','bni','123443002','angkasa','Jakarta barat','2022-01-12 21:13:33','2022-01-12 21:13:33');

INSERT INTO suppliers (id, supplier_code, name, telephone, bank, account_number, bank_account_name, address, created_at, updated_at) VALUES ('3','SPL00003','CV Merpati','0851234567890','bni','123443003','merpati','Surabaya','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `transaction_service_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint(20) unsigned NOT NULL,
  `repaire_id` bigint(20) unsigned DEFAULT NULL,
  `sparepart_id` bigint(20) unsigned DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_service_details_transaction_id_foreign` (`transaction_id`),
  KEY `transaction_service_details_repaire_id_foreign` (`repaire_id`),
  KEY `transaction_service_details_sparepart_id_foreign` (`sparepart_id`),
  CONSTRAINT `transaction_service_details_repaire_id_foreign` FOREIGN KEY (`repaire_id`) REFERENCES `repaire_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_service_details_sparepart_id_foreign` FOREIGN KEY (`sparepart_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_service_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `transaction_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `transaction_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complient` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `completenes` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `estimated_cost` decimal(10,2) NOT NULL,
  `pickup_date` date DEFAULT NULL,
  `payment_method` enum('cash','credit') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `cashback` decimal(10,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `status` enum('proses','waiting sparepart','finished','cancelled','take') COLLATE utf8mb4_unicode_ci NOT NULL,
  `technician` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_services_customer_id_foreign` (`customer_id`),
  KEY `transaction_services_user_id_foreign` (`user_id`),
  KEY `transaction_services_technician_foreign` (`technician`),
  CONSTRAINT `transaction_services_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_services_technician_foreign` FOREIGN KEY (`technician`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO transaction_services (id, customer_id, user_id, transaction_code, unit, serial_number, complient, completenes, passcode, notes, service_date, estimated_cost, pickup_date, payment_method, payment, discount, cashback, total, status, technician, created_at, updated_at, deleted_at) VALUES ('1','1','2','SRV202109100001','samsung A1','1','battery Low','Handphone & charger','12ok','Oke','2022-01-12','200000.00','','','','','','','proses','','2022-01-12 21:13:33','2022-01-12 21:13:33','');

INSERT INTO transaction_services (id, customer_id, user_id, transaction_code, unit, serial_number, complient, completenes, passcode, notes, service_date, estimated_cost, pickup_date, payment_method, payment, discount, cashback, total, status, technician, created_at, updated_at, deleted_at) VALUES ('2','1','1','SRV202109100002','samsung C1','2','battery Low','Handphone & charger','12ok','Oke','2022-01-12','200000.00','2021-11-20','cash','200000.00','','0.00','','proses','','2022-01-12 21:13:33','2022-01-12 21:13:33','');


CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_telephone_unique` (`telephone`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, name, telephone, address, username, password, commission, login_at, logout_at, created_at, updated_at) VALUES ('1','developer','00000000','Banyuwangi','root','$2y$10$jfQPQfqbRIidtDBUvc3K.O2VScR0RLlMk/ro/owmiDCYEYs/2uKMy','10','','','2022-01-12 21:13:32','2022-01-12 21:13:32');

INSERT INTO users (id, name, telephone, address, username, password, commission, login_at, logout_at, created_at, updated_at) VALUES ('2','admin','081234123123','Banyuwangi','admin','$2y$10$YuzZIRpj3H50jxHBbZVq1OZ9RIiHomwRd3MDdcqnryiPfN6GyMLhm','10','','','2022-01-12 21:13:32','2022-01-12 21:13:32');

INSERT INTO users (id, name, telephone, address, username, password, commission, login_at, logout_at, created_at, updated_at) VALUES ('3','kasir','081111111111','Banyuwangi','kasir','$2y$10$vN4rT/a5dKMplp1M5IMcr.ho2EVI.VK..luioUWu.Qs3pG8pWEqWO','10','','','2022-01-12 21:13:33','2022-01-12 21:13:33');


CREATE TABLE `vat_taxes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `tax_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` decimal(10,2) DEFAULT NULL,
  `type` enum('deposit','out','income') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vat_taxes_user_id_foreign` (`user_id`),
  CONSTRAINT `vat_taxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `verifybackup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `verify_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO verifybackup (id, verify_status) VALUES ('1','backup');
