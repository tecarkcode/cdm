<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Events\PaymentStatusUpdated;
use Illuminate\Support\Facades\Request;
use Pusher\Pusher;

class RegisterController extends Controller
{
    // public function updateStatus(Request $request)
    // {
    //     // Lógica para atualizar o status do pagamento...

    //     // Envie o evento
    //     event(new PaymentStatusUpdated(rand(1, 999), 'paid'));
    // }

}
