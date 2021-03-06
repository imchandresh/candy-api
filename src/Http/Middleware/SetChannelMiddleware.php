<?php

namespace GetCandy\Api\Http\Middleware;

use Closure;
use GetCandy\Api\Core\Channels\Interfaces\ChannelFactoryInterface;

class SetChannelMiddleware
{
    /**
     * The channel factory interface.
     *
     * @var ChannelFactoryInterface
     */
    protected $channel;

    public function __construct(ChannelFactoryInterface $channel)
    {
        $this->channel = $channel;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->channel->set($request->channel);

        return $next($request);
    }
}
