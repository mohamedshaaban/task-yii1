<?php

/**
 * This is the model class for table "tbl_blogs".
 *
 * The followings are the available columns in table 'tbl_blogs':
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 * @property string $content
 * @property string $is_visible
 */
class Blogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_blogs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, category_id, content', 'required'),
			array('category_id', 'numerical', 'integerOnly'=>true),
			array('title, is_visible', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, category_id, content, is_visible', 'safe', 'on'=>'search'),
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
            'category'=>array(self::BELONGS_TO, 'BlogCategory', 'category_id'),
            'bloglikes'=>array(self::HAS_MANY, 'BlogLikes', 'blog_id'),
            'likesCount'=>array(self::STAT, 'bloglikes', 'blog_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'category_id' => 'Category',
			'content' => 'Content',
			'is_visible' => 'Is Visible',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('is_visible',$this->is_visible,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
