<?php

namespace App\Console\Commands;

use App\Models\Account;
use Illuminate\Console\Command;

class ResetCommentsUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reset-comments-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'reset lại toàn bộ lượt comment của người dùng về 3';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = Account::where('role_id', 1)->get();
        foreach ($users as $user) {
            $user->update([
                'numcomments' => '3'
            ]);
        }
        $users = Account::where('role_id', 2)->get();
        foreach ($users as $user) {
            $user->update([
                'numcomments' => '99999'
            ]);
        }
    }
}
