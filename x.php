<?php
//1. Instanciate Word
$word = new COM("word.application") or die("Unable to instantiate Word");
$template_file = "C:/Doc7.doc";
//3. open the template document
$word->Documents->Open($template_file);
$word->Selection->InlineShapes->AddPicture("C://Sunset.jpg", False, True);
//7. save the template as a new document (c:/reminder_new.doc)
$new_file = "c:/Doc7.doc";
$word->Documents[1]->SaveAs($new_file);
//8. free the object
$word->Quit();
$word = null;
?>