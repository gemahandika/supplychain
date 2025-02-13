<?php
session_name("berita_session");
session_start();
session_destroy();
header("location:index.php");
