<?php
/**
 * This is the model class for table "{{system_config}}".
 *
 * The followings are the available columns in table '{{system_config}}':
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class Config extends CrudActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{system_config}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('key, value', 'required'),
            array('key', 'match', 'pattern'=>'/^[\w_]+$/','message'=>t('Only letters and "_" symbol are allowed')),

            array('key, value', 'length', 'max'=>255),
            array('id, key, value', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
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
        $criteria->compare('key',$this->key,true);
        $criteria->compare('value',$this->value,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Config the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    private static $configCache;
    private static function getCache(){
        if(!isset(self::$configCache)){
            self::$configCache = array();
            foreach(db()->createCommand()->select('*')->from('{{system_config}}')->queryAll() as $item){
                self::$configCache[$item['key']] = $item['value'];
            }
        }
        return self::$configCache;
    }


    public static function get($key){
        $config = self::getCache();
        if(isset($config[$key]))
            return $config[$key];
        if(isset(app()->params[$key]))
            return app()->params[$key];
        if(strpos($key,'.') !== false){
            $split = explode('.', $key);
            return self::getRecursiveParam(Yii::app()->params[array_shift($split)], $split);
        }
        return null;
    }

    private static function getRecursiveParam($parent, $child){
        if(count($child)==1)
            return $parent[array_shift($child)];
        else if(count($child)>1)
            return self::getRecursiveParam($parent[array_shift($child)], $child);
        else
            return null;
    }


}