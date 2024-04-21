<?php

session_start();
session_unset();
session_destroy();

// Going to website
header("location: ../index.php?error=none");