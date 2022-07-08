<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\invoice;
use App\Models\invoice_item;
use App\Models\item;
use App\Models\payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {

        $invoices=invoice::with('payments')->with('types')->with('items')->all();
    }

    public function store(Request $request,$id1,$id2)
    {
        $now=Carbon::now();
$payment=new payment();
$item=new invoice_item();
        $client=client::find($id1);

        $invoice=new invoice();  // عند الضغط على اضافة عميل سيذهب الى راوت اظهار كل العملاء و عند الضغط على عميل سنأخذ ال اي دي فقط و نضعه في كلاينت اي د
          $invoice->client_id=$request->input($client->id);
$invoice->type_id=$request->input('type_id');

 //accountan and manager id from auth
$invoice->discount=$request->input('discount');
$invoice->tax=$request->input('tax');


for($i = 0; $i<100;$i++)
{
    $item2=item::find($id2);
    $item->invoice_id=$invoice->id;
    $item->item_id=$item2->id;
    $item->quantity=$request->input('quantity');
    $payment->invoce_id = $invoice->id;
    $payment->deserved_amount = $payment->deserved_amount+($item->quantity * $item2->price);
    $item->save();
}
$discount_value=$payment->desrved_amount*($invoice->discount/100);
$payment->deserved_amount=$payment->desrved_amount-$discount_value;
$payment->received=$request->input('received');
$payment->remainder=$payment->deserved_amount - $payment->received;
$payment->date=$now;
$payment->save();
if($payment->deserved_amount-$payment->received>0)
{
    $invoice->payment_status="partially paid";

}
        if($payment->deserved_amount-$payment->received==0)
        {
            $invoice->payment_status="fully paid";
        }
        if($payment->received==0)
        {
            $invoice->payment_status="not paid";
        }

$invoice->save();



    }


    public function show($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
