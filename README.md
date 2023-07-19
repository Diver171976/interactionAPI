# interactionAPI
Simple lib to interact with external API.
Structure of catalogues:
* src/
	* APIManager.php - Class to manage request and response,
	* CheckerInterface.php - Interface for evaluate request result,
	* Requester.php - Class to do curl request,
	* SaleChecker.php - Realization of CheckerInterface for method SALE,
	* SaleSender.php - Realization of SenderInterface for method SALE,
	* SenderInterface.php - Interface for send request
* test/
	* testAPI.php - Simple test,
	* testParams.php - Parameters to send SALE request.