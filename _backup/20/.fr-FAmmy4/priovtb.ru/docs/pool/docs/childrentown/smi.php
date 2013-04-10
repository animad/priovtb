<?php
     $title="Город детства";
     $name="childrentown";
    require('./db/dbopen.php');
    require('shablonbank.html');
?> 

<TABLE align=left WIDTH=99% class=mainmenu BORDER=0  CELLSPACING=0 CELLPADDING=0>
<tr> <td  align=center  style=background-color=#006363 class=textheader colspan=3><div style=margin:3>Город детства - СМИ о проекте </td></tr>
<tr> <td class=text align=left><div style=margin:10>

<?php
   
//$opennews=
 require("childrentown/news".$news.".htm");
    
?> 
</div>
<p align=center><a href='childrentown.php' class=menu1>назад</a><br>&nbsp;


</td></tr>





</TABLE>



<?php
    require('shablonbot.html');
?> 