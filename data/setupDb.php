<?php

try {
    $dbPath = __DIR__.'/database.sqlite';
    $dbh = new PDO('sqlite:'.$dbPath);
} catch(PDOException $e) {
    die('Panic! '.$e->getMessage());
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*** begin the transaction ***/
$dbh->beginTransaction();

$query = <<<EOF

DROP TABLE IF EXISTS people_to_spam;

CREATE TABLE people_to_spam (
    id INTEGER PRIMARY KEY,
    email STRING,
    name STRING,
    spamming_since TIMESTAMP
);

INSERT INTO people_to_spam VALUES(1,'hello@gmail.com', 'KnpU', '2018-06-05');
INSERT INTO people_to_spam VALUES(2,'pandeyaditya951@gmail.com', 'Aditya Pandey', '2018-02-24');
EOF
    ;

$dbh->exec($query);
$dbh->commit();