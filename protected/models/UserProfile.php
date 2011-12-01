<?php

/**
 * This is the model class for table "user_profile".
 *
 * The followings are the available columns in table 'user_profile':
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $gender
 * @property string $birthdate
 * @property string $description
 * @property string $job
 * @property string $hobbys
 * @property string $motto
 * @property integer $icq
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserProfile the static model class
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
		return 'user_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('status, icq, user_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('gender', 'length', 'max'=>45),
			array('job', 'length', 'max'=>254),
			array('birthdate, description, hobbys, motto', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, status, gender, birthdate, description, job, hobbys, motto, icq, user_id', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'status' => 'Status',
			'gender' => 'Gender',
			'birthdate' => 'Birthdate',
			'description' => 'Description',
			'job' => 'Job',
			'hobbys' => 'Hobbys',
			'motto' => 'Motto',
			'icq' => 'Icq',
			'user_id' => 'User',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('hobbys',$this->hobbys,true);
		$criteria->compare('motto',$this->motto,true);
		$criteria->compare('icq',$this->icq);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}