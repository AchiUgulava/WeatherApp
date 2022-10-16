<?php

namespace Achi\WeatherApp\Controller\Index;

use Achi\WeatherApp\Block\Index as Block;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Psr\Log\LoggerInterface;
use Magento\Framework\View\LayoutFactory;

/**
 * Class Index
 * @package Achi\WeatherApp\Controller\Controller\Index
 */
class Index extends Action
{
    protected $resultPageFactory;
    protected $logger;
    protected $layoutFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory , LoggerInterface $logger, LayoutFactory $layoutFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->logger = $logger;
        $this->layoutFactory = $layoutFactory;
        return parent::__construct($context);
    }
    private function generatehtmltopdf()
    {
        try {
            $DataHtml = $this->layoutFactory->create()
                ->createBlock(Block::class)
                ->setTemplate('Achi_WeatherApp::html2pdf.phtml')
                ->toHtml();

            $html2pdf = new Html2Pdf('P', 'A4', 'fr');
            $html2pdf->writeHTML($DataHtml);
            $html2pdf->output('convertpdf.pdf', 'D');
        } catch (Html2PdfException $exception) {
            $html2pdf->clean();
            $this->logger->error($exception->getMessage());
        }
    }
    /**
     * Function execute
     * @return Page
     */
    public function execute()
    {
        if(array_key_exists('pdf',$_POST)){
            $this->generatehtmltopdf();
        }
        return $this->resultPageFactory->create();
    }
}

