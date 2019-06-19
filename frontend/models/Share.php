<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "share".
 *
 * @property int $share_id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string $link
 * @property int $status
 *
 * @property User $user
 */
class Share extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'share';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['share_id'], 'required'],
            [['share_id', 'user_id', 'status'], 'integer'],
            [['link'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'share_id' => 'Share ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'link' => 'Link',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
