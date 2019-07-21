<?php 

namespace App;

use App\Account;
use App\Transshipment;
use App\Document;
use App\User;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Helpers
{
    /**
     * Get all documents for an order.
     *
     * @param  int $order_id
     * @return array
     */
    public static function getDocuments($order_id = null)
    {
        $documents = Document::where('order_id', $order_id)
        ->get();
        return $documents->toArray();;

    }

    /**
     * Render order status.
     *
     * @param  object $shipment
     * @return string
     */
    public static function renderShipmentStatus($shipment = null)
    {
        if ($shipment === null){
            $statusRender = '<span class="label label-default" style="width:80px; display:inline-block">Not registered</span>';
        } else {
            $statusRender = '<span class="label label-success" style="width:80px; display:inline-block">Registered</span>';
        }
        return $statusRender;

    }

    /**
     * Get origin list by type (air or sea).
     *
     * @return array
     */
    public static function getPlacesList($type = null)
    {
        
        $places = Place::where('type', $type)->select('id', 'title')->orderby('title', 'asc')->get();

        return $places->toArray();

    }

    /**
     * Get all transshipment available for a shipment.
     *
     * @param  int $shipment_id
     * @return array
     */
    public static function getTransshipments($shipment_id)
    {

        $transshipments = Transshipment::where('shipment_id', $shipment_id)
                                ->with(['origin', 'destination'])
                                ->get();

        return $transshipments->toArray();

    }

    /**
     * Get the div the number of transshipment
     *
     * @param  array $transshipment
     * @param  int $nbr_transshipment
     * @return string
     */
    public static function transshipmentDiv($transshipment, $nbr_transshipment)
    {    
            
        switch ($nbr_transshipment) {
            case '1':
                $size = 6;
                break;
            case '2':
                $size = 3;
                break;
            case '3':
                $size = 2;
                break;
            case '4':
                $size = 2;
                break;
        }

        $div = '<div class="col-md-'.$size.' col-xs-12" style="text-align:center">
                    <div style="text-align:center"><p>'.Helpers::transshipmentIcon($transshipment->type, 2).'<br />'.strtoupper($transshipment->type).' FREIGHT</p></div>
                    <div style="text-align:center"><p><b>ETD '.$transshipment->origin->title.'</b><br />'.date('d-m-Y', strtotime($transshipment->departure)).'</p></div>
                    <div style="text-align:center"><p><b>ETA '.$transshipment->destination->title.'</b><br />'.date('d-m-Y', strtotime($transshipment->arrival)).'</p></div>
                    <div style="text-align:center"><p><b>Vessel</b><br />'.$transshipment->vessel.'</p></div>
                </div>';

        return $div;

    }

    /**
     * Get transshipment icon
     *
     * @param  string $type (air or sea)
     * @param  int $size (1, 2, 3, 4 or 5)
     * @return string
     */
    public static function transshipmentIcon($type, $size = 1)
    {
        if ($type === 'sea') {
            $icon = 'fa-ship';
        } else {
            $icon = 'fa-plane';
        }

        return '<i class="fa '.$icon.' fa-'.$size.'x"></i>';
    }

    /**
     * Get float/double val from a string
     *
     * @param  string $str 
     * @return float
     */ 
    public static function getFloat($str)
    {
        if(strstr($str, ",")) {
            $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs
            $str = str_replace(",", ".", $str); // replace ',' with '.'

            if(is_numeric($str)){
                return (float)$str;
            }
        }
        return $str;

    }

    /**
     * Get list or user belong to a customer id
     *
     * @param  int $customer_id 
     * @return array
     */ 
    public static function getCustomerUserList($customer_id)
    {

        $users = User::where('customer_id', $customer_id)->get();
        return $users;

    }

    /**
     * Store account details in session
     *
     *  
     * @return true
     */ 
    public static function setAccountInSession()
    {

        $account = \App\Account::find(1);
        session(['account.name' => $account->name,
                 'account.address' => $account->address,
                 'account.cp' => $account->cp,
                 'account.city' => $account->city,
                 'account.country' => $account->country,
                 'account.logo_white' => $account->logo_white,
                 'account.logo_black' => $account->logo_black,]);

        return true;
    }

    /**
     * Get account logo
     *
     * @param string $type = white or black
     * 
     * @return string
     */ 
    public static function getAccountLogo($type = 'black')
    {

        $account = \App\Account::find(1);

        if ($type == "black")
        {
            if (!empty($account->logo_black))
            {
                return asset('storage/img/'.$account->logo_black);
            }
            return asset('img/hecate-logo-black.png');
        }

        if ($type == "white")
        {
            if (!empty($account->logo_white))
            {
                return asset('storage/img/'.$account->logo_white);
            }
            return asset('img/hecate-logo-white.png');
        }
        
    }

    /**
     * Get account schedule date
     *
     * @param string $schedule_file
     * 
     * @return string
     */ 
    public static function getAccountScheduledate( $schedule_file = null )
    {
        $data['update'] = $data['sent'] = null;

        if (!empty($schedule_file)){
            $file =  basename($schedule_file, '.pdf');
            $dates = explode("__", $file, 2);
            //get update date
            $data['update'] = date('d/m/Y', $dates[0]);
            //get send date
            if(!empty($dates[1])){ 
                $data['sent'] = date('d/m/Y', $dates[1]); 
            }

        }

        return $data;

    }

    /**
     * Get account schedule file for attachement
     *
     * @param string $schedule_file
     * 
     * @return string
     */ 
    public static function getScheduleForAttachment()
    {
        $account = \App\Account::find(1);
        if (!empty($account->schedule_file)){
            //if not sent already rename and send
            $file =  basename($account->schedule_file, '.pdf');
            $dates = explode("__", $file, 2);

            if(empty($dates[1])){ 
                $sentFileName = 'schedules/'.$dates[0].'__'.time().'.pdf'; // set new file name with sending date
                Storage::move($account->schedule_file, $sentFileName);   //Store the new file
                $account->schedule_file = $sentFileName; // Update the schedule field in the database
                $account->save();

                return storage_path('app/'.$sentFileName);
            }

        }

    }

    /**
     * Get emails details
     *
     * @return array
     */ 
    public static function getAccountEmails()
    {

        $account = \App\Account::find(1);

        return ['from'  => $account->email_from,
                'reply' => $account->email_reply,
                'bcc'   => $account->email_bcc];
        
    }

    
}