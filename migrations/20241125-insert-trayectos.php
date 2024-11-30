<?php

return function (mysqli $conn) {
    $file = file_get_contents(filename: __DIR__ . '/data.json');
    $data = json_decode($file, true);

    foreach ($data as $value) {
        $sql = 'INSERT INTO `courses` (name, description, image, content) VALUES (?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$value['name'], $value['description'], $value['image'], $value['content']])) {
            echo "Trayecto {$value['name']} created successfully\n";
        } else {
            echo 'Error creating trayecto: ' . $conn->error . "\n";
        }
    }
};
