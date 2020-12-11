<?php
namespace Notification\NotifProvider;



class smsProvider
{
    public $text;
    public $user;
    public function __construct($user , $text)
    {
        $this->user = $user;
        $this->text = $text;
    }


    public function send()
    {
        $message = $this->text ;
        $receptor = $this->user;
        try {
             "Test Message Ghasedak-Api";
            $lineNumber = "10008566";

            $api = new \Ghasedak\GhasedakApi('e4802fabbae4804ade68a3c6cd3d3e1db5382cb56a77703a8c8061c740afcb20');
            $api->SendSimple($receptor, $message, $lineNumber);
        } catch (\Ghasedak\Exceptions\ApiException $e) {
           throw $e;
        } catch (\Ghasedak\Exceptions\HttpException $e) {
            throw $e;
        }
    }

}