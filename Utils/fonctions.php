<?php

 
function convert($chaine)
{
$chaine = str_replace("<div>", "[blok]", $chaine);
$chaine = str_replace("</div>", "[/blok]", $chaine);

$chaine = str_replace("<strong>", "[strong]",  $chaine);
$chaine = str_replace("</strong>", "[/strong]", $chaine);

 
$chaine = str_replace("[br/]", "", $chaine);
$chaine = str_replace("[br]", "", $chaine);
 
$chaine = str_replace("<em>", "[i]",  $chaine);
$chaine = str_replace("</em>", "[/i]",  $chaine);
 
$chaine = str_replace("<del>", "[del]",  $chaine);
$chaine = str_replace( "</del>", "[/del]", $chaine);

$chaine = str_replace("<h1>", "[title]",  $chaine);
$chaine = str_replace("</h1>", "[/title]", $chaine);

$chaine = str_replace("<blocquote>", "[quote]",  $chaine);
$chaine = str_replace("</blocquote>", "[/quote]",  $chaine);

$chaine = str_replace("&lt;/script&gt;", "",  $chaine);
$chaine = strip_tags($chaine);
return $chaine;
}

function convert_show($chaine)
{
$chaine = str_replace("[blok]", "<div>", $chaine);
$chaine = str_replace("[/blok]", "</div>", $chaine);

$chaine = str_replace("[strong]", "<strong>", $chaine);
$chaine = str_replace("[/strong]", "</strong>", $chaine);

 
$chaine = str_replace("[br/]", "", $chaine);
$chaine = str_replace("[br]", "", $chaine);
 
$chaine = str_replace("[i]", "<em>", $chaine);
$chaine = str_replace("[/i]", "</em>", $chaine);
 
$chaine = str_replace("[del]", "<del>", $chaine);
$chaine = str_replace("[/del]", "</del>", $chaine);

$chaine = str_replace("[title]", "<h1>", $chaine);
$chaine = str_replace("[/title]", "</h1>", $chaine);

$chaine = str_replace("[quote]", "<blocquote>", $chaine);
$chaine = str_replace("[/quote]", "</blocquote>", $chaine);
return $chaine;
}

function colorCheck($status) {
    if ($status = "Empty") {return '\'<i class="fas_red fas fa-exclamation-circle"></i>\' : \'<i title="Les pseudos offensants ou injurieux seront automatiquement bannis !" class="fas fa-info-circle"></i>';}
    else if ($status = "Success") {return '<i class="fas_green fas fa-check"></i>';}
    else {return '<i class="fas_red fas fa-exclamation-circle"></i>';}
}
?>
