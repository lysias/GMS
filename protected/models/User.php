<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $nick
 * @property string $email
 * @property string $password
 * @property string $created
 * @property string $last_online
 * @property integer $logins
 * @property integer $class_id
 *
 * The followings are the available model relations:
 * @property UserClass $class
 * @property UserRole[] $userRoles
 * @property UserProfile[] $userProfile
 */
class User extends CActiveRecord
{

        public $password_repeat;

        /**
         * Returns the static model of the specified AR class.
         * @return User the static model class
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
                return 'user';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    // The following rule is used by search().
                    // Please remove those attributes that should not be searched.
                    array('id, nick, email, password, created, last_online, logins, class_id', 'safe', 'on' => 'search'),
                    array('email, nick', 'unique'),
                    array('email', 'email'),
                    array('email, password, nick', 'required'),
                    array('email, password, nick', 'length', 'max' => 255),
                    array('password_repeat', 'required', 'on' => 'signUp'),
                    array('password_repeat', 'compare', 'compareAttribute' => 'password', 'on' => 'signUp'),
                    array('password', 'length', 'min' => 4, 'max' => 39, 'on' => 'signUp, changePassword'),
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
                    'class' => array(self::BELONGS_TO, 'UserClass', 'class_id'),
                    'userRoles' => array(self::MANY_MANY, 'UserRole', 'user_has_role(user_id, user_role_id)'),
                    'profile' => array(self::HAS_ONE, 'UserProfile', 'user_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
                return array(
                    'id' => 'ID',
                    'nick' => 'Nick',
                    'email' => 'Email',
                    'password' => 'Password',
                    'created' => 'Created',
                    'last_online' => 'Last Online',
                    'logins' => 'Logins',
                    'class_id' => 'Class',
                    'password_repeat' => 'Passwort wiederholen'
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
                $criteria->compare('nick', $this->nick, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('password', $this->password, true);
                $criteria->compare('created', $this->created, true);
                $criteria->compare('last_online', $this->last_online, true);
                $criteria->compare('logins', $this->logins);
                $criteria->compare('class_id', $this->class_id);

                return new CActiveDataProvider($this, array(
                            'criteria' => $criteria,
                        ));
        }

        public function hashPassword($password)
        {
                $salt = 'sdjkghlasd';
                return sha1($salt . $password);
        }

        public function beforeSave()
        {
                if ($this->isNewRecord) {
                        $this->password = $this->hashPassword($this->password);
                        $this->created = new CDbExpression('NOW()');
                } elseif (strlen($this->password) < 40)
                        $this->password = $this->hashPassword($this->password);
                return parent::beforeSave();
        }

        public function getUserImage($htmlOptions)
        {
                if (file_exists('/images/user/' . $this->id . 'jpg'))
                        return CHtml::image('/images/user/' . $this->id . 'jpg');
                else
                        return CHtml::image('/images/user/none.jpg','No Image',$htmlOptions);

        }

}