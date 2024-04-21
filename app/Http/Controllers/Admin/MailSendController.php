<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    MailSend,
    MailSendHistory,
    User
};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\InfomationMail;
use Illuminate\Support\Facades\{
    DB,
    Mail
};
use App\Http\Requests\Admin\{
    SmtpRequest,
    MailSendRequest
};


class MailSendController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.mail_send.create');
    }

    public function store(MailSendRequest $request)
    {
        $mail_send = MailSend::create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        $params = $this->mailSend($mail_send->id, $request->title, $request->content);

        DB::transaction(function () use ($params) {
            MailSendHistory::insert($params);
        });
        
        return to_route('admin.mail_send.complete');
    }

    public function complete(Request $request)
    {
        return to_route('admin.mail_send.create');
    }

    private function mailSend($mail_send_id, string $title, string $content)
    {
        $params = [];

        User::where('is_enable', true)
            ->chunk(1000, function($users) use ($mail_send_id, $title, $content){
                foreach ($users as $user) {
                    Mail::to($user->email)->send(new InfomationMail($user, $title, $content));
                    $params[] = [
                        'mail_send_id' => $mail_send_id,
                        'user_id'      => $user->id,
                    ];
                }
            });
        return $params;
    }

    public function edit(Request $request)
    {
        return view('admin.mail_send.edit', [
            'mail_mailer'   => config('app.mail_mailer'),
            'mail_host'     => config('app.mail_host'),
            'mail_port'     => config('app.mail_port'),
            'mail_username' => config('app.mail_username'),
            'mail_password' => config('app.mail_password'),
        ]);
    }

    public function update(SmtpRequest $request)
    {
        $env_file_path = base_path('.env');
        if(file_exists($env_file_path)){
            file_put_contents($env_file_path, str_replace(
                'MAIL_MAILER=' . config('app.mail_mailer'),
                'MAIL_MAILER=' . $request->mail_mailer,
                file_get_contents($env_file_path)
            ));
            file_put_contents($env_file_path, str_replace(
                'MAIL_HOST=' . config('app.mail_host'),
                'MAIL_HOST=' . $request->mail_host,
                file_get_contents($env_file_path)
            ));
            file_put_contents($env_file_path, str_replace(
                'MAIL_PORT=' . config('app.mail_port'),
                'MAIL_PORT=' . $request->mail_port,
                file_get_contents($env_file_path)
            ));
            file_put_contents($env_file_path, str_replace(
                'MAIL_USERNAME=' . config('app.mail_username'),
                'MAIL_USERNAME=' . $request->mail_username,
                file_get_contents($env_file_path)
            ));
            file_put_contents($env_file_path, str_replace(
                'MAIL_PASSWORD=' . config('app.mail_password'),
                'MAIL_PASSWORD=' . $request->mail_password,
                file_get_contents($env_file_path)
            ));
        }

        return to_route('admin.mail_send.edit');
    }
}
