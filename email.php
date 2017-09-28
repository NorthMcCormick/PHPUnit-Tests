<?php


class Email
{
  private $email;

  /**
   * Email constructor.
   * @param $email
   *
   * Creates a new email instance, requires a valid email as the first argument
   */
  function __construct($email)
  {
    $this->ensureIsValidEmail($email);

    $this->email = $email;
  }

  /**
   * @param $email
   * @return Email
   *
   * A static function to create a new email from a valid email as the first argument
   */
  public static function fromString($email)
  {
    return new self($email);
  }

  /**
   * @return mixed
   *
   * Allows this class to be used as a string
   */
  public function __toString()
  {
    return $this->email;
  }

  /**
   * Send a test email to the recipient
   */
  public function sendEmail() {
    $admin_email = "someone@example.com";
    $email = $this->email;
    $subject = 'Testing!';
    $comment = 'Test comment';

    //send email
    $this->phpMail($admin_email, "$subject", $comment, "From:" . $email);

    $this->logMail();
  }

  /**
   * Log that we sent an email and exit
   */
  public function logMail() {
    error_log('Sent some mail, exiting now!');
    exit;
  }

  /**
   * @param $email
   *
   * Validates an email, if invalid it throws an exception
   */
  private function ensureIsValidEmail($email)
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      throw new InvalidArgumentException(
        sprintf('"%s" is not a valid email address', $email)
      );
    }
  }

  /**
   * @param $email
   * @param $subject
   * @param $comment
   * @param $from
   *
   * Send the email
   */
  private function phpMail($email, $subject, $comment, $from) {
    mail($email, $subject, $comment, $from);
  }
}