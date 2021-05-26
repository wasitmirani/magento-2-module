<?php

declare(strict_types=1);

namespace Neem\Sync\Logger;

use Magento\Framework\Logger\Handler\Base;

class Handler extends Base
{
    protected $fileName = 'var/log/sync-observer-example.log';
}
