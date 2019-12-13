<?
// Authorization page

// Function of Code Generation
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// database
 $link=mysqli_connect("localhost","root","","Zhasa");
    

if(isset($_POST['submit']))
{
    // Requesting for a typed login if it's in a DataBase
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Password Comparing
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Generating a random numbers and encrypting them
        $hash = md5(generateCode(10));

        if(!empty($_POST['not_attach_ip']))
        {
            // Translating IP to row
            // If user connected to an IP
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }

        // Inserting a new IP and hash to DB
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

        session_start();
        $_SESSION["user_id"] = $data['user_id'];

        // Readressing the browser to script checking page
        header("Location: ../admin.php"); exit();
    }
    else
    {
        print "Wrong login or password";
    }
}
?>
