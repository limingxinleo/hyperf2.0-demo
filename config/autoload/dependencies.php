<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

return [
    Hyperf\Contract\StdoutLoggerInterface::class => App\Kernel\Log\LoggerFactory::class,
    Hyperf\Server\Listener\AfterWorkerStartListener::class => App\Kernel\Http\WorkerStartListener::class,
    Hyperf\Snowflake\MetaGeneratorInterface::class => App\Kernel\Factory\MetaGeneratorFactory::class,
    Hyperf\Database\Commands\Ast\ModelUpdateVisitor::class => App\Kernel\Visitor\ModelUpdateVisitor::class,
    'SocketIOServer' => Hyperf\WebSocketServer\Server::class,
    Hyperf\Crontab\Strategy\StrategyInterface::class => Hyperf\Crontab\Strategy\CoroutineStrategy::class,
    Hyperf\Contract\NormalizerInterface::class => Hyperf\Utils\Serializer\SymfonyNormalizer::class,
    Symfony\Component\Serializer\Serializer::class => new Hyperf\Utils\Serializer\SerializerFactory(),
];
