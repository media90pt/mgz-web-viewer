<script language="php">


# MEDI@90.pt

# ZIP JPG READER
# 2017
#
#
# 
error_reporting(0);
echo"
<style>

	body
{
  border: none;
  margin: 0px 10px 0px 10px;
  padding: 0px 0px 0px 0px;
  background-color: #231614;
  color: #ffd3ad;
  font-family:century gothic,arial;
  font-size: 12px;
}
	/* vietnamese */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 400;
  src: local('Muli Regular'), local('Muli-Regular'), url(http://fonts.gstatic.com/s/muli/v11/Ul00HI23GehQ9qPsH_7ocQ.woff2) format('woff2');
  unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 400;
  src: local('Muli Regular'), local('Muli-Regular'), url(http://fonts.gstatic.com/s/muli/v11/jbCPU7JDvi-y7oVFF-ztAg.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 400;
  src: local('Muli Regular'), local('Muli-Regular'), url(http://fonts.gstatic.com/s/muli/v11/z6c3Zzm51I2zB_Gi7146Bg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
}
body{	
	font-family:Muli,Trebuchet MS,Arial;
	
}

img{
	box-shadow: 10px 10px 5px black;
	
}
a{}
a:link{
	color:blue;
}
a:hover{
	color:aqua;
}
a:visited{
	color:purple;
}
</style>


";

if(!empty($_GET['head'])){				#CABECALHO
	echo'
	<body bgcolor=yellow>
	<h1>Online Magazine<h1>
	';
	
}
elseif(!empty($_GET['explore'])){		#EXPLORADOR LISTA DE FICHEIROS
	echo'
	<body bgcolor=white>
	
	';
	
	
	
	
	
// Open a directory, and read its contents

$dir = "DB/";

if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
		if ($file != '.'&&$file != '..' && $file != 'index.php'){
			
			$file1 = explode(".",$file);
echo '<li><img src=""><a href="engine.php?options='.$file. '" target="options" >'.$file1[1]. '</a>';
			
	
    }
	}
    closedir($dh);
  }
}
	}
elseif(!empty($_GET['read'])){			#LER DENTRO CBZ MGZ PDF
	echo'
	<body bgcolor=#0F0F0F text=white>
<center>
	';

$url ='DB/';
$file= $_GET['pag'];

$handle = fopen('zip://'.realpath($url.$_GET['read']) . '#'.$file, 'r'); 
$result = '';
while (!feof($handle)) {
  $result .= fread($handle, 8192);
}


$imag = $result;
$image = file_get_contents($imag);
if ($image !== true){
    echo '<img style="border:0px;"src="data:image/jpg;base64,'.base64_encode($result).'" alt="'.$_GET['pag'].'" height="95%" >';

}


#fclose($handle);





#file_put_contents(getcwd().'/'.$_GET['read'], fopen($url, 'r'));
#chmod(getcwd() . $_GET['read'], 777);

#$fileName = $_GET['pag'];
#$data = file_get_contents('zip://' .  realpath('DB/'.$_GET['read']) . '#' . $fileName);

// Format the image SRC:  data:{mime};base64,{data};
#$src = base64_encode(file_get_contents($data));




#$path = '01.jpg';
#$type = pathinfo($path, PATHINFO_EXTENSION);
#$data = file_get_contents($path);
#$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);



#error_reporting(E_ALL);


#OPTION1
#$result = file_get_contents('zip://'.$_GET['read'].'#'.$_GET['pag'].''); 
#echo $result;

#OPTION2
/*
 $handle = fopen('zip://test.zip#test.txt', 'r'); 
$result = '';
while (!feof($handle)) {
  $result .= fread($handle, 8192);
}
fclose($handle);
echo $result;
*/

#OPTION3 

#$fp = fopen('zip://'.$_GET['read'].'#'.$_GET['pag'], 'r','./'); 

 /**
* This method unzips a directory within a zip-archive
*
* @author Florian 'x!sign.dll' Wolf
* @license LGPL v2 or later
* @link http://www.xsigndll.de
* @link http://www.clansuite.com
*/
/*
$zip = './/'.$_GET['read'];
$zipfile = $_GET['pag'];
$zipDir='./';

$zip = new ZipArchive;
$zip->open($zip);
echo $zip->getFromName($zipfile);
$zip->close();
*/
// The call to exctract a path within the zip file
#extractZip( 'clansuite.zip', 'core/filters' );


/*
$img = imagecreatefromjpeg($data);
ob_start();
imagepng($img);
$bin = ob_get_clean();
$b64 = base64_encode($bin);

echo '<img src="data:image/png;base64,'. base64_encode(file_get_contents($data)) .'">';	
*/




// Read image path, convert to base64 encoding
#$imageData = ;


}
elseif(!empty($_GET['options'])){		#SALA UTILIZADOR
	echo'
	<body bgcolor=grey>
	pages';
	
	
		//create a ZipArchive instance
			$zip = new ZipArchive;
		//open the archive
if ($zip->open('DB/'.$_GET['options']) === TRUE) {
    //iterate the archive files array and display the filename or each one
    for ($i = 0; $i < $zip->numFiles; $i++) {
		
		$namef= $zip->getNameIndex($i);
		$file1 = explode(".",$namef);
        echo '<li><a onclick=this.style.color="purple";openpopup(); href="engine.php?read='.$_GET['options']. '&pag='.$zip->getNameIndex($i).'" target="read" >' . $file1[0] . '</a>';
    }
} else {
    
}
	echo '
	<h5>Details</h5>
	<hr>';	
/*
TESTING ....
$zip = zip_open('DB/'.$_GET['options']);
if ($zip) {
while ($zip_entry = zip_read($zip)) {
echo "<li>Name:               " . zip_entry_name($zip_entry) . "n";
echo "<li>Actual Filesize:    " . zip_entry_filesize($zip_entry) . "n";
echo "<li>Compressed Size:    " . zip_entry_compressedsize($zip_entry) . "n";
echo "<li>Compression Method: " . zip_entry_compressionmethod($zip_entry) . "n";
if (zip_entry_open($zip, $zip_entry, "r")) {
echo "File Contents:n";
$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
echo "$bufn";
zip_entry_close($zip_entry);
}
echo "n";
}
zip_close($zip);
}

FAIL!
*/		
	}
elseif(!empty($_GET['z'])){}
else{									# SENAO MENU
	ECHO'<CENTER>
	<H1>Z reader</H1>
	<A HREF="?explore=home">ENTER</A><p>
	simple php cbz mgz reader. reads jpg inside zip file .<br>
	Developed by media90.pt 
	';
	
}									

</script>