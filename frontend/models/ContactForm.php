<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\contact\Contact;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $username;
    public $email;
    public $title;
    public $body;
    public $rating;
    public $status;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['username', 'email', 'title','status', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['status'],'integer'],

        ];
    }

    public function attributeLabels()
    {
        return [
          'username' => 'Ismingiz',
          'email' => 'Elektron Pochtangiz',
          'title' => 'Xabar mavzusi',
          'body' => 'Xabar matni'
        ];
    }
    public function save() {
        $contact = new Contact();
        $contact->username = $this->username;
        $contact->email = $this->email;
        $contact->title = $this->title;
        $contact->body = $this->body;
        $contact->status = $this->status;
        if ($contact->save()) {
            return true;
        }
        else{
            return $contact->errors;
        }
    }
    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->username])
            ->setSubject($this->title)
            ->setTextBody($this->body)
            ->send();
    }
}
