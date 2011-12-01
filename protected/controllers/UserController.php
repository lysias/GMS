<?php

class UserController extends Controller
{
	public function actionEdit($id)
	{
		$this->render('edit');
	}

	public function actionView($id)
	{
                $user = User::model()->findByPk($id);
		$this->render('view', array(
                    'user' => $user,
                    'profile' => $user->profile ? $user->profile : new UserProfile,
                ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}