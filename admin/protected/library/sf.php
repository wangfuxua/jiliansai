<?php 
	class Sf{
		
		public $serviceUrl = 'http://bsp-oisp.test.sf-express.com:6080/bsp-oisp/ws/expressService?wsdl'; //测试地址
		//public $invoice_no;         //查询的快递单号
//		public $user="gdltfs";               //帐号
//		public $passWord="wlviyzL0AV1aN2e2";           //密码
		public $xml;                // 提交的xml
		public $methods='sfexpressService';
                public function __construct()
		{
			
		}
		/**
		 * 执行请求
		 */
		public function route($xml)
		{  
                        $this->xml = $xml;
              
			try{
				$result = $this->_soap();
			}catch(Exception $e){
				return array('msg'=>$e->getMessage(), 'errorCode'=>1);
			}
			return $result;
		}
		
		/**
		 * 发送soap请求
		 */
		private function _soap()
		{
			$client = new SoapClient($this->serviceUrl);
			$info = new stdClass();
			$info->arg0 = $this->xml;
			$param = array($info);
			$response = $client->__call ( $this->methods,$param);
			return $response->return ;
		}
		
		
	}
    
  