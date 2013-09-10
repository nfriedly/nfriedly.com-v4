<pre>
<b>Uptime:</b> 
<?php system("uptime"); ?>

<b>System Information:</b>
<?php system("uname -a"); ?>


<b>Memory Usage (MB):</b> 
<?php system("free -m"); ?>


<b>Disk Usage:</b> 
<?php system("df -h"); ?>


<b>CPU Information:</b> 
<?php system("cat /proc/cpuinfo | grep \"model name\\|processor\""); ?>
</pre>
