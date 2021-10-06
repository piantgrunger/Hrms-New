<?php
  use yii\helpers\Url;

  use hscstudio\mimin\components\Mimin;
  $menuItems =
        [
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site/index'], 'visible' => !Yii::$app->user->isGuest],

                     [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'User / Group',
                        'icon' => 'users',
                        'url' => '#',
                        'id' => 'user-group',
                        'items' => [
                    ['label' => 'App. Route', 'icon' => 'user', 'url' => ['/route/'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role', 'icon' => 'users', 'url' => ['/role/'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => 'user', 'url' => ['/user/'], 'visible' => !Yii::$app->user->isGuest],
                   ], ],

                   [
                    'visible' => !Yii::$app->user->isGuest,
                    'label' => 'Master',
                    'icon' => 'archive',
                    'url' => '#',
                    'id' => 'master',
                    'items' => [
                ['label' => 'Divisi', 'icon' => 'building', 'url' => ['/divisi/index'], 'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Departemen', 'icon' => 'child', 'url' => ['/departemen/index'], 'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Grade', 'icon' => 'list', 'url' => ['/grade/index'], 'visible' => !Yii::$app->user->isGuest],
  
                ['label' => 'Jabatan', 'icon' => 'sitemap', 'url' => ['/jabatan/index'], 'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Pendidikan', 'icon' => 'school', 'url' => ['/sekolah/index'], 'visible' => !Yii::$app->user->isGuest],
               
          
               ], ],

               [
                'visible' => !Yii::$app->user->isGuest,
                'label' => 'Rekrutment',
                'icon' => 'users',
                'url' => '#',
                'id' => 'rekrutment',
                'items' => [
                  ['label' => 'Master Tes', 'icon' => 'question', 'url' => ['/tes/index'], 'visible' => !Yii::$app->user->isGuest],
  
                  ['label' => 'Lowongan', 'icon' => 'newspaper', 'url' => ['/lowongan/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Pelamar', 'icon' => 'user', 'url' => ['/pelamar/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Tes', 'icon' => 'edit', 'url' => ['/pelaksanaan-tes/index'], 'visible' => !Yii::$app->user->isGuest],
           ], ],
           
           [
            'visible' => !Yii::$app->user->isGuest,
            'label' => 'HRD',
            'icon' => 'user-tie',
            'url' => '#',
            'id' => 'hrd',
            'items' => [
              ['label' => 'Pegawai', 'icon' => 'user-circle', 'url' => ['/pegawai/index'], 'visible' => !Yii::$app->user->isGuest],
               ], ],

               [
                'visible' => !Yii::$app->user->isGuest,
                'label' => 'Presensi dan Kehadiran ',
                'icon' => 'calendar',
                'url' => '#',
                'id' => 'hrd',
                'items' => [
                  ['label' => 'Jenis Absen', 'icon' => 'calendar-check', 'url' => ['/jenis-absen/index'], 'visible' => !Yii::$app->user->isGuest],
                  ['label' => 'Hari Libur', 'icon' => 'calendar-alt', 'url' => ['/hari-libur/index'], 'visible' => !Yii::$app->user->isGuest],
             
                  ['label' => 'Shift', 'icon' => 'clock', 'url' => ['/shift/index'], 'visible' => !Yii::$app->user->isGuest],
                  ['label' => 'Absen', 'icon' => 'calendar', 'url' => ['/absen/index'], 'visible' => !Yii::$app->user->isGuest],
                  ['label' => 'Surat Lembur', 'icon' => 'hourglass', 'url' => ['/surat-lembur/index'], 'visible' => !Yii::$app->user->isGuest],
                  ['label' => 'Surat Cuti', 'icon' => 'envelope', 'url' => ['/surat-cuti/index'], 'visible' => !Yii::$app->user->isGuest],
                  ['label' => 'Tukar Absen', 'icon' => 'random', 'url' => ['/tukar-absen/index'], 'visible' => !Yii::$app->user->isGuest],
    
    
                ], ],
                [
                  'visible' => !Yii::$app->user->isGuest,
                  'label' => 'Payroll',
                  'icon' => 'money-check-alt',
                  'url' => '#',
                  'id' => 'money',
                  'items' => [
                    ['label' => 'Tunjangan', 'icon' => 'plus', 'url' => ['/tunjangan/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Potongan', 'icon' => 'minus', 'url' => ['/potongan/index'], 'visible' => !Yii::$app->user->isGuest],
                    
                  ], ],
      

                ];


          
  if (!Yii::$app->user->isGuest) {
      if (Yii::$app->user->identity->username !== 'admin') {
          $menuItems = Mimin::filterMenu($menuItems);
      }
    }

    ?>
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="<?=Url::to(['/'])?>">HRMS</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="<?=Url::to(['/'])?>">HRMS</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li ><a class="nav-link" href="<?=Url::to(['/'])?>"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
      <li class="menu-header">Menu</li>

        <?php echo app\widgets\Menu::widget(
            [
                'items' => $menuItems,
            ]
            //Menus::menuItems()
); ?>
    </ul>
</aside>
