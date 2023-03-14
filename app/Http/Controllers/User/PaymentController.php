<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Pagarme\PagarmeApi;
use Illuminate\Support\Facades\Request;

class PaymentController extends Controller
{

    public function payment(Request $request)
    {

        $credentials = [
            'username' => 'sk_test_VkpLrqOHPTKdgqZW',
            'public_key' => 'pk_test_Q1mD5ykFWPu1D0PG',
        ];
        $pagarme = new PagarmeApi;
        $pagarme->credentials($credentials);
        
        $dados = [
            'customer' => [
                'phones' => [
                    'home_phone' => [
                        'area_code' => 12,
                        'country_code' => '55',
                        'number' => '996202311',
                    ]
                ],
                'name' => 'JOAO RICARDO',
                'document' => '09203015680',
                'document_type' => 'CPF',
                'gender' => 'Male',
                'type' => 'individual',
                'email' => 'joaoricardo.biasi@gmail.com',

            ],
            'items' => [
                [
                    'quantity' => 1,
                    'code' => rand(1, 999),
                    'description' => 'Novo registro, pagamento.',
                    'amount' => 10,
                ]
            ],
            'payments' => [
                // [
                //     'Pix' => [
                //         'expires_at' => date("Y-m-d H:i:s", strtotime("+24 hours")),
                //     ],
                //     'payment_method' => 'pix',
                // ]

                 [
                    "boleto" => [
                        'billing_address' => [
                            'line_1' => 'Rua professor joao basilio',
                            'zip_code' => '38400460',
                            'city' => 'Uberlandia',
                            'state' => 'MG',
                            'country' => 'BR',
                        ],
                        "due_at" => date('Y-m-d H:i:s', strtotime("+4 days")),
                        "instructions" => "",
                        "type" => "DM",
                        "document_number" => rand(1,100),
                    ],
                    "payment_method" => "boleto"
                ]
                
                // [
                //     'credit_card' => [
                //         'card' => [
                //             // 'billing_address' => [
                //             //     'line_1' => 'Rua professor joao basilio',
                //             //     'zip_code' => '38400460',
                //             //     'city' => 'Uberlandia',
                //             //     'state' => 'MG',
                //             //     'country' => 'BR',
                //             // ],
                //             'number' => 4000000000000010,
                //             'holder_name' => 'JOAO R B GONTIJO',
                //             'holder_document' => '09203015680',
                //             'exp_month' => '05',
                //             'exp_year' => '23',
                //             'cvv' => '1234',
                //         ],
                //         'operation_type' => 'auth_and_capture',
                //         'installments' => 1,
    
                //     ],
                //     'payment_method' => 'credit_card',
                // ]
            ]
        ];

        // $dadosToken = [
        //     'card' => [
        //         'number' => 4000000000000010,
        //         'exp_month' => '05',
        //         'exp_year' => '23',
        //         'holder_name' => 'JOAO R B GONTIJO',
        //         'cvv' => '1234',
        //     ],
        //     'type' => 'card'
        // ];
        // $token = $pagarme->getCardToken($dadosToken);
        // $dados['payments'][0]['credit_card']['card_token'] = isset($token['id']) ? $token['id'] : null;

        $retorno = $pagarme->order($dados);

        echo '<pre>';
        echo $retorno['content'];
        echo '</pre>';
    }
}
