php artisan vendor:publish --force

edit config/auth.php file

add to guards:
`
 'becoded_user' => [
            'driver' => 'session',
            'provider' => 'becoded_users',
        ],
`

to providers:
`
 'becoded_users' => [
            'driver' => 'eloquent',
            'model' => Grundmanis\Becoded\Models\BecodedUser::class,
        ],
`

to passwords:
` 'becoded_users' => [
             'provider' => 'becoded_users',
             'table' => 'password_resets',
             'expire' => 60,
         ],`
