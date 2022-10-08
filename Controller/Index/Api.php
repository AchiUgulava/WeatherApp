<?php declare(strict_types=1);
namespace Achi\WeatherApp\Controller\Index;
 
class Api extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $serializer;
 
    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context  $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Serialize\SerializerInterface $serializer,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->serializer= $serializer;
        $this->logger = $logger;
        parent::__construct($context);
    }
 
    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $params = $this->getRequest()->getParams();
            $fieldOneValue = $params['field_one_v'];
            $fieldTwoValue = "8d0bef5c6d7e4ac1577361232d0a4bc0";
            // start api calling
            $service_url = "http://api.openweathermap.org/data/2.5/weather?q=".$fieldOneValue."&units=metric&appid=".$fieldTwoValue;
            $handle = curl_init();
 
            curl_setopt($handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            //curl_setopt($handle, CURLOPT_USERPWD, "user:pass"); // put username and password if required
            curl_setopt($handle, CURLOPT_URL, $service_url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
 
            $apiResult = curl_exec($handle);
            $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            curl_close($handle);
 
            $resultObjts = unserialize($apiResult);
             
            $dynamicValue = $resultObjts['dynamic_value'];
            // end api calling
             
            return $this->jsonResponse($dynamicValue);
             
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            return $this->jsonResponse($e->getMessage());
        } catch (\Exception $e) {
            $this->logger->critical($e);
            return $this->jsonResponse($e->getMessage());
        }
    }
 
    /**
     * Create json response
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function jsonResponse($response = '')
    {
        return $this->serializer->unserialize($response);
    }
}                                                                                                                       