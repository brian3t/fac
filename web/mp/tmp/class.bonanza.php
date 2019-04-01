<?php
    class BonanzaAPI{
        public $dev_name = "ht8sOGbEl34L9jg";
        public $cert_name = "AqTWp2Let1R8DSO";
        public $token = "Vi4VNUZLDl";
        public $url = "https://api.bonanza.com/api_requests/secure_request";
        public $header;
        public $curl_options;
        var $args;
        function __construct(){
            $this->headers = array("X-BONANZLE-API-DEV-NAME: " . $this->dev_name, "X-BONANZLE-API-CERT-NAME: " . $this->cert_name);
        }
        
        function resetParameter(){
             $this->args = null;
             $this->curl_options = array(CURLOPT_HTTPHEADER=>$this->headers,                       
                                         CURLOPT_POST=>1, 
                                         CURLOPT_RETURNTRANSFER=>1,
                                         CURLOPT_SSL_VERIFYHOST=>0,
                                         CURLOPT_SSL_VERIFYPEER=>0                      
                                          );
             $this->args['requesterCredentials']['bonanzleAuthToken'] = $this->token;
                      
        }
        
        function updateQuantity($itemID,$quantity){
            $this->resetParameter();
            $this->args['itemId'] = $itemID;
            $item['quantity'] = 50;
            $this->args["item"] = $item;
            $post_fields = "reviseFixedPriceItemRequest=" .  urlencode(json_encode($this->args));
            $this->getResponse($post_fields);
            
        }
        
        function getOrders($startTime){
            $this->resetParameter();
            $this->args["orderRole"] = 'seller';
            $this->args["soldTimeFrom"] = $startTime;
            $post_fields = "getOrdersRequest=" . urlencode(json_encode($this->args));
            return $this->getResponse($post_fields);
        }
        
        function submitTracking($orderID,$shippingCarrierUsed,$shippingTrackingNumber){
            $this->resetParameter();
            $this->args["shipment"]["shippingTrackingNumber"] = $shippingTrackingNumber;
            $this->args["shipment"]["shippingCarrierUsed"] = $shippingCarrierUsed;
            $this->args["transactionID"] = $orderID;
            $post_fields = "completeSaleRequest=" . urlencode(json_encode($this->args));
            return $this->getResponse($post_fields);
        }
        
        function getResponse($post_fields){
            $connection = curl_init($this->url);
            $this->curl_options[CURLOPT_POSTFIELDS] = $post_fields;
            curl_setopt_array($connection, $this->curl_options);
            $json_response = curl_exec($connection);
            if (curl_errno($connection) > 0) {
              echo curl_error($connection) . "\n";
              exit(2);
            }
            curl_close($connection);
            $response = json_decode($json_response,true);    
            return $response;
        }
        
        
    }
    