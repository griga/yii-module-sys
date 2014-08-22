<?php

/** Created by griga at 28.06.2014 | 15:36.
 *
 */
class MailService extends CComponent
{

    /**
     * @param string $templateName
     * @param [] $templateData
     * @param string $address
     */
    public static function send($templateName, $templateData, $address)
    {
        /** @var Template $template */
        $template = Template::model()->localized()->find('t.key="' . $templateName . '"');
        self::sendMessage(app()->mustache->compile($template->name, $templateData),
            app()->mustache->compile($template->content, $templateData),
            $address);

    }


    /**
     * @param string $subject
     * @param string $message
     * @param string $to
     */
    public static function sendMessage($subject, $message, $to)
    {
        /** @var EMailer|PHPMailer $mailer */
        $mailer = new EMailer();
        $mailer->IsSMTP();
        $mailer->IsHTML();
        $mailer->CharSet = 'UTF-8';
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = "tls";
        $mailer->Host = Config::get('mail.host');
        $mailer->Port = Config::get('mail.port');
        $mailer->Username = Config::get('mail.username');
        $mailer->Password = Config::get('mail.password');
        $mailer->From = Config::get('site_email_address');
        $mailer->FromName = Config::get('site_email_from');
        $mailer->AddReplyTo(Config::get('site_email_address'));
        $mailer->AddAddress($to);
        $mailer->Subject = $subject;
        $mailer->Body = $message;
        $mailer->Send();
    }

} 