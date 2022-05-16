<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model{
	protected $table = 'tbl_paypal';
	protected $primaryKey = 'payment_id';
    /**
     *  $returnType as entity class  in RESTful API might not work in CodeIgniter 4.0.2.
     *  You can define as "object" at CodeIgniter 4.0.2 for RESTful API usage.
     *
     *       protected $returnType      = 'object';
     *
     */
    protected $returnType      = 'object';
    protected $useSoftDeletes = false;
 
    protected $allowedFields = ['payment_id', 'purchase_info', 'contact_number', 'txn_id', 'payable_amount', 'gst_type', 'gst_value', 'gst_added', 'payment_gross', 'currency_code', 'payment_currency', 'payment_status', 'receiver_email', 'payer_email', 'custom', 'initiated_on', 'completed_on'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function insertRecord($data){
        return $this->insert($data);
    }

    public function saveRecord($payment){
        $this->save($payment);
        return true;
    }

    public function getRecordById($id){
        return $this->where('payment_id', $id)->first();
    }

    public function getRecordByTnx($txn_id){
        return $this->where('txn_id', $txn_id)->first();
    }
}