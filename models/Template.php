<?php

/**
 * This is the model class for table "{{system_template}}".
 *
 * The followings are the available columns in table '{{system_template}}':
 * @property integer $id
 * @property string $key
 * @property string $name
 * @property string $content
 * @property string $comment
 */
class Template extends CrudActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{system_template}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return [
			['key', 'required'],
			['key', 'length', 'max'=>128],
			['name', 'length', 'max'=>255],
			['content, comment', 'safe'],
			['id, key, name', 'safe', 'on'=>'search'],
		];
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'key' => 'Key',
			'content' => 'Content',
			'comment' => 'Comment',
		];
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
	    $criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('name',$this->name,true);

        return new CActiveDataProvider($this, [
			'criteria'=>$criteria,
		]);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Template the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * return behaviors of component merged with parent component behaviors
     * @return array CBehavior[]
     */

    public function behaviors()
    {
        return CMap::mergeArray(
            parent::behaviors(),
            [
                'ml' => [
                    'class' => 'MultilingualBehavior',
                    'langTableName' => 'system_template_lang',
                    'langForeignKey' => 'entity_id',
                    'localizedAttributes' => [
                        'content',
                        'name',
                    ],
                    'languages' => Lang::getLanguages(), // array of your translated languages. Example : ['fr' => 'Français', 'en' => 'English')
                    'dynamicLangClass' => true,
                ],
            ]);
    }
}
