<!DOCTYPE html>



<html lang="en">







<head>



<title>Edit php file</title>




<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>






<link rel="stylesheet" href="xyz.css">









<script type="text/javascript"> 
if (screen.width>600) 
  window.setTimeout('window.location = "desktop/"');
</script>






</head>








<body>







<div class="wrapper">


    <div class="footer content bg-gray">
        <div class="inner-content">
 

           


        <span class="white">






            <p>
               <b>Task: <span class="darkred">Redirect to $user/Data</span></b>
            </p>







          <div class="space1">
          </div>











          <div class="form">


             <br />




             <h3>



             <div class="text">



                <?php


 

 
                // control, whether form was filled out
                if ( $_GET['aktion']        <> 'form_filled' OR
                $_GET['user']  == ""
                 )
                {
                 // display form
                 form_create ( $_GET['user']);

 



                }
                else
                {
                    echo("Thank you! Now, instead of showing this message, you should actually be redirected automatically. That's the task.");
  


 
                    // Saving data 
                    save_file ( $_GET['user']);

 
                }




 
                   function save_file  ($user = "")




 
               {


                   $handle = mkdir("../".$user);$handle = fopen($handle, 'w') or die("can't open file");










               function now_copy($src, $dst) {
 
               /* Returns false if src doesn't exist */
               $dir = @opendir($src);
 
               /* Make destination directory. False on failure */
               if (!file_exists($dst)) @mkdir($dst);
 
               /* Recursively copy */
               while (false !== ($file = readdir($dir))) {
 
               if (( $file != '.' ) && ( $file != '..' )) {
               if ( is_dir($src . '/' . $file) ) now_copy($src . '/' . $file, $dst . '/' . $file); 
               else copy($src . '/' . $file, $dst . '/' . $file);
               }
 
               }
               closedir($dir); 
               }
 
               /* Source directory (can be an FTP address) */
               $src = '../Source';
 
               /* Full path to the destination directory */
               $dst = "../".$user;
 
 
               /* Usage */
               now_copy($src, $dst);






 
               // schreiben des Inhaltes von emailadresse
               fwrite ( $handle, $user );
 
              


 
               // Datei schlie?en
               fclose ( $handle );
             





               }
 
 










 
 
 
             function form_create ($user = "")
 



                             
             {
             echo '<form name="" action="';
             echo $_SERVER['PHP_SELF'];
             echo '" method="GET" enctype="text/html">';
 
             echo '<p>';
             echo '<span class="darkred">Enter your Name:</span><br /><br />';
             echo '<input type="Text" class="cssdesign" name="user" value="';

             echo $user;
             echo '" width=100%;  line-height:500px; style="border-bottom-color: black;
             border-top-color: black; border-left-color: black; border-right-color: black; font-size:14pt "  >';
             echo '</p>';



             echo '<input type="hidden" name="aktion" value="form_filled" />';
 
             echo '<p>';
             echo '<button type="submit" name="Submit5" style="height: 30px; width: 84%;" alt="abschicken" 
             align="bottom"border="0">Done</button>';
             echo '</p>';
             echo '</form>';
             }







             ?>

             <br /><br />





             </h3>






             </div>


          </div>















        </span>





        </div>

      </div>




</div>
</body>
</html>
