<?php

/**
 * This is the model class for table "forum_thread".
 *
 * The followings are the available columns in table 'forum_thread':
 * @property integer $id
 * @property string $name
 * @property integer $pinned
 * @property integer $global
 * @property integer $forum_category_id
 *
 * The followings are the available model relations:
 * @property ForumPost[] $posts
 * @property ForumCategory $category
 */
class ForumThread extends CActiveRecord
{

        /**
         * Returns the static model of the specified AR class.
         * @return ForumThread the static model class
         */
        public static function model($className=__CLASS__)
        {
                return parent::model($className);
        }

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
                return 'forum_thread';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('name, forum_category_id', 'required'),
                    array('id, pinned, global, forum_category_id', 'numerical', 'integerOnly' => true),
                    array('name', 'length', 'max' => 255),
                    // The following rule is used by search().
                    // Please remove those attributes that should not be searched.
                    array('id, name, pinned, global, forum_category_id', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations()
        {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'posts' => array(self::HAS_MANY, 'ForumPost', 'forum_thread_id'),
                    'category' => array(self::BELONGS_TO, 'ForumCategory', 'forum_category_id'),
                    'postCount' => array(self::STAT, 'ForumPost', 'forum_thread_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
                return array(
                    'id' => 'ID',
                    'name' => 'Name',
                    'pinned' => 'Pinned',
                    'global' => 'Global',
                    'forum_category_id' => 'Forum Category',
                );
        }

        /**
         * Retrieves a list of models based on the current search/filter conditions.
         * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
         */
        public function search()
        {
                // Warning: Please modify the following code to remove attributes that
                // should not be searched.

                $criteria = new CDbCriteria;

                $criteria->compare('id', $this->id);
                $criteria->compare('name', $this->name, true);
                $criteria->compare('pinned', $this->pinned);
                $criteria->compare('global', $this->global);
                $criteria->compare('forum_category_id', $this->forum_category_id);

                return new CActiveDataProvider($this, array(
                            'criteria' => $criteria,
                        ));
        }

        public function beforeSave()
        {
                if ($this->isNewRecord) {
                        $this->user_id = Yii::app()->user->id;
                }
                return parent::beforeSave();
        }
        
        public function beforeDelete()
        {
                foreach ($this->posts as $post)
                        $post->delete();
                parent::beforeDelete();
        }

}