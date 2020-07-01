<?php
function colorCheck($status) {
    if ($status = "Empty") {return '\'<i class="fas_red fas fa-exclamation-circle"></i>\' : \'<i title="Les pseudos offensants ou injurieux seront automatiquement bannis !" class="fas fa-info-circle"></i>';}
    else if ($status = "Success") {return '<i class="fas_green fas fa-check"></i>';}
    else {return '<i class="fas_red fas fa-exclamation-circle"></i>';}
}
?>
