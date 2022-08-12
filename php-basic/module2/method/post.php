<?php
if(!empty($_POST)){
    $username =$_POST['username'];
    $email= $_POST['email'];
    echo 'Username: '.$username.'<br/>';
    echo 'Email: '.$email.'<br/>';

}
?>



<form action="" method="post">
    <p>
        <input type="text" name="username" placeholder="Username..."/>
    </p>
    <p>
        <input type="text" name="email" placeholder="Email..."/>
    </p>
    <p>
        <button type="submit">Submit</button>
    </p>
</form>