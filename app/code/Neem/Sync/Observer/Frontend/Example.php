<?php

declare(strict_types=1);

namespace Neem\Sync\Observer\Frontend;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Neem\Sync\Logger\Logger;

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
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $order = $order->getData();
        $this->sendOrder( $order);
        $this->logger->info('Event Triggered in frontend scope'.json_encode($order));
    }
    public function sendOrder($order){


        $client =  new \GuzzleHttp\Client();
        $response = $client->request('POST', "http://apitesting.test/api/send/data", [
            'form_params' =>  ['order'=>json_encode($order),'string'=>json_encode($order)],
        ]);
    }
}
