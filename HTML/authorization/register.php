<?
// Registration page of new user


    $link=mysqli_connect("localhost","root","","Zhasa");

if(isset($_POST['submit']))
{
    $err = [];

    // Checking a login
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Login could be created by symbols among [A-Z] and 0-9";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Login must contain min 3 and max 30 symbols";
    }

    // Checking to the existence of typed login
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "User with such login already exists";
    }

    // Inserting into database if there are no errors
    if(count($err) == 0)
    {

        $login = $_POST['login'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $img_path = NULL;
        if (isset($_FILES["image"])&&isset($_FILES["image"]["name"])) {
            $temp = explode(".", $_FILES["image"]["name"]);
            $file_name = time().".".end($temp);
            move_uploaded_file($_FILES["image"]["tmp_name"], "avatars/$file_name");
            $img_path = "authorization/avatars/$file_name";
        }



        // Removing spaces and making double hash
        $password = md5(md5(trim($_POST['password'])));

        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."', firstname='$firstname', lastname='$lastname',  user_img='$img_path'");
        header("Location: ../index.php"); exit();
         
    }
    else
    {
        print "<b>During the registration appeared such problems:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?>

