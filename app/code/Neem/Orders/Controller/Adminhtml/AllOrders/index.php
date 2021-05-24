<?php
namespace Neem\Orders\Controller\Adminhtml\AllOrders;

class index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		// echo "Hello World";
		// exit;
        $resultPage = $this->_pageFactory->create();

		return $resultPage;
	}
}
