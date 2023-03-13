<?php
/**
 * Pagar.me API payments
 *
 * @package        	Laravel
 * @original author	joaoricardo.biasi@gmail.com
 * 
 * @version		1.1
 */
namespace App\Pagarme;

use Exception;

class PagarmeApi
{
    protected $data, $dados, $request, $method, $resource, $credentials;
    
    const API_BASE_URL  = 'https://api.pagar.me/core/v5/';
    const API_BASE_URL_TOKEN = 'https://api.pagar.me/core/v5/tokens';


    public function credentials($dados = [])
    {
        return $this->credentials = $dados;
    }

    /**
     * Metodo responsável para criar ordem de pagamentos
     */
    public function order($data)
    {
        return $this->sendRequest('POST', 'orders', $data);
    }

    /**
     * Metodo responsável para resgatar informações de uma ordem
     */
    public function getOrder($order_id)
    {
        return $this->sendRequest('GET', 'orders/' . $order_id);
    }

    /**
     * Metodo responsável para gerar o token do cartão de crédito
     */
    public function getCardToken($request = [])
    {
        $details = '';
        try {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => self::API_BASE_URL_TOKEN . '?appId=' . $this->credentials['public_key'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($request),
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "content-type: application/json"
                ],
            ]);

            $result = curl_exec($curl);
            if(curl_error($curl)){
                $details = curl_error($curl);
            }

            curl_close($curl);
        } catch (Exception $e) {
            $result = false;
            $details = $e->getMessage();
        }

        return ['content' => $result, 'details' => $details];
    }

    /**
     * Metodo responsável para criação de planos dentro da pagar.me
     */
    public function createPlan($data)
    {
        return $this->sendRequest('POST', 'plans', $data);
    }

    /**
     * Metodo responsável para deletar um plano dentro da pagar.me
     */

    public function deletePlan($plan_id)
    {
        return $this->sendRequest('DELETE', 'plans/'. $plan_id);
    }

    /**
     * Metodo responsável para criar uma recorrencia
     */
    public function createRecurrence($data)
    {
        return $this->sendRequest('POST', 'subscriptions', $data);
    }

    /**
     * Metodo responsável para cancelar uma recorrencia
     */
    public function cancelRecurrence($data)
    {
        return $this->sendRequest('DELETE', 'subscriptions/'. $data['recurrence_id'], $data['cancel_pending_invoices']);
    }

    /**
     * Metodo responsável para obter dados de uma fatura
     */
    public function getInvoice($invoice_id)
    {
        return $this->sendRequest('GET', 'invoices/'. $invoice_id);
    }

    /**
     * Metodo responsável para cancelar uma fatura
     */
    public function cancelInvoice($invoice_id)
    {
        return $this->sendRequest('DELETE', 'invoices/'. $invoice_id);
    }
    /**
     * Metodo responsável para enviar as informações para o Pagar.me
     */
    private function sendRequest($method, $resource, $request = [])
    {

        $endpoint = self::API_BASE_URL . $resource;

        $headers = [
            'Accept: application/json',
            'Authorization: Basic ' . base64_encode($this->credentials['username'] . ':'),
            'Content-type: application/json',
        ];
        $details = '';
        try {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_ENCODING => "",
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            ]);

            switch ($method) {
                case 'POST':
                    curl_setopt_array($curl, [
                        CURLOPT_POSTFIELDS => json_encode($request)
                    ]);
                    break;
            }

            $result = curl_exec($curl);
            if(curl_error($curl)){
                $details = curl_error($curl);
            }
        } catch (Exception $e) {
            $result = false;
            $details = $e->getMessage();
        }

        return ['content' => $result, 'details' => $details];
    }
}