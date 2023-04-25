<?php


class User {
  public static function logout() {
    unset($_COOKIE['auth']);
    // empty value and expiration one hour before
    setcookie('auth', '', -1,'/');  
  }


  public static function createcookie($user, $password) {
    $string = "user=".$user; 
    $passphrase = 'pntstrlb'; 
    return encryptString($string, $passphrase); 

  } 

  public static function getuserfromcookie($auth) {
    $passphrase = 'pntstrlb';
    $lnk = mysqli_connect("localhost", "user", "password","chat");
    $data = decryptString($auth, $passphrase);
    list($a, $user) = explode("=", $data);
    $sql = "SELECT * FROM user where username=\"";
    $sql.= mysqli_real_escape_string($lnk, $user);
    $sql.= "\"";
    $result = mysqli_query($lnk, $sql);
    if ($result) {
      if ($row = mysqli_fetch_assoc($result)) {
        return $row['username'];
      }
      else {
        echo "User not found: ".htmlentities($user);
        return NULL;
      }
    }
    return NULL;
  }
  public static function login($user, $password, $lnk) {
    $sql = "SELECT * FROM user where username=\"";
    $sql.= mysqli_real_escape_string($lnk, $user);
    $sql.= "\" and password=md5(\"myseedgoeshere";
    $sql.= mysqli_real_escape_string($lnk, $password);
    $sql.= "\")";
    $result = mysqli_query($lnk, $sql);
    if ($result) {
      $row = mysqli_fetch_assoc($result);
      if ($user === $row['username']) {
        return TRUE;
      }
    }
    return FALSE;
  }
  public static function register($user, $password, $uname, $lnk) {
    $sql = "INSERT INTO  user (username,password,uname) values (\"";
    $sql.= mysqli_real_escape_string($lnk,$user);
    $sql.= "\", md5(\"myseedgoeshere";
    $sql.= mysqli_real_escape_string($lnk,$password);
    $sql.= "\"),\"";
    $sql.= mysqli_real_escape_string($lnk,$uname);
    $sql.= "\")";
    $result = mysqli_query($lnk, $sql);
    if ($result) {
      return TRUE;
    }
    else 
      echo mysqli_error($lnk);
    return FALSE;
  }

  public static function check($username, $lnk){
  $user=mysqli_real_escape_string($lnk, $username);
  $check_username = mysqli_query($lnk, "SELECT username FROM user where username = '".$user."' ");
  if(mysqli_num_rows($check_username) > 0){
    echo('Username Already exists');
    return FALSE;
    } else {
      return TRUE;
    }
  }
}


function encryptString($unencryptedText, $passphrase) { 
  $iv = random_bytes( mcrypt_get_iv_size(MCRYPT_DES, MCRYPT_MODE_CBC));
  $text = pkcs5_pad($unencryptedText,8);
  $enc = mcrypt_encrypt(MCRYPT_DES, $passphrase, $text, MCRYPT_MODE_CBC, $iv); 
  return base64_encode($iv.$enc); 
}

function decryptString($encryptedText, $passphrase) {
  $encrypted = base64_decode($encryptedText);
  $iv_size =  mcrypt_get_iv_size(MCRYPT_DES, MCRYPT_MODE_CBC);
  $iv = substr($encrypted,0,$iv_size);
  $dec = mcrypt_decrypt(MCRYPT_DES, $passphrase, substr($encrypted,$iv_size), MCRYPT_MODE_CBC, $iv);
  $str = pkcs5_unpad($dec); 
  if ($str === false) {
    echo "Invalid padding";
    die(); 
  }
  else {
    return $str; 
  }
}
function pkcs5_pad ($text, $blocksize) 
{ 
    $pad = $blocksize - (strlen($text) % $blocksize); 
    return $text . str_repeat(chr($pad), $pad); 
} 

function pkcs5_unpad($text) 
{ 
    $pad = ord($text{strlen($text)-1}); 
    if ($pad === 0) return false;
    if ($pad > strlen($text)) return false; 
    if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false; 
    return substr($text, 0, -1 * $pad); 
} 

?>
