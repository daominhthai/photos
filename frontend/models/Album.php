<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property int $album_id
 * @property int $user_id
 * @property int $deleted
 * @property string $date_create
 * @property string $date_update
 *
 * @property AlbumDetail $albumDetail
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date_create', 'date_update'], 'required'],
            [['user_id', 'deleted'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'album_id' => 'Album ID',
            'user_id' => 'User ID',
            'deleted' => 'Deleted',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumDetail()
    {
        return $this->hasOne(AlbumDetail::className(), ['detail_id' => 'album_id']);
    }
}
