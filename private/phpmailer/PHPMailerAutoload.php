<?php
/**
 * PHPMailer SPL autoloader.
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * PHPMailer SPL autoloader.
 * @param string $classname The name of the class to load
 */
function PHPMailerAutoload($classname)
{
    //Can't use __DIR__ as it's only in PHP 5.3+
    $filename = dirname(__FILE__).DIRECTORY_SEPARATOR.'class.'.strtolower($classname).'.php';
    if (is_readable($filename)) {
        require $filename;
    }
}

if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    //SPL autoloading was introduced in PHP 5.1.2
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('PHPMailerAutoload', true, true);
    } else {
        spl_autoload_register('PHPMailerAutoload');
    }
} else {
    /**
     * Fall back to traditional autoload for old PHP versions
     * @param string $classname The name of the class to load
     */
    function __autoload($classname)
    {
        PHPMailerAutoload($classname);
    }
}

function phpMailer($opt) {
	$opt["from"]["email"] = isset( $opt["from"]["email"] ) ? $opt["from"]["email"] : "ex@mail.com";
	$opt["from"]["name"] = isset( $opt["from"]["name"] ) ? $opt["from"]["name"] : "";
	$opt["to"]["email"] = isset( $opt["to"]["email"] ) ? $opt["to"]["email"] : "to@gmail.com";
	$opt["to"]["name"] = isset( $opt["to"]["name"] ) ? $opt["to"]["name"] : "";
	$opt["subject"] = isset( $opt["subject"] ) ? $opt["subject"] : "";
	$opt["body"] = isset( $opt["body"] ) ? $opt["body"] : "";

	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "kajolahammed@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "v11o7v7v";
	// below code only for localhost
	$mail->smtpConnect(
		array(
			"ssl" => array(
				"verify_peer" => false,
				"verify_peer_name" => false,
				"allow_self_signed" => true
			)
		)
	);


	$mail->setFrom($opt["from"]["email"], $opt["from"]["name"]);          // sent from email
	$mail->addReplyTo($opt["from"]["email"], $opt["from"]["name"]);      //reply-to email
	$mail->addAddress($opt["to"]["email"], $opt["to"]["name"]);         // sent to email


	$mail->Subject = $opt["subject"]; // email subject
	$mail->Body = $opt["body"]; // email body in html
	$mail->AltBody = isset($opt["body_text"]) ? $opt["body_text"] : $opt["body"]; // email body in plain-text

	//send the message, check for errors
	if ($mail->send()) {
		return true;
	}
	return false;
}
