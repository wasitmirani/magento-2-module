<?php

declare(strict_types=1);

namespace Neem\Sync\Observer;

use GuzzleHttp\Psr7\Request;
use Neem\Sync\Logger\Logger;
use Magento\Sales\Model\Order;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order;

class Example implements ObserverInterface
{
    /**
     * @var Logger
     */
    protected Logger $logger;

    /**
     * Example constructor.
     *
     * @param Logger $logger
     */






    protected $order;

    public function __construct(Logger $logger,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Sales\Model\Order $order,
        array $data = []
    ) {
        $this->order = $order;
        $this->logger = $logger;
        parent::__construct($context, $data);
    }

    public function execute(Observer $observer)
    {


        //get Order All Item
        try
        {
            $order = $observer->getEvent()->getOrder();
             $orderId = $order->getId();

            $this->sendOrder($orderId);
        }
        catch (\Exception $e)
        {
         $this->logger->info($e->getMessage());
        }


        $this->logger->info('Event Triggered in global scope good2');
    }

    public function sendOrder($order){


        $client =  new \GuzzleHttp\Client();
        $response = $client->request('POST', "http://apitesting.test/api/send/data", [
            'form_params' =>  ['order'=>json_encode($order),'string'=>json_encode($order)],
        ]);
    }
}
