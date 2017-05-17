<?php
if ($handle = opendir('mail/')) {
  
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<a href='download.php?file=".$entry."'>".$entry."</a>\n";
        }
    }
    closedir($handle);
}
?>