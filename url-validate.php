<?php

define("ROOT", __DIR__);


$url = $_SERVER['REQUEST_URI'];

//path to directory to scan
$directory = "xml/";


//get all image files with a .txt extension.
$dir = ROOT."\*.xml";


//print_r($file = glob($dir));
$file = glob($dir);
//var_dump($file);


// get isbn
$isbn=$_POST['isbn'];

$url = "http://".$isbn;

/*
if (!filter_var($isbn, FILTER_VALIDATE_URL) === false) 
{
    echo("$isbn is a valid URL");
    return false;
} 
else 
{
    echo("$isbn is not a valid URL");
    return false;
}
*/

//$length=strlen($fullfilename); //gets the length of the full filename so you can tell substr when to stop
//$filewithoutextension = substr($isbn,0,$isbn-4);

$frontWords = substr($isbn,0,$isbn+3); // get the end three words only that is com only. 
//echo $frontWords;

$endWords = substr($isbn,-3,$isbn+3);

$twoEndWords = substr($isbn,-2,$isbn+2);
//echo $endWords;


if($frontWords == "" && $endWords == "" && $twoEndWords == "")
{
   echo "<div class='alert alert-warning'><strong>The url must not empty.</strong></div>";
}
elseif($frontWords == "www" && $endWords == "com" || $twoEndWords == "cz"  || $twoEndWords == "uk"  || $twoEndWords == "in")
{
   echo "<div class='alert alert-primary'><strong>Website $url is validated.</strong></div>";
   //echo $url;
   //header("location: $url");
   //header("location: http://".$isbn);
   //die();
   //echo $isbn;
}
else
{
   echo "<div class='alert alert-danger'><strong>Website $url is NOT validated.</strong></div>";
}


/*
//print each file name
foreach($file as $filew)
{  
   $response=simplexml_load_file($filew);

   $data = $response->BookList->BookData;

   //var_dump($data);

   $isbn10 = $data['isbn'];
   $isbn13 = $data['isbn13'];
   $bookTitle = $data->Title;
   $bookLong = $data->TitleLong;
   $bookAuthor = $data->AuthorsText;
   $bookPublisher = $data->PublisherText;
   $bookEdition = $data->Details['edition_info'];
   $bookLanguage = $data->Details['language'];
   $bookPhysicalDesc = $data->Details['physical_description_text'];

   
   


   // check if we got at least one result 
   if($isbn == $isbn10 || $isbn == $isbn13 && $isbn != "")
   {
      echo 
      "<table class='table table-striped table-bordered'>
         <tr>
            <th>Short Title: </th>
            <td>{$bookTitle}</td>
         </tr>
         <tr>
            <th>Long Title: </th>
            <td>{$bookLong} </td>
         </tr>
         <tr>
            <th>Author(s): </th>
            <td>{$bookAuthor}</td>
         </tr>
         <tr>
            <th>Publisher: </th>
            <td>{$bookPublisher}</td>
         </tr>
         <tr>
            <th>ISBN10: </th>
            <td>{$isbn10}</td>
         </tr>
         <tr>
            <th>ISBN13: </th>
            <td>$isbn13</td>
         </tr>
         <tr>
            <th>Edition Information: </th>
            <td>{$bookEdition}</td>
         </tr>
         <tr>
            <th>Language: </th>
            <td>{$bookLanguage}</td>
         </tr>
         <tr>
            <th>Physical Description: </th>
            <td>{$bookPhysicalDesc}</td>
         </tr>
     </table>";
     return false;
   } 
}

if($isbn == "")
{
   echo '<div class="alert alert-danger"><strong>Please ISBN no must not Empty</strong></div>';
}
elseif($isbn !== $isbn10 || $isbn !== $isbn13 && $isbn !== "")
{
   echo '<div class="alert alert-warning"><strong>No book was found with ISBN: '.$isbn. '</strong></div>';
}
*/

?>