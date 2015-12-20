$_SESSION['start'] = time(); // taking now logged in time
        $_SESSION['expire'] = $_SESSION['start'] + (1* 10) ; // ending a session in 30 seconds
            $now = time(); // checking the time now when home page starts
            if($now > $_SESSION['expire'])
            {
                session_destroy();
                echo "Your session has expire !  <a href='logout.php'>Click Here to Login</a>";
            }
            else
            {
                echo "This should be expired in 1 min <a href='logout.php'>Click Here to Login</a>";
            }