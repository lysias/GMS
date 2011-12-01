<?php

/**
 * This is the model class for table "forum_category".
 *
 * The followings are the available columns in table 'forum_category':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $forum_id
 *
 * The followings are the available model relations:
 * @property Forum $forum
 * @property ForumThread[] $threads
 */
class ForumCategory extends CActiveRecord
{

        /**
         * Returns the static model of the specified AR class.
         * @return ForumCategory the static model class
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
                return 'forum_category';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('name', 'length', 'max' => 255),
                    array('description', 'safe'),
                    // The following rule is used by search().
                    // Please remove those attributes that should not be searched.
                    array('id, name, description, forum_id', 'safe', 'on' => 'search'),
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
                    'forum' => array(self::BELONGS_TO, 'Forum', 'forum_id'),
                    'threads' => array(self::HAS_MANY, 'ForumThread', 'forum_category_id'),
                    'threadCount' => array(self::STAT, 'ForumThread', 'forum_category_id'),
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
                    'description' => 'Description',
                    'forum_id' => 'Forum',
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
                $criteria->compare('description', $this->description, true);
                $criteria->compare('forum_id', $this->forum_id);

                return new CActiveDataProvider($this, array(
                            'criteria' => $criteria,
                        ));
        }
        
        public function getPostCount()
        {
                $count = 0;
                foreach($this->threads as $thread)
                        $count += $thread->postCount;
                return $count;
        }
        
        public function beforeDelete()
        {
                foreach ($this->threads as $thread)
                        $thread->delete();
                parent::beforeDelete();
        }

}