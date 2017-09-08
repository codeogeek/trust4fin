<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->number;


	switch ($text) {
		case ($text < "50002"):
			$speech = "Analysis Results - http://54.169.7.77/financial_planning.html";
			break;

		case ($text < "1000001"):
			$speech = "Analysis Results - http://54.169.7.77/financial_planning_1.html";
			break;

		case ($text < "5000001"):
			$speech = "Analysis Results - http://54.169.7.77/financial_planning_1.html";
			break;
		
		default:
			$speech = "Please consult our human financial advisor";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Please tell me a proper amount";
}

?>