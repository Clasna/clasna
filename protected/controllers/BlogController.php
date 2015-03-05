<?php

class BlogController extends Controller
{
	public function actionIndex()
	{
		$blog = Blog::getBlogContent();
		$this->render('index',array('blog'=>$blog));
	}
}