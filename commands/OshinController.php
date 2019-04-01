<?php

namespace app\commands;

use app\models\Event;
use yii\console\Controller;
use yii\db\Exception;

/**
 * The infamous maid
 *
 * @author Brian Nguyen
 */
class OshinController extends Controller
{
    /**
     * Clean up data
     * Clean up sdr systemnote url
     * @throws Exception
     */
    public function actionCleanData()
    {
        $db = \Yii::$app->db;
        $db->createCommand("UPDATE event SET temp = CAST(REGEXP_REPLACE(system_note, '(?<!https:)//', '/') AS CHAR) WHERE source='sdr'")->execute();
        $db->createCommand("UPDATE event SET system_note = temp WHERE temp IS NOT NULL AND source='sdr'")->execute();
        $db->createCommand("UPDATE event SET created_by = 35 WHERE created_by IS NULL;")->execute();
        echo "Cleanup done" . PHP_EOL;
        return 1;
    }

    /**
     * Clean up data
     * Clean up sdr systemnote url
     * @throws Exception
     */
    public function actionRandomRateBand()
    {
        $db = \Yii::$app->db;
        $db->createCommand("UPDATE band SET lno_score = ROUND((RAND() * (10-5)) + 5 )")->execute();
        echo "Random rate done" . PHP_EOL;
        return 1;
    }


    /**
     * Clean event SDR
     */
    public function actionCleanEvent()
    {
        \Yii::beginProfile('select');
        $events = Event::find()->where(['not', ['cost' => null]])->all();
        \Yii::endProfile('select');
        foreach ($events as $event) {
            if (stripos($event->cost, 'Age limit:') !== false) {
                $event->age_limit = trim(str_replace('Age limit:', '', $event->cost));
                $event->cost = null;
                $event->saveAndLogError();
            }
            if (stripos($event->cost, 'When:') !== false) {
                $event->when = trim(str_replace('When:', '', $event->cost));
                $event->cost = null;
                $event->saveAndLogError();
            }
        }
        echo 'Clean event done';
    }
}
