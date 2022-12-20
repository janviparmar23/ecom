<?php
/* function addintofile($folder_name, $file_name, $msg)
{
if(!is_dir($folder_name))
{
mkdir($folder_name);
}else{
$myfile = fopen("$folder_name\\$file_name", "a") or die("Unable to open file!");
fwrite($myfile, "\n $msg " . date('Y-m-d h:i:sa'));
}
return $folder_name.$file_name.$msg;
}
addintofile("sandip","patel.txt","sf");
addintofile("janvi","parmar.txt","abc");
*/

interface example {
    public function firstname();
    public function lastname();

}
class Names implements example 
{
  public $firstname;
  public $lastname;
  function __construct($firstname, $lastname)
  {
    $this->firstname = $firstname;
    $this->lastname = $lastname;
  }
  function firstname()
  {
    return $this->firstname;
  }
  function lastname()
  {
    return $this->lastname;
  }
  
}
class Fullname extends Names{
  function fullname()
  {
    $full_name = $this->firstname . $this->lastname;
    echo " $full_name";
  }
  const Janvi = "i'm janvi parmar";

}
class abc {
  public static function abcd(){
    echo " good morning";
  }
  
}

$abc = new Fullname("janvi", "parmar");
echo "$abc->firstname $abc->lastname";
echo "<br>";
//$Fullname= $abc->fullname();
echo Fullname::Janvi;
abc::abcd();
?>






