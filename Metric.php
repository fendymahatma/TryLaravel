<?php
namespace Saas\Alay;

use Saas\Alay\Contracts\MetricInterface;
use Saas\Alay\Contracts\MetricContextInterface;
use Illuminate\Container\Container;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use RuntimeException;

class Metric implements MetricInterface
{
	/**
	 * @var Container
	 */
	protected $container;

	/**
	 * @var MetricContextInterface
	 */
	protected $contexts;

	/**
	 * Constructor
	 */
	public function __construct(Container $app)
	{
		$this->container = $app;
		$this->contexts = new Collection();
	}

	/**
	 * @{inheritDoc}
	 */
	public function setContext(MetricContextInterface $context)
	{
		$this->contexts->push($context);
	}

	/**
	 * @{inheritDoc}
	 */
	public function getContexts()
	{
		return $this->contexts;
	}

	/**
	 * @{inheritDoc}
	 */
	public function buildByPeriod($type)
	{
		$data = array();

		// Get the data from registered contexts
		foreach ($this->contexts->all() as $context) {
			$data[] = $context->build($type);
		}

		return $data;
	}

	/**
	 * @{inheritDoc}
	 */
	public function handleRequest(Request $request)
	{
		// Get the requested type
		$type = $request->get('type', 'daily');
		
		// Ensure we have context stacks
		if ($this->contexts->isEmpty()) {
			throw new RuntimeException('Can not found any registered metric context!');
		}

		$data = $this->buildByPeriod($type);

		return new JsonResponse(compact('data'));
	}
}
