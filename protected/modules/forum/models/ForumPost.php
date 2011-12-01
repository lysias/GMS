<?php

/**
 * This is the model class for table "forum_post".
 *
 * The followings are the available columns in table 'forum_post':
 * @property integer $id
 * @property string $content
 * @property string $created
 * @property integer $forum_thread_id
 *
 * The followings are the available model relations:
 * @property ForumThread $thread
 */
class ForumPost extends CActiveRecord
{

        private $parser;

        /**
         * Returns the static model of the specified AR class.
         * @return ForumPost the static model class
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
                return 'forum_post';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('content', 'required'),
                    array('created', 'safe'),
                    // The following rule is used by search().
                    // Please remove those attributes that should not be searched.
                    array('id, content, created, forum_thread_id', 'safe', 'on' => 'search'),
                );
        }

        public function beforeSave()
        {
                if ($this->isNewRecord) {
                        $this->created = new CDbExpression('NOW()');
                        $this->user_id = Yii::app()->user->id;
                }
                return parent::beforeSave();
        }

        /**
         * @return array relational rules.
         */
        public function relations()
        {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'thread' => array(self::BELONGS_TO, 'ForumThread', 'forum_thread_id'),
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
                return array(
                    'id' => 'ID',
                    'content' => 'Content',
                    'created' => 'Created',
                    'forum_thread_id' => 'Forum Thread',
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
                $criteria->compare('content', $this->content, true);
                $criteria->compare('created', $this->created, true);
                $criteria->compare('forum_thread_id', $this->forum_thread_id);

                return new CActiveDataProvider($this, array(
                            'criteria' => $criteria,
                        ));
        }

        public function parseContent()
        {
                if (!$this->parser) {
                        Yii::import('application.vendors.*');

                        $this->parser = new CBbParser;
                }
                return $this->parser->p($this->content);
        }

}