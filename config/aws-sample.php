<?php

return array(
    'includes' => array('_aws'),
    'services' => array(
        'default_settings' => array(
            'params' => array(
                'key'     => 'YOUR_AWS_ACCESS_KEY_ID',
                'secret'  => 'YOUR_AWS_SECRET_ACCESS_KEY',
                // OR: 'profile' => 'my_profile',
                'region'  => 'ap-northeast-1'
            )
        )
    )
);
