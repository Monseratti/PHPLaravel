<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class UsersController extends Controller
{

    public function index()
    {
        return view("Users.index");
    }

    public function store(Request $request)
    {

        $nubmer = rand(100000,999999);

        $transport = Transport::fromDsn('smtp://localhost');
        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from('dnamaxy@gmail.com')
            ->to($request->get("email"))
            ->subject('Check')
            ->text('Your code is')
            ->html("<p style='color:red'>$nubmer</p>");

        $mailer->send($email);

        $user = new Users();
        $user->code = $nubmer;
        $user->email = $request->get("email");

        $user->save();
        return redirect('login\code');
    }

    public function code(Request $request)
    {
        $user =
         Users::orderByDesc('id')[0];
        $nubmer = rand(100000,999999);

        $transport = Transport::fromDsn('smtp://localhost');
        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from('dnamaxy@gmail.com')
            ->to($request->get("email"))
            ->subject('Check')
            ->text('Your code is')
            ->html("<p style='color:red'>$nubmer</p>");

        $mailer->send($email);

        $user = new Users();
        $user->code = $nubmer;
        $user->email = $request->get("email");

        $user->save();
        return redirect('');
    }

    
}
