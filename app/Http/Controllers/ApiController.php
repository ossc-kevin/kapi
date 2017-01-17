<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kwin\Kapi\ServiceHandler;
use Kwin\Kapi\ApiResponse;
/**
 * Class RestController
 *
 * @package DreamFactory\Core\Http\Controllers
 */
class ApiController extends CoreApiController
{
    private $response;
    /**
     * Create new Rest Controller.
     */
    public function __construct(ApiResponse $response){
//        $this->middleware('api');
        $this->response = $response;
    }

    /**
     * Handles the root (/) path
     *
     * @param null|string $version
     *
     * @return null|ServiceResponseInterface
     */
    public function index(
        /** @noinspection PhpUnusedParameterInspection */          
        $version = null
    ){
        try {
            $services = ServiceHandler::listServices();
            $response = ResponseFactory::create($services);
        } catch (\Exception $e) {
            $response = ResponseFactory::create($e);
        }

        return ResponseFactory::sendResponse($response);
    }
    /**
     * Handles the GET requests
     *
     * @param null|string $version
     * @param null|string $service
     * @param null|string $resource
     *
     * @return null|ServiceResponseInterface
     */
    public function handleGET($version = null, $service = null, $resource = null)
    {	
        
        try{
            $response = $this->handleService( $version, $service, $resource);
            return $this->response->jsonResponse($response);
        } catch (\Exception $ex) {
            return $this->response->exceptions($ex);
        }
    }

    /**
     * Handles the POST requests
     *
     * @param null|string $version
     * @param null|string $service
     * @param null|string $resource
     *
     * @return null|ServiceResponseInterface
     */
    public function handlePOST($version = null, $service = null, $resource = null)
    {
        try{
            $response = $this->handleService($version, $service, $resource);
            return $this->response->jsonResponse($response);
        } catch (\Exception $ex) {
            return $this->response->exceptions($ex);
        }
    }

    /**
     * Handles the PUT requests
     *
     * @param null|string $version
     * @param null|string $service
     * @param null|string $resource
     *
     * @return null|ServiceResponseInterface
     */
    public function handlePUT($version = null, $service = null, $resource = null)
    {
        return $this->handleService($version, $service, $resource);
    }

    /**
     * Handles the PATCH requests
     *
     * @param null|string $version
     * @param null|string $service
     * @param null|string $resource
     *
     * @return null|ServiceResponseInterface
     */
    public function handlePATCH($version = null, $service = null, $resource = null)
    {
        return $this->handleService($version, $service, $resource);
    }

    /**
     * Handles DELETE requests
     *
     * @param null|string $version
     * @param null|string $service
     * @param null|string $resource
     *
     * @return null|ServiceResponseInterface
     */
    public function handleDELETE($version = null, $service = null, $resource = null)
    {
        return $this->handleService($version, $service, $resource);
    }

    /**
     * Handles all service requests
     *
     * @param null|string $version
     * @param string      $service
     * @param null|string $resource
     *
     * @return ServiceResponseInterface|null
     */
    public function handleService($version = null, $service, $resource = null)
    {
            $service = strtolower($service);

            // fix removal of trailing slashes from resource
            if (!empty($resource)) {
                $uri = \Request::getRequestUri();
                if ((false === strpos($uri, '?') && '/' === substr($uri, strlen($uri) - 1, 1)) ||
                    ('/' === substr($uri, strpos($uri, '?') - 1, 1))
                ) {
                    $resource .= '/';
                }
            }
	    $action = $resource;
	    $param = null;
	    if( strpos($action, '/')){
		$temp_arr = explode('/', $resource);
		$action = $temp_arr[0];
		$param = $temp_arr[1];
		
	    }
            return $response = ServiceHandler::handleRequest($version, $service, $action,$param);


//        if ($response instanceof RedirectResponse) {
//            return $response;
//        }

        //return ResponseFactory::sendResponse($response, null, null, $resource);
    }
}
