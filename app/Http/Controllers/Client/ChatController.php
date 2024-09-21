<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Messenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatController extends Controller implements MessageComponentInterface
{
    protected $clients;
    protected $rooms; // Mảng lưu room_id của mỗi client

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->rooms = []; // Khởi tạo mảng phòng
    }

    public function onOpen(ConnectionInterface $conn) {
        // Lưu kết nối mới khi có client kết nối
        $this->clients->attach($conn);
        echo "Có kết nối mới! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Giả sử $msg là JSON chứa user_id, room_id, và message
        $data = json_decode($msg, true);
        $detailContractId = $data['detail_contract_id'];
        $content = $data['content'];
        $image = $data['image'];

        // Lưu room_id của client (khi client tham gia phòng)
        $this->rooms[$from->resourceId] = $detailContractId;

        // Lưu tin nhắn vào database
        try {
            $message = Messenger::create([
                'account_id' => Auth::id(),
                'detail_contract_id' => $detailContractId,
                'content' => $content,
                'image' => $image
            ]);

            // Gửi tin nhắn cho tất cả client trong cùng phòng (room_id)
            foreach ($this->clients as $client) {
                if ($from !== $client && $this->rooms[$client->resourceId] === $detailContractId) {
                    $client->send($msg); // Gửi tin nhắn cho các client cùng room_id
                }
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // Xóa kết nối khi client đóng kết nối
        $this->clients->detach($conn);

        // Xóa room_id của client khi đóng kết nối
        unset($this->rooms[$conn->resourceId]);

        echo "Kết nối {$conn->resourceId} đã ngắt kết nối\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Có lỗi xảy ra: {$e->getMessage()}\n";
        $conn->close();
    }
}
