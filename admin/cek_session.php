<?php

if (!session_id())

    include '../koneksi.php';

if (!isset($_SESSION['auth_admin'])) header('Location: ../login.html');
