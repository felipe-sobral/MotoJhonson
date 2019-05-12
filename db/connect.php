<?php
    $cfg = require_once "cfg.php";

    try {
        $conn = new PDO("mysql:host={$cfg['db']['host']};dbname={$cfg['db']['dbname']};charset={$cfg['db']['charset']}",
                        $cfg['db']['username'],
                        $cfg['db']['password']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }