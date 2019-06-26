<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "album_detail".
 *
 * @property int $detail_id
 * @property int $album_id
 * @property string $title
 * @property string $album_image
 * @property int $status
 *
 * @property Album $detail
 */
class AlbumDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['album_id'], 'required'],
            [['album_id', 'status'], 'integer'],
            [['title', 'album_image'], 'string', 'max' => 255],
            [['detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Album::className(), 'targetAttribute' => ['detail_id' => 'album_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'detail_id' => 'Detail ID',
            'album_id' => 'Album ID',
            'title' => 'Title',
            'album_image' => 'Album Image',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetail()
    {
        return $this->hasOne(Album::className(), ['album_id' => 'detail_id']);
    }
}
