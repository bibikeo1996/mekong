<?php
class MB_Wallet_Momo extends WC_Payment_Gateway
{
    /**
     * Class constructor, more about it in Step 3
     */
    public function __construct()
    {
       
    }
    /**
     * Plugin options, we deal with it in Step 3 too
     */
    public function init_form_fields()
    {
    }
    /**
     * You will need it if you want your custom credit card form, Step 4 is about it
     */
    public function payment_fields()
    {
    }
    /*
        * Custom CSS and JS, in most cases required only when you decided to go with a custom credit card form
        */
    public function payment_scripts()
    {
    }
    /*
         * Fields validation, more in Step 5
        */
    public function validate_fields()
    {
    }
    /*
        * We're processing the payments here, everything about it is in Step 5
        */
    public function process_payment($order_id)
    {
    }
    /*
        * In case you need a webhook, like PayPal IPN etc
        */
    public function webhook()
    {
    }
}