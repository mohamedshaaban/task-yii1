<?php

class ApiController extends Controller
{

    public function actionLogin()
    {


        if (Yii::app()->request->isPostRequest) {


            $visitor = new VisitorIdentity($_POST['username'], $_POST['password']);

            $token = $visitor->authenticate();
            $data = ['status'=>200 ,'message'=>'','token'=>$token];
            if(!$token
            )
            {
                $data = ['status'=>400 ,'message'=>'Invalid Login'] ;
            }
            return  $this->renderJSON($data);

        }
    }
    public function actionRegister()
    {


        if (Yii::app()->request->isPostRequest) {
            $visitor = new Visitors();
            $visitor->username = $_POST['username'];
            $visitor->name = $_POST['name'];
            $visitor->email = $_POST['email'];
            $visitor->password = $_POST['password'];
            if(!$visitor->save())
            {
                $data = ['status'=>400 ,'message'=>$visitor->errors()] ;
            }
            $data = ['status'=>200 ,'message'=>'','visitor'=>$visitor] ;



            return  $this->renderJSON($data);

        }
    }
    public function actionBlogCategories()
    {

        $headers =getallheaders();
        $token = ($headers['token']);
        $criteria=new CDbCriteria;
        $criteria->condition= " t.token = :token  ";
        $criteria->params[':token'] = $token;
        $tokenChk = ListingVisitorAutoLoginToken::model()->find($criteria);
         if(!$tokenChk)
        {
        return $this->renderJSON(['status'=>400 ,'message'=>'Invalid token']) ;
        }

        $dataProvider=new BlogCategory();
        $dataProvider= $dataProvider->findAll();
        $data = ['status'=>200 ,'list'=>$dataProvider] ;

            return  $this->renderJSON($data);


    }
    public function actionBlogs($id)
    {
        $headers =getallheaders();
        $token = ($headers['token']);
        $criteria=new CDbCriteria;
        $criteria->condition= " t.token = :token  ";
        $criteria->params[':token'] = $token;
        $tokenChk = ListingVisitorAutoLoginToken::model()->find($criteria);
        if(!$tokenChk)
        {
            return $this->renderJSON(['status'=>400 ,'message'=>'Invalid token']) ;
        }

        $criteria=new CDbCriteria;
        $criteria->condition= " t.category_id = :category_id and t.is_visible =1 ";
        $criteria->params[':category_id'] = $id;
        $dataProvider = Blogs::model()->find($criteria);

        $data = ['status'=>200 ,'list'=>$dataProvider] ;

            return  $this->renderJSON($data);


    }
    public function actionBlogslike($id)
    {
        $headers =getallheaders();
        $token = ($headers['token']);
        $criteria=new CDbCriteria;
        $criteria->condition= " t.token = :token  ";
        $criteria->params[':token'] = $token;
        $tokenChk = ListingVisitorAutoLoginToken::model()->find($criteria);
        if(!$tokenChk)
        {
            return $this->renderJSON(['status'=>400 ,'message'=>'Invalid token']) ;
        }

        $criteria=new CDbCriteria;
        $criteria->condition= " t.blog_id = :blog_id and t.user_id =:user_id ";
        $criteria->params[':blog_id'] = $id;
        $criteria->params[':user_id'] = $tokenChk->user_id;
        $dataProvider = BlogLikes::model()->find($criteria);
        if(!$dataProvider)
        {
            $dataProvider = new BlogLikes();
            $dataProvider->blog_id = $id;
            $dataProvider->user_id = $tokenChk->user_id;
            $dataProvider->save();
            $data = ['status'=>200 ,'message'=>'Like added'] ;

        }
        else
        {
            $data = ['status'=>200 ,'message'=>'Like already added'] ;
        }

            return  $this->renderJSON($data);


    }
}
