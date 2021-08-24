<?php
/**
 * @author Saleh Ahmad salehoyon@hotmail.com
 */

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Exceptions\DebugTraceableTrait;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;
use Exception;

class Payment extends BaseController
{
    /**
     * constructor
     */
    public function __construct()
    {
        helper(['form']);
    }

    /**
     * @return \CodeIgniter\HTTP\RedirectResponse|void
     */
    public function index()
    {
        $request    = Services::request();
        $validation = Services::validation();

        $name    = $request->getPost('name');
        $phone   = $request->getPost('phone');
        $email   = $request->getPost('email');
        $address = $request->getPost('address');
        $amount  = $request->getPost('amount');

        $validation->setRules([
            'name'   => [
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please provide your {field}.'
                ]
            ],
            'phone'  => [
                'label' => 'Phone Number',
                'rules' => 'required|min_length[11]|regex_match[/\+?(88)?0?1[3456789][0-9]{8}\b/]',
                'errors' => [
                    'required'    => 'Please provide your {field}.',
                    'min_length'  => 'Please provide your {field} properly.',
                    'regex_match' => 'Please provide a valid Bangladeshi {field}.'
                ]
            ],
            'amount' => [
                'label' => 'Amount',
                'rules' => 'required|greater_than_equal_to[10]|less_than_equal_to[500000]',
                'errors' => [
                    'required'              => 'Please provide {field}.',
                    'greater_than_equal_to' => '{field} must be greater than or equal 10.',
                    'less_than_equal_to'    => '{field} must be less than or equal 500000.'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            if (!is_file(APPPATH.'/Views/pages/home.php')) {
                throw new PageNotFoundException('home');
            }

            $data['title']  = 'Demo Payment';

            echo view('templates/header', $data);

            $data['errors'] = $validation->getErrors();
            echo view('pages/home', $data);

            echo view('templates/footer', $data);
            return;
        }

        try {
            $user = new UserModel();

            $trnxId = uniqid();

            $data = [
                'name'    => $name,
                'phone'   => $phone,
                'email'   => $email,
                'address' => $address,
                'amount'  => $amount,
                'trnxId'  => $trnxId
            ];

            $user->save($data);

            # Initiate Payment

            $info = [
                'amount'          => $amount,
                'transaction_id'  => $trnxId,
                'success_url'     => base_url('payment/success/' . $trnxId),
                'fail_url'        => base_url('payment/fail'),
                'customer_name'   => $name,
                'customer_mobile' => $phone,
                'purpose'         => 'Demo Online Payment',
                'payment_details' => 'check sManager Online Payment'
            ];

            $link = $this->initiatePayment($info);
            return redirect()->to($link);
        } catch (DatabaseException | Exception $ex) {
            if (!is_file(APPPATH.'/Views/pages/home.php')) {
                throw new PageNotFoundException('home');
            }

            $data['title']  = 'Demo Payment';

            echo view('templates/header', $data);

            $data['exception'] = $ex->getMessage();
            echo view('pages/home', $data);

            echo view('templates/footer', $data);
        }
    }

    /**
     * @param $info
     * @return mixed
     * @throws Exception
     */
    private function initiatePayment($info)
    {
        $url = env('PL_URL') . '/v1/ecom-payment/initiate';
        $headers = [
            'client-id' => env('PL_CLIENT_ID'),
            'client-secret' => env('PL_CLIENT_SECRET'),
            'Accept' => 'application/json'
        ];

        $client = Services::curlrequest();

        $response = $client->request('POST', $url, [
            'form_params' => $info,
            'headers'     => $headers
        ]);

        $responsejSON = json_decode($response->getBody());

        $code    = $responsejSON->code;
        $message = $responsejSON->message;

        if ($code !== 200) {
            throw new Exception($message);
        }

        return $responsejSON->data->link;
    }

    /**
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     * @throws Exception
     */
    public function success($trnxId = '')
    {
        try {
            if (!$trnxId) {
                $data['title'] = 'Payment Failed';
                echo view('pages/failed', $data);
                return;
            }

            if (!$this->trnxDetails($trnxId)) {
                $data['title'] = 'Payment Failed';
                echo view('pages/failed', $data);
                return;
            }

            $data['title'] = 'Payment Successful';
            echo view('pages/success', $data);
        } catch (Exception $ex) {
            echo $ex->getMessage() . 'on line ' . $ex->getLine();
        }
    }

    /**
     * @return string
     */
    public function fail(): string
    {
        $data['title'] = 'Payment Failed';
        return view('pages/failed', $data);
    }

    /**
     * @param $trnxId
     * @return bool
     * @throws Exception
     */
    private function trnxDetails($trnxId): bool
    {
        $url = env('PL_URL') . '/v1/ecom-payment/details?transaction_id=' . $trnxId;
        $headers = [
            'client-id' => env('PL_CLIENT_ID'),
            'client-secret' => env('PL_CLIENT_SECRET'),
            'Accept' => 'application/json'
        ];

        $client = Services::curlrequest();

        $response = $client->request('GET', $url, [
            'headers' => $headers
        ]);

        $responsejSON = json_decode($response->getBody());

        $code                 = $responsejSON->code;
        $message              = $responsejSON->message;

        # check if there is any error
        if ($code !== 200) {
            throw new Exception($message);
        }

        # Check if the transaction is completed
        $paymentStatusFromApi = $responsejSON->data->payment_status;
        if ($paymentStatusFromApi !== 'completed') {
            return false;
        }

        return true;
    }
}
