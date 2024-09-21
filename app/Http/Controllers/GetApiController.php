<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Auth;
use GuzzleHttp\Client;
use Http;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;

class GetApiController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.facebook.com/groups/valorantvietnam/');
        $html = $response->getBody()->getContents();
        $crawler = new Crawler($html);
        $Arr = [];

        $titles = $crawler->filter('title')->each(function ($node) {
            return $node->text();
        });
        dd($html);

        return response()->json($html);
    }

    public function callApiCheckScam(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://checkscam.com/scams?page=2');
        $html = $response->getBody()->getContents();
        $crawler = new Crawler($html);
        $Arr = [];


        $titles = $crawler->filter('.scam-title')->each(function (Crawler $node) {
            return $node->text();
        });

        $moneys = $crawler->filter('.scam-price')->each(function (Crawler $node) {
            return $node->text();
        });

        $numberPhone = $crawler->filter('.scam-text')->each(function (Crawler $node) {
            return $node->text();
        });

        $namebank = ['MB Bank', 'Vietcombank', 'BIDV', 'Ngân Hàng Á Âu', 'TechCombank', 'Viettinbank'];
        foreach ($titles as $key => $title) {
        $totalMoney = '';
           if ($key != 0 && $key!= 1) {
               $arrMoneys = explode(',', $moneys[$key-1]);
                foreach ($arrMoneys as $money) {
                    $totalMoney .= $money;
                }
               Post::create([
                   'fullname' => $title,
                   'category_id' => rand(1,3),
                   'numberphone' => $numberPhone[$key*5 ],
                   'numberbank' => $numberPhone[$key*5 + 1 ],
                   'namebank'=> $namebank[array_rand($namebank)],
                   'moneys_scam' => (int)$totalMoney,
                   'content'=> "Bạn đầu có nhân viên giới thiệu việc làm trên FB, chỉ cần ấn theo dõi các trang chỉ định sẽ được tính 8.000 1 bài thích. Xong 5 bài sẽ được chuyển 40.000 vào TK.Sau đó đối tượng sẽ giao nhiệm vụ tiếp bước. Gửi các nhiệm vụ có mức tiền cược khác nhau có tỉ lệ hoa hồng từ 30 – 50%. Đối tượng yêu cầu chuyển tiền trước sau khi xác nhận sẽ gửi bản cam kết từ Công ty TNHH Thương mại Dịch vụ Truyền thông LUNA, và hướng dẫn thực hiện nhiệm vụ theo yêu cầu của đối tác. Nhấp vào đường link https://m.vnsc-finhay.com/ để thực hiện nhiệm vụ. Hoàn thành sẽ nhận được tiền gốc + hoa hồng. Từ 20h – 20h30 sẽ trả lương riêng 300.000 VNĐ. Về sau nhiệm vụ sẽ nhiều tiền hơn và hoa hồng cao hơn để lôi kéo nạn nhân chuyển tiền. Sau đó tìm cách báo lỗi là thực hiện sai để nạn nhân thực hiện tiếp nhiệm vụ khác thì mới rút được tiền gốc + lãi ra. Nạn nhân sợ mất số tiền đó nên làm theo yêu cầu và bị đối tượng dẫn dụ liên tục để nạn nhân chuyển tiền.Đối tượng sử dụng tên công ty có mã số thuế đàng quàng và tài khoản công ty rõ ràng nên nạn nhân dễ bị lừa, tin tưởng công ty. Đối tượng gửi các bản cam kết rất chân thực có đóng dấu và chữ kí của giám đốc và trưởng phòng hẳn hoi.",
                   'account_id' => \Illuminate\Support\Facades\Auth::id(),
                   'status_id' => 3
               ]);
           }
        }

        echo 'Thêm thành công';

    }
}
