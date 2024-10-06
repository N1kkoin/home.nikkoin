CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(255) NOT NULL, -- Aumentando para 255 para suportar senhas hash
 `create_datetime` datetime NOT NULL,
 `role` ENUM('admin', 'user') DEFAULT 'user', -- Novo campo de função
 PRIMARY KEY (`id`)
);
