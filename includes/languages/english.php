<?php

function lang($phrase)
{

    static $lang = array(

        // navbar words
        'خروج'                    => 'Home',
        'فئات'                    => 'Categories',
        'عناصر'                   => 'Items',
        'اعضاء'                   => 'Users',
        'تعليقات'                 => 'Comments',
        'تخزين'                   => 'Store',
        'اعضاء مسجلين'           => 'Logs',
        'فضل'                     => '  Fadl  ',
        'مسح الصفحة'             => 'Edit Profile',
        'الاعدادات'               => 'Settings',
        'خروج'                   => 'Log Out',
    );

    return $lang[$phrase];
}
