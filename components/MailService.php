<?php
/** Created by griga at 28.06.2014 | 15:36.
 * 
 */

Yii::import('application.extensions.mailer.EMailer');

class MailService extends CComponent {

    public static function send($templateName, $templateData, $address){
        /** @var Template $template */
        $template = Template::model()->localized()->find('t.key="'.$templateName.'"');
        /** @var EMailer|PHPMailer $mailer */
        $mailer = new EMailer();
        $mailer->IsSMTP();
        $mailer->IsHTML();
        $mailer->CharSet = 'UTF-8';
        $mailer->SMTPAuth   = true;
        $mailer->SMTPSecure = "tls";
        $mailer->Host = Config::get('mail.host');
        $mailer->Port = Config::get('mail.port');
        $mailer->Username = Config::get('mail.username');
        $mailer->Password = Config::get('mail.password');
        $mailer->From = Config::get('site_email_address');
        $mailer->FromName = Config::get('site_email_from');
        $mailer->AddReplyTo(Config::get('site_email_address'));
        $mailer->AddAddress($address);
        $mailer->Subject = app()->mustache->compile($template->name,$templateData);
        $mailer->Body = app()->mustache->compile($template->content,$templateData);
        $mailer->Send();
    }

} 