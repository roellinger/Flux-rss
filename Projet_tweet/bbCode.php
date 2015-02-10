<?php

function bbCode($article)
{
$article= preg_replace( "#\[b\](.*)\[/b\]#si", "<span class = \"gras\" >$1</span>",$article);
 $article = preg_replace( "#\[i\](.*)\[/i\]#si", "<span class = \"italique\" >$1</span>",$article); 
 $article= preg_replace( "#\[s\](.*)\[/s\]#si", "<span class = \"souligne\" >$1</span>",$article);

?>