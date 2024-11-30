<?php

return function (mysqli $conn) {
    $sql = <<<SQL
        CREATE TABLE `multimedia` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `alt` varchar(255) NOT NULL,
            `url` varchar(255) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
        );
        SQL;
    if ($conn->query($sql)) {
        echo "Table `multimedia` created successfully\n";
    } else {
        echo 'Error creating table: ' . $conn->error . "\n";
    }
};
