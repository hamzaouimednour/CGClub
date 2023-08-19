<?php
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
$GLOBALS['err0'] = "You have to upload a Picture !";
$GLOBALS['err1'] = "Invalid Type !, Accept only ( image/jpeg, image/jpg, image/png, image/gif )";
$GLOBALS['err2'] = "Invalid size !, Max Size is 5MB ";
$GLOBALS['err3'] = "Extension Not Allowed !, Accept only ( .jpeg, .jpg, .png, .gif ) ";
$GLOBALS['err4'] = "Permission denied to upload File !";
$GLOBALS['error'] = "Error Operation failed , Try again !";
$GLOBALS['errpwd'] = "Error Operation failed , Password doesn't match !";
$GLOBALS['erropwd'] = "Error Operation failed , Old Password incorrect !";
$GLOBALS['1'] = "Votre message n'a pas été envoyé. Veuillez ré-essayer plus tard ";
date_default_timezone_set('Africa/Tunis');

class Dance {
    private $securekey, $iv;
    function __construct() {
        $this->securekey = hash('sha1','@bx19$ecurekey#',TRUE);
        $this->iv = mcrypt_create_iv(32);
    }
    function encrypt($input) {

		$encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $this->securekey, $input, MCRYPT_MODE_ECB, $this->iv);
    	$encrypted_string = base64_encode($encrypted_string);
    	return $encrypted_string;

    }
    function decrypt($input) {
	    return trim(mcrypt_decrypt(MCRYPT_BLOWFISH, $this->securekey, base64_decode($input), MCRYPT_MODE_ECB, $this->iv));
    }
    function sqli($var) {
       // $var = strip_tags(mysql_real_escape_string(trim($var)));
       $var = addslashes(trim($var));
       return $var;
    }
    function xss($var) {
       $var = htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
       return $var;
    }
    function csqli($var,$n=null) {
      if(is_null($n))
       $var = stripslashes($var);
      else
        $var = implode("",explode("'",$var));
       return $var;
    }
    function clean($var){
    $var = implode("",explode("<",$var));
    $var = implode("",explode(">",$var));
    $var = implode("",explode("'",$var));
    $var = implode("",explode("/",$var));
    $var = implode("",explode("\\",$var));
    $var = implode("",explode("-",$var));
    return stripslashes(trim($var));
  }
    function ip() {
    $scan_headers = array(
    			'HTTP_VIA',
    			'HTTP_X_FORWARDED_FOR',
    			'HTTP_FORWARDED_FOR',
    			'HTTP_X_FORWARDED',
    			'HTTP_FORWARDED',
    			'HTTP_X_CLUSTER_CLIENT_IP',
    			'HTTP_CLIENT_IP',
    			'HTTP_FORWARDED_FOR_IP',
    			'HTTP_PROXY_CONNECTION',
    			'REMOTE_ADDR',
          'HTTP_USER_AGENT'
    		);
        $ip = '';
      foreach($scan_headers as $i)
        if(isset($_SERVER[$i]))
            $ip .= $_SERVER[$i]."\n";

    return $ip;
    }
    function redirect($page){
      header("Cache-Control: no-cache,no-store, must-revalidate"); // HTTP/1.1
      header("HTTP/1.1 301 Moved Permanently");
      header("location:".$page);
      exit;
    }
    function mailer(array $to, $subject, $msg, $sender, $replyto,$lang){
          require $_SERVER['DOCUMENT_ROOT'].'/web/PHPMailer-5.2/PHPMailerAutoload.php';
          $mail = new PHPMailer;
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'server120.web-hosting.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'no-reply@cgc-escs.club';                 // SMTP username
          $mail->Password = 'cgcno-reply01';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 25;                                    // TCP port to connect to
          $mail->setFrom($sender, 'Computer Geek Club');
          $mail->addReplyTo($replyto, 'Contact');
          // $mail->addAddress('santiboy.cyberknight@gmail.com');     // $mail->addAddress('email','nom');
          //$mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');
          //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $subject;

          foreach ($to as $email => $name) {
            $mail->addAddress($email);
            if($lang == 'fr' and !empty($name)){
              $mail->Body = "<br>Bonjour $name,<br><br>";
            }elseif($lang == 'en' and !empty($name)){
              $mail->Body = "<br>Dear $name,<br><br>";
            }elseif($lang == 'en' and empty($name)){
                $mail->Body = "<br>Hello,<br><br>";
            }else{
                $mail->Body = "<br>Bonjour,<br><br>";
            }
            $mail->Body    .= $msg;
            if(!$mail->send()) {
                $e = 0;
            } else {
                $e = 1;
            }
             $mail->clearAddresses();
          }
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          $send  = array();
          if($e == 0) {
              $send['msg'] = 'Mailer Error: ' . $mail->ErrorInfo;
              $send['type'] = 'error';
          } else {
              $send['msg'] = 'Message has been sent';
              $send['type'] = 'success';
          }
          return $send;
      }
}

