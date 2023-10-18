<?php

$text = "###  This is a      text with extra spaces and hashes.  ###";
$trimmedText = trim($text, "# ");
echo $trimmedText; 