<?php

namespace App\Console\Commands;

use App\Models\Account;
use Illuminate\Console\Command;
use DateTime;
class DeleteVerifyEmailAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:delete-verify-email-account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Xoá đi những mã xác thực k được xác thực';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $accounts = Account::get();
        foreach ($accounts as $account) {
            if ($account->verify_code != Null){
                $now = new DateTime();

                $specifiedTime = new DateTime($account->created_at); // Thay đổi thời gian chỉ định theo ý muốn

                $interval = $now->diff($specifiedTime);

                $minutes = $interval->days * 24 * 60; // Số phút từ số ngày
                $minutes += $interval->h * 60; // Số phút từ số giờ
                $minutes += $interval->i; // Số phút

                if ($minutes >5) {
                    $account->delete();
                }
            }
        }
    }
}