class FeistelCipherHelper
{

    /**
     * @param     $str
     * @param int $i
     * @return string
     */
    public static function encode($str, $i = 7)
    {
        $len = strlen($str);
        if ($len % 2 !== 0)
        {
            $str = $str.' ';
        }
        $str = str_split($str, 2);
        $hash = '';
        foreach ($str as $chr)
        {
            $l = ord(substr($chr, 0, 1));
            $r = ord(substr($chr, 1));
            FeistelCipherAlgorithm::encode($l, $r, $i);
            $l = chr($l);
            $r = chr($r);
            $hash .= $l.$r;
        }
        $hash = trim($hash, ' ');
        $hash = Base64Url::encode($hash);

        return $hash;
    }

    /**
     * @param     $hash
     * @param int $i
     * @return string
     */
    public static function decode($hash, $i = 7)
    {
        $hash = Base64Url::decode($hash);
        $len = strlen($hash);
        if ($len % 2 !== 0)
        {
            $hash = $hash.' ';
        }
        $hash = str_split($hash, 2);
        $str = '';
        foreach ($hash as $chr)
        {
            $l = ord(substr($chr, 0, 1));
            $r = ord(substr($chr, 1));
            FeistelCipherAlgorithm::decode($l, $r, $i);
            $l = chr($l);
            $r = chr($r);
            $str .= $l.$r;
        }
        $str = trim($str, ' ');

        return $str;
    }
}

class XorHelper
{
    /**
     * @param     $str
     * @param     $passw
     * @param     $salt
     * @return int|string
     */
    public static function encode($str, $passw, $salt)
    {
        $str = XorAlgorithm::code($str, $passw, $salt);
        $str = Base64Url::encode($str);

        return $str;
    }

    /**
     * @param     $str
     * @param     $passw
     * @param     $salt
     * @return int|string
     */
    public static function decode($str, $passw, $salt)
    {
        $str = Base64Url::decode($str);
        $str = XorAlgorithm::code($str, $passw, $salt);

        return $str;
    }
}

class Base64Url
{
    /**
     * @param string $input
     * @return string
     */
    public static function encode($input)
    {
        $str = strtr(base64_encode($input), '+/', '-_');
        $str = str_replace('=', '', $str);

        return $str;
    }

    /**
     * @param string $input
     * @return string
     */
    public static function decode($input)
    {
        return base64_decode(strtr($input, '-_', '+/'));
    }
}

class XorAlgorithm
{
    public static function code($str, $passw = '', $salt = 'aeJRhN7840Xn')
    {
        $len = strlen($str);
        $gamma = '';
        $n = $len > 100 ? 8 : 2;
        while (strlen($gamma) < $len)
        {
            $gamma .= substr(pack('H*', sha1($passw.$gamma.$salt)), 0, $n);
        }

        return $str ^ $gamma;
    }
}

class FeistelCipherAlgorithm
{
    /**
     * @param $block
     * @param $key
     * @return int
     */
    public static function func($block, $key)
    {
        $val = ((2 * $block) + pow(2, $key));

        return $val;
    }

    /**
     * @param     $left
     * @param     $right
     * @param int $steps
     */
    public static function encode(&$left, &$right, $steps = 5)
    {
        $i = 1;
        while ($i < $steps)
        {
            $temp = $right ^ static::func($left, $i);
            $right = $left;
            $left = $temp;
            $i++;
        }

        $temp = $right;
        $right = $left;
        $left = $temp;
    }

    /**
     * @param     $left
     * @param     $right
     * @param int $steps
     */
    public static function decode(&$left, &$right, $steps = 5)
    {
        $i = $steps - 1;
        while ($i > 0)
        {
            $temp = $right ^ static::func($left, $i);
            $right = $left;
            $left = $temp;
            $i--;
        }
        $temp = $right;
        $right = $left;
        $left = $temp;
    }
}
?>
