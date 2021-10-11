<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use app\models\Absen;
use app\models\DetailShift;
use app\models\JadwalKerja;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //
        date_default_timezone_set('Asia/Jakarta');
      
          $model = new LoginForm();
        if(is_null(Yii::$app->user->identity->pegawai))
        {  
            return $this->render('index',['model'=>$model]);
        } else {
            $pegawai = Yii::$app->user->identity->pegawai;
            $hari = date('w', strtotime(date('Y-m-d'))) -1;
            $jadwalKerja = JadwalKerja::find()->where(['id_pegawai'=> $pegawai->id , 'tanggal'=>date("Y-m-d")])->one();
            

            $id_shift = ($jadwalKerja)? $jadwalKerja->id_shift : $pegawai->id_shift;


            $shift = DetailShift::find()->where(['id_shift' => $id_shift, 'hari' => $hari])->one();
      if (is_null($shift)) {
           $tanggal = date('Y-m-d');
           //print('1');
          } elseif($shift->jam_masuk<=$shift->jam_pulang) {
            $tanggal = date('Y-m-d');
           //print('2');
           
           
         }elseif(strtotime($shift->jam_masuk)-(60*60*2) <=strtotime(date("H:i:s")) ) {
             $tanggal = date('Y-m-d');
          // print('3');
         } else {
            $tanggal = date('Y-m-d', strtotime("-1 days"));
          // print(4);
         }
         
         //die();
      
           $modelAbsen =  Absen::find()->where(['id_pegawai'=>Yii::$app->user->identity->id_pegawai, 'tanggal'=>$tanggal])->one();
           if (is_null($modelAbsen)) {
               $modelAbsen = new Absen();
               $modelAbsen->id_jenis_absen=1;
            
               
               $modelAbsen->id_pegawai =Yii::$app->user->identity->id_pegawai;
           }
         

           if ($modelAbsen->load(Yii::$app->request->post())) {
               $modelAbsen->tanggal = date('Y-m-d',strtotime($tanggal));

               
            
               if (($modelAbsen->masuk_kerja=='') ||    ($modelAbsen->masuk_kerja == '00:00')
                     ) {
                   $modelAbsen->masuk_kerja = date('H:i');
            //       $modelAbsen->posisi_masuk = $modelAbsen->latitude.','.$modelAbsen->longitude; 
               } else {
                   $modelAbsen->pulang_kerja = date('H:i');
              //     $modelAbsen->posisi_pulang = $modelAbsen->latitude.','.$modelAbsen->longitude; 
            
               }
               $modelAbsen->save();
           }
        // print($tanggal);
        

           $modelAbsen =  Absen::find()->where(['id_pegawai'=>Yii::$app->user->identity->id_pegawai, 'tanggal'=>$tanggal])->one();
           if (is_null($modelAbsen)) {
               $modelAbsen = new Absen();
               $modelAbsen->id_pegawai =Yii::$app->user->identity->id_pegawai;
               $modelAbsen->tanggal = date('Y-m-d',strtotime($tanggal));

           }
         
      

           return $this->render(
            'absen',
            [
                'modelAbsen' => $modelAbsen,
                'pegawai' => $pegawai,
              //   'deviceId' => $deviceId,
            ]
        );
        }    
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $this->layout = 'main-login';
        
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
