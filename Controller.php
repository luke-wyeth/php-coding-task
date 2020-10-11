<?php 
    class Controller {

        const $BADREQUEST = "BAD REQUEST";
        const $OK = "OK";

        function execute($request, $response) {
            switch($request->getMethod()) {
                case "GET":
                    var $contentType = $request->getHeader("Content-Type");
                    if($contentType == "text/html") {
                        getHTML($response);
                    } else if ($contentType == "application/json") {
                        getJSON($response);
                    }
                break;
                case "POST":
                    post($response, $request);
                break;
                case "PUT":
                    put($response, $request);
                break;
                default:
                    $response->withStatus(400, $BADREQUEST);
            }

            return $response;
        }

        // included in this class for simplicity
        
        function getHTML($response) {
            var $dummyHTML = "<p>Hello World!</p>"

            $response->withStatus(200, $OK);
            $response->withHeader("Content-Type", "text/html");
            $response->getBody()->write($dummyHTML);
        }

        function getJSON($response) {
            var $dummyObject;
            $dummyObject->hello = "World!";
            $dummyObject->world = "Hello";
            var $dummyJSON = json_encode($dummyObject);

            $response->withStatus(200, $OK);
            $response->withHeader("Content-Type", "application/json");
            $response->getBody()->write($dummyObject);
        }

        function put($response, $request) {
            if(isValid($request)){
                // perform put actions
                $response->withStatus(200, $OK);
            }
        }

        function post($response, $request) {
            if(isValid($request)) {
                // perform post actions 
                $response->withStatus(200, $OK);
            } else {
                $response->withStatus(400, $BADREQUEST)
            }
        }

        // representational validity checking
        function isValid($request) {
            bool $valid = false;
            var $params = $request->getQueryParams();
            if($params) {
                $valid = true;
            }
            return $valid;
        }
    }

?>