<?php
 
 namespace Achi\WeatherApp\Controller\Index;
 
 use Magento\Framework\App\Action\Action;
 use Magento\Framework\App\Action\Context;
  
 class Responsejson extends Action
 {
     /**
      * The JsonResultFactory to render with.
      *
      * @var jsonResultFactory
      */
     protected $jsonResultFactory;
  
     /**
      * Set the Context and Result Page Factory from DI.
      * @param Context     $context
      * @param JsonResultFactory $jsonResultFactory
      */
     public function __construct(
         Context $context,
         \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
     ) {
         $this->jsonResultFactory = $jsonResultFactory;
         parent::__construct($context);
     }
  
     /**
      * Show the Controller Response Types JSON Result.
      *
      * @return \Magento\Framework\Controller\Result\Json
      */
  
     public function execute()
     {
         $result = $this->jsonResultFactory->create();
         $data = [
             'foo'  => 'bar',
             'success' => true
         ];
         $result->setData($data);
         return $result;        
     }
     
 }