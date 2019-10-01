<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit php file</title>
    <link rel="stylesheet" href="xyz.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <div class="footer content bg-gray">
            <div class="inner-content">
                <span class="white">
            <p>
               <b>Task: <span class="darkred">Redirect to $user/Data</span></b>
                </p>
                <div class="space1"></div>
                <div class="form">
          <h3>
             <div class="text">
                <?php
               /* control, whether form was filled out */
                if ( $_GET['aktion'] <> 'form_filled' OR $_GET['user']  == ""){
               /* Display form */
                 form_create ( $_GET['user']);
                }
                else{
                    /* Saving data */
                    save_file($_GET['user']);
                    //header('Location:'.$_GET['user'].'/DATA');
                    //echo("Thank you! Now, instead of showing this message, you should actually be redirected automatically. That's the task.");
                }
              function save_file  ($user = ""){
               /* create $user on server */
               $handle = mkdir("../".$user);
               $handle = fopen($handle, 'w') or die("can't open file");
               /* copy $src (=Source) into $dst (=$user) */
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
               //redirect to subdirectory created by the user.
               function redirect($user){
                  header('Location:'. '../' .$user. '/DATA');
               }
               /* Source directory (can be an FTP address) */
               $src = '../Source';
               /* Full path to the destination directory */
               $dst = "../".$user;
               //return $dst;
               /* Usage */
               now_copy($src, $dst);
               fwrite ( $handle, $user );
               fclose ( $handle );
               redirect($user);
               }
             function form_create ($user = ""){
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
             echo '<button type="submit" name="Submit5" style="height: 30px; width: 84%;" alt="send" 
             align="bottom"border="0">Done</button>';
             echo '</p>';
             echo '</form>';
             }?>
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