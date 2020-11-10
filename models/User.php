<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\helpers\ArrayHelper;
use app\models\base\BaseModel;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property int $token_expired
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $password_reset_token
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 */
class User extends BaseModel implements \yii\web\IdentityInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;

    public $groups;

    // public $password, $editpassword;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'groups'], 'required'],
            [['username', 'email', 'fullname'], 'required'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            [['token_expired', 'created_by', 'updated_by', 'created_at', 'updated_at', 'status'], 'integer'],
            [['username', 'fullname'], 'string', 'max' => 100],
            [['password_hash', 'auth_key', 'phone', 'password_reset_token'], 'string', 'max' => 255],
            [['password_hash'], 'required', 'on' => ['create']],
            [['email'], 'string', 'max' => 150],
            [['email', 'username'], 'email'],
            [['username'], 'unique', 'targetAttribute' => 'username'],
            [['email'], 'unique', 'targetAttribute' => 'email'],
            [['created_at', 'updated_at', 'phone'], 'safe'],
        ];
    }
    
    // public function beforeSave($insert)
    // {
    //     var_dump($this->password_hash);die();
    //     if($insert) {
    //         $this->setPassword($this->password_hash);
    //     } else {
    //         if(!empty($this->password_hash)) {
    //             // var_dump($this->password_hash);die();
    //             $this->setPassword($this->password_hash);
    //         } else {
    //             $this->password_hash = (string) $this->getOldAttribute('password_hash');
    //         }
    //     }

    //     return parent::beforeSave($insert);
    // }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password',
            'password' => 'Password 2',
            'auth_key' => 'Auth Key',
            'token_expired' => 'Token Expired',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'phone' => 'Phone',
            'password_reset_token' => 'Password Reset Token',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'groups' => 'Groups'
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => $id, 
            'status' =>self::STATUS_ACTIVE
        ]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return static::findOne(['auth_key' => $token, 'status' => self::STATUS_ACTIVE]);
        return static::find()
                ->where(['auth_key' => $token, 'status' => self::STATUS_ACTIVE])
                ->andWhere(['>=', 'token_expired', date('U')])
                ->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne([
            'username' => $username, 
            'status' => self::STATUS_ACTIVE,
            'deleted_at' => null
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        // http://www.yiiframework.com/doc-2.0/yii-web-identityinterface.html
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        // $this->auth_key = Yii::$app->security->generateRandomString();
        $this->auth_key = Yii::$app->security->generateRandomString() . time();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getStatusIcon()
    {
        return static::staticIcon($this->status);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getRoles()
    {
        $auth = \Yii::$app->authManager;
        $authorRoles = $auth->getRoles();
        $roles = [];
        foreach($authorRoles as $key => $authRole) {
            if($authRole->name == 'Guest') {
                continue;
            }
            $roles[$authRole->name] = $authRole->name;
        }

        return $roles;
    }

    public function getRole()
    {
        $auth = \Yii::$app->authManager;
        $authorRoles = $auth->getRolesByUser($this->id);
        $roles = [];
        foreach($authorRoles as $key => $authRole) {
            if($authRole->name == 'Guest') {
                continue;
            }
            $roles[$key] = $authRole;
        }

        return $roles;
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    static function staticIcon($status)
    {
        switch ($status) {
            case 20:
                $response = '<small class="label bg-yellow"><span class="glyphicon glyphicon-exclamation-sign"></span></small>';
                break;
            case 0:
                $response = '<small class="label bg-red"><span class="glyphicon glyphicon-remove"></span></small>';
                break;
            default:
                $response = '<small class="label bg-green"><span class="glyphicon glyphicon-check"></span></small>';
                break;
        }
        

        return $response;
    }
}
