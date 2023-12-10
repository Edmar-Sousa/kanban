<?php

use App\Utils\SocketIO;




class Teste 
{

    public function auth()
    {
        print_r("Isso veio da classe!" . PHP_EOL);
    }


    public function notify()
    {
        print_r("Notify" . PHP_EOL);
    }

}




SocketIO::on('auth', [Teste::class, 'auth']);


SocketIO::on('notificate', [Teste::class, 'notify']);



