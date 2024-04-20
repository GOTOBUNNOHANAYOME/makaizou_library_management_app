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
use App\Http\Requests\Admin\MailSendRequest;


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
}
