<?php


namespace common\models\sms;

use common\models\groups\WaitList;
use common\widgets\Detect;
use ErrorException;
use rahmatullo\eskizsms\Eskiz;
use Yii;
use yii\base\Model;

class Sms extends Model
{
    public $message;

    public function rules(): array
    {
        return [
            [['message'], 'required'],
            [['message'], 'string', 'max' => 160]
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'message' => 'Xabar matni'
        ];
    }

    /**
     * @throws ErrorException
     */
    public function sendMessage(array $selection): bool
    {
        $sms = new Eskiz(Yii::$app->params['eskiz_email'], Yii::$app->params['eskiz_key']);
        $options = $this->createSmsOptions($selection);

        $res = $sms->sendSmsBatch($options);
        if ($res->status == 'success') {
            $this->changeWaitListStatus($selection);
            return $this->saveDispatchId($options['dispatch_id']);
        }
        throw new \yii\base\ErrorException($res->message);
    }

    public function createSmsOptions(array $selection): array
    {
        $options = [
            'dispatch_id' => Yii::$app->user->id,
            'from' => Yii::$app->params['eskiz_nick']
        ];
        foreach ($selection as $item) {
            $options['messages'][] = [
                'to' => $this->sanitizePhone(WaitList::findOne($item)->phone_number),
                'text' => $this->message
            ];
        }
        return $options;
    }

    public function sanitizePhone(string $phone): string
    {
        return preg_replace('/[^0-9]/', '', $phone);
    }

    private function changeWaitListStatus(array $selection): void
    {
        foreach ($selection as $item) {
            $list = WaitList::findOne($item);
            $list->status = Detect::REPLY;
            $list->save();
        }
    }

    public function saveDispatchId(int $dispatch_id): bool
    {
        $dispatch = SmsDispatch::findOne(['dispatch_id' => $dispatch_id]) ?? new SmsDispatch();
        $dispatch->dispatch_id = $dispatch_id;
        return $dispatch->save();
    }
}