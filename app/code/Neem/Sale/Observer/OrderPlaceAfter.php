<?php
    namespace Neem\Sale\Observer;

    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\Event\Observer;

    class OrderPlaceAfter implements ObserverInterface
    {
        protected $_logger;

        /**
         * @param \Psr\Log\LoggerInterface $_logger
         */

        public function __construct(
            \Psr\Log\LoggerInterface $_logger
        ){
            $this->_logger = $_logger;
        }


        public function execute(Observer $observer)
        {
            $order = $observer->getEvent()->getOrder();

            $this->_logger->info($order->getData());
            $this->_logger->debug($order->getData());

            var_dump($order->getData());
            exit;
        }
    }
